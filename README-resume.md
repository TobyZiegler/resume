# Toby's Resume — Project Brief & Living Document

> *This README serves as the running brief for resume.tobyziegler.com. Paste it at the start of any working session along with the index files from tobyziegler.com and dadabase.tobyziegler.com to restore full context. Update it as decisions are made.*

---

## What This Is

**Toby's Resume** is a dedicated subdomain at resume.tobyziegler.com serving as the professional résumé hub for Toby Ziegler. It is intentionally separate from the main site but shares its visual identity, voice, and typographic system.

It serves two distinct audiences simultaneously:
- **Human visitors** — hiring managers, collaborators, and curious people following a link from tobyziegler.com or a direct referral
- **Automated systems** — ATS parsers, search engines, and any tool that reads the page looking for structured professional information

It also features an **AI-powered job fit tool** — an interactive feature that allows visitors to paste a job description and receive an honest, candid assessment of how well Toby's background aligns with the role.

---

## Why a Subdomain

- `resume.tobyziegler.com` is recognizable and unambiguous — hiring managers know exactly what they're getting
- Keeps the main site clean and focused on the broader argument
- Can be iterated, updated, and optimized independently
- Subdomain-level SEO metadata can be tailored specifically for job-search discoverability
- Consistent with the "rooms" metaphor — another room off the study, with a specific purpose

---

## Relationship to the Main Site

**Same author, same thread.** The resume subdomain shares:
- Lora + DM Sans typography (non-negotiable; Fraunces was retired in shared.css v2.4)
- The color palette and CSS variable system from tobyziegler.com
- The voice and tone — warm, confident, honest, not corporate
- The pill-button style and general component language

CSS is kept per-subdomain (inline in each page) rather than shared via an assets subdomain. This is the right call at current portfolio size — revisit when there are 4–5 active rooms.

---

## Link from tobyziegler.com

The link from the main site needs to be done deliberately — not a footnote, not buried in the footer (though the footer should also have it). Two entry points:

1. **Nav bar** — always present, unambiguous
2. **Contextual placement** — likely in or near the About section where the professional framing lives; possibly a dedicated strip between About and Process

**Link treatment:** Pill button with `↗` indicating external destination. Copy should be an invitation, not a label — something like "See the full résumé →" rather than just "Résumé."

**Status:** Not yet added to tobyziegler.com — next action item.

---

## Audience & Discoverability

### Human visitors
- Should immediately understand who this is and what they do
- Should be able to read the résumé naturally without friction
- Should be invited to use the AI fit tool without it feeling gimmicky

### Automated systems (ATS, search engines)
- Structured semantic HTML — proper use of `<header>`, `<section>`, `<article>`, headings hierarchy
- Key terms appear naturally in the content, not stuffed
- JSON-LD structured data block in the `<head>` — implemented from the start
- Page title, meta description, and og: tags crafted for discoverability

---

## The AI Job Fit Tool

### Concept
Visitors paste a job description. The AI compares it against Toby's known background and delivers an honest, structured assessment of fit — strengths alignment, genuine gaps, and a bottom-line read.

### What makes it work
The tool's value is in its **honesty**. An AI that cheerleads every job description is useless and erodes trust. The system prompt is written so Claude:
- Flags genuine gaps as clearly as it flags genuine strengths
- Uses Toby's voice — candid, self-aware, not defensive
- Treats the visitor's time as valuable
- Doesn't oversell

### Architecture
- **`fit.php`** — server-side proxy; contains the full system prompt and makes the Anthropic API call via cURL. Reads `ANTHROPIC_API_KEY` from `db.php`. Never committed to version control.
- **`index.php`** — the page UI; POSTs the job description to `fit.php` as JSON and renders the structured response
- **`db.php`** — credentials file, created manually on server, never committed. For this subdomain, only `ANTHROPIC_API_KEY` is needed (no database)
- **Output format** — four-part structured result:
  1. Fit signal (Strong / Moderate / Partial / Limited) with color-coded badge
  2. Where the background aligns
  3. Honest gaps or differences
  4. Bottom-line paragraph in Toby's voice

### Implementation notes
- Paste only — PDF upload deferred to a later polish pass
- Loading state during generation with animated dots
- Error handling surfaces the actual error message on screen for diagnosis
- `Cmd/Ctrl+Enter` keyboard shortcut triggers assessment
- Minimum 80 characters required before the button enables

### Diagnosing the fit tool
If the tool shows an error on the live server, the error detail is displayed on screen. Common causes:
1. `db.php` missing or `ANTHROPIC_API_KEY` not defined → PHP 500
2. Bad or expired API key → Anthropic 401
3. No API credits → Anthropic 400 or 402
4. cURL outbound blocked by host → cURL error string

The same diagnostic pattern as `categorize.php` in the Dad-a-Base applies here.

**Known Namecheap gotcha — HTTP_ORIGIN scheme stripping:**
Namecheap's server proxy strips the scheme from the `Origin` header before PHP sees it, delivering bare hostnames like `tobyziegler.com` instead of the standard `https://tobyziegler.com`. The `$isTrusted` check in `fit.php` explicitly allows bare hostname variants for this reason. If a 403 appears and the diagnostic shows a bare hostname, this is why — do not remove the bare-hostname entries from the trusted origins list.

---

## Content — The Résumé Itself

Toby's current résumé (TobyZiegler_Resume2026.docx) is the source of record. Sections on the page:
- Professional summary
- Core competencies (four cards in a 2×2 grid)
- Experience (all roles, in reverse order)
- Portfolio projects (linked — Dad-a-Base and Toby's Study currently)
- Education — Missouri State University listed first

The résumé layout uses a sticky sidebar nav with scroll-spy active states. Sidebar stays below the fixed navbar (`top: 5.5rem`).

---

## Technical Baseline

- **Subdomain:** resume.tobyziegler.com
- **Hosting:** Namecheap shared hosting (cPanel) — same account as tobyziegler.com
- **Deployment:** Git via cPanel (same workflow as Dad-a-Base)
- **Stack:** PHP, HTML/CSS, vanilla JavaScript — no frameworks, no build step
- **AI feature:** Server-side PHP proxy (`fit.php`) calling Anthropic API via cURL
- **Source:** github.com/TobyZiegler/tobyzieglerdotcom (separate repo or subdirectory — TBD)

### Files deployed
```
resume.tobyziegler.com/
├── index.php    ← deployed via Git
├── fit.php      ← deployed via Git
├── db.php       ← created manually on server; NEVER commit
└── shared.css   ← copied manually from master copy at tobyziegler.com
```

`db.php` for this subdomain (no database needed):
```php
<?php
define('ANTHROPIC_API_KEY', 'sk-ant-...');
```

---

## Files to Include at Session Start

When starting a working session on this project, provide:
1. **This README** — resume subdomain brief
2. **resume-brief.md** — working brief with full system prompt content and career stories
3. **tobyziegler.com README** — main site context and design system
4. **tobyziegler.com index.html** — live design reference and component patterns
5. **dadabase.tobyziegler.com README** — voice and tone reference
6. **TobyZiegler_Resume2026.docx** — current résumé content (source of record)

---

## Open Decisions

- [x] Page structure — single page ✓
- [x] AI tool placement — prominent above the résumé; parchment overlay treatment (dark band removed April 2026) ✓
- [x] Upload support — paste only for now ✓
- [x] The "known information" document — written, lives in `fit.php` system prompt ✓
- [x] Honesty calibration — implemented per system-prompt-job-fit.md ✓
- [x] JSON-LD structured data — implemented ✓
- [x] Font migration — Fraunces → Lora, matching shared.css v2.4 ✓
- [x] CSS token debt — full :root block canonical; --pad-page applied throughout ✓
- [x] Professional summary — rewritten to lead with 30 years, AI engineering as evolution ✓
- [x] Portfolio — expanded to 6 shipped projects in system prompt; page content to be updated ✓
- [x] Hero meta — "3 shipped AI-directed applications" replaces misleading "1 shipped app" ✓
- [x] DirectBuy — removed (undated, thin bullets, diluted anchor role) ✓
- [x] Link placement on main site — nav bar added April 2026 ✓
- [x] System prompt updated — portfolio expanded, MS credit hours added, NISC application context added ✓
- [x] Copy result button added to fit tool output ✓
- [ ] Source control — subdirectory of tobyzieglerdotcom repo, or separate repo?
- [ ] Portfolio entries on the page itself — still shows 3; update to match system prompt's 6 projects
- [ ] Download option — offer a PDF download alongside the web version?
- [ ] Manager perspective stories — still TBD; add to `fit.php` system prompt when written
- [ ] PDF upload support — deferred to polish pass

---

## What This Site Is Not

- Not a PDF dressed up as a webpage
- Not a template with a name on it
- Not a cheerleader that tells every visitor they'd be a perfect fit
- Not trying to game ATS systems — structured for them, but honest throughout

---

*Created: March 2026 — initial brief. Updated March 2026 — initial build complete, deploying and testing. Updated April 2026 — Fraunces→Lora migration, CSS token reconciliation, content strengthening pass. Updated April 2026 — dark band removed from fit tool, system prompt expanded with full portfolio and NISC context, copy result button added, nav link to main site confirmed.*