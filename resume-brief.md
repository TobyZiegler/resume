# resume.tobyziegler.com — Working Brief & Session Continuity Document

> *Paste this file at the start of any working session along with README-resume.md, README-dadabase.md, tobyziegler.com index.html, and TobyZiegler_Resume2026.docx to restore full context.*

---

## Current Status

**Phase:** Initial build complete. Deployed files ready. Troubleshooting and polish pass next.

**Decisions made:**
- Single-page architecture
- AI fit tool prominent above the résumé content, dark section treatment
- Paste-only for job descriptions (PDF upload deferred to later polish pass)
- Shares tobyziegler.com visual identity: **Lora + DM Sans** (Fraunces retired in shared.css v2.4 — this page now matches), Classic Study palette, pill-button component language
- CSS token debt resolved: full :root block now matches shared.css v2.4; `--pad-page` used for all horizontal padding
- CSS kept per-subdomain (not shared via assets subdomain) — revisit when portfolio has 4–5 rooms
- `fit.php` as server-side proxy for Anthropic API (same pattern as `categorize.php` in Dad-a-Base)

**Files in this build:**
- `index.php` — the full resume page, AI fit tool UI, all CSS and JS inline
- `fit.php` — server-side Anthropic API proxy; reads `ANTHROPIC_API_KEY` from `db.php`
- `db.php` — credentials file, created manually on server, **never committed** (same pattern as Dad-a-Base)

**Known issues / next session:**
- [ ] Verify `fit.php` is working on the live server — if the error message shows on assessment, check: (1) `db.php` exists with `ANTHROPIC_API_KEY` defined, (2) cURL outbound is allowed on the plan, (3) API key has credits
- [ ] Manager perspective stories still TBD — add to system prompt in `fit.php` when written
- [ ] Link from tobyziegler.com main site nav not yet added
- [ ] PDF upload support deferred — add after core functionality confirmed working
- [ ] Consider rate-limiting `fit.php` (currently open; low-traffic risk acceptable for now)
- [x] Fraunces → Lora font migration complete
- [x] CSS token debt resolved — :root block now canonical; --pad-page applied throughout
- [x] Professional summary rewritten — leads with 30 years, frames AI engineering as evolution
- [x] Hero meta updated — "3 shipped AI-directed applications" (fit tool + Dad-a-Base + Study)
- [x] Competency cards strengthened — "Systems Thinking & Workflow Automation" replaces generic "Technical Breadth"
- [x] CoxHealth bullets reordered — scale and mission-critical responsibility lead
- [x] DirectBuy removed — undated, thin, diluted the page
- [x] Portfolio expanded — AI Fit Tool added as entry #1 (it's a live AI app, it belongs here)
- [x] Sweetheart Cup "Artist" → "Graphic Artist"; template library story surfaced more clearly

**Next steps when resuming:**
1. Deploy `index.php` and `fit.php` to `resume.tobyziegler.com` document root
2. Create `db.php` on server with `ANTHROPIC_API_KEY` (same format as Dad-a-Base `db.php`)
3. Test the fit tool with a real job description — check browser console and the error detail shown on screen if it fails
4. Add nav link + contextual link from tobyziegler.com main site
5. Write manager perspective stories and add to `fit.php` system prompt

---

## Deployment Checklist

```
resume.tobyziegler.com/
├── index.php        ← deploy via Git
├── fit.php          ← deploy via Git
└── db.php           ← create manually on server (NEVER commit)
```

`db.php` needs only one constant for this project:
```php
<?php
define('ANTHROPIC_API_KEY', 'sk-ant-...');
```
(No database needed for the resume subdomain — unlike Dad-a-Base, there's no MySQL dependency.)

---

## Diagnosing the Fit Tool

If "Assess the fit" shows an error on the live server:

1. **Open browser DevTools → Network tab** — look at the `fit.php` request
2. **Check the response body** — `fit.php` returns JSON error messages with detail
3. Common causes (same as Dad-a-Base categorize.php):
   - `db.php` missing or `ANTHROPIC_API_KEY` not defined → 500 error
   - Bad/expired API key → 502 with "401" in message
   - No API credits → 502 with "400" or "402" in message
   - cURL blocked by host → 502 with cURL error string

---

## The "Known Information" Document

*This is the briefing document that lives in the AI fit tool's system prompt inside `fit.php`. Update `fit.php` directly when adding new stories.*

### Core Identity

Toby Ziegler is a graphic designer and document manager with 30 years of professional experience, currently at CoxHealth in Springfield, Missouri. He holds a Bachelor of Applied Science in Technology Management (minors in Computer Science and Web Application Development), multiple associate's degrees in Computer Information Science and Engineering, and is completing a Master of Science in Project Management at Missouri State University.

His core professional identity sits at the intersection of design, systems thinking, and project coordination. He has spent his career making complex organizational information clear, consistent, and usable. He is actively building a second professional identity as an AI engineer — directing AI models to produce complete, production-ready applications through structured prompting rather than writing code by hand.

### The Throughline

Across every role Toby has held, a consistent pattern emerges: he arrives somewhere operating below its potential, identifies the inefficiency or the gap, builds a system to address it, and absorbs the scope that naturally flows toward someone who operates that way. This is not a learned behavior — it appears in his earliest career stories and has repeated in every environment since. He does his best work when he owns something end-to-end.

---

### Career Stories

#### The Children of the Checks — CoxHealth / CMN Telethon

A Children's Miracle Network representative arrived at CoxHealth printing services needing more telethon checks printed. The existing "checks" were two yellow sheets taped together with vague check-like printing — what they'd been using for years to present donations on television. Toby was appalled.

With about a month's lead time and no dedicated budget, he:
- Negotiated access to the engineering department's plotter in exchange for replacement ink cartridges
- Designed a realistic, proportionally correct check sized for the 32-inch guillotine cutter
- Used a blue-sky photograph as background, embedded the CMN phone number in the routing fields and the document number as the check number
- Printed 50 full-color checks, mounted on pasteboard for rigidity

They were an immediate hit. The following year he added a CMN child (Cole) to the background. Each subsequent year added more children, with their stories in the memo area. Organizations began saving the checks and mounting them in their businesses as proud displays of their contributions — the old yellow sheets had always gone straight in the trash.

Cost: under $7 per check. Outside vendor quote with labor donation discount: $50+ per check. Cost reduction: ~85%.

The model spread. Other CMN chapters across the country attempted to replicate it. The program ran for years until management changes ended it.

**What this demonstrates:**
- Resource ingenuity under constraints (no budget, borrowed equipment)
- Identifying the real problem vs. the stated request
- Iterative improvement based on audience response
- Cost reduction at scale for a nonprofit
- Work that created genuine emotional value — people kept it, displayed it, were proud of it

---

#### The Forms Committee — CoxHealth Document Governance

Toby was brought to his first forms committee meeting to be shown the ropes, then sent in his manager's place going forward. His assigned role: assign the next available document number to approved forms. Be seen and not heard.

He couldn't do it. Within months he was asking the questions that guided committee discussions to cover necessary ground — document titles that distinguished between the emergency order form, the oncology order form, and the hundred other forms called "the order form." Within a year he was second in command.

One memorable exchange: a physician insisted on using an abbreviation without explanation because "it couldn't possibly stand for anything else." Toby calmly explained — six times, in six different phrasings — that accreditation requirements did not allow the abbreviation unless it appeared on the approved list or was explained in the document text or a key. The physician's sputtering red face is still remembered by colleagues.

Politics changed the committee, killed it, revived it, and eventually made Toby the chair. He was repeatedly re-elected. When he told them someone else needed to take the helm, they used Robert's Rules to vote him back in.

The committee eventually became responsible for every document in the organization, part of the ISO 9001 compliance program, directly answerable to the general committee — the top committee of the hospital.

**What this demonstrates:**
- Leadership earned through competence, not assignment
- Holding the line on compliance requirements under pressure from high-authority figures
- Building a governance system that scaled from clerical housekeeping to organization-wide document control
- ISO 9001 familiarity
- The passive role → recognized leader pattern that appears throughout his career

---

#### Building the Print Shop — CoxHealth Printing Services

Toby was hired as the sole graphic designer to support printing services, with a mandate to bring all brokered work in-house. His starting setup: a Macintosh, a monitor, a desk, a counter, an imagesetter, a processor, a RIP, and a darkroom with a sink.

He made the digital files, imaged them to negatives or positives, locked the door, developed the film, then laid the film or cut the positives for plate-making or copier masters. He worked 60-70 hour weeks and was always hundreds of jobs behind. He persevered.

Critically: he saved every digital file, even though his boss saw no need.

When direct-to-digital imaging equipment arrived, he had a complete library ready. With his guidance and insistence, the department developed a repository of originals and a coordinating repository of production PDFs, then converted the entire workflow to PDF-based production. Eventually the process was automated to convert customer-submitted Word and other files to production PDFs before any human reviewed them.

**What this demonstrates:**
- Self-direction under pressure with no playbook
- Long-horizon thinking: saving files nobody asked him to save, that proved invaluable years later
- Owning a transformation end-to-end across multiple technology generations
- Workflow automation instincts that predate formal engineering training

---

#### The Raspberry Pi Capstone — OTC

For his capstone project, Toby designed and built a campus-wide digital signage system for Ozarks Technical Community College using Raspberry Pi hardware. The system used DNS addressing, shell scripting, and hierarchical device management — addressable by campus, building, and individual device, with both scheduled content and emergency broadcast modes.

He was part of a three-person team. One member contributed minimally. The other volunteered to handle documentation and project trail — assuring Toby weekly that everything was on track. Three days before the final presentation, Toby discovered this teammate had never heard of a Gantt chart, despite it being a stated deliverable from day one.

Over Thanksgiving break, someone from IT deleted all server files and locked down the classroom network. Toby slept nine hours total between Monday morning discovery and Thursday afternoon presentation. He rebuilt and reconfigured everything from scratch. All three team members presented. His portion worked. It covered for the other two.

The system was a demonstrated success. The following semester, the department chair and his aide — the only people with institutional authority who knew and believed in the project — both left for other organizations. Despite Toby's efforts to get the system implemented, the Raspberry Pi delivery model was dismissed by the incoming leadership. The project was shelved.

**What this demonstrates:**
- Real client engagement: identified a genuine need, not a classroom exercise
- Sophisticated technical architecture on constrained hardware
- Crisis recovery under extreme conditions: full rebuild in under four days after catastrophic environment loss
- Carrying a team while constrained from verifying delegated work
- A recurring pattern: built something that worked, lost to organizational forces outside his control

---

#### The AI Engineering Pivot — Current

Toby has known since the 1980s that AI was coming. He'd left aerospace engineering near the end of his junior year — pivoting to graphic design after an internship with American Airlines put a Macintosh in his hands and changed everything. The university's design program was still analog. So he taught himself. Small jobs, temp work, every spare hour at the library. It worked.

Decades later, he tried to combine that design career with the computing credentials he'd accumulated and pivot into UI/UX development. He couldn't find takers. Age discrimination, opaque hiring processes, skills exam thresholds he couldn't clear without the junior-level experience those same processes prevented him from getting.

Then he learned how the most progressive AI companies are actually working: not asking engineers to write code, but curating prompts — writing long capability specifications, letting the AI make choices, guiding overall results toward a desired outcome. Engineers who understand code deeply but aren't coding. Fully functional software produced through prompting and interaction alone.

He applied the methodology to the Dad-a-Base and it worked. Full-stack PHP/MySQL/JavaScript web application with AI-powered categorization, bulk import/export, a moderation system, and database-backed authentication — conceived, directed, troubleshot, and deployed without writing a single line of code by hand.

His framing: *"This feels a lot like teaching myself graphic design back in the day. I don't need the degrees, no matter how much or little they help, I just need experience. I just need a chance. So I am making one."*

*Manager perspective stories to be added.*

---

### An Honest Pattern Worth Naming

Across multiple stories, Toby built things that worked and were recognized as working — then watched them end due to forces entirely outside his control. New management ended the CMN checks. The capstone system's champions left. Years of UI/UX attempts hit age discrimination and opaque hiring gatekeeping.

The through line is not failure. His work consistently outlasted the organizational will to sustain it — which is a different thing. The print shop workflow transformation still runs. The forms committee governance structure grew to ISO 9001 compliance. The template library served Sweetheart until the company itself closed.

**For the AI fit tool's calibration:** Organizations that appear stable, mission-driven, and technically forward-looking are worth flagging positively. Roles that look like environments where good work might be abandoned by the next management shuffle are worth noting honestly.

---

### Where He Thrives

- Roles that reward systems thinking, organizational clarity, and documentation discipline
- Work at the intersection of design and technology — UI/UX, document systems, information architecture, AI-assisted development
- Projects where AI-directed engineering methodology is valued or being explored
- Environments that benefit from someone who bridges design, technical, and project management domains
- Organizations that need someone to own something end-to-end
- Remote positions workable from anywhere (Springfield, MO base; open to relocation to Hawaii or Phoenix)

### Honest Gaps

- Not a traditional software engineer — doesn't write production code from scratch unaided and shouldn't be evaluated as one
- Limited experience in pure engineering team environments (agile sprints, code review culture, CI/CD pipelines at team scale)
- The AI engineering practice is real and demonstrable, but the portfolio is early-stage — one shipped project currently
- Healthcare domain knowledge is deep but may require a ramp period to transfer to other industries
- Management experience is project and committee-level, not direct people management of large teams
- Has faced gatekeeping in traditional hiring pipelines; the AI engineering methodology is partly a response to those barriers — honest about this rather than defensive about it

### What's Probably Not a Fit

- Pure coding roles expecting traditional software engineering output
- Roles requiring deep expertise in a single narrow technical domain
- Large-team direct people management roles
- Roles requiring significant travel or on-site presence (remote strongly preferred)

---

## Design Notes

The resume site shares the tobyziegler.com visual identity:
- **Typography:** Lora (display) + DM Sans (body) — non-negotiable. Fraunces is retired; do not reintroduce it.
- **Palette:** Classic Study — warm parchment (`#F5F0E8`), espresso (`#2C1F14`), forest green (`#3A5C3B`), burgundy (`#7B2D3A`)
- **Components:** Pill-button style, generous whitespace, warm editorial minimalism
- **Dark section:** `#1C1712` for the AI fit tool, consistent with main site dark treatments
- **Voice:** Warm, confident, honest — not corporate, not defensive

The AI fit tool should feel like Toby handed you his résumé in person and offered to walk you through it, not like a PDF spat out of a template.

---

*Last updated: March 2026 — initial build complete, deploying and testing next.*