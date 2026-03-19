<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Primary Meta -->
    <title>Toby Ziegler — Résumé & AI Job Fit Tool</title>
    <meta name="description" content="Thirty years of design, systems thinking, and a fast-developing AI engineering practice. Paste a job description and get an honest fit assessment." />
    <meta name="author" content="Toby Ziegler" />

    <!-- Open Graph -->
    <meta property="og:title" content="Toby Ziegler — Résumé & AI Job Fit Tool" />
    <meta property="og:description" content="Thirty years of design, systems thinking, and a fast-developing AI engineering practice. Paste a job description and get an honest fit assessment." />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://resume.tobyziegler.com" />

    <!-- Canonical -->
    <link rel="canonical" href="https://resume.tobyziegler.com" />

    <!-- JSON-LD Structured Data -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Person",
      "name": "Toby Ziegler",
      "url": "https://tobyziegler.com",
      "sameAs": ["https://linkedin.com/in/tobyziegler"],
      "jobTitle": "Graphic Designer, Document Manager & AI Engineer",
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

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300..900;1,9..144,300..900&family=DM+Sans:ital,opsz,wght@0,9..40,300..700;1,9..40,300..500&display=swap" rel="stylesheet" />

    <style>
        /* ─── CSS Variables ─────────────────────────────────── */
        :root {
            --bg:           #F5F0E8;
            --bg-section:   #EDE6D8;
            --bg-dark:      #1C1712;
            --text:         #2C1F14;
            --text-muted:   #6B5744;
            --accent-green: #3A5C3B;
            --accent-burg:  #7B2D3A;
            --white-soft:   #FAF7F2;
            --rule:         rgba(44, 31, 20, 0.15);
            --rule-strong:  rgba(44, 31, 20, 0.28);

            --font-display: 'Fraunces', serif;
            --font-body:    'DM Sans', sans-serif;

            --radius-pill:  1.4em;
            --shadow-card:  0 2px 16px rgba(44, 31, 20, 0.08), 0 1px 3px rgba(44, 31, 20, 0.06);
            --shadow-lift:  0 8px 32px rgba(44, 31, 20, 0.13), 0 2px 8px rgba(44, 31, 20, 0.08);
        }

        /* ─── Reset & Base ──────────────────────────────────── */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html { scroll-behavior: smooth; }

        body {
            background: var(--bg);
            color: var(--text);
            font-family: var(--font-body);
            font-size: clamp(15px, 1.1vw + 0.5rem, 20px);
            line-height: 1.65;
            -webkit-font-smoothing: antialiased;
            overflow-x: hidden;
        }

        /* Noise texture */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            pointer-events: none;
            z-index: 0;
            opacity: 0.04;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)'/%3E%3C/svg%3E");
            background-size: 200px 200px;
        }

        /* ─── Keyframes ─────────────────────────────────────── */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(1.2rem); }
            to   { opacity: 1; transform: translateY(0); }
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to   { opacity: 1; }
        }
        @keyframes scaleIn {
            from { transform: scaleX(0); }
            to   { transform: scaleX(1); }
        }
        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-0.5rem); max-height: 0; }
            to   { opacity: 1; transform: translateY(0); max-height: 2000px; }
        }
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.4; }
        }

        /* ─── Nav ───────────────────────────────────────────── */
        nav {
            position: fixed;
            top: 0; left: 0; right: 0;
            z-index: 100;
            padding: 1.2rem 3rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: transparent;
            transition: background 0.4s, backdrop-filter 0.4s;
        }
        nav.scrolled {
            background: rgba(245, 240, 232, 0.9);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--rule);
        }
        .nav-logo {
            font-family: var(--font-display);
            font-style: italic;
            font-size: 1.35rem;
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
            font-size: 0.95rem;
            font-weight: 500;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: var(--text-muted);
            text-decoration: none;
            transition: color 0.2s;
        }
        .nav-links a:hover { color: var(--accent-green); }

        /* ─── Pill Buttons ──────────────────────────────────── */
        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.48rem 1.5rem;
            background: var(--accent-green);
            color: var(--white-soft);
            font-family: var(--font-body);
            font-size: 0.95rem;
            font-weight: 600;
            letter-spacing: 0.03em;
            text-decoration: none;
            border: 2px solid var(--accent-green);
            border-radius: var(--radius-pill);
            transition: background 0.22s, color 0.22s, transform 0.18s;
            cursor: pointer;
            white-space: nowrap;
        }
        .btn-primary:hover {
            background: transparent;
            color: var(--accent-green);
            transform: translateY(-2px);
        }
        .btn-secondary {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.48rem 1.5rem;
            background: transparent;
            color: var(--text);
            font-family: var(--font-body);
            font-size: 0.95rem;
            font-weight: 500;
            letter-spacing: 0.03em;
            text-decoration: none;
            border: 2px solid var(--rule-strong);
            border-radius: var(--radius-pill);
            transition: border-color 0.22s, color 0.22s, transform 0.18s;
            cursor: pointer;
            white-space: nowrap;
        }
        .btn-secondary:hover {
            border-color: var(--text);
            color: var(--text);
            transform: translateY(-2px);
        }

        /* ─── Section Layout Helpers ────────────────────────── */
        .section-inner {
            max-width: 900px;
            margin: 0 auto;
            padding: 0 2rem;
        }
        .eyebrow {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            margin-bottom: 1.2rem;
        }
        .eyebrow-line {
            width: 2rem;
            height: 1.5px;
            background: var(--accent-green);
            flex-shrink: 0;
        }
        .eyebrow-text {
            font-family: var(--font-body);
            font-size: 0.85rem;
            font-weight: 600;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--accent-green);
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
        .section-heading em {
            font-style: italic;
            color: var(--accent-green);
        }

        /* ─── Hero ──────────────────────────────────────────── */
        #hero {
            position: relative;
            min-height: 56vh;
            display: flex;
            align-items: center;
            padding: 8rem 3rem 5rem;
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
            max-width: 900px;
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
        .hero-headline em { font-style: italic; color: var(--accent-green); }
        .hero-headline .burg { font-style: italic; color: var(--accent-burg); }
        .hero-sub {
            max-width: 560px;
            font-size: 1.1rem;
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
            font-size: 0.88rem;
            font-weight: 500;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            color: var(--text-muted);
            display: flex;
            align-items: center;
            gap: 0.4rem;
        }
        .hero-meta-item span { color: var(--accent-green); font-style: italic; font-family: var(--font-display); font-size: 1rem; letter-spacing: 0; text-transform: none; font-weight: 400; }
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
            bottom: 0; left: 3rem; right: 3rem;
            height: 1px;
            background: var(--rule);
            transform: scaleX(0);
            transform-origin: left;
            animation: scaleIn 1s ease 0.6s forwards;
        }

        /* ─── AI Fit Tool ───────────────────────────────────── */
        #fit-tool {
            background: var(--bg-dark);
            color: var(--white-soft);
            padding: 5rem 3rem;
            position: relative;
            overflow: hidden;
        }
        #fit-tool::before {
            content: '';
            position: absolute;
            inset: 0;
            opacity: 0.03;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)'/%3E%3C/svg%3E");
            background-size: 200px 200px;
            pointer-events: none;
        }
        .fit-tool-inner {
            max-width: 900px;
            margin: 0 auto;
        }
        .fit-eyebrow {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            margin-bottom: 1.2rem;
        }
        .fit-eyebrow-line {
            width: 2rem;
            height: 1.5px;
            background: var(--accent-green);
            flex-shrink: 0;
        }
        .fit-eyebrow-text {
            font-size: 0.85rem;
            font-weight: 600;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--accent-green);
        }
        .fit-heading {
            font-family: var(--font-display);
            font-size: clamp(1.8rem, 3.5vw, 2.8rem);
            font-weight: 300;
            letter-spacing: -0.02em;
            line-height: 1.2;
            color: var(--white-soft);
            margin-bottom: 0.8rem;
        }
        .fit-heading em { font-style: italic; color: #8BAF6D; }
        .fit-sub {
            font-size: 1rem;
            line-height: 1.65;
            color: rgba(250, 247, 242, 0.65);
            max-width: 560px;
            margin-bottom: 2.4rem;
        }
        .fit-input-area {
            background: rgba(250, 247, 242, 0.05);
            border: 1px solid rgba(250, 247, 242, 0.15);
            border-radius: 0.75rem;
            overflow: hidden;
            transition: border-color 0.2s;
        }
        .fit-input-area:focus-within {
            border-color: rgba(139, 175, 109, 0.6);
        }
        #job-description {
            display: block;
            width: 100%;
            min-height: 200px;
            background: transparent;
            border: none;
            outline: none;
            padding: 1.4rem 1.6rem;
            font-family: var(--font-body);
            font-size: 0.95rem;
            line-height: 1.65;
            color: var(--white-soft);
            resize: vertical;
        }
        #job-description::placeholder { color: rgba(250, 247, 242, 0.35); }
        .fit-input-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.8rem 1.6rem;
            border-top: 1px solid rgba(250, 247, 242, 0.08);
            gap: 1rem;
        }
        .fit-char-count {
            font-size: 0.82rem;
            color: rgba(250, 247, 242, 0.35);
        }
        .btn-assess {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.52rem 1.6rem;
            background: var(--accent-green);
            color: var(--white-soft);
            font-family: var(--font-body);
            font-size: 0.9rem;
            font-weight: 600;
            letter-spacing: 0.04em;
            border: 2px solid var(--accent-green);
            border-radius: var(--radius-pill);
            cursor: pointer;
            transition: background 0.2s, color 0.2s, transform 0.18s;
        }
        .btn-assess:hover:not(:disabled) {
            background: transparent;
            color: var(--accent-green);
            transform: translateY(-2px);
        }
        .btn-assess:disabled {
            opacity: 0.45;
            cursor: not-allowed;
        }

        /* ─── Fit Result ────────────────────────────────────── */
        #fit-result {
            display: none;
            margin-top: 2rem;
            background: rgba(250, 247, 242, 0.05);
            border: 1px solid rgba(250, 247, 242, 0.12);
            border-radius: 0.75rem;
            overflow: hidden;
            animation: fadeUp 0.6s ease forwards;
        }
        #fit-result.visible { display: block; }

        .fit-result-header {
            padding: 1.6rem 1.8rem 1.2rem;
            border-bottom: 1px solid rgba(250, 247, 242, 0.08);
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 1rem;
        }
        .fit-signal {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.3rem 1rem;
            border-radius: var(--radius-pill);
            font-size: 0.82rem;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }
        .fit-signal.strong   { background: rgba(58, 92, 59, 0.3); color: #8BAF6D; border: 1px solid rgba(58, 92, 59, 0.5); }
        .fit-signal.moderate { background: rgba(180, 140, 60, 0.2); color: #C8A84B; border: 1px solid rgba(180, 140, 60, 0.4); }
        .fit-signal.partial  { background: rgba(123, 45, 58, 0.2); color: #C97A82; border: 1px solid rgba(123, 45, 58, 0.35); }
        .fit-signal.limited  { background: rgba(100, 100, 100, 0.2); color: #aaa; border: 1px solid rgba(100, 100, 100, 0.3); }

        .fit-result-body {
            padding: 1.6rem 1.8rem;
        }
        .fit-section {
            margin-bottom: 1.8rem;
        }
        .fit-section:last-child { margin-bottom: 0; }
        .fit-section-label {
            font-size: 0.78rem;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--accent-green);
            margin-bottom: 0.6rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .fit-section-label::after {
            content: '';
            flex: 1;
            height: 1px;
            background: rgba(250,247,242,0.08);
        }
        .fit-section-content {
            font-size: 0.96rem;
            line-height: 1.7;
            color: rgba(250, 247, 242, 0.82);
        }
        .fit-section-content p { margin-bottom: 0.6rem; }
        .fit-section-content p:last-child { margin-bottom: 0; }
        .fit-section-content ul {
            padding-left: 1.3rem;
            margin-bottom: 0.6rem;
        }
        .fit-section-content li { margin-bottom: 0.3rem; }
        .fit-bottom-line {
            font-family: var(--font-display);
            font-style: italic;
            font-size: 1.05rem;
            line-height: 1.65;
            color: var(--white-soft);
        }

        /* Loading state */
        #fit-loading {
            display: none;
            padding: 2.5rem;
            text-align: center;
        }
        #fit-loading.visible { display: block; }
        .loading-dots {
            display: inline-flex;
            gap: 0.4rem;
            margin-bottom: 1rem;
        }
        .loading-dots span {
            width: 8px; height: 8px;
            background: var(--accent-green);
            border-radius: 50%;
            animation: pulse 1.4s ease-in-out infinite;
        }
        .loading-dots span:nth-child(2) { animation-delay: 0.2s; }
        .loading-dots span:nth-child(3) { animation-delay: 0.4s; }
        .loading-text {
            font-size: 0.9rem;
            color: rgba(250,247,242,0.5);
            font-style: italic;
        }

        /* Error state */
        #fit-error {
            display: none;
            padding: 1.6rem 1.8rem;
            color: #C97A82;
            font-size: 0.92rem;
        }
        #fit-error.visible { display: block; }

        /* ─── Resume Content ────────────────────────────────── */
        #resume {
            padding: 5rem 3rem;
        }

        /* Summary strip */
        .resume-summary {
            background: var(--bg-section);
            border-radius: 0.75rem;
            padding: 2.4rem 2.8rem;
            margin-bottom: 4rem;
            border: 1px solid var(--rule);
        }
        .resume-summary p {
            font-size: 1.06rem;
            line-height: 1.75;
            color: var(--text);
            max-width: 720px;
        }
        .resume-summary p + p { margin-top: 0.8rem; }

        /* Resume grid layout: sidebar + main */
        .resume-layout {
            display: grid;
            grid-template-columns: 220px 1fr;
            gap: 4rem;
            align-items: start;
        }
        @media (max-width: 700px) {
            .resume-layout {
                grid-template-columns: 1fr;
                gap: 3rem;
            }
        }

        /* Sidebar nav */
        .resume-sidebar {
            position: sticky;
            top: 6rem;
        }
        .resume-sidebar-nav {
            list-style: none;
        }
        .resume-sidebar-nav li {
            margin-bottom: 0.3rem;
        }
        .resume-sidebar-nav a {
            display: block;
            font-size: 0.84rem;
            font-weight: 500;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            color: var(--text-muted);
            text-decoration: none;
            padding: 0.35rem 0;
            border-left: 2px solid transparent;
            padding-left: 0.8rem;
            transition: color 0.2s, border-color 0.2s;
        }
        .resume-sidebar-nav a:hover,
        .resume-sidebar-nav a.active {
            color: var(--accent-green);
            border-left-color: var(--accent-green);
        }

        /* Resume sections */
        .resume-section {
            margin-bottom: 3.5rem;
            scroll-margin-top: 6rem;
        }
        .resume-section:last-child { margin-bottom: 0; }

        .resume-section-heading {
            font-family: var(--font-display);
            font-size: 1.5rem;
            font-weight: 400;
            font-style: italic;
            color: var(--text);
            margin-bottom: 1.6rem;
            padding-bottom: 0.8rem;
            border-bottom: 1px solid var(--rule);
        }

        /* Competencies */
        .competency-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }
        @media (max-width: 500px) { .competency-grid { grid-template-columns: 1fr; } }
        .competency-item {
            background: var(--bg-section);
            border: 1px solid var(--rule);
            border-radius: 0.5rem;
            padding: 1rem 1.2rem;
        }
        .competency-title {
            font-family: var(--font-display);
            font-style: italic;
            font-size: 0.95rem;
            font-weight: 500;
            color: var(--accent-green);
            margin-bottom: 0.2rem;
        }
        .competency-desc {
            font-size: 0.85rem;
            line-height: 1.55;
            color: var(--text-muted);
        }

        /* Experience entries */
        .experience-entry {
            margin-bottom: 2.2rem;
            padding-bottom: 2.2rem;
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
            font-size: 1.1rem;
            font-weight: 500;
            color: var(--text);
        }
        .experience-date {
            font-size: 0.82rem;
            font-weight: 500;
            letter-spacing: 0.06em;
            color: var(--text-muted);
            white-space: nowrap;
        }
        .experience-company {
            font-size: 0.88rem;
            font-weight: 600;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            color: var(--accent-green);
            margin-bottom: 0.7rem;
        }
        .experience-bullets {
            padding-left: 1.1rem;
        }
        .experience-bullets li {
            font-size: 0.92rem;
            line-height: 1.6;
            color: var(--text);
            margin-bottom: 0.35rem;
        }
        .experience-bullets li:last-child { margin-bottom: 0; }

        /* Portfolio */
        .portfolio-entry {
            background: var(--bg-section);
            border: 1px solid var(--rule);
            border-radius: 0.6rem;
            padding: 1.4rem 1.6rem;
            margin-bottom: 1.2rem;
        }
        .portfolio-entry:last-child { margin-bottom: 0; }
        .portfolio-header {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            flex-wrap: wrap;
            gap: 0.4rem;
            margin-bottom: 0.2rem;
        }
        .portfolio-title {
            font-family: var(--font-display);
            font-style: italic;
            font-size: 1.1rem;
            font-weight: 500;
            color: var(--text);
        }
        .portfolio-year {
            font-size: 0.82rem;
            letter-spacing: 0.06em;
            color: var(--text-muted);
        }
        .portfolio-subtitle {
            font-size: 0.82rem;
            font-weight: 500;
            letter-spacing: 0.04em;
            color: var(--accent-burg);
            margin-bottom: 0.7rem;
        }
        .portfolio-bullets {
            padding-left: 1.1rem;
        }
        .portfolio-bullets li {
            font-size: 0.9rem;
            line-height: 1.6;
            color: var(--text-muted);
            margin-bottom: 0.3rem;
        }

        /* Education */
        .education-school {
            margin-bottom: 2rem;
            padding-bottom: 2rem;
            border-bottom: 1px solid var(--rule);
        }
        .education-school:last-child { border-bottom: none; margin-bottom: 0; padding-bottom: 0; }
        .education-school-name {
            font-family: var(--font-display);
            font-style: italic;
            font-size: 1.05rem;
            font-weight: 500;
            color: var(--text);
            margin-bottom: 0.15rem;
        }
        .education-location {
            font-size: 0.82rem;
            color: var(--text-muted);
            margin-bottom: 0.7rem;
        }
        .education-degree {
            font-size: 0.9rem;
            line-height: 1.5;
            color: var(--text);
            margin-bottom: 0.25rem;
            padding-left: 0.5rem;
            border-left: 2px solid var(--rule);
        }
        .education-degree strong {
            font-weight: 600;
            color: var(--accent-green);
            font-size: 0.8rem;
            letter-spacing: 0.05em;
            text-transform: uppercase;
        }
        .education-degree em { font-style: italic; color: var(--text-muted); font-size: 0.85rem; }
        .education-minor {
            font-size: 0.82rem;
            color: var(--text-muted);
            padding-left: 1rem;
            margin-top: 0.15rem;
        }
        .education-capstone {
            margin-top: 0.8rem;
            font-size: 0.85rem;
            color: var(--text-muted);
            font-style: italic;
            padding-left: 0.5rem;
            border-left: 2px solid rgba(58,92,59,0.3);
        }

        /* ─── Footer ────────────────────────────────────────── */
        footer {
            background: var(--bg-dark);
            color: rgba(250,247,242,0.5);
            padding: 3rem;
            text-align: center;
        }
        .footer-inner {
            max-width: 900px;
            margin: 0 auto;
        }
        .footer-name {
            font-family: var(--font-display);
            font-style: italic;
            font-size: 1.5rem;
            font-weight: 300;
            color: var(--white-soft);
            margin-bottom: 0.6rem;
        }
        .footer-links {
            display: flex;
            justify-content: center;
            gap: 2rem;
            flex-wrap: wrap;
            margin-bottom: 1.5rem;
        }
        .footer-links a {
            font-size: 0.85rem;
            font-weight: 500;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            color: rgba(250,247,242,0.4);
            text-decoration: none;
            transition: color 0.2s;
        }
        .footer-links a:hover { color: var(--white-soft); }
        .footer-copy {
            font-size: 0.8rem;
            color: rgba(250,247,242,0.25);
        }

        /* ─── Responsive ────────────────────────────────────── */
        @media (max-width: 768px) {
            nav { padding: 1rem 1.5rem; }
            #hero { padding: 7rem 1.5rem 4rem; }
            #fit-tool { padding: 4rem 1.5rem; }
            #resume { padding: 4rem 1.5rem; }
            footer { padding: 2.5rem 1.5rem; }
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
            Graphic designer, document manager, AI engineering practitioner. 
            Springfield, MO — and building something worth looking at.
        </p>
        <div class="hero-meta">
            <div class="hero-meta-item"><span>30+</span> years design &amp; document management</div>
            <div class="hero-meta-item"><span>1</span> shipped AI-directed full-stack app</div>
            <div class="hero-meta-item"><span>∞</span> problems that needed a system</div>
        </div>
        <div class="hero-actions">
            <a href="#fit-tool" class="btn-primary">Try the AI fit tool ↓</a>
            <a href="#resume" class="btn-secondary">Jump to résumé</a>
        </div>
    </div>
    <div class="hero-rule"></div>
</section>

<!-- ─── AI Job Fit Tool ───────────────────────────────────── -->
<section id="fit-tool">
    <div class="fit-tool-inner">
        <div class="fit-eyebrow">
            <div class="fit-eyebrow-line"></div>
            <span class="fit-eyebrow-text">AI-Powered Assessment</span>
        </div>
        <h2 class="fit-heading">
            Paste a job description.<br>
            Get an <em>honest</em> read.
        </h2>
        <p class="fit-sub">
            This tool uses everything known about Toby's background — the résumé and the stories behind it — 
            to give you a candid fit assessment. A lukewarm fit called lukewarm is more useful than a lukewarm fit called strong.
        </p>

        <div class="fit-input-area">
            <textarea
                id="job-description"
                placeholder="Paste the job description here — title, responsibilities, requirements, whatever you have. The more context, the better the assessment."
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
        </div>

        <!-- Result -->
        <div id="fit-result" role="region" aria-label="Fit assessment result">
            <div class="fit-result-header">
                <div>
                    <div id="fit-signal-badge" class="fit-signal"></div>
                </div>
                <button onclick="clearResult()" style="background:none;border:none;color:rgba(250,247,242,0.35);cursor:pointer;font-size:0.85rem;padding:0.3rem;">
                    ✕ Clear
                </button>
            </div>
            <div class="fit-result-body">
                <div class="fit-section" id="result-alignment">
                    <div class="fit-section-label">Where the background aligns</div>
                    <div class="fit-section-content" id="result-alignment-text"></div>
                </div>
                <div class="fit-section" id="result-gaps">
                    <div class="fit-section-label">Honest gaps or differences</div>
                    <div class="fit-section-content" id="result-gaps-text"></div>
                </div>
                <div class="fit-section" id="result-bottom">
                    <div class="fit-section-label">Bottom line</div>
                    <div class="fit-bottom-line" id="result-bottom-text"></div>
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
                I bring an uncommon combination to the table: thirty years of professional design and document management experience, 
                a project manager's instinct for systems and clarity, and a fast-developing practice in AI-directed software engineering. 
                I don't write code by hand — I direct AI to produce complete, production-ready applications through precise prompting, 
                iterative refinement, and a designer's eye for what good looks like.
            </p>
            <p>
                Currently building a portfolio of showcase web projects at tobyziegler.com — each one conceived, directed, 
                troubleshot, and deployed without writing a single line of code by hand. It's a new kind of engineering practice, 
                and I'm genuinely excited about where it's going.
            </p>
        </div>

        <div class="resume-layout">

            <!-- Sidebar -->
            <aside class="resume-sidebar" aria-label="Section navigation">
                <nav>
                    <ul class="resume-sidebar-nav" id="sidebar-nav">
                        <li><a href="#sec-competencies">Competencies</a></li>
                        <li><a href="#sec-experience">Experience</a></li>
                        <li><a href="#sec-portfolio">Portfolio</a></li>
                        <li><a href="#sec-education">Education</a></li>
                    </ul>
                </nav>
            </aside>

            <!-- Main Resume Content -->
            <main>

                <!-- Core Competencies -->
                <section class="resume-section reveal" id="sec-competencies" aria-labelledby="heading-competencies">
                    <h2 class="resume-section-heading" id="heading-competencies">Core Competencies</h2>
                    <div class="competency-grid">
                        <div class="competency-item">
                            <div class="competency-title">AI Engineering &amp; Prompt Design</div>
                            <div class="competency-desc">Directing AI models to produce complete, production-grade applications through structured prompting, iterative debugging, and quality review</div>
                        </div>
                        <div class="competency-item">
                            <div class="competency-title">Graphic Design &amp; Visual Communication</div>
                            <div class="competency-desc">30+ years across print, digital, UI/UX, and document design; strong instinct for what works and why</div>
                        </div>
                        <div class="competency-item">
                            <div class="competency-title">Project &amp; Document Management</div>
                            <div class="competency-desc">End-to-end coordination of complex projects across large organizations; deep expertise in documentation systems, workflows, and records management</div>
                        </div>
                        <div class="competency-item">
                            <div class="competency-title">Technical Breadth</div>
                            <div class="competency-desc">Working familiarity with PHP, JavaScript, SQL, HTML/CSS, Python, Java, C#; comfortable reading, debugging, and directing code across stacks</div>
                        </div>
                    </div>
                </section>

                <!-- Experience -->
                <section class="resume-section reveal" id="sec-experience" aria-labelledby="heading-experience">
                    <h2 class="resume-section-heading" id="heading-experience">Experience</h2>

                    <article class="experience-entry">
                        <div class="experience-header">
                            <div class="experience-title">Graphic Designer &amp; Document Manager</div>
                            <div class="experience-date">February 2001 – Present</div>
                        </div>
                        <div class="experience-company">CoxHealth — Springfield, Missouri</div>
                        <ul class="experience-bullets">
                            <li>Chair, Document Control Oversight Committee — setting standards and policy for documentation practices across the health system</li>
                            <li>Sole builder for the Addressograph / Patientworks system; responsible for all forms in a mission-critical patient records platform</li>
                            <li>Coordinated design and documentation projects across 300+ departments, managing vendor and contractor relationships throughout</li>
                            <li>Maintained and managed a library of 10,000+ active files with rigorous version control and lifecycle tracking</li>
                            <li>Led the organization's transition from fully analog to all-digital design and document workflows</li>
                            <li>10+ years developing internal software tools to support document management, design production, and departmental operations</li>
                        </ul>
                    </article>

                    <article class="experience-entry">
                        <div class="experience-header">
                            <div class="experience-title">Co-Owner</div>
                        </div>
                        <div class="experience-company">DirectBuy of Springfield</div>
                        <ul class="experience-bullets">
                            <li>Directed sales process for new memberships, from initial contact through close</li>
                            <li>Coordinated telemarketing follow-up campaigns and supervised receiving operations</li>
                        </ul>
                    </article>

                    <article class="experience-entry">
                        <div class="experience-header">
                            <div class="experience-title">Artist</div>
                        </div>
                        <div class="experience-company">Sweetheart Cup Company</div>
                        <ul class="experience-bullets">
                            <li>Managed the company-wide template library across Freehand, Illustrator, and Photoshop — the foundation every project was built on</li>
                            <li>Produced thousands of individual product designs annually for cups, tubs, and containers</li>
                            <li>Owned the full project lifecycle from customer brief through final production handoff</li>
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
                            <div class="portfolio-title">Dad-a-Base</div>
                            <div class="portfolio-year">2025</div>
                        </div>
                        <div class="portfolio-subtitle">dadabase.tobyziegler.com</div>
                        <ul class="portfolio-bullets">
                            <li>Full-stack web application: joke database with search, voting, moderation queue, and admin panel</li>
                            <li>Built entirely through AI-directed engineering — PHP 8.1, MySQL, vanilla JavaScript, deployed to Namecheap shared hosting via Git</li>
                            <li>AI-powered categorization via Anthropic API; multi-category assignment, bulk import/export (CSV &amp; JSON), bcrypt admin authentication</li>
                            <li>Designed with a warm editorial aesthetic; iteratively refined through prompting for accessibility, mobile responsiveness, and UX polish</li>
                        </ul>
                    </article>

                    <article class="portfolio-entry">
                        <div class="portfolio-header">
                            <div class="portfolio-title">Toby's Study</div>
                        </div>
                        <div class="portfolio-subtitle">tobyziegler.com</div>
                        <ul class="portfolio-bullets">
                            <li>Personal portfolio site featuring a study/library metaphor with subdomains as "rooms"</li>
                            <li>Built in PHP/HTML/CSS/vanilla JavaScript with no frameworks — designed from scratch through AI-directed engineering</li>
                            <li>Fluid typography, noise-texture layering, custom CSS bookcase component, and a consistent warm editorial design system</li>
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
                            <strong>MS.PM</strong> — Master of Science in Project Management
                            <em>&nbsp;· In Progress</em>
                        </div>
                        <div class="education-degree">
                            <strong>BAS.TM</strong> — Bachelor of Applied Science in Technology Management
                        </div>
                        <div class="education-minor">Minor in Computer Science</div>
                        <div class="education-minor">Minor in Web Application Development</div>
                    </div>

                    <div class="education-school">
                        <div class="education-school-name">Ozarks Technical Community College</div>
                        <div class="education-location">Springfield, Missouri</div>
                        <div class="education-degree"><strong>AAS.CIS</strong> — Associate in Applied Science, Computer Information Science</div>
                        <div class="education-degree"><strong>AS.EGR</strong> — Associate of Science, Engineering (Mechanical &amp; Electrical)</div>
                        <div class="education-degree"><strong>AA</strong> — Associate of Arts</div>
                        <div class="education-degree"><strong>CT.SP.CP</strong> — Certificate of Specialization, Computer Programming</div>
                        <div class="education-degree"><strong>CT.CIS</strong> — Certificate of Achievement, Computer Information Science</div>
                        <div class="education-degree"><strong>CT.EGR</strong> — Certificate of Achievement, Engineering</div>
                        <div class="education-capstone">
                            Capstone: Designed and deployed customized Raspberry Pi digital signage for OTC campus, 
                            using locally cached, network-driven content with DNS addressing and hierarchical device management.
                        </div>
                    </div>

                </section>

            </main>
        </div><!-- /.resume-layout -->
    </div><!-- /.section-inner -->
</section>

<!-- ─── Footer ───────────────────────────────────────────── -->
<footer>
    <div class="footer-inner">
        <div class="footer-name">Toby Ziegler</div>
        <nav class="footer-links" aria-label="Footer navigation">
            <a href="https://tobyziegler.com" target="_blank" rel="noopener">tobyziegler.com ↗</a>
            <a href="https://dadabase.tobyziegler.com" target="_blank" rel="noopener">Dad-a-Base ↗</a>
            <a href="https://linkedin.com/in/tobyziegler" target="_blank" rel="noopener">LinkedIn ↗</a>
            <a href="#fit-tool">AI Fit Tool</a>
            <a href="#resume">Résumé</a>
        </nav>
        <p class="footer-copy">Springfield, Missouri · resume.tobyziegler.com</p>
    </div>
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
        document.getElementById('fit-error').classList.add('visible');
    } finally {
        btnAssess.disabled = false;
    }
}

function renderResult(r) {
    document.getElementById('fit-loading').classList.remove('visible');

    // Signal badge
    const badge = document.getElementById('fit-signal-badge');
    badge.className = 'fit-signal ' + (r.fitClass || 'moderate');
    badge.textContent = r.fitLevel;

    // Sections
    setText('result-alignment-text', r.alignment);
    setText('result-gaps-text', r.gaps);

    const bl = document.getElementById('result-bottom-text');
    bl.textContent = r.bottomLine;

    // Append summary under badge
    let summaryEl = document.getElementById('fit-signal-summary');
    if (!summaryEl) {
        summaryEl = document.createElement('p');
        summaryEl.id = 'fit-signal-summary';
        summaryEl.style.cssText = 'font-size:0.92rem;line-height:1.6;color:rgba(250,247,242,0.7);margin-top:0.5rem;';
        badge.parentNode.appendChild(summaryEl);
    }
    summaryEl.textContent = r.fitSummary;

    document.getElementById('fit-result').classList.add('visible');

    // Scroll into view
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

function clearResult() {
    document.getElementById('fit-result').classList.remove('visible');
    document.getElementById('fit-signal-summary') && document.getElementById('fit-signal-summary').remove();
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