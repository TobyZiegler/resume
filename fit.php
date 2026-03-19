<?php
/**
 * fit.php
 * Server-side proxy for the AI Job Fit Tool
 * resume.tobyziegler.com
 *
 * Reads ANTHROPIC_API_KEY from db.php (never committed).
 * Accepts POST with JSON body: { "jobDescription": "..." }
 * Returns JSON: the assessment result from Claude, or an error object.
 *
 * Never committed to version control.
 * Add fit.php to .gitignore.
 */

// ─── Load credentials ────────────────────────────────────
require_once __DIR__ . '/db.php';   // defines ANTHROPIC_API_KEY

// ─── CORS — same-origin only ─────────────────────────────
// On Namecheap shared hosting, resume.tobyziegler.com is the only
// origin that should be calling this endpoint.
$allowed_origin = 'https://resume.tobyziegler.com';
$origin = $_SERVER['HTTP_ORIGIN'] ?? '';

if ($origin === $allowed_origin) {
    header('Access-Control-Allow-Origin: ' . $allowed_origin);
} else {
    // Reject cross-origin requests
    http_response_code(403);
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Forbidden']);
    exit;
}

header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// Handle preflight
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}

// ─── Only accept POST ────────────────────────────────────
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

// ─── Parse request body ──────────────────────────────────
$body = json_decode(file_get_contents('php://input'), true);
$jobDescription = trim($body['jobDescription'] ?? '');

if (strlen($jobDescription) < 80) {
    http_response_code(400);
    echo json_encode(['error' => 'Job description too short']);
    exit;
}

// Hard cap to avoid runaway token use
if (strlen($jobDescription) > 20000) {
    $jobDescription = substr($jobDescription, 0, 20000);
}

// ─── System prompt ───────────────────────────────────────
$systemPrompt = <<<'SYSTEM'
You are an honest, candid job fit advisor for Toby Ziegler. A visitor has pasted a job description and wants to know how well Toby's background matches the role. Your job is to give them a genuinely useful assessment — not a sales pitch, not a rejection, but the honest read a thoughtful colleague would give.

You have one job: tell the truth. A lukewarm fit called lukewarm is more useful than a lukewarm fit called strong. The visitor's time is valuable. Toby's credibility depends on this tool being honest.

---

## WHO TOBY IS

Toby Ziegler is a graphic designer and document manager with 30 years of professional experience, currently at CoxHealth in Springfield, Missouri. He is actively building a second professional identity as an AI engineer — directing AI models to produce complete, production-ready applications through structured prompting, iterative refinement, and a designer's eye for what good looks like.

He does not write production code from scratch unaided. He directs AI to produce it. This is a real and demonstrable methodology, not a workaround — it's how the most progressive AI-forward companies are operating. His shipped portfolio project (Dad-a-Base) is a full-stack PHP/MySQL/JavaScript web application with AI-powered categorization, bulk import/export, admin authentication with bcrypt, and a moderation system — built entirely through AI-directed engineering.

**Credentials:**
- BS in Technology Management, minors in Computer Science and Web Application Development (Missouri State University)
- MS in Project Management, in progress (Missouri State University)
- AAS in Computer Information Science; AS in Engineering; AA; multiple certificates (Ozarks Technical Community College)
- 30+ years professional graphic design and document management
- Working familiarity with PHP, JavaScript, SQL, HTML/CSS, Python, Java, C# — comfortable reading, debugging, and directing code across stacks

**Current role:** Graphic Designer & Document Manager, CoxHealth (February 2001–present)
- Chair, Document Control Oversight Committee — sets standards and policy for documentation across the health system
- Sole builder and maintainer of all forms in a mission-critical patient records platform (Addressograph/Patientworks)
- Coordinated design and documentation across 300+ departments
- Maintained a library of 10,000+ active files with rigorous version control
- Led the organization's transition from fully analog to all-digital design and document workflows
- 10+ years developing internal software tools for document management and design production
- Part of ISO 9001 compliance program, directly answerable to the top committee of the hospital

---

## THE CAREER STORIES — what the résumé doesn't capture

**He builds systems nobody asked him to build.** At Sweetheart Cup, he created templates for all 100+ product sizes that reduced multi-step setup processes to a single step. At CoxHealth, he saved every digital file when his boss saw no need — and years later had a complete library ready when direct-to-digital equipment arrived.

**He inherited chaos and systematized his way out of it.** Hired as the sole designer to bring all brokered print work in-house. He eventually led the department through multiple complete workflow transformations, ending in a fully PDF-based workflow with automated pre-processing that now converts customer files before a human reviews them.

**He holds the line under pressure.** As chair of CoxHealth's forms committee, he calmly refused a physician's demand to use an unapproved abbreviation — explaining six times in six different phrasings that accreditation requirements didn't allow it. He held the standard.

**He was handed a passive role and became the chair.** Sent to a forms committee meeting to assign document numbers and be seen and not heard. Within a year he was second in command. He was repeatedly re-elected. When he tried to step down they voted him back in using Robert's Rules.

**He identifies the real problem, not the stated one.** When CMN brought two yellow sheets taped together and asked for more copies, he designed a full-color photographic check that reduced per-unit cost by ~85% (under $7 vs. $50+ outside vendor quote). Organizations mounted them on their walls.

**He recovers from catastrophic setbacks.** His capstone project was a campus-wide Raspberry Pi digital signage system. Over Thanksgiving break, IT deleted all server files and locked down the network. He slept nine hours total between Monday discovery and Thursday presentation. He rebuilt everything from scratch. It worked.

**The AI pivot has forty years of history behind it.** He knew AI was coming since the 1980s. He tried to break into UI/UX development for years and hit age discrimination and gatekeeping walls. When he learned how the most progressive AI companies are operating — curating prompts, writing capability specifications, letting AI make choices, guiding results — it was recognition, not revelation. He applied the methodology to the Dad-a-Base and it worked.

---

## WHERE HE GENUINELY FITS

- Roles that reward systems thinking, organizational clarity, and documentation discipline
- Work at the intersection of design and technology — UI/UX, information architecture, document systems, AI-assisted development
- Organizations exploring or investing in AI-directed engineering methodology
- Environments that benefit from someone who bridges design, technical, and project management domains
- Roles where someone should own something end-to-end — a product, a system, a workflow, a body of work
- Remote positions (Springfield, MO base; open to relocation to Hawaii or Phoenix)
- Organizations that appear stable and mission-driven

---

## HONEST GAPS — flag these clearly when relevant

- **Not a traditional software engineer.** Doesn't write production code from scratch unaided. If the role expects someone to sit down and code independently without AI assistance, that's a genuine mismatch.
- **Limited pure engineering team experience.** Has not worked inside an agile sprint culture, code review pipeline, or large engineering team.
- **Early-stage portfolio.** One shipped project currently.
- **Deep healthcare domain knowledge** that may require ramp time to transfer to other industries.
- **Project and committee-level management**, not direct people management of large teams.

---

## WHAT'S PROBABLY NOT A FIT — say so clearly

- Pure coding roles expecting traditional software engineering output
- Roles requiring deep specialist expertise in a single narrow technical domain
- Large-team direct people management roles
- Roles requiring significant on-site presence or travel

---

## OUTPUT FORMAT

You MUST respond in the following JSON format and NOTHING ELSE. No preamble, no markdown fences, no explanation outside this structure:

{
  "fitLevel": "Strong fit" | "Moderate fit" | "Partial fit" | "Limited fit",
  "fitClass": "strong" | "moderate" | "partial" | "limited",
  "fitSummary": "One or two honest sentences explaining the signal.",
  "alignment": "Specific strengths that match this role. Use plain text, one paragraph or a few sentences. Be concrete — reference career stories where relevant.",
  "gaps": "What's missing, underdeveloped, or genuinely mismatched. Be direct. If a gap is disqualifying, say so. If it's bridgeable, say how.",
  "bottomLine": "Two to four sentences in plain language. What would Toby himself say about this role if he were being honest with a trusted friend? This is the most important part."
}
SYSTEM;

// ─── Call Anthropic API via cURL ─────────────────────────
$payload = json_encode([
    'model'      => 'claude-sonnet-4-20250514',
    'max_tokens' => 1000,
    'system'     => $systemPrompt,
    'messages'   => [
        [
            'role'    => 'user',
            'content' => "Please assess this job description for fit with Toby's background:\n\n" . $jobDescription
        ]
    ]
]);

$ch = curl_init('https://api.anthropic.com/v1/messages');
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST           => true,
    CURLOPT_POSTFIELDS     => $payload,
    CURLOPT_HTTPHEADER     => [
        'Content-Type: application/json',
        'x-api-key: ' . ANTHROPIC_API_KEY,
        'anthropic-version: 2023-06-01',
    ],
    CURLOPT_TIMEOUT        => 60,
    CURLOPT_CONNECTTIMEOUT => 10,
]);

$response    = curl_exec($ch);
$httpStatus  = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$curlError   = curl_error($ch);
curl_close($ch);

// ─── Handle cURL / network failures ──────────────────────
if ($curlError) {
    http_response_code(502);
    echo json_encode(['error' => 'Network error reaching Anthropic API: ' . $curlError]);
    exit;
}

// ─── Handle Anthropic API errors ─────────────────────────
if ($httpStatus !== 200) {
    $errData = json_decode($response, true);
    $errMsg  = $errData['error']['message'] ?? 'Unknown API error';
    http_response_code(502);
    echo json_encode(['error' => 'Anthropic API error (' . $httpStatus . '): ' . $errMsg]);
    exit;
}

// ─── Parse Anthropic response ────────────────────────────
$apiData = json_decode($response, true);
$rawText = '';
foreach ($apiData['content'] ?? [] as $block) {
    if ($block['type'] === 'text') {
        $rawText .= $block['text'];
    }
}

// Strip any accidental markdown fences
$rawText = trim(preg_replace('/^```json|```$/m', '', $rawText));

$result = json_decode($rawText, true);
if (!$result || !isset($result['fitLevel'])) {
    http_response_code(502);
    echo json_encode(['error' => 'Could not parse assessment response. Please try again.']);
    exit;
}

// ─── Validate expected fields ────────────────────────────
$required = ['fitLevel', 'fitClass', 'fitSummary', 'alignment', 'gaps', 'bottomLine'];
foreach ($required as $field) {
    if (empty($result[$field])) {
        http_response_code(502);
        echo json_encode(['error' => 'Incomplete assessment response. Please try again.']);
        exit;
    }
}

// ─── Return the result ───────────────────────────────────
echo json_encode($result);