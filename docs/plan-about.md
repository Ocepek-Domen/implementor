# plan-about.md — About

## Goal & primary CTA
**Goal:** Make the buyer trust the team. Show who we actually are, what we believe about Odoo work, and prove the certifications behind the claims. This is where the "craft consultancy" tone is strongest.

**Primary CTA:** Book a free consultation call
**Secondary CTA:** See our work → /clients

## Persona served
Both. Persona B reads About more carefully (they're committee-buying and need to defend the choice internally). Persona A skims for trust signals.

## SEO
- **Title:** About Implementor — Slovenia's Odoo Silver Partner team
- **Meta description:** Implementor is a Slovenian Odoo Silver Partner. Senior certified team, our own Slovenian localization, and a craft approach to Odoo implementations.
- **Keywords:** odoo partner ljubljana, odoo certified slovenia, implementor d.o.o.
- **Schema:** `Organization`, `Person` for each team member, `Place` for office address

---

## Section-by-section breakdown

### 1. Hero (S1)
- Eyebrow: `About`
- H1: **A small, senior Odoo team. By design.**
- Sub: We started Implementor because we believed Slovenian businesses deserved a modern, honest Odoo partner — not a black box, not a sales pipeline, not a junior factory. Three years in, we're a Silver Partner with a senior, certified team, our own Slovenian localization, and a client list that speaks for itself.

(*Mention "three years" once, here, as the user prefers. Avoid as a hero stat.*)

### 2. What we believe — manifesto strip (S1)
**Purpose:** This is where the "craft consultancy" tone sells the brand. Three to five short opinionated statements. Big type.

**Layout:** Three to five stacked statements, each a large sentence with subtle dividers. Strong typography, restrained visuals.

**Statements (draft — strong language is the point):**
1. **Seniors only on every project.** No junior offload. No "we'll teach them on your project."
2. **Slovenian compliance is our problem, not yours.** Our localization is ours. We update it. We own the bugs.
3. **Short engagements over long ones.** We'd rather ship a tight scope in 8 weeks than bill you for 18 months.
4. **Plain numbers, plain language.** You'll get fixed-price proposals you can read in five minutes and a partner who tells you when something won't work.

### 3. The team (S1, placeholder photos)
**Purpose:** Put faces to the work. Make it real.

**Layout:** Grid of team cards. Each card: photo, name, role, one-line bio, certifications badge row, LinkedIn link.

**Cards (placeholder — to be filled with real team members later):**
- **[Placeholder Name 1]** — Founder & Lead Consultant — Certified Odoo Expert · [bio TBD]
- **[Placeholder Name 2]** — Senior Odoo Consultant — Certified Odoo Expert · [bio TBD]
- **[Placeholder Name 3]** — Senior Odoo Developer — Certified Odoo Expert · [bio TBD]
- (Plus any other team members — designers, project managers, support — without the "Certified" tag)

**Notes:**
- Use template silhouette / illustrated avatars and placeholder names for Stage 1. Real names and photos arrive before public launch.
- Stage 2: real photos from the planned shoot.
- Each "Certified Odoo Expert" badge should match Odoo's official certification badge style. We never display the version number publicly.

### 4. Certifications & partnerships (S1)
**Purpose:** Concrete proof. Buyers will hover over each badge.

**Layout:** Logo + badge row, centered.
- Odoo Silver Partner (real badge)
- Odoo Certified Expert badge (one per certified team member — no version number displayed)
- Add later: any GDPR / ISO compliance certificates if applicable

Below the badges: a sentence about what each means.

### 5. Our story (S1)
**Purpose:** A short, honest origin paragraph. Not a "founded in" timeline.

**Copy outline (draft):**
> Implementor d.o.o. was founded in 2023 to do Odoo work the way we'd want it done if we were the client. After years of watching Slovenian companies pay for half-built localizations, juniors learning on the job, and ERP projects that ran for years without going live, we built a different kind of partner — small enough to care, certified enough to deliver, and Slovenian enough that compliance isn't an afterthought.
>
> Today, we work with Slovenian businesses from five-person teams running a Starter package to mid-market operations spanning four countries on a full custom Odoo implementation. We're a senior, certified team. We're a Silver Partner. And we ship our own Slovenian localization, which we maintain ourselves.
>
> We're not the biggest Odoo partner in Slovenia. We don't try to be. We're the one that does the work properly.

### 6. Where to find us (S1)
**Purpose:** Real address, real map. Trust signal.

**Layout:** Two-column. Left: address, email, phone, opening hours, embedded map. Right: short paragraph welcoming visitors.

**Content:**
- Implementor d.o.o.
- [Street address, Ljubljana]
- [Email] · [Phone]
- LinkedIn · GitHub (Stage 2)
- (Embedded map — Leaflet/OpenStreetMap, not Google, for GDPR)

### 7. Final CTA (S1)
Same reused band.
- H2: **Want to talk to one of us directly?**
- Sub: Every consultation is with a senior. No SDRs. No filtering.
- CTA: Book a free consultation

---

## Open questions
- [ ] Real founder + team member names, roles, bios — need from you before public launch
- [ ] Whether bios should be playful or strictly professional (matches craft-consultancy tone — leaning warm-professional)
- [ ] LinkedIn URLs for each team member
- [ ] Office address — public listing or "by appointment"?
- [ ] Whether to include a "we're hiring" link in Stage 1 or wait
- [ ] The "What we believe" manifesto — are the five statements above the right ones, or would you rephrase any?

## Build checklist (S1)
- [ ] Page route + Inertia view
- [ ] Hero
- [ ] Manifesto strip component (large-type sentence list, 4 statements)
- [ ] Team grid component (reusable card, with placeholder avatars + names)
- [ ] Certifications row component (Silver Partner + Certified Odoo Expert badges, no version numbers)
- [ ] Story copy block
- [ ] Embedded map (Leaflet)
- [ ] Final CTA band (reused)
- [ ] OG image for About
