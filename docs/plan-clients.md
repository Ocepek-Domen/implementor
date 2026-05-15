# plan-clients.md — Clients & Case Studies

## Goal & primary CTA
**Goal:** Prove range and depth. Show that three very different Slovenian businesses — finance, manufacturing, services — chose us. Each case study is a story, not a logo.

**Primary CTA:** Book a free consultation call
**Secondary CTA:** Read another case study (cross-link between cases)

## Persona served
Both. Persona A reads the Mobistekla case (relatable scale). Persona B reads Ilirika and NN Saunas (their scale).

## SEO
- Index: **Title:** Clients & Case Studies — Slovenian Odoo implementations | Implementor
- Each case page: **Title:** `[Client name] — [one-line outcome] | Implementor case study`
- Schema: `Article` per case, `Organization` reference to client
- Keywords: odoo case study slovenia, odoo manufacturing slovenia, odoo finance slovenia, odoo retail slovenia

---

## Page structure

This is actually 4 pages:
- `/clients` — index
- `/clients/ilirika`
- `/clients/nn-saunas`
- `/clients/mobistekla`

The case study pages share a template. Build the template once, fill three times.

---

## /clients — Index page

### 1. Hero (S1)
- Eyebrow: `Clients`
- H1: **Three Slovenian businesses. Three very different operations. One partner.**
- Sub: From regulated finance to export manufacturing to high-volume service operations — see how Odoo, done right, scales with the business.

### 2. Three flagship cards (S1)
Same component as homepage flagship clients, but with larger cards and longer descriptions. Each card links to the full case study.

### 3. (S2) More clients grid
Stage 2: when more case studies exist, a grid below the flagship three. For now, omit or use as "More clients (in good company)" logo block.

### 4. Final CTA band (S1)
Reused component.
- H2: **Want to be the next one?**
- Sub: We'll listen first. Pitch later, only if it fits.
- CTA: Book a free consultation

---

## Case study template (used by all three)

### Layout (top to bottom)
1. **Slim hero** — Client logo + name + industry + one-line outcome
2. **At-a-glance stats** — 3–4 key numbers in a row (employees, countries, units/transactions/whatever fits, year started with us)
3. **The challenge** — short paragraph + bullet list of specific problems
4. **What we built** — modules, integrations, customizations
5. **Pull-quote** — testimonial when available (placeholder for now, real quote later)
6. **Outcomes** — measurable wins, written as honest sentences not marketing fluff
7. **Tech stack used** — small chip row of Odoo modules used
8. **Related case studies** — cross-link to the other two
9. **CTA band** — book consultation

### Animation notes
- S1: nothing beyond hover.
- S3: stat numbers count up on scroll into view; pull-quote slides in from left; modules chips fade-up in sequence.

---

## /clients/ilirika — Case study

**Status:** Client has approved being displayed. Use the "displayed temporarily" note — final detailed content + real quotes added later.

### Slim hero
- Client: ILIRIKA d.d.
- Industry: Brokerage & corporate finance
- Outcome line: **One Odoo instance for a regulated, multi-country brokerage.**

### At-a-glance stats (placeholder, confirm with client)
- 25+ years of operations
- 4 countries: Slovenia, Croatia, Serbia, North Macedonia
- 50+ international markets accessed
- Multi-entity consolidation in Odoo

### The challenge
Ilirika is one of Slovenia's longest-standing brokerage houses, with subsidiaries across South-East Europe and clients trading on 50+ international exchanges. Their operational backbone had to handle:
- Strict regulated reporting requirements
- Multi-company consolidation across SI/HR/RS/MK
- High-volume client onboarding (KYC + AML workflows)
- Integration with regulated banking and clearing systems
- Slovenian fiscalization at full compliance

### What we built
- Odoo Enterprise, multi-company, multi-currency
- Our Slovenian localization across all four entities (with appropriate adaptations for HR/RS/MK)
- Custom CRM workflows for client onboarding
- Integrations with banking and reporting systems
- Document management and audit trails

### Quote (placeholder)
> *Placeholder quote — to be supplied by Ilirika. Currently displayed temporarily as approved by the client.*

### Outcomes
- One consolidated platform replacing fragmented per-entity systems
- Audit-ready financial reporting across four countries
- Faster client onboarding cycle
- (Specifics to be confirmed with the client)

### Tech stack chips
Odoo Enterprise · Accounting · CRM · Documents · Multi-company · Multi-currency · Slovenian Localization

---

## /clients/nn-saunas — Case study

**Status:** Client has approved being displayed.

### Slim hero
- Client: NN Saunas
- Industry: Premium sauna manufacturing & export
- Outcome line: **A manufacturer running production, multi-country distribution, and showroom partners on a single Odoo.**

### At-a-glance stats (placeholder, confirm with client)
- Founded 1993
- 2000+ saunas installed (2023 milestone)
- Showrooms in Austria, Germany, Belgium, Norway, USA
- Custom-built every unit

### The challenge
NN Saunas builds custom-configured saunas at scale — every order is unique, but every order also has to flow through the same production line, supplier network, and international distribution chain. Their existing setup was fragmented:
- Quotes and configurations managed in spreadsheets
- Production planning disconnected from sales
- Multi-country distributor relationships not centrally tracked
- Stock and component tracking across the factory floor
- No single view from quote → manufacturing → shipped to a Belgian showroom

### What we built
- Odoo Manufacturing (MRP) for the production floor
- Bills of Materials for configurable products
- Sales + CRM for the international dealer network
- Inventory across multiple warehouses
- Purchase workflows for component sourcing
- Slovenian localization for fiscal and tax compliance
- Integrations with the websites of partner showrooms (Stage 2 or current — confirm)

### Quote (placeholder)
> *Placeholder quote — to be supplied by NN Saunas. Currently displayed temporarily as approved by the client.*

### Outcomes
- A single system from configurator to shipping label
- Production planning that talks to sales orders
- Visibility into international dealer pipeline
- (Specifics to be confirmed with the client)

### Tech stack chips
Odoo Enterprise · Manufacturing · Inventory · Sales · CRM · Purchase · Multi-warehouse · Slovenian Localization

---

## /clients/mobistekla — Case study

**Status:** Client has approved being displayed.

### Slim hero
- Client: Mobistekla
- Industry: Mobile device repair (B2B + B2C)
- Outcome line: **From spreadsheets to a full service operations platform processing 10,000+ repairs a year.**

### At-a-glance stats (placeholder, confirm with client)
- 10+ years in mobile repair
- 22 mobile phone brands serviced
- 10,000+ repairs per year
- 80% of repairs completed within 24 hours
- Multiple Ljubljana pickup/drop-off points

### The challenge
Mobistekla had outgrown a spreadsheet-and-email operation. They needed:
- A repair ticket from intake to handover with status tracking
- Customer visibility into their device's status
- A technician workflow with parts, labour time, and per-repair reports
- Integration with multiple delivery carriers (DHL, DPD, UPS, Slovenian Post)
- B2B and B2C in the same system without confusion
- Built-in call-center workflow

### What we built
- Odoo Helpdesk + Inventory + Sales as the core
- Custom Odoo modules for repair tracking (ticket lifecycle, parts consumption, technician reports)
- Customer portal so customers track their own repair status
- Integrations with multiple delivery providers
- B2B pricing and account management alongside B2C flows
- Slovenian fiscalization for retail compliance

### Quote (placeholder)
> *Placeholder quote — to be supplied by Mobistekla. Currently displayed temporarily as approved by the client.*

### Outcomes
- 10,000+ repairs per year handled on a single system
- 80% completed within 24 hours, with the workflow that makes that possible
- Customers self-serve status checks, reducing inbound calls
- (Specifics to be confirmed with the client)

### Tech stack chips
Odoo Enterprise · Helpdesk · Inventory · Sales · Custom Modules · Customer Portal · Shipping Integrations · Slovenian Localization

---

## Open questions
- [ ] Real quotes from each client — we can ask in parallel with build
- [ ] Real photos — can we use client product photography, or stick to abstract visuals for now?
- [ ] Specific metrics each client is willing to publish (e.g. "X% faster month-end close")
- [ ] Whether to include the year each client started with us
- [ ] Whether each case page gets its own OG image (recommend yes for sharing)
- [ ] Mobistekla — confirm whether we built their custom tracking software end-to-end or only the Odoo side

## Build checklist (S1)
- [ ] /clients index page route + content
- [ ] Case study template Vue component (reusable, slots for stats, sections, quote)
- [ ] /clients/ilirika page (template + content)
- [ ] /clients/nn-saunas page (template + content)
- [ ] /clients/mobistekla page (template + content)
- [ ] "Displayed temporarily" subtle notice on each case page until final content lands
- [ ] Get sign-off email from each client on the published page
- [ ] OG image per case page
- [ ] Cross-link "related case studies" section
