<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Primary Meta -->
    <title>Toby Ziegler, Résumé & AI Job Fit Tool</title>
    <meta name="description" content="Thirty years of design, systems thinking, and a fast-developing AI engineering practice. Paste a job description and get an honest fit assessment." />
    <meta name="author" content="Toby Ziegler" />

    <!-- Open Graph -->
    <meta property="og:title" content="Toby Ziegler, Résumé & AI Job Fit Tool" />
    <meta property="og:description" content="Thirty years of design, systems thinking, and a fast-developing AI engineering practice. Paste a job description and get an honest fit assessment." />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://resume.tobyziegler.com" />

    <!-- Canonical -->
    <link rel="canonical" href="https://resume.tobyziegler.com" />
    <link rel="stylesheet" href="https://tobyziegler.com/assets/shared.css">

    <!-- JSON-LD Structured Data -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Person",
      "name": "Toby Ziegler",
      "url": "https://tobyziegler.com",
      "sameAs": ["https://linkedin.com/in/tobyziegler"],
      "jobTitle": "Graphic Designer, Document Manager & AI Engineering Practitioner",
      "worksFor": {
        "@type": "Organization",
        "name": "CoxHealth"
      },
      "address": {
        "@type": "PostalAddress",
        "addressLocality": "Springfield",
        "addressRegion": "MO",
        "addressCountry": "US"
      },
      "alumniOf": [
        {"@type": "CollegeOrUniversity", "name": "Missouri State University"},
        {"@type": "CollegeOrUniversity", "name": "Ozarks Technical Community College"}
      ],
      "knowsAbout": [
        "AI Engineering", "Prompt Design", "Graphic Design", "Document Management",
        "Project Management", "PHP", "JavaScript", "SQL", "HTML", "CSS"
      ]
    }
    </script>

    <!-- Fonts loaded via @import in shared.css, no duplicate <link> tags needed here -->

    <style>
        /* ─── Page-specific tokens ─────────────────────────────
         * All base tokens (colors, type scale, radius, shadow,
         * fonts, --pad-page, --transition) are in shared.css.
         * Only tokens not present in shared.css live here.
         * ────────────────────────────────────────────────────── */
        :root {
            /* Résumé sidebar layout */
            --sidebar-w:    180px;
            --sidebar-gap:  2.5rem;
        }


        /* ─── Nav ───────────────────────────────────────────── */
        #main-nav {
            position: fixed;
            top: 0; left: 0; right: 0;
            z-index: 100;
            padding: 1.2rem var(--pad-page);
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: transparent;
            transition: background 0.4s, backdrop-filter 0.4s;
        }
        #main-nav.scrolled {
            background: rgba(245, 240, 232, 0.92);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--rule);
        }
        .nav-logo {
            font-family: var(--font-display);
            font-style: italic;
            font-size: var(--text-base);
            font-weight: 400;
            color: var(--text);
            text-decoration: none;
            letter-spacing: -0.01em;
            opacity: 0;
            animation: fadeUp 0.7s ease 0.2s forwards;
        }
        .nav-links {
            display: flex;
            gap: 2rem;
            list-style: none;
            align-items: center;
            opacity: 0;
            animation: fadeUp 0.7s ease 0.4s forwards;
        }
        .nav-links a {
            font-family: var(--font-body);
            font-size: var(--text-sm);
            font-weight: 500;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: var(--text-muted);
            text-decoration: none;
            transition: color var(--transition);
        }
        .nav-links a:hover { color: var(--green); }

        /* ─── Eyebrow context margin ─────────────────────────── */
        /* .eyebrow, .eyebrow-line, .eyebrow-text defined in shared.css */
        #hero .eyebrow { margin-bottom: 1.2rem; }

        /* ─── Section inner ─────────────────────────────────── */
        .section-inner {
            max-width: 960px;
            margin: 0 auto;
        }
        .section-heading {
            font-family: var(--font-display);
            font-size: clamp(2rem, 4vw, 3.2rem);
            font-weight: 300;
            letter-spacing: -0.02em;
            line-height: 1.15;
            color: var(--text);
            margin-bottom: 1rem;
        }
        .section-heading em { font-style: italic; color: var(--green); }


        /* ─── Hero ──────────────────────────────────────────── */
        #hero {
            position: relative;
            min-height: 56vh;
            display: flex;
            align-items: center;
            padding: 8rem var(--pad-page) 5rem;
            overflow: hidden;
        }
        .hero-watermark {
            position: absolute;
            top: -0.1em;
            right: 0.05em;
            font-family: var(--font-display);
            font-style: italic;
            font-weight: 800;
            font-size: clamp(18rem, 38vw, 55rem);
            line-height: 1;
            color: transparent;
            -webkit-text-stroke: 2px rgba(44, 31, 20, 0.08);
            user-select: none;
            pointer-events: none;
        }
        .hero-content {
            position: relative;
            z-index: 1;
            max-width: 960px;
            width: 100%;
            margin: 0 auto;
        }
        .hero-headline {
            font-family: var(--font-display);
            font-size: clamp(2.8rem, 6vw, 5.5rem);
            font-weight: 300;
            letter-spacing: -0.03em;
            line-height: 1.1;
            color: var(--text);
            margin-bottom: 1.6rem;
            opacity: 0;
            animation: fadeUp 0.9s cubic-bezier(0.16,1,0.3,1) 0.5s forwards;
        }
        .hero-headline em { font-style: italic; color: var(--green); }
        .hero-headline .burg { font-style: italic; color: var(--burg); }
        .hero-sub {
            max-width: 560px;
            font-size: var(--text-body);
            line-height: 1.7;
            color: var(--text-muted);
            margin-bottom: 2.4rem;
            opacity: 0;
            animation: fadeUp 0.7s ease 0.9s forwards;
        }
        .hero-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 1.8rem;
            margin-bottom: 2.4rem;
            opacity: 0;
            animation: fadeUp 0.7s ease 1.1s forwards;
        }
        .hero-meta-item {
            font-size: var(--text-sm);
            font-weight: 500;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            color: var(--text-muted);
            display: flex;
            align-items: center;
            gap: 0.4rem;
        }
        .hero-meta-item span { color: var(--green); font-style: italic; font-family: var(--font-display); font-size: var(--text-base); letter-spacing: 0; text-transform: none; font-weight: 400; }
        .hero-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
            flex-wrap: wrap;
            opacity: 0;
            animation: fadeUp 0.7s ease 1.3s forwards;
        }
        .hero-rule {
            position: absolute;
            bottom: 0; left: var(--pad-page); right: var(--pad-page);
            height: 1px;
            background: var(--rule);
            transform: scaleX(0);
            transform-origin: left;
            animation: scaleIn 1s ease 0.6s forwards;
        }


        /* ─── AI Fit Tool ───────────────────────────────────── */
        #fit-tool {
            background: rgba(44, 31, 20, 0.1);   /* parchment overlay — matches #process on main site */
            padding: 5rem var(--pad-page);
            position: relative;
            overflow: hidden;
        }
        .fit-tool-inner {
            max-width: 960px;
            margin: 0 auto;
        }
        /* Reuse canonical .eyebrow from shared.css; page-specific margin only */
        #fit-tool .eyebrow { margin-bottom: 1.2rem; }

        .fit-heading {
            font-family: var(--font-display);
            font-size: clamp(1.8rem, 3.5vw, 2.8rem);
            font-weight: 300;
            letter-spacing: -0.02em;
            line-height: 1.2;
            color: var(--text);
            margin-bottom: 0.8rem;
        }
        .fit-heading em { font-style: italic; color: var(--green); }
        .fit-sub {
            font-size: var(--text-base);
            line-height: 1.65;
            color: var(--text-muted);
            max-width: 600px;
            margin-bottom: 2.4rem;
        }

        /* Input area */
        .fit-input-area {
            background: var(--white-soft);
            border: 1.5px solid var(--rule);
            border-radius: var(--radius);
            overflow: hidden;
            transition: border-color var(--transition);
            box-shadow: var(--shadow-card);
        }
        .fit-input-area:focus-within {
            border-color: var(--green);
        }
        #job-description {
            display: block;
            width: 100%;
            min-height: 220px;
            background: transparent;
            border: none;
            outline: none;
            padding: 1.6rem 1.8rem;
            font-family: var(--font-body);
            font-size: var(--text-base);
            line-height: 1.65;
            color: var(--text);
            resize: vertical;
        }
        #job-description::placeholder { color: rgba(44, 31, 20, 0.3); }
        .fit-input-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.8rem 1.8rem;
            border-top: 1px solid var(--rule);
            gap: 1rem;
        }
        .fit-char-count {
            font-size: var(--text-sm);
            color: var(--text-muted);
            opacity: 0.6;
        }
        .btn-assess {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.6rem 1.8rem;
            background: var(--green);
            color: var(--white-soft);
            font-family: var(--font-body);
            font-size: var(--text-sm);
            font-weight: 700;
            letter-spacing: 0.04em;
            border: 2px solid var(--green);
            border-radius: var(--radius-pill);
            cursor: pointer;
            transition: background var(--transition), color var(--transition), transform 0.18s;
        }
        .btn-assess:hover:not(:disabled) {
            background: transparent;
            color: var(--green);
            transform: translateY(-2px);
        }
        .btn-assess:disabled {
            opacity: 0.35;
            cursor: not-allowed;
        }

        /* ─── Fit Result, card layout ──────────────────────── */
        #fit-result {
            display: none;
            margin-top: 2.5rem;
            animation: fadeUp 0.6s ease forwards;
        }
        #fit-result.visible { display: block; }

        /* Top row: large signal card + summary side by side */
        .fit-result-top {
            display: grid;
            grid-template-columns: auto 1fr;
            gap: 1.2rem;
            margin-bottom: 1.2rem;
            align-items: stretch;
        }
        @media (max-width: 640px) {
            .fit-result-top { grid-template-columns: 1fr; }
        }

        /* Signal card, big verdict */
        .fit-card-signal {
            background: var(--white-soft);
            border: 1.5px solid var(--rule);
            border-radius: var(--radius);
            padding: 2rem 2.4rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            min-width: 200px;
            box-shadow: var(--shadow-card);
        }
        .fit-signal-level {
            font-family: var(--font-display);
            font-size: clamp(1.6rem, 3vw, 2.2rem);
            font-weight: 400;
            font-style: italic;
            letter-spacing: -0.02em;
            line-height: 1.1;
            margin-bottom: 0.6rem;
        }
        .fit-signal-level.strong   { color: #3A7A2A; }
        .fit-signal-level.moderate { color: #8A6A10; }
        .fit-signal-level.partial  { color: var(--burg); }
        .fit-signal-level.limited  { color: var(--text-muted); }

        .fit-signal-pip {
            width: 10px; height: 10px;
            border-radius: 50%;
            display: inline-block;
            margin-bottom: 0.8rem;
        }
        .strong  .fit-signal-pip { background: #3A7A2A; box-shadow: 0 0 8px rgba(58,122,42,0.5); }
        .moderate .fit-signal-pip { background: #8A6A10; box-shadow: 0 0 8px rgba(138,106,16,0.4); }
        .partial .fit-signal-pip { background: var(--burg); box-shadow: 0 0 8px rgba(123,45,58,0.4); }
        .limited .fit-signal-pip { background: var(--text-muted); }

        .fit-signal-label {
            font-size: var(--text-xs);
            font-weight: 600;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            color: var(--text-muted);
            opacity: 0.6;
            margin-bottom: 0.3rem;
        }

        /* Summary card, sits beside signal */
        .fit-card-summary {
            background: var(--white-soft);
            border: 1.5px solid var(--rule);
            border-radius: var(--radius);
            padding: 1.8rem 2rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            box-shadow: var(--shadow-card);
        }
        .fit-card-summary p {
            font-family: var(--font-display);
            font-style: italic;
            font-size: var(--text-body);
            line-height: 1.6;
            color: var(--text);
        }

        /* Bottom row: three cards side by side */
        .fit-result-cards {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 1.2rem;
        }
        @media (max-width: 820px) {
            .fit-result-cards { grid-template-columns: 1fr; }
        }

        .fit-card {
            background: var(--white-soft);
            border: 1.5px solid var(--rule);
            border-radius: var(--radius);
            padding: 1.6rem 1.8rem;
            position: relative;
            overflow: hidden;
            box-shadow: var(--shadow-card);
        }
        /* Subtle top accent line per card type */
        .fit-card-alignment { border-top: 2px solid rgba(58, 92, 59, 0.5); }
        .fit-card-gaps      { border-top: 2px solid rgba(123, 45, 58, 0.4); }
        .fit-card-bottom    { border-top: 2px solid rgba(107, 87, 68, 0.4); background: var(--bg-alt); }

        .fit-card-label {
            font-size: var(--text-xs);
            font-weight: 700;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            margin-bottom: 1rem;
        }
        .fit-card-alignment .fit-card-label { color: var(--green); }
        .fit-card-gaps      .fit-card-label { color: var(--burg); }
        .fit-card-bottom    .fit-card-label { color: var(--text-muted); }

        .fit-card-content {
            font-size: var(--text-sm);
            line-height: 1.7;
            color: var(--text-muted);
        }
        .fit-card-content p { margin-bottom: 0.6rem; }
        .fit-card-content p:last-child { margin-bottom: 0; }
        .fit-card-content ul { padding-left: 1.2rem; margin-bottom: 0.6rem; }
        .fit-card-content li { margin-bottom: 0.35rem; }

        /* Bottom line card gets display/italic treatment */
        .fit-card-bottom .fit-card-content {
            font-family: var(--font-display);
            font-style: italic;
            font-size: var(--text-base);
            color: var(--text);
            line-height: 1.65;
        }

        /* Result header, clear button */
        .fit-result-clear {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 1rem;
        }
        .fit-result-clear button {
            background: none;
            border: none;
            color: var(--text-muted);
            cursor: pointer;
            font-size: var(--text-sm);
            padding: 0.3rem 0;
            opacity: 0.5;
            transition: opacity var(--transition);
        }
        .fit-result-clear button:hover { opacity: 1; }

        /* Loading state */
        #fit-loading {
            display: none;
            padding: 3rem;
            text-align: center;
        }
        #fit-loading.visible { display: block; }
        .loading-dots {
            display: inline-flex;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }
        .loading-dots span {
            width: 9px; height: 9px;
            background: var(--green);
            border-radius: 50%;
            animation: pulse 1.4s ease-in-out infinite;
        }
        .loading-dots span:nth-child(2) { animation-delay: 0.2s; }
        .loading-dots span:nth-child(3) { animation-delay: 0.4s; }
        .loading-text {
            font-size: var(--text-base);
            color: var(--text-muted);
            font-style: italic;
        }

        /* Error state */
        #fit-error {
            display: none;
            padding: 1.6rem 1.8rem;
            color: var(--burg);
            font-size: var(--text-base);
            line-height: 1.6;
        }
        #fit-error.visible { display: block; }
        #fit-error-detail {
            margin-top: 0.4rem;
            font-size: var(--text-sm);
            color: rgba(123, 45, 58, 0.7);
            font-family: monospace;
        }
        .fit-result-cards {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 1.2rem;
        }
        @media (max-width: 820px) {
            .fit-result-cards { grid-template-columns: 1fr; }
        }
            font-size: var(--text-xs);
            font-weight: 700;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            margin-bottom: 1rem;
        }


        /* ─── Resume Content ────────────────────────────────── */
        #resume {
            padding: 5rem var(--pad-page);
        }

        /* Summary strip */
        .resume-summary {
            background: var(--bg-alt);
            border-radius: var(--radius);
            padding: 2.4rem 2.8rem;
            margin-bottom: 4rem;
            border: 1px solid var(--rule);
            box-shadow: var(--shadow-card);
        }
        .resume-summary p {
            font-size: var(--text-base);
            line-height: 1.75;
            color: var(--text);
            max-width: 760px;
        }
        .resume-summary p + p { margin-top: 0.8rem; }

        /* Layout: sidebar floats left, main content flush left */
        /* Replaced absolute positioning with CSS grid; the absolute
         * approach depended on viewport margin space that doesn't
         * reliably exist inside a centered max-width container. */
        .resume-layout-outer {
            display: grid;
            grid-template-columns: var(--sidebar-w) 1fr;
            gap: 0 var(--sidebar-gap);
            align-items: start;
        }
        .resume-sidebar-sticky {
            position: sticky;
            top: 5.5rem;
        }
        /* Collapse sidebar column at narrow viewports */
        @media (max-width: 1080px) {
            .resume-layout-outer { grid-template-columns: 1fr; }
            .resume-sidebar { display: none; }
        }

        .resume-sidebar-nav {
            list-style: none;
        }
        .resume-sidebar-nav li {
            margin-bottom: 0.4rem;
        }
        .resume-sidebar-nav a {
            display: block;
            font-size: var(--text-sm);
            font-weight: 500;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            color: var(--text-muted);
            text-decoration: none;
            padding: 0.35rem 0;
            border-left: 2px solid transparent;
            padding-left: 0.8rem;
            transition: color var(--transition), border-color var(--transition);
        }
        .resume-sidebar-nav a:hover,
        .resume-sidebar-nav a.active {
            color: var(--green);
            border-left-color: var(--green);
        }

        /* Resume sections, full width of section-inner */
        .resume-section {
            margin-bottom: 3.5rem;
            scroll-margin-top: 5.5rem;
        }
        .resume-section:last-child { margin-bottom: 0; }

        .resume-section-heading {
            font-family: var(--font-display);
            font-size: var(--text-lg);
            font-weight: 300;
            font-style: italic;
            color: var(--text);
            margin-bottom: 1.8rem;
            padding-bottom: 0.8rem;
            border-bottom: 1px solid var(--rule);
        }

        /* Competencies */
        .competency-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }
        @media (max-width: 600px) { .competency-grid { grid-template-columns: 1fr; } }
        .competency-item {
            background: var(--bg-alt);
            border: 1px solid var(--rule);
            border-radius: var(--radius-sm);
            padding: 1.2rem 1.4rem;
            box-shadow: var(--shadow-card);
        }
        .competency-title {
            font-family: var(--font-display);
            font-style: italic;
            font-size: var(--text-base);
            font-weight: 500;
            color: var(--green);
            margin-bottom: 0.4rem;
        }
        .competency-desc {
            font-size: var(--text-sm);
            line-height: 1.6;
            color: var(--text-muted);
        }

        /* Experience entries */
        .experience-entry {
            margin-bottom: 2.5rem;
            padding-bottom: 2.5rem;
            border-bottom: 1px solid var(--rule);
        }
        .experience-entry:last-child { border-bottom: none; margin-bottom: 0; padding-bottom: 0; }
        .experience-header {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            flex-wrap: wrap;
            gap: 0.3rem;
            margin-bottom: 0.4rem;
        }
        .experience-title {
            font-family: var(--font-display);
            font-style: italic;
            font-size: var(--text-body);
            font-weight: 500;
            color: var(--text);
        }
        .experience-date {
            font-size: var(--text-sm);
            font-weight: 500;
            letter-spacing: 0.05em;
            color: var(--text-muted);
            white-space: nowrap;
        }
        .experience-company {
            font-size: var(--text-sm);
            font-weight: 700;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            color: var(--green);
            margin-bottom: 0.9rem;
        }
        .experience-bullets {
            padding-left: 1.2rem;
        }
        .experience-bullets li {
            font-size: var(--text-base);
            line-height: 1.65;
            color: var(--text);
            margin-bottom: 0.45rem;
        }
        .experience-bullets li:last-child { margin-bottom: 0; }

        /* Portfolio */
        .portfolio-entry {
            background: var(--bg-alt);
            border: 1px solid var(--rule);
            border-radius: var(--radius-sm);
            padding: 1.6rem 1.8rem;
            margin-bottom: 1.2rem;
            box-shadow: var(--shadow-card);
        }
        .portfolio-entry:last-child { margin-bottom: 0; }
        .portfolio-header {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            flex-wrap: wrap;
            gap: 0.4rem;
            margin-bottom: 0.3rem;
        }
        .portfolio-title {
            font-family: var(--font-display);
            font-style: italic;
            font-size: var(--text-body);
            font-weight: 500;
            color: var(--text);
        }
        .portfolio-link {
            color: inherit;
            text-decoration: none;
            transition: color var(--transition);
        }
        .portfolio-link:hover { color: var(--green); }
        .portfolio-year {
            font-size: var(--text-sm);
            letter-spacing: 0.06em;
            color: var(--text-muted);
        }
        .portfolio-subtitle {
            font-size: var(--text-sm);
            font-weight: 600;
            letter-spacing: 0.04em;
            color: var(--burg);
            margin-bottom: 0.9rem;
        }
        .portfolio-bullets {
            padding-left: 1.2rem;
        }
        .portfolio-bullets li {
            font-size: var(--text-base);
            line-height: 1.65;
            color: var(--text-muted);
            margin-bottom: 0.35rem;
        }

        /* Education */
        .education-school {
            margin-bottom: 2.2rem;
            padding-bottom: 2.2rem;
            border-bottom: 1px solid var(--rule);
        }
        .education-school:last-child { border-bottom: none; margin-bottom: 0; padding-bottom: 0; }
        .education-school-name {
            font-family: var(--font-display);
            font-style: italic;
            font-size: var(--text-body);
            font-weight: 500;
            color: var(--text);
            margin-bottom: 0.2rem;
        }
        .education-location {
            font-size: var(--text-sm);
            color: var(--text-muted);
            margin-bottom: 0.8rem;
        }
        .education-degree {
            font-size: var(--text-base);
            line-height: 1.55;
            color: var(--text);
            margin-bottom: 0.3rem;
            padding-left: 0.6rem;
            border-left: 2px solid var(--rule);
        }
        .education-degree strong {
            font-weight: 700;
            color: var(--green);
            font-size: 0.8rem;   /* page-specific, abbreviation badge, smaller than --text-xs intentionally */
            letter-spacing: 0.06em;
            text-transform: uppercase;
        }
        .education-degree em { font-style: italic; color: var(--text-muted); font-size: var(--text-sm); }
        .education-minor {
            font-size: var(--text-sm);
            color: var(--text-muted);
            padding-left: 1rem;
            margin-top: 0.2rem;
        }
        .education-capstone {
            margin-top: 1rem;
            font-size: var(--text-base);
            color: var(--text-muted);
            font-style: italic;
            padding-left: 0.6rem;
            border-left: 2px solid rgba(58, 92, 59, 0.3);   /* --green at 30% */
        }


        /* ─── Responsive ────────────────────────────────────── */
        @media (max-width: 768px) {
            .resume-summary { padding: 1.6rem 1.8rem; }
            .fit-input-footer { flex-direction: column; align-items: flex-end; }
            .nav-links { gap: 1.2rem; }
            .nav-links li:not(:last-child) { display: none; }
        }

        /* ─── Scroll reveal ─────────────────────────────────── */
        .reveal {
            opacity: 0;
            transform: translateY(1.5rem);
            transition: opacity 0.7s ease, transform 0.7s ease;
        }
        .reveal.in-view {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>

<body>

<!-- ─── Nav ──────────────────────────────────────────────── -->
<nav id="main-nav">
    <a class="nav-logo" href="https://tobyziegler.com">Toby Ziegler</a>
    <ul class="nav-links">
        <li><a href="#fit-tool">Fit Tool</a></li>
        <li><a href="#resume">Résumé</a></li>
        <li><a href="https://tobyziegler.com" target="_blank" rel="noopener">← Back to Study ↗</a></li>
    </ul>
</nav>

<!-- ─── Hero ─────────────────────────────────────────────── -->
<section id="hero">
    <div class="hero-watermark" aria-hidden="true">R</div>
    <div class="hero-content">
        <div class="eyebrow" style="opacity:0;animation:fadeUp 0.7s ease 0.3s forwards;">
            <div class="eyebrow-line"></div>
            <span class="eyebrow-text">resume.tobyziegler.com</span>
        </div>
        <h1 class="hero-headline">
            Thirty years<br>
            of making things<br>
            <em>work.</em>
        </h1>
        <p class="hero-sub">
            AI engineering practitioner with thirty years of organizational systems experience. 
            The fit tool below is built the same way I'd work for you.
        </p>
        <div class="hero-meta">
            <div class="hero-meta-item"><span>30+</span> years design &amp; systems leadership</div>
            <div class="hero-meta-item"><span>↗</span> Shipping finished projects built with AI Engineering</div>
            <div class="hero-meta-item"><span>∞</span> problems that needed a system</div>
        </div>
        <div class="hero-actions">
            <a href="#fit-tool" class="btn btn-primary">Try the AI fit tool ↓</a>
            <a href="#resume" class="btn btn-secondary">Jump to résumé</a>
        </div>
    </div>
    <div class="hero-rule"></div>
</section>

<!-- ─── AI Job Fit Tool ───────────────────────────────────── -->
<section id="fit-tool">
    <div class="fit-tool-inner">
        <div class="eyebrow">
            <span class="eyebrow-line"></span>
            <span class="eyebrow-text">AI-Powered Assessment</span>
        </div>
        <h2 class="fit-heading">
            Paste a job description.<br>
            Get an <em>honest</em> read.
        </h2>
        <p class="fit-sub">
            This tool uses everything known about Toby's background, the résumé and the stories behind it, 
            to give you a candid fit assessment. A lukewarm fit called lukewarm is more useful than a lukewarm fit called strong.
        </p>

        <div class="fit-input-area">
            <textarea
                id="job-description"
                placeholder="Paste the job description here; title, responsibilities, requirements, whatever you have. The more context, the better the assessment."
                rows="8"
                aria-label="Job description"
            ></textarea>
            <div class="fit-input-footer">
                <span class="fit-char-count" id="char-count">0 characters</span>
                <button class="btn-assess" id="btn-assess" onclick="runAssessment()" disabled>
                    Assess the fit →
                </button>
            </div>
        </div>

        <!-- Loading -->
        <div id="fit-loading">
            <div class="loading-dots">
                <span></span><span></span><span></span>
            </div>
            <p class="loading-text">Reading the job description and thinking it through…</p>
        </div>

        <!-- Error -->
        <div id="fit-error">
            <p>Something went wrong with the assessment. Please try again in a moment.</p>
            <p id="fit-error-detail"></p>
        </div>

        <!-- Result -->
        <div id="fit-result" role="region" aria-label="Fit assessment result">
            <div class="fit-result-clear">
                <button onclick="copyResult()" id="btn-copy-result">Copy result</button>
                <button onclick="clearResult()">✕ Clear</button>
            </div>
            <!-- Top row: signal + summary -->
            <div class="fit-result-top">
                <div class="fit-card-signal" id="fit-signal-card">
                    <div class="fit-signal-label">Fit Assessment</div>
                    <div id="fit-signal-badge" class="fit-signal-level"></div>
                    <div id="fit-signal-pip-el" class="fit-signal-pip"></div>
                </div>
                <div class="fit-card-summary">
                    <p id="fit-signal-summary-text"></p>
                </div>
            </div>
            <!-- Bottom row: three cards -->
            <div class="fit-result-cards">
                <div class="fit-card fit-card-alignment">
                    <div class="fit-card-label">Where it aligns</div>
                    <div class="fit-card-content" id="result-alignment-text"></div>
                </div>
                <div class="fit-card fit-card-gaps">
                    <div class="fit-card-label">Honest gaps</div>
                    <div class="fit-card-content" id="result-gaps-text"></div>
                </div>
                <div class="fit-card fit-card-bottom">
                    <div class="fit-card-label">Bottom line</div>
                    <div class="fit-card-content" id="result-bottom-text"></div>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- ─── Résumé ────────────────────────────────────────────── -->
<section id="resume">
    <div class="section-inner">

        <!-- Summary -->
        <div class="resume-summary reveal">
            <p>
                I build AI-powered tools and workflows by directing language models through structured prompting, iterative 
                debugging, and a designer's instinct for what production-ready actually means. The evidence is on this page: 
                a live fit-assessment tool calling the Anthropic API, built the same way I build everything.
            </p>
            <p>
                That methodology runs on thirty years of professional foundation: designing systems, governing documents, 
                and leading workflow transformations at a major health system. I've chaired ISO 9001 governance, maintained 
                a 10,000-file enterprise library, and shipped internal software tools for two decades. I know how organizations 
                work, what breaks them, and how to see a problem clearly before touching a tool.
            </p>
        </div>

        <div class="resume-layout-outer">

            <!-- Sidebar, absolutely positioned to the left of content -->
            <aside class="resume-sidebar" aria-label="Section navigation">
                <div class="resume-sidebar-sticky">
                    <nav>
                        <ul class="resume-sidebar-nav" id="sidebar-nav">
                            <li><a href="#sec-competencies">Competencies</a></li>
                            <li><a href="#sec-experience">Experience</a></li>
                            <li><a href="#sec-portfolio">Portfolio</a></li>
                            <li><a href="#sec-education">Education</a></li>
                        </ul>
                    </nav>
                </div>
            </aside>

            <!-- Main Resume Content, full width of section-inner -->
            <main>

                <!-- Core Competencies -->
                <section class="resume-section reveal" id="sec-competencies" aria-labelledby="heading-competencies">
                    <h2 class="resume-section-heading" id="heading-competencies">Core Competencies</h2>
                    <div class="competency-grid">
                        <div class="competency-item">
                            <div class="competency-title">AI Engineering &amp; Prompt Design</div>
                            <div class="competency-desc">Directing AI models to produce complete, production-grade applications; structured prompting, iterative debugging, quality review. Three shipped projects; methodology in active development.</div>
                        </div>
                        <div class="competency-item">
                            <div class="competency-title">Graphic Design &amp; Visual Communication</div>
                            <div class="competency-desc">30+ years across print, digital, UI/UX, and document design, with a consistent instinct for hierarchy, clarity, and work that earns trust from its audience.</div>
                        </div>
                        <div class="competency-item">
                            <div class="competency-title">Systems Thinking &amp; Workflow Automation</div>
                            <div class="competency-desc">Built and led complete workflow transformations; film to digital, imagesetter to direct imaging, fully automated PDF pre-processing. ISO 9001 document governance at health-system scale.</div>
                        </div>
                        <div class="competency-item">
                            <div class="competency-title">Project &amp; Documentation Management</div>
                            <div class="competency-desc">End-to-end ownership of complex projects across large organizations; 10,000+ active files under version control; committee chair; comfortable reading and directing code across PHP, JS, SQL, Python, and more.</div>
                        </div>
                    </div>
                </section>

                <!-- Experience -->
                <section class="resume-section reveal" id="sec-experience" aria-labelledby="heading-experience">
                    <h2 class="resume-section-heading" id="heading-experience">Experience</h2>

                    <article class="experience-entry">
                        <div class="experience-header">
                            <div class="experience-title">Graphic Designer &amp; Document Manager</div>
                            <div class="experience-date">February 2001 to Present</div>
                        </div>
                        <div class="experience-company">CoxHealth • Springfield, Missouri</div>
                        <ul class="experience-bullets">
                            <li>Sole responsible party for all forms in a mission-critical patient records platform (Addressograph/Patientworks) serving a regional health system, built and maintained end-to-end</li>
                            <li>Maintained and governed a library of 10,000+ active files across 800+ departments, with rigorous version control and full lifecycle tracking</li>
                            <li>Chair, Document Control Oversight Committee; a multi-disciplinary approach to set standards and policy for documentation practice across the entire health system; part of ISO 9001 compliance program, directly answerable to the top executive committee</li>
                            <li>Led the organization's transition from fully analog production to all-digital design and document workflows across multiple technology generations</li>
                            <li>20+ years building internal software tools to support document management, design production, and departmental operations</li>
                            <li>Coordinated design and documentation projects across all 800+ departments, managing vendor and contractor relationships throughout</li>
                        </ul>
                    </article>

                    <article class="experience-entry">
                        <div class="experience-header">
                            <div class="experience-title">Graphic Artist</div>
                        </div>
                        <div class="experience-company">Sweetheart Cup Company</div>
                        <ul class="experience-bullets">
                            <li>Built and owned the company-wide template library across Freehand, Illustrator, and Photoshop, covering all 100+ product sizes, reducing multi-step setup to a single step. Nobody asked for this. It became the foundation every project was built on.</li>
                            <li>Produced thousands of individual product designs annually for cups, tubs, and containers; owned the full project lifecycle from customer brief through final production handoff</li>
                        </ul>
                    </article>

                    <article class="experience-entry">
                        <div class="experience-header">
                            <div class="experience-title">Design Manager</div>
                        </div>
                        <div class="experience-company">Christian County Headliner News</div>
                        <ul class="experience-bullets">
                            <li>Managed all digital production for the entire newspaper</li>
                            <li>Collaborated with the news team on layout, article placement, and special feature infographics</li>
                            <li>Created or supervised all advertising artwork</li>
                        </ul>
                    </article>

                    <article class="experience-entry">
                        <div class="experience-header">
                            <div class="experience-title">Production Supervisor</div>
                        </div>
                        <div class="experience-company">Branson Daily News</div>
                        <ul class="experience-bullets">
                            <li>Supervised the digital production crew, artists, and advertising production staff</li>
                            <li>Responsible for all daily pre-press processes and on-time plate delivery</li>
                        </ul>
                    </article>

                    <article class="experience-entry">
                        <div class="experience-header">
                            <div class="experience-title">Designer</div>
                        </div>
                        <div class="experience-company">Springfield News-Leader</div>
                        <ul class="experience-bullets">
                            <li>Produced speculative and paid advertising artwork and layouts</li>
                            <li>Managed all aspects of preproduction through press-ready plate output</li>
                        </ul>
                    </article>

                </section>

                <!-- Portfolio -->
                <section class="resume-section reveal" id="sec-portfolio" aria-labelledby="heading-portfolio">
                    <h2 class="resume-section-heading" id="heading-portfolio">Portfolio Projects</h2>

                    <article class="portfolio-entry">
                        <div class="portfolio-header">
                            <div class="portfolio-title">
                                <a href="https://resume.tobyziegler.com" target="_blank" rel="noopener" class="portfolio-link">AI Job Fit Tool ↗</a>
                            </div>
                            <div class="portfolio-year">2026</div>
                        </div>
                        <div class="portfolio-subtitle">resume.tobyziegler.com; this page</div>
                        <ul class="portfolio-bullets">
                            <li>Live AI tool: paste any job description and receive a structured fit assessment (alignment, gaps, and a plain-language verdict) powered by a custom system prompt and the Anthropic API</li>
                            <li>Engineered for real-world deployment: API key protected via server-side PHP proxy, structured JSON schema for consistent output, dynamic rendering with fit-level badges and color signaling</li>
                            <li>The entire architecture, system prompt, response schema, fallback handling, and UI, was designed through structured prompting; this is the methodology, demonstrated</li>
                        </ul>
                    </article>

                    <article class="portfolio-entry">
                        <div class="portfolio-header">
                            <div class="portfolio-title">
                                <a href="https://dadabase.tobyziegler.com" target="_blank" rel="noopener" class="portfolio-link">Dad-a-Base ↗</a>
                            </div>
                            <div class="portfolio-year">2025</div>
                        </div>
                        <div class="portfolio-subtitle">dadabase.tobyziegler.com</div>
                        <ul class="portfolio-bullets">
                            <li>Full-stack production application: PHP 8.1 / MySQL / vanilla JS with bcrypt authentication, moderation queue, bulk CSV/JSON import-export, and AI-powered multi-category classification via the Anthropic API</li>
                            <li>Deployed to live shared hosting via Git; zero frameworks, everything built and reasoned through from scratch using AI-directed engineering</li>
                            <li>Demonstrates the methodology end-to-end: problem definition, architecture, iterative build, production deployment. No team, no bootcamp, no prior codebase to start from</li>
                        </ul>
                    </article>

                    <article class="portfolio-entry">
                        <div class="portfolio-header">
                            <div class="portfolio-title">
                                <a href="https://projects.tobyziegler.com/userhome/" target="_blank" rel="noopener" class="portfolio-link">UserHome ↗</a>
                            </div>
                            <div class="portfolio-year">2025</div>
                        </div>
                        <div class="portfolio-subtitle">projects.tobyziegler.com/userhome/</div>
                        <ul class="portfolio-bullets">
                            <li>Nine-version iterative design study of an enterprise print management landing page, showcased as an interactive slideshow; each version documents a distinct design direction, UI pattern, or layout strategy</li>
                            <li>Built for a real client context (genericized for portfolio), then reverse-engineered into a public showcase: iframe embedding, Cloudflare artifact resolution, SVG preview generation from live icon path data</li>
                            <li>Demonstrates the design half of the methodology: visual judgment, iterative refinement, and the discipline to know when a direction is finished</li>
                        </ul>
                    </article>

                    <article class="portfolio-entry">
                        <div class="portfolio-header">
                            <div class="portfolio-title">
                                <a href="https://projects.tobyziegler.com/worknet/" target="_blank" rel="noopener" class="portfolio-link">WorkNet ↗</a>
                            </div>
                            <div class="portfolio-year">2026</div>
                        </div>
                        <div class="portfolio-subtitle">projects.tobyziegler.com/worknet/ &nbsp;·&nbsp; macOS split-tunnel VPN utility</div>
                        <ul class="portfolio-bullets">
                            <li>Solved a real operational problem: a hardware VPN was routing all internet traffic through the employer's metered connection, even when a perfectly capable home connection was available. WorkNet fixes this with one double-click, sending only intranet-bound traffic through the VPN and everything else straight to the internet</li>
                            <li>Investigated and documented three failed approaches before the working solution; the README's "What didn't work" section is the engineering record, not an apology</li>
                            <li>Shell + osascript wrapped in a native app bundle; kernel-level split-tunnel routing, standard macOS auth dialog, Notification Center feedback, zero external dependencies</li>
                        </ul>
                    </article>

                    <article class="portfolio-entry">
                        <div class="portfolio-header">
                            <div class="portfolio-title">
                                <a href="https://projects.tobyziegler.com/checks/" target="_blank" rel="noopener" class="portfolio-link">Children of the Checks ↗</a>
                            </div>
                            <div class="portfolio-year">2010–2020</div>
                        </div>
                        <div class="portfolio-subtitle">CoxHealth / Children's Miracle Network Telethon, Design &amp; Program</div>
                        <ul class="portfolio-bullets">
                            <li>Redesigned the CMN telethon check from scratch; replaced two yellow sheets taped together with a full-color photographic check featuring CMN children, their stories, and a realistic check layout sized for the on-air presentation format</li>
                            <li>Cost per check: under $7 (vs. $50+ from outside vendor with labor donation discount) approximately 85% cost reduction; negotiated access to engineering equipment in lieu of a dedicated budget</li>
                            <li>Program ran for a decade; checks were saved and mounted by organizations as proud displays of their contributions. Other CMN chapters across the country attempted to replicate the model.</li>
                            <li>An iterative design program where each year added new children, their stories, and evolving visual refinements; documented at projects.tobyziegler.com/checks/</li>
                        </ul>
                    </article>

                    <article class="portfolio-entry">
                        <div class="portfolio-header">
                            <div class="portfolio-title">
                                <a href="https://tobyziegler.com" target="_blank" rel="noopener" class="portfolio-link">Toby's Study ↗</a>
                            </div>
                            <div class="portfolio-year">2025</div>
                        </div>
                        <div class="portfolio-subtitle">tobyziegler.com</div>
                        <ul class="portfolio-bullets">
                            <li>Personal portfolio site featuring a study/library metaphor with subdomains as "rooms"; a shared CSS design system across all properties</li>
                            <li>Built in PHP/HTML/CSS/vanilla JavaScript with no frameworks; fluid typography, noise-texture layering, custom CSS bookcase component, warm editorial aesthetic throughout</li>
                        </ul>
                    </article>

                </section>

                <!-- Education -->
                <section class="resume-section reveal" id="sec-education" aria-labelledby="heading-education">
                    <h2 class="resume-section-heading" id="heading-education">Education</h2>

                    <div class="education-school">
                        <div class="education-school-name">Missouri State University</div>
                        <div class="education-location">Springfield, Missouri</div>
                        <div class="education-degree">
                            <strong>MS.PM</strong>  -  Master of Science in Project Management
                            <em>&nbsp;· 21 of 30 hours</em>
                        </div>
                        <div class="education-degree">
                            <strong>BAS.TM</strong>  -  Bachelor of Applied Science in Technology Management
                        </div>
                        <div class="education-minor">Minor in Computer Science</div>
                        <div class="education-minor">Minor in Web Application Development</div>
                    </div>

                    <div class="education-school">
                        <div class="education-school-name">Ozarks Technical Community College</div>
                        <div class="education-location">Springfield, Missouri</div>
                        <div class="education-degree"><strong>AAS.CIS</strong>  -  Associate in Applied Science, Computer Information Science</div>
                        <div class="education-degree"><strong>AS.EGR</strong>  -  Associate of Science, Engineering (Mechanical &amp; Electrical)</div>
                        <div class="education-degree"><strong>AA</strong>  -  Associate of Arts</div>
                        <div class="education-degree"><strong>CT.SP.CP</strong>  -  Certificate of Specialization, Computer Programming</div>
                        <div class="education-degree"><strong>CT.CIS</strong>  -  Certificate of Achievement, Computer Information Science</div>
                        <div class="education-degree"><strong>CT.EGR</strong>  -  Certificate of Achievement, Engineering</div>
                        <div class="education-capstone">
                            Capstone: Designed and deployed customized Raspberry Pi digital signage for OTC campus, 
                            using locally cached, network-driven content with DNS addressing and hierarchical device management.
                        </div>
                    </div>

                </section>

            </main>
        </div><!-- /.resume-layout-outer -->
    </div><!-- /.section-inner -->
</section>

<!-- ─── Footer ───────────────────────────────────────────── -->
<footer class="site-footer">
    <div>
        <span class="room-name">Toby Ziegler</span>
        <span class="tagline">resume.tobyziegler.com</span>
    </div>
    <nav class="footer-nav" aria-label="Footer navigation">
        <a href="https://tobyziegler.com" target="_blank" rel="noopener" class="footer-link">tobyziegler.com ↗</a>
        <a href="https://dadabase.tobyziegler.com" target="_blank" rel="noopener" class="footer-link">Dad-a-Base ↗</a>
        <a href="https://linkedin.com/in/tobyziegler" target="_blank" rel="noopener" class="footer-link">LinkedIn ↗</a>
        <a href="#fit-tool" class="footer-link">AI Fit Tool</a>
        <a href="#resume" class="footer-link">Résumé</a>
    </nav>
</footer>

<script>
// ─── Nav scroll behavior ──────────────────────────────────
const nav = document.getElementById('main-nav');
window.addEventListener('scroll', () => {
    nav.classList.toggle('scrolled', window.scrollY > 40);
});

// ─── Char count & button enable/disable ──────────────────
const textarea = document.getElementById('job-description');
const charCount = document.getElementById('char-count');
const btnAssess = document.getElementById('btn-assess');

textarea.addEventListener('input', () => {
    const len = textarea.value.trim().length;
    charCount.textContent = len.toLocaleString() + ' character' + (len !== 1 ? 's' : '');
    btnAssess.disabled = len < 80;
});

// ─── Scroll reveal ────────────────────────────────────────
const revealObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('in-view');
        }
    });
}, { threshold: 0.1, rootMargin: '0px 0px -60px 0px' });

document.querySelectorAll('.reveal').forEach(el => revealObserver.observe(el));

// ─── Sidebar active link ──────────────────────────────────
const sections = document.querySelectorAll('.resume-section[id]');
const navLinks = document.querySelectorAll('.resume-sidebar-nav a');

const sectionObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const id = entry.target.id;
            navLinks.forEach(link => {
                link.classList.toggle('active', link.getAttribute('href') === '#' + id);
            });
        }
    });
}, { rootMargin: '-20% 0px -60% 0px' });

sections.forEach(s => sectionObserver.observe(s));

// ─── AI Fit Tool ──────────────────────────────────────────
async function runAssessment() {
    const jd = textarea.value.trim();
    if (jd.length < 80) return;

    // Show loading
    document.getElementById('fit-result').classList.remove('visible');
    document.getElementById('fit-error').classList.remove('visible');
    document.getElementById('fit-loading').classList.add('visible');
    btnAssess.disabled = true;

    try {
        const response = await fetch('fit.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ jobDescription: jd })
        });

        if (!response.ok) {
            const errData = await response.json().catch(() => ({}));
            throw new Error(errData.error || 'Server error: ' + response.status);
        }

        const result = await response.json();
        renderResult(result);

    } catch (err) {
        console.error('Fit tool error:', err);
        document.getElementById('fit-loading').classList.remove('visible');
        const errEl = document.getElementById('fit-error');
        errEl.classList.add('visible');
        document.getElementById('fit-error-detail').textContent = err.message || '';
    } finally {
        btnAssess.disabled = false;
    }
}

function renderResult(r) {
    document.getElementById('fit-loading').classList.remove('visible');

    // Signal card
    var fitClass = r.fitClass || 'moderate';
    var badge = document.getElementById('fit-signal-badge');
    badge.className = 'fit-signal-level ' + fitClass;
    badge.textContent = r.fitLevel;

    // Pip color class on the card container
    var signalCard = document.getElementById('fit-signal-card');
    signalCard.className = 'fit-card-signal ' + fitClass;

    // Pip element
    var pip = document.getElementById('fit-signal-pip-el');
    pip.className = 'fit-signal-pip';

    // Summary text
    document.getElementById('fit-signal-summary-text').textContent = r.fitSummary;

    // Section cards
    setText('result-alignment-text', r.alignment);
    setText('result-gaps-text', r.gaps);

    var bl = document.getElementById('result-bottom-text');
    bl.textContent = r.bottomLine;

    document.getElementById('fit-result').classList.add('visible');
    document.getElementById('fit-result').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
}

function setText(id, text) {
    const el = document.getElementById(id);
    // Convert newlines to paragraphs, handle simple bullet markers
    const lines = text.split('\n').filter(l => l.trim());
    el.innerHTML = lines.map(l => {
        if (l.trim().startsWith('- ') || l.trim().startsWith('• ')) {
            return '<li>' + escapeHTML(l.replace(/^[\-•]\s+/, '')) + '</li>';
        }
        return '<p>' + escapeHTML(l) + '</p>';
    }).join('').replace(/(<li>.*<\/li>)+/g, m => '<ul>' + m + '</ul>');
}

function escapeHTML(str) {
    const div = document.createElement('div');
    div.appendChild(document.createTextNode(str));
    return div.innerHTML;
}

function copyResult() {
    const level   = document.getElementById('fit-signal-badge').textContent;
    const summary = document.getElementById('fit-signal-summary-text').textContent;
    const align   = document.getElementById('result-alignment-text').innerText;
    const gaps    = document.getElementById('result-gaps-text').innerText;
    const bottom  = document.getElementById('result-bottom-text').textContent;

    const text = [
        'FIT ASSESSMENT: ' + level,
        summary,
        '',
        'WHERE IT ALIGNS',
        align,
        '',
        'HONEST GAPS',
        gaps,
        '',
        'BOTTOM LINE',
        bottom,
        '',
        '— resume.tobyziegler.com'
    ].join('\n');

    navigator.clipboard.writeText(text).then(() => {
        const btn = document.getElementById('btn-copy-result');
        btn.textContent = 'Copied!';
        setTimeout(() => { btn.textContent = 'Copy result'; }, 2000);
    }).catch(() => {
        alert('Could not copy. Try selecting and copying manually.');
    });
}

function clearResult() {
    document.getElementById('fit-result').classList.remove('visible');
    textarea.value = '';
    charCount.textContent = '0 characters';
    btnAssess.disabled = true;
}

// Allow Enter+Shift to run (Cmd/Ctrl+Enter)
textarea.addEventListener('keydown', (e) => {
    if ((e.metaKey || e.ctrlKey) && e.key === 'Enter') {
        if (!btnAssess.disabled) runAssessment();
    }
});
</script>

</body>
</html>