# Toby's Resume — Project Brief & Living Document

> *This README serves as the running brief for resume.tobyziegler.com. Paste it at the start of any working session along with the index files from tobyziegler.com and dadabase.tobyziegler.com to restore full context. Update it as decisions are made.*

---

## What This Is

**Toby's Resume** is a dedicated subdomain at resume.tobyziegler.com serving as the professional résumé hub for Toby Ziegler. It is intentionally separate from the main site but shares its visual identity, voice, and typographic system.

It serves two distinct audiences simultaneously:
- **Human visitors** — hiring managers, collaborators, and curious people following a link from tobyziegler.com or a direct referral
- **Automated systems** — ATS parsers, search engines, and any tool that reads the page looking for structured professional information

It also features an **AI-powered job fit tool** — an interactive feature that allows visitors to paste or upload a job description and receive an honest, candid assessment of how well Toby's background aligns with the role.

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
- Fraunces + DM Sans typography (non-negotiable)
- The color palette and CSS variable system from tobyziegler.com
- The voice and tone — warm, confident, honest, not corporate
- The pill-button style and general component language

It has its own distinct personality appropriate to its purpose — more structured than the main site, but never cold or bureaucratic. It should feel like Toby handed you his résumé in person, not like a PDF spat out of a template.

---

## Link from tobyziegler.com

The link from the main site needs to be done deliberately — not a footnote, not buried in the footer (though the footer should also have it). Two entry points:

1. **Nav bar** — always present, unambiguous
2. **Contextual placement** — likely in or near the About section where the professional framing lives; possibly a dedicated strip between About and Process

**Link treatment:** Pill button with `↗` indicating external destination. Copy should be an invitation, not a label — something like "See the full résumé →" rather than just "Résumé."

---

## Audience & Discoverability

### Human visitors
- Should immediately understand who this is and what they do
- Should be able to read the résumé naturally without friction
- Should be invited to use the AI fit tool without it feeling gimmicky

### Automated systems (ATS, search engines)
- Structured semantic HTML — proper use of `<header>`, `<section>`, `<article>`, headings hierarchy
- Key terms should appear naturally in the content, not stuffed
- Consider a machine-readable version or structured data (JSON-LD) for search engines
- Page title, meta description, and og: tags crafted for discoverability

---

## The AI Job Fit Tool

### Concept
Visitors paste or upload a job description. The AI compares it against Toby's known background and delivers an honest, structured assessment of fit — strengths alignment, genuine gaps, and a bottom-line read.

### What makes it work
The tool's value is in its **honesty**. An AI that cheerleads every job description is useless and erodes trust. The system prompt must be written so Claude:
- Flags genuine gaps as clearly as it flags genuine strengths
- Uses Toby's voice — candid, self-aware, not defensive
- Treats the visitor's time as valuable
- Doesn't oversell

### Architecture
- **System prompt** — contains Toby's full professional background, skills, honest self-assessment of strengths and areas of growth, and explicit instructions on tone and honesty calibration
- **User input** — job description, pasted or uploaded
- **Output format** — structured, not a wall of text. Proposed structure:
  1. Fit signal (strong / moderate / limited — with honest framing)
  2. Where the background aligns
  3. Honest gaps or differences
  4. Bottom-line paragraph in Toby's voice
- **Model** — Claude via Anthropic API (same approach as other AI-powered artifacts)

### The "known information" document
The system prompt draws from a curated document about Toby that goes beyond a traditional résumé. It should include:
- Credentials and experience (the résumé content)
- What kinds of work he thrives in
- What he's less suited to (honestly)
- What he's actively growing toward
- His working style and what makes a good collaboration
- The AI-directed engineering methodology and how it fits into the broader professional picture

This document should be maintained alongside the README — if it changes, the system prompt changes.

### Implementation notes
- Start with paste; add PDF upload once core functionality works
- Client-side API call (same pattern as Dad-a-Base joke fetch or other AI artifacts)
- Loading state during generation — the response won't be instant
- Error handling — graceful fallback if API call fails
- Consider rate limiting or a simple gate to prevent abuse

---

## Content — The Résumé Itself

Toby's current résumé (TobyZiegler_Resume2026.docx) is the source of record. Key sections to carry forward:
- Professional summary foregrounding AI-directed engineering methodology
- Core competencies
- Portfolio projects (Dad-a-Base featured; others to be added as they ship)
- Work history
- Education — Missouri State University listed first

The résumé content on this page should be readable as a normal résumé but also serve as the structured data source for the AI tool's system prompt.

---

## Technical Baseline

- **Subdomain:** resume.tobyziegler.com
- **Hosting:** Namecheap shared hosting (cPanel) — same account as tobyziegler.com
- **Deployment:** Git via cPanel (same workflow)
- **Stack:** PHP, HTML/CSS, vanilla JavaScript — no frameworks, no build step
- **AI feature:** Anthropic API via client-side fetch (same pattern as tobyziegler.com AI artifacts)
- **Source:** github.com/TobyZiegler/tobyzieglerdotcom (subdirectory or separate repo — TBD)

---

## Files to Include at Session Start

When starting a working session on this project, provide:
1. **This README** — resume subdomain brief
2. **tobyziegler.com README** — main site context and design system
3. **tobyziegler.com index.html** — live design reference and component patterns
4. **dadabase.tobyziegler.com README** — voice and tone reference
5. **TobyZiegler_Resume2026.docx** — current résumé content (source of record)

---

## Open Decisions

- [ ] Page structure — single page or tabbed sections?
- [ ] AI tool placement — prominent above the résumé, or below as an addendum?
- [ ] Upload support — paste only first, or include PDF upload from the start?
- [ ] The "known information" document — needs to be written before the system prompt can be finalized
- [ ] Honesty calibration — exact framing in the system prompt (this is the most important decision)
- [ ] Source control — subdirectory of tobyzieglerdotcom repo, or separate repo?
- [ ] JSON-LD structured data — implement from the start or add later?
- [ ] Link placement on main site — nav only, or also a contextual placement in About/Process?
- [ ] Download option — offer a PDF download of the résumé alongside the web version?

---

## What This Site Is Not

- Not a PDF dressed up as a webpage
- Not a template with a name on it
- Not a cheerleader that tells every visitor they'd be a perfect fit
- Not trying to game ATS systems — structured for them, but honest throughout

---

*Created: March 2026 — initial brief capturing concept, AI tool architecture, and design direction. No build started yet.*