# Implementor.si — Website Master Plan

> Working document. Each page has its own `plan-<page>.md`. This file is the source of truth for positioning, brand, IA, tech, and stage scope. Update it as decisions land.

---

## 1. Project overview

| | |
|---|---|
| **Company** | Implementor d.o.o. |
| **Domain** | implementor.si |
| **What we are** | Slovenian Odoo Silver Partner — Odoo integrators & developers |
| **Starter package pricing** | From €15 per user per month |
| **Site goal** | Become the most trusted, modern-looking Odoo partner option for Slovenian companies — from small teams to over 100 employees |
| **Primary CTA** | Book a free consultation call |
| **Initial language** | English only (Stage 1) |
| **Later languages** | Slovenian (Stage 3), then more |

> Note on podjetje.app: this is a separate product/site that exists independently. **implementor.si does not link to it, mention it, or co-brand with it.** Treat them as fully separate online presences for the purposes of this plan.

---

## 2. Positioning & differentiation

### One-line positioning
**"Slovenia's modern business automation partner — Odoo ERP + AI systems, senior team, our own Slovenian localization, from €15 per user per month."**

### Why this works
The Slovenian Odoo market is dominated by two older players (Hermes, Editor) and a few mid-tier ones. They all look the same, all use Odoo's own CMS, and all sell on "we've been around longest." Their sites feel like 2018. None of them lead with AI.

Implementor wins on a different axis: **modern, senior, accessible, and genuinely AI-capable**. Not "biggest", not "oldest" — **best craft, fair price, and a team that actually builds AI**.

### Differentiators to lead with
1. **Business automation, not just ERP** — we lead with outcomes (automate operations, connect teams, get off spreadsheets), then introduce Odoo and AI as the platform. Visitors who don't know Odoo still immediately understand the value.
2. **AI-powered implementations and standalone AI systems** — AI features built into Odoo (forecasting, document AI, smart automation) + standalone RAG systems, AI chatbots, and AI-Odoo integrations. No other Slovenian Odoo partner leads with this.
3. **Our own Slovenian localization & fiscalization** — production-grade, in-house, no third-party dependency. (Note: we say "our own" — we do not get into a public fight with Editor over who "leads" the localization. We just demonstrate ours works and is shipped.)
4. **Craft consultancy model** — small senior team, only Odoo-certified experts on projects, no junior offload. Every client gets a senior consultant.
5. **Transparent, accessible pricing** — our Standard package is **from €15 per user per month**. Most competitors quote opaque project numbers only. We publish a starting point so SMBs know they can afford us.
6. **Three flagship clients across the entire ERP buyer spectrum** — Ilirika (regulated finance, enterprise), NN Saunas (manufacturing + export across 5+ countries), Mobistekla (services + custom software + AI). One partner, three very different industries.

### Things we deliberately don't claim
- We don't claim "largest", "first", "longest", or "newest" — we'd lose those fights or sound like everyone else.
- We don't position around Odoo version numbers (v17/v18/v19) anywhere on the site. Internally we are certified on the current version; publicly we say "certified Odoo experts."
- We don't claim to be the "main developer" of Slovenian localization — Editor publicly claims that. We claim **ours**, not **the**.
- We don't list reference count as a headline metric (15 is the real number; competitors have 250–500). Instead we lead with named flagship clients and quality of work.
- We don't say "3 years" or "3 experts" as a hero stat. We mention "founded 2023" once in About; we present certified experts on the team page.
- **We do not link to or position podjetje.app on implementor.si.** podjetje.app continues to exist as its own product/site, but implementor.si is the company site only. No outbound links, no co-branding, no "our product" section.

### Phrases we use
- "Senior team. No handoffs."
- "Slovenian-ready out of the box."
- "From €15 per user per month."
- "From small teams to over 100 employees."
- "Business automation and AI, built on Odoo."
- "Your data. Your AI. Your advantage."

---

## 3. Target audience

Two primary personas, both Slovenian-based decision-makers:

### Persona A — SMB owner / operator (5–50 employees)
- Currently on spreadsheets, Minimax, or an outgrown accounting tool
- Wants quick wins, low monthly cost, Slovenian compliance handled
- Decision-maker: founder or finance lead
- Decision time: weeks
- → **Funnel them toward our starter package (from €15/user/month)**

### Persona B — Mid-market & corporate (50 to over 100 employees)
- Currently on legacy ERP (Pantheon, SAP B1, custom) or fragmented stack
- Wants integration, manufacturing/inventory depth, multi-company, custom workflows
- Decision-makers: CFO, COO, IT lead — committee
- Decision time: months
- → **Funnel them toward custom Odoo implementation / consultation call**

The whole site must serve both without feeling split-personality. Solution: a clear "two paths" choice in the hero or services section — but both paths are Implementor offerings (starter package vs custom implementation). No external links, no separate brands.

---

## 4. Brand & visual identity

### Tone of voice
- **Craft consultancy** — confident, plain-spoken, senior. Not corporate-stiff, not startup-cute.
- Short sentences. Real verbs. No "leverage", "synergize", "best-in-class".
- We sound like a senior consultant talking to another adult. Specific, not hedged.

### Color system
- **Primary: Odoo purple** — `#714B67` (Odoo's official primary). Use sparingly for accents and CTAs.
- **Secondary purple (hover/highlight)** — `#875A7B` (Odoo's lighter shade).
- **Backgrounds:**
  - Light mode: warm off-white `#FAFAF7` with deep purple-black text `#1A0F1C`
  - Dark mode: deep purple-black `#0F0A12` with warm off-white text `#F5F2EF`
- **Accent:** a single complementary warm color, TBD — leaning toward soft amber/gold for "highlight" badges, certifications, and stat callouts.
- **Glassmorphism:** translucent purple-tinted panels for hero & feature cards, low-opacity gradients (Stage 2 visual upgrade).

### Typography
- **Display / headlines:** a confident geometric or modern serif (proposed: **Instrument Serif** or **General Sans Display**). Big, generous, occasionally italic for tone.
- **Body:** a clean modern sans (proposed: **Inter** or **General Sans**). High legibility, multilingual coverage for later Slovenian/German.
- **Mono:** **JetBrains Mono** for code, technical chips, and stat numbers — gives a technical-confident edge.

### Logo
- Use template placeholder for Stage 1. Real logo work happens in parallel; swap in before public launch.

### Imagery strategy
- **Stage 1:** template photography + abstract illustrations (purple gradients, geometric shapes).
- **Stage 2:** plan a half-day shoot — real team photos, real laptop screens, real meeting moments. Stock photography is the most visible tell that a B2B site is generic.
- **Client logos:** request high-res SVG from Ilirika, NN Saunas, Mobistekla. Until then, use grayscale placeholder marks.

### Dark/light mode
Toggle in header. Default: respect system preference. Both modes are first-class — both must be designed, not derived.

---

## 5. Information architecture

### Stage 1 — MVP (build now)
| Page | File | Purpose |
|---|---|---|
| Home | `plan-home.md` | Position, prove, route |
| Services | `plan-services.md` | What we do, two paths (Starter vs Custom) |
| Clients | `plan-clients.md` | Case studies: Ilirika, NN Saunas, Mobistekla |
| About | `plan-about.md` | Team, Silver Partner, certifications, story |
| Contact | `plan-contact.md` | Book free consultation, alternate channels |

### Stage 2 — depth (build after MVP is live)
- **Industries** — manufacturing, finance, retail/services, wholesale (one page each or one combined page with anchors)
- **Odoo Apps overview** — what each Odoo module does and how we use it
- **Pricing** — public packages with "from €X/user/month", FAQ
- **Resources / Blog** — long-form content, GEO-optimized for AI search ("best Odoo partner Slovenia", "Slovenian Odoo localization")

### Stage 3 — moat & polish
- **Slovenian Localization** — its own deep page with technical detail (fiscalization, e-invoicing, FURS integration, chart of accounts). This is the SEO + credibility moat.
- **ROI Calculator** — interactive tool, big GEO + lead magnet
- **Slovenian translation** of all pages
- **Animation pass** — medium ambition (see §9)
- **German translation** (optional, for cross-border)

---

## 6. Tech stack

| Layer | Choice |
|---|---|
| **Backend** | Laravel 13 |
| **Frontend bridge** | Inertia.js |
| **Frontend framework** | Vue 3 (Composition API, `<script setup>`) |
| **Styling** | Tailwind CSS v4 |
| **Animation** | GSAP + ScrollTrigger (scroll sequences, timeline draw, split-screen), Motion for Vue v11 (component-level), WebGL noise shader (hero background) |
| **Forms / lead capture** | Native Laravel form → email + DB record (no Calendly, no third-party) |
| **CMS / content** | Laravel admin for blog & case studies (Stage 2+). Stage 1 = hardcoded Vue components for stability and speed. |
| **Hosting** | TBD — recommend a single VPS with Laravel Forge, or Vercel-style for static parts. Open question. |
| **Analytics** | Plausible (privacy-friendly, EU-hosted) — no GA. |
| **Fonts** | Self-hosted woff2 for performance & GDPR. |

### Conventions
- Mobile-first. Designs are drawn at 375px and 1440px; everything in between flexes.
- Components live in `resources/js/components/`.
- Page-level Vue files in `resources/js/Pages/`.
- Tailwind tokens defined in `tailwind.config.js` — colors, spacing, type scale all driven from tokens. Never hardcode hex outside config.
- A `theme.ts` file holds animation timing curves, easing functions, and stagger values so all animation work is consistent.

---

## 7. Multi-stage roadmap

### Stage 1 — Foundation (MVP launch)
**Goal:** Launch implementor.si as the company-facing site. Look modern, load fast, capture leads, present three flagship clients.

- [ ] All five MVP pages built in English
- [ ] Light + dark mode both fully designed
- [ ] Mobile + desktop responsive
- [ ] Bento grid layouts for services & home
- [ ] Full animation pass (see §9) — complex animations are Stage 1, not deferred
- [ ] Real Odoo Silver Partner badge
- [ ] Template logo (placeholder)
- [ ] Template photography (placeholder)
- [ ] Three client case study pages with placeholder copy approved by clients
- [ ] "Book a free consultation" form working end-to-end
- [ ] SEO basics: meta tags, sitemap, schema.org/Organization markup
- [ ] Plausible analytics
- [ ] Performance budget: Lighthouse ≥ 95 on every page

### Stage 2 — Depth & content
- [ ] Industries pages
- [ ] Odoo Apps overview
- [ ] Pricing page with public tiers
- [ ] Blog / Resources with first 5–10 posts targeted at GEO (AI search visibility)
- [ ] Real photography shoot scheduled and integrated
- [ ] Real logo
- [ ] Slide-in CTAs based on scroll depth
- [ ] Slovenian Localization spotlight page (light version)

### Stage 3 — Moat, polish, and localisation
- [ ] Full Slovenian Localization deep page
- [ ] ROI Calculator (interactive)
- [ ] Slovenian translation
- [ ] German translation (optional)
- [ ] Final accessibility audit (WCAG 2.2 AA)

---

## 8. Design system foundations (to be expanded)

Detailed in a separate `plan-design-system.md` later. High-level for now:

- **Spacing scale:** 4, 8, 12, 16, 24, 32, 48, 64, 96, 128, 192 (px)
- **Border radius:** 8 (small), 16 (cards), 24 (hero panels), 9999 (pills)
- **Shadows:** very subtle in light mode, glow-based in dark mode (purple-tinted)
- **Components needed Stage 1:**
  - Button (primary, secondary, ghost, sizes sm/md/lg)
  - Card (default, bento, case-study)
  - Stat block (number + label)
  - Badge (Silver Partner, Certified Odoo Expert, etc.)
  - Logo strip (client logos)
  - Section header (eyebrow + h2 + sub)
  - Quote / testimonial block
  - Form (input, textarea, submit, success state)
  - Nav (sticky, with theme toggle)
  - Footer

---

## 9. Animation principles

Animations are **Stage 1** — complex and modern from launch. Not deferred polish.

### Core rules
- **Earn the motion.** Every animation answers a question or rewards an action. Decoration for its own sake is cut.
- **Fast.** 150–250ms for micro-interactions, 400–600ms for scroll reveals, 800–1200ms for signature moments.
- **Spring physics over linear.** Use spring easing with slight overshoot wherever something enters or settles. `cubic-bezier(0.22, 1, 0.36, 1)` for entries, `cubic-bezier(0.34, 1.56, 0.64, 1)` for spring (slight bounce).
- **Respect prefers-reduced-motion.** All animations fall back to instant/opacity-only when reduced motion is preferred.
- **Stagger is everything.** Lists, grids, and card rows always stagger by 50–80ms per item. Never animate a group as one block.

### Ambition level
Complex and modern — above Linear/Vercel, below Apple/Stripe. Every page has at least one moment that makes a first-time visitor pause.

### Tech
| Purpose | Tool |
|---|---|
| Scroll sequences, timeline draw, split-screen | GSAP + ScrollTrigger |
| Component enter/exit, page transitions | Motion for Vue v11 |
| Hero WebGL noise background | Raw WebGL or OGL (lightweight) |
| Simple scroll-driven parallax | Native CSS `animation-timeline: scroll()` |
| Magnetic buttons, spring physics | GSAP or custom `requestAnimationFrame` loop |

### Confirmed animations — Homepage (S1)

**Hero**
- **WebGL noise background** — slowly drifting noise texture in purple/amber hues. Reacts subtly to cursor position (±15px parallax on the noise field). Runs at 60fps, pauses when tab is hidden.
- **Cipher/scramble text reveal** — on page load, H1 characters cycle through random glyphs at ~30fps before resolving to real text. Duration: 600ms total, stagger per word. Homepage only.
- **Hero elements stagger in** — eyebrow → H1 → sub → CTAs → trust strip, each with 80ms offset and spring entry (translateY 24px → 0, opacity 0 → 1).

**Two paths section**
- **Vertical split reveal** — as the section enters the viewport, the two cards animate from the center outward: left card slides left, right card slides right, revealing both simultaneously. A thin amber line briefly appears at the split point before disappearing. GSAP ScrollTrigger, pinned section.

**Bento grid**
- **Spring-physics stagger entrance** — each tile enters with `translateY: 40px → 0, scale: 0.96 → 1, opacity: 0 → 1`, spring easing, 60ms stagger between tiles.
- **3D perspective tilt on hover** — card rotates up to 8° toward cursor using `perspective(800px) rotateX() rotateY()`. Shadow shifts to match tilt direction. Spring physics on entry and exit (no snapping).

**Flagship client cards**
- Same 3D tilt hover as bento.
- On scroll in: clip-path reveal — `inset(100% 0 0 0)` → `inset(0% 0 0 0)`, staggered per card.

**Stat numbers (trust strip, case studies)**
- Count from 0 to final value with spring overshoot (briefly exceeds target by ~3%, settles back). Triggered on scroll into view.

**How we work timeline**
- SVG connector line draws from left to right as you scroll through the section (GSAP `drawSVG`). Each step icon pulses (scale 1 → 1.15 → 1) as the line reaches it.

**Primary CTA buttons (sitewide)**
- **Magnetic pull** — within 80px radius, button shifts toward cursor (max ±12px on X and Y). Label text moves independently with 30ms lag. On leave, spring back to origin.
- **Click ripple** — radial gradient expands from click point, fades out in 300ms.

**Page transitions (sitewide)**
- Thin amber progress bar sweeps across the top on Inertia navigation (like Linear's router indicator).
- Page content fades out (150ms) and new content fades + slides up 16px (200ms).

### Mobile animation behaviour
- WebGL noise: replaced with static CSS gradient mesh on mobile (performance).
- Split reveal: stacks vertically, each card slides up individually instead.
- 3D tilt: disabled on touch devices (no hover).
- Magnetic buttons: disabled on touch.
- All other animations: run at reduced distance (half the translateY values).

---

## 10. Conventions for per-page plan files

Each `plan-<page>.md` follows this structure so they're easy to scan:

1. **Goal & primary CTA** — one sentence each
2. **Persona served** — A, B, or both
3. **SEO** — title, meta description, target keywords
4. **Section-by-section breakdown** — for each section: purpose, content outline, layout notes, stage tag (S1/S2/S3), animation notes
5. **Copy outline** — draft English copy, marked as placeholder
6. **Open questions** — things to decide before build
7. **Build checklist** — concrete tickets

---

## 11. Open questions still to resolve

- [ ] Hosting choice (VPS + Forge vs. managed)
- [ ] Final accent color beyond Odoo purple
- [ ] Final display font choice (Instrument Serif vs General Sans Display vs custom)
- [ ] Final naming for the two service tracks (Starter vs Custom? Standard vs Tailored? Package vs Project?)
- [ ] Whether the consultation form asks for company size to internally route SMB vs enterprise track (recommended yes)
- [ ] Real names + photos + titles of the certified Odoo experts (for About page) — placeholders confirmed for now

---

## 12. Master build checklist (Stage 1)

Tracked as a top-level overview. Page-specific checklists live in each `plan-<page>.md`.

**Foundation**
- [ ] Domain pointed, SSL, basic Laravel app deployed
- [ ] Tailwind config with color tokens, type scale, spacing scale
- [ ] Dark/light mode toggle working with system preference detection
- [ ] Base layout component (header + footer + main slot)
- [ ] Design system primitives (button, card, badge, input)

**Pages (in build order)**
- [ ] Home
- [ ] Services
- [ ] Clients (index + 3 case study pages)
- [ ] About
- [ ] Contact

**Polish**
- [ ] Forms wired to Laravel backend
- [ ] Email notifications on lead submission
- [ ] Sitemap.xml + robots.txt
- [ ] Open Graph images for each page
- [ ] Favicon set (light & dark variants)
- [ ] 404 page
- [ ] Cookie banner (minimal, since Plausible doesn't need consent)

**Pre-launch**
- [ ] Cross-browser test (Chrome, Safari, Firefox)
- [ ] Mobile device test (real iPhone, real Android)
- [ ] Lighthouse audit ≥ 95 on every page
- [ ] Get sign-off from Ilirika, NN Saunas, Mobistekla on their case study pages
