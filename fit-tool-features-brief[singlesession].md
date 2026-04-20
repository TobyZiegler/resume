# Fit Tool Feature Additions — Session Brief
# resume.tobyziegler.com/index.php
#
# Drop this file at the start of the next working session alongside
# the source files listed at the bottom.
#
# All features target index.php only unless noted.
# fit.php and db.php are unchanged by this work.

---

## Context

The AI Job Fit Tool lives at resume.tobyziegler.com as a section of index.php.
It POSTs a job description to fit.php, which proxies to the Anthropic API and
returns a structured JSON result with these fields:

  fitLevel    — "Strong fit" / "Moderate fit" / "Partial fit" / "Limited fit"
  fitClass    — "strong" / "moderate" / "partial" / "limited"
  fitSummary  — one or two sentence honest signal explanation
  alignment   — strengths that match this role (may contain newlines and bullet markers)
  gaps        — honest gaps or mismatches
  bottomLine  — 2-4 sentence plain-language verdict in Toby's voice

renderResult(r) populates the four result cards from this object.
setText(id, text) converts newlines/bullets to HTML paragraphs and list items.
clearResult() resets the textarea and hides results.
copyResult() (added April 2026) assembles plain-text result and writes to clipboard.

The result section is hidden until an assessment runs. It becomes visible by
adding class "visible" to #fit-result.

---

## Features to Implement

All four features are independent and can be built in any order.
Each is described with enough detail to implement without asking clarifying questions.

---

### 1. "Try an example" seed button

**What it does:**
A button below the textarea hint (or near the input footer) that pre-fills the
textarea with a realistic sample job description so visitors can see the tool
in action without needing to have a job posting on hand.

**Implementation notes:**
- Add a small text link or secondary button below .fit-input-area:
    `<button class="fit-example-btn" onclick="loadExample()">Try an example job description</button>`
- The example should be a plausible but generic mid-level role — something like
  a "Product Manager, AI Tools" or "Technical Program Manager" that will
  produce a realistic Moderate fit result (not obviously strong or obviously
  weak — a real assessment is more interesting than a slam dunk).
- After filling the textarea, trigger the char count update and enable the
  assess button. Do not auto-run the assessment — let the visitor decide.
- Button should disappear (or change to "Clear example") once the textarea
  has user content. Simplest approach: hide it after any textarea input event.
- Style: small, muted. `font-size: var(--text-sm); color: var(--text-muted);`
  plain text button, no border, underline on hover. Sits below the input area,
  left-aligned.

**Sample job description to seed (write something realistic, ~300 words):**
A product or program manager role at a technology company working on AI tooling,
requiring: experience with AI/LLM products, cross-functional coordination,
ability to translate technical concepts for non-technical stakeholders,
some comfort with agile methodology, strong written communication.
Bonus points if it mentions documentation, process design, or design background.

---

### 2. sessionStorage history of past assessments

**What it does:**
After each successful assessment, saves the job description and result to
sessionStorage. Displays a "Recent assessments" list below the fit tool that
lets the visitor re-load a previous result without re-running the API call.
History is session-only — clears when the tab closes. No persistence across
sessions (no localStorage, per ecosystem rules).

**Implementation notes:**
- Key: `fitHistory` in sessionStorage. Value: JSON array of assessment objects:
    [ { ts, jobSnippet, result }, ... ]
  where ts is Date.now(), jobSnippet is the first 80 chars of the job description
  (for display), and result is the full JSON object from fit.php.
- Max history: 5 entries. Drop the oldest when a 6th is added.
- Render a `<div id="fit-history">` section below #fit-result (still inside
  .fit-tool-inner). Hidden when empty.
- Each history entry: a small card showing the job snippet + fit level badge +
  a "Load" button. Clicking Load calls renderResult(entry.result) and scrolls
  the result into view. It does NOT re-populate the textarea.
- History section heading: small eyebrow label "This session" above the cards.
- Style: compact. Cards at ~60% opacity until hovered. Use var(--white-soft),
  var(--rule), var(--radius-sm), var(--text-sm) throughout.
- Save to history inside runAssessment() after renderResult(result) succeeds.
- On page load, read sessionStorage and render history if any exists.

**Edge cases:**
- sessionStorage.setItem can throw if storage is full or blocked — wrap in
  try/catch and silently fail (history is a nice-to-have, not critical).
- If the visitor clears the result, history remains visible and usable.

---

### 3. Print-friendly result view

**What it does:**
A "Print / Save as PDF" button in the result area that opens a clean print
dialog. The printed output should show only the assessment result — no nav,
no hero, no resume content. Formatted for an 8.5x11 page.

**Implementation notes:**
- Add a "Print result" button to .fit-result-clear alongside Copy and Clear:
    `<button onclick="printResult()">Print result</button>`
- printResult() adds a class to <body> (e.g. `body.printing-result`) then
  calls window.print(), then removes the class in the afterprint event.
- Add a @media print block to the <style> tag:
    - Hide everything except #fit-tool and #fit-result
    - Remove section background color on #fit-tool (white page)
    - Remove box shadows
    - Show a small header: "Fit Assessment — resume.tobyziegler.com" above the result
    - Force colors to black/dark where they rely on the parchment palette
    - Remove the Clear / Copy / Print buttons themselves from the printed output
      (.fit-result-clear { display: none; })
    - .fit-card-signal min-width: auto; grid layout collapses gracefully
- The printed header can be injected as a ::before on #fit-result in print media,
  or as a hidden <div id="fit-print-header"> that becomes visible only in print.
  Prefer the hidden div approach — more reliable across browsers.
  Content: "Job Fit Assessment for Toby Ziegler — resume.tobyziegler.com — [date]"
  Date is set by printResult() before calling window.print().

---

### 4. Share URL with encoded job description

**What it does:**
A "Share link" button that copies a URL to the clipboard. The URL encodes the
job description as a compressed query parameter. When someone opens the link,
the job description is pre-populated and the assessment runs automatically.

**Implementation notes:**
- Button in .fit-result-clear: `<button onclick="shareResult()">Share link</button>`
- Encoding: use btoa(encodeURIComponent(jd)) to base64-encode the job description.
  URL: https://resume.tobyziegler.com?jd=[encoded]
  Note: long job descriptions will produce long URLs. Modern browsers handle
  URLs up to ~2000 chars reliably. Add a character budget check — if the
  encoded string exceeds 1800 chars, show a brief "Job description too long to
  share as a link" message instead of copying. Suggest using Copy result instead.
- On page load, check for ?jd= in the query string:
    const params = new URLSearchParams(window.location.search);
    const jd = params.get('jd');
    if (jd) { textarea.value = decodeURIComponent(atob(jd)); /* trigger count update, run assessment */ }
- Auto-run the assessment on load if jd param is present. Show the loading state
  immediately — the visitor followed a link specifically to see the result.
- shareResult() copies the URL to clipboard with the same pattern as copyResult():
  confirm with "Copied!" on the button, revert after 2s.
- Edge cases: malformed base64 in the query param should be caught with try/catch
  and silently ignored (just leave the textarea empty).

---

## Styling conventions to maintain

All new elements must follow the existing conventions in index.php:

- No raw hex values — use var(--text), var(--text-muted), var(--green), var(--burg),
  var(--rule), var(--white-soft), var(--bg-alt), var(--shadow-card) etc.
- No raw rem font sizes — use var(--text-xs), var(--text-sm), var(--text-base),
  var(--text-body), var(--text-lg)
- Border radius: var(--radius-sm) or var(--radius) — no raw values
- Transitions: var(--transition)
- No em dashes anywhere in copy or comments
- Buttons follow the existing .fit-result-clear button style: plain, muted,
  opacity transition, no border

---

## Source files needed for the session

Upload these files when starting the work:

| File | Why |
|---|---|
| `index.php` | The file being edited — resume.tobyziegler.com |
| `system-prompt-job-fit.md` | Reference for understanding the fit tool's output shape |
| `README-resume.md` | Project context and open decisions |
| `fit-tool-features-brief.md` | This file |

fit.php and db.php are NOT needed — no changes to the server-side proxy.
shared.css is NOT needed — token reference is covered by this brief.

---

## After the session

Update README-resume.md open decisions to check off whichever features shipped.
Update the brief's "Current Status" section in resume-brief.md if it is provided.
No changes needed to the system prompt or fit.php unless new portfolio items
have shipped since the last update.

---

*Written: April 2026*
