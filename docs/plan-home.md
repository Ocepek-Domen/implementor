# plan-home.md — Homepage

## Goal & primary CTA
**Goal:** In 10 seconds, a Slovenian decision-maker understands (a) we're a serious Odoo Silver Partner, (b) we have our own Slovenian localization, (c) we work with real, known companies, and (d) there's a path for them whether they're 5 people or over 100.

**Primary CTA:** Book a free consultation call
**Secondary CTA:** See our work (→ /clients)

## Persona served
Both A (SMB) and B (mid-market/enterprise). Hero splits naturally; "two paths" section makes it explicit.

## SEO
- **Title:** Implementor — Slovenian Odoo Silver Partner
- **Meta description:** Modern Odoo implementations for Slovenian businesses. Our own Slovenian localization and fiscalization, senior certified team, starter packages from €15 per user per month.
- **Target keywords:** odoo slovenia, odoo partner slovenia, odoo integrator slovenia, slovenska lokalizacija odoo, odoo silver partner ljubljana
- **Schema:** `Organization`, `Service`, breadcrumbs

---

## Section-by-section breakdown

### 1. Sticky nav (S1)
- Logo (left)
- Links: Services · Clients · About · Contact
- Right side: Theme toggle + "Book a call" pill button (primary)
- On scroll: slight background blur + reduced height
- Mobile: hamburger → full-screen overlay

### 2. Hero (S1)
**Purpose:** Position in one breath. State the differentiator. Offer the action.

**Layout:** Left-aligned text, 60% width on desktop. Right 40%: subtle animated/gradient visual element (Stage 1 = static gradient mesh; Stage 3 = cursor-following blob or animated geometric purple shapes).

**Copy outline (placeholder):**
- Eyebrow: `Business automation & AI · Odoo Silver Partner · Slovenia`
- H1: **Odoo, done properly. For Slovenia.**
- Sub: We help Slovenian businesses automate their operations, connect their teams, and get off the spreadsheets — on one platform. Slovenian-ready out of the box. From €15 per user per month.
- Primary CTA: `Book a free consultation` →
- Secondary CTA: `See our work` (lighter button → /clients)

**Visual notes:**
- Big display type. Headline at ~64–88px on desktop.
- Headline italicizes "**properly**" in display serif for tone — light touch of personality.
- Background: subtle purple gradient mesh, fading to background color.
- Below headline, a thin row of trust marks: Odoo Silver Partner badge · "Certified Odoo experts" · small client logo strip preview (3–4 logos).

**Animation (S1):**
- WebGL noise background — drifting purple/amber noise field, subtle cursor parallax (±15px).
- Cipher/scramble text on load — H1 characters cycle through random glyphs for 600ms before resolving. Homepage only.
- Staggered entrance: eyebrow → H1 → sub → CTAs → trust strip, 80ms offsets, spring translateY 24px → 0.
- CTA buttons: magnetic pull within 80px radius, click ripple on press.

### 3. Trust strip (S1)
**Purpose:** Instant social proof. Most visitors scan for logos before reading anything.

**Layout:** Full-width band, subtle background tint. Grayscale logos of: Ilirika, NN Saunas, Mobistekla, + 3–5 others. Centered eyebrow above: "Trusted by Slovenian businesses from 5 to over 100 people."

**S1:** placeholder gray logo blocks until SVGs arrive.
**Animation (S1):** fade-up with stagger on scroll into view. Logos desaturate on load, then saturate on hover.

### 4. The "two paths" section (S1) — signature
**Purpose:** Solve the dual-audience problem visually. The single most important section after the hero. Both paths are Implementor offerings — same partner, same team, same Slovenian localization. The only difference is scope and pace.

**Layout:** Two large equal-height cards side by side (stack on mobile).

**Card A — Starter**
- Eyebrow: `For small teams`
- Title: **Starter package**
- Sub: A clean Odoo setup with our Slovenian localization built in. Configured, deployed, and supported by us. Best when standard processes fit your business.
- Bullet list: ✓ From €15 per user per month · ✓ Slovenian fiscalization included · ✓ Live in weeks · ✓ Best for 5–30 people
- CTA: `Book a consultation` → /contact

**Card B — Custom implementation**
- Eyebrow: `For mid-market & growing companies`
- Title: **Custom implementation**
- Sub: Tailored Odoo for complex operations. Manufacturing, multi-company, integrations, custom modules — scoped to your business and built by our senior team.
- Bullet list: ✓ End-to-end project ownership · ✓ Full Slovenian compliance · ✓ Multi-country & multi-currency · ✓ Best for 30 to over 100 employees
- CTA: `Book a consultation` → /contact

**Visual notes:**
- Each card uses glassmorphism style (Stage 2 upgrade), distinct subtle gradient overlays — lighter purple for A, deeper purple for B.
- Equal weight. We don't push one over the other.
- Both CTAs route to the same contact form — the form's "company size" field internally routes the lead.

**Animation (S1):** GSAP ScrollTrigger pinned section. Left card slides from center-left, right card from center-right, simultaneously. A thin amber line briefly flashes at the split point as they separate. Spring settle on arrival. On mobile: each card slides up individually, staggered.

### 5. Flagship clients (S1)
**Purpose:** Prove range — finance, manufacturing, services. Same partner.

**Layout:** Three cards in a row (stack on mobile). Each card has: client logo, single-line industry, one-sentence problem-solved, key metric, "Read case study →".

**Cards:**
1. **Ilirika** — Brokerage & M&A · *Regulated finance, multi-country operations across SI/HR/RS/MK.* Metric: "Multi-country financial workflows, one Odoo instance." → /clients/ilirika
2. **NN Saunas** — Premium manufacturer · *Custom sauna manufacturing for export across 5+ countries.* Metric: "2000+ units, manufacturing + logistics + multi-warehouse." → /clients/nn-saunas
3. **Mobistekla** — Mobile device service · *10,000+ repairs per year, custom tracking software, B2B + B2C.* Metric: "From spreadsheets to a full service operations platform." → /clients/mobistekla

**Visual notes:** Cards have a deliberate "magazine" feel — generous whitespace, clear hierarchy, one striking visual element per card.

**Animation (S1):** clip-path reveal per card — `inset(100% 0 0 0)` → `inset(0%)`, staggered 80ms. 3D perspective tilt on hover (±8°, spring physics). Shadow shifts to match tilt direction.

### 6. Services overview — bento grid (S1)
**Purpose:** Scannable answer to "what do you do?"

**Layout:** 8-tile bento grid. Mixed sizes for visual rhythm. Two tiles span 2 columns.

**Tiles:**
1. **Business Automation & ERP** (large, 2-col) — full Odoo setup, from analysis to go-live. Connect finance, operations, sales, and logistics on one platform.
2. **AI-Powered Odoo** (large, 2-col) — AI features built into your Odoo: document AI, smart forecasting, email classification, automated workflows.
3. **RAG & AI Systems** — custom knowledge bases and document Q&A powered by your own data. Ask questions, get answers from your documents.
4. **Slovenian Localization** — fiscalization, FURS, e-SLOG, our own modules
5. **Integrations** — connect Odoo to anything: banks, e-commerce, logistics, BI, AI models
6. **Custom Development** — Odoo modules and standalone software built to your processes
7. **Support & Training** — onboarding, hypercare, ongoing optimization
8. **Migrations** — from legacy ERPs (Pantheon, SAP B1, custom) to Odoo

Each tile: icon + title + 1–2 sentence description + subtle "Learn more →" on hover.

**Animation (S1):** spring-physics stagger — each tile enters with `translateY: 40px → 0, scale: 0.96 → 1, opacity: 0 → 1`, 60ms stagger. Hover: 3D perspective tilt (±8°) with shadow shifting to match. Same spring on hover enter/exit — no snapping.

### 7. Slovenian localization spotlight (S1)
**Purpose:** Plant the flag on our biggest defensible moat. This section becomes its own page in Stage 3.

**Layout:** Two-column. Left: heading + paragraph + bullet list. Right: visual — a stylized "what's included" badge grid (chart of accounts, fiscalization, VAT, FURS, e-invoicing, payroll basics).

**Copy outline:**
- Eyebrow: `Built in Slovenia, for Slovenia`
- H2: **Our own Slovenian localization and fiscalization — production-grade, in-house.**
- Sub: We built it. We maintain it. We update it with every Odoo release and every change to Slovenian tax law. No third-party dependency. No surprise gaps.
- Bullets:
  - Slovenian chart of accounts
  - FURS fiscalization, certified
  - VAT, reverse charge, EU triangulation
  - e-SLOG e-invoicing
  - Payroll-ready integrations
  - Always in sync with current legislation

**CTA:** (S3) `Read the full localization breakdown` → /localization

### 8. AI spotlight (S1)
**Purpose:** Plant the flag on AI before any competitor does. This section becomes its own page in Stage 2.

**Layout:** Two-column. Left: heading + paragraph + bullet list. Right: visual — a stylized diagram or icon grid showing the AI stack (LLM → RAG → Odoo data → answers).

**Copy outline:**
- Eyebrow: `AI that works with your data`
- H2: **We build AI into your business — not just your software.**
- Sub: From AI features inside Odoo to standalone RAG systems that let your team query your own documents and data — we design, build, and integrate AI that actually earns its place.
- Bullets:
  - AI features natively in Odoo (forecasting, document AI, email automation)
  - RAG systems — your documents, your knowledge base, your AI
  - AI chatbots for customers and internal teams
  - AI-to-Odoo integrations: pipe AI outputs into your workflows
  - All built on your data — no generic black boxes

**CTA:** (S2) `See our AI work` → /services#ai

### 10. How we work (S1)
**Purpose:** Reduce buying anxiety. Show the process is calm and professional.

**Layout:** Horizontal 4-step timeline (vertical on mobile).

**Steps:**
1. **Discover** — Free 45-min consultation. We map your processes, listen, and tell you honestly if Odoo fits.
2. **Design** — Fixed-scope analysis with a real workshop. You leave with a written plan, a timeline, and a number.
3. **Build** — Senior consultants implement, configure, and integrate. Weekly demos. No black box.
4. **Live & grow** — Go-live with hypercare, then ongoing support and quarterly check-ins as you grow.

**Animation (S1):** SVG connector line draws left-to-right via GSAP `drawSVG` as you scroll. Each step icon pulses (scale 1 → 1.15 → 1, amber glow) as the line reaches it. Step labels fade+slide up 16px into view on the same trigger.

### 11. Pricing teaser (S1)
**Purpose:** Address the "is this affordable?" question without making the homepage a pricing page.

**Layout:** One-line bold statement + two pills.

**Copy:**
- H2: **Transparent pricing.**
- Sub: Our Standard package begins at **€15 per user per month**, fully Slovenian-compliant, no setup fee. Enterprise implementations are scoped after our free consultation.
- Pills: `See full pricing` (S2) · `Book a consultation`

(Stage 2: this becomes a richer section linking to a full /pricing page.)

### 12. Final CTA (S1)
**Purpose:** Last chance to convert. Strong. Plain.

**Layout:** Centered, generous padding, full-width band with subtle purple gradient background.

**Copy:**
- H2: **Let's talk about your business.**
- Sub: 45 minutes, free, no slide deck. We'll listen, ask hard questions, and tell you whether we're the right fit — ERP, AI, or both.
- Primary CTA: `Book your free consultation` →
- Secondary, small: Or email us at info@implementor.si

### 13. Footer (S1)
- Three columns: Services (links) · Company (About, Clients, Contact, Careers later) · Get in touch (email, phone, address, LinkedIn)
- Bottom row: © Implementor d.o.o. · Odoo Silver Partner badge (links to Odoo partner directory) · Privacy · Terms · Slovenian/English toggle (Stage 3)
- **Odoo partner directory link in footer:** The Silver Partner badge in the bottom row links to the official Odoo partner profile (`rel="noopener"`, no `nofollow`). Update URL after company rename. Current: `https://www.odoo.com/sl_SI/partners/rounded-square-doo-17408392?country_id=192`

---

## Open questions
- [ ] Number of trust-strip logos (3 confirmed clients + how many extras?)
- [ ] Hero secondary CTA destination — /clients (current proposal) or /services
- [ ] AI spotlight visual — diagram showing LLM → RAG → Odoo data, or abstract graphic?

## Resolved
- [x] H1: "Odoo, done properly. For Slovenia." (italic on "properly")
- [x] Hero sub: outcome-first ("automate operations, connect teams, get off spreadsheets")
- [x] Service tracks: Standard / Enterprise
- [x] Eyebrow: "Business automation & AI · Odoo Silver Partner · Slovenia"

## Build checklist (S1)
- [ ] Page route in Laravel + Inertia
- [ ] `theme.ts` — easing curves, spring configs, stagger values, all animation constants
- [ ] WebGL noise shader component (hero background, pauses on hidden tab, CSS gradient fallback on mobile)
- [ ] Cipher/scramble text composable (`useScrambleText`) — homepage only
- [ ] Magnetic button composable (`useMagneticButton`) — applied to all primary CTAs sitewide
- [ ] Page transition setup — Inertia router events → amber top bar + fade/slide
- [ ] Hero component (with WebGL + scramble + staggered entrance)
- [ ] Trust strip component (reusable, logo desaturate/saturate on hover)
- [ ] Two-paths cards component (Standard / Enterprise, split-screen GSAP ScrollTrigger)
- [ ] Flagship clients cards component (clip-path reveal + 3D tilt)
- [ ] Bento grid services component (8 tiles, spring stagger entrance + 3D hover tilt)
- [ ] Localization spotlight section
- [ ] AI spotlight section
- [ ] How-we-work timeline (SVG drawSVG + step pulse animations)
- [ ] Pricing teaser (Standard from €15, Enterprise scoped)
- [ ] Final CTA band
- [ ] Footer component
- [ ] `prefers-reduced-motion` guard — all animation composables check this before running
- [ ] Open Graph image for homepage
- [ ] Lighthouse pass ≥ 95 (WebGL shader must not block LCP)
