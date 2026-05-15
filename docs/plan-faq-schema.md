# plan-faq-schema.md — FAQ Structured Data & Schema Strategy

## Critical context — Google FAQPage deprecation (May 2026)

**Google removed FAQ rich results from Search on May 7, 2026. Full removal by August 2026.**

FAQ rich results (the expandable Q&A boxes that used to appear directly in SERPs) no longer appear for commercial/informational sites. Google now only shows them for government and established health websites.

This does NOT mean FAQPage schema is useless — it means the strategy shifts:

| Engine | FAQPage schema value |
|---|---|
| Google organic | No rich result, but still crawled and understood. Helps Google parse content structure. |
| Google AI Overviews | Still cited — AI Overviews pull from structured, clearly-answered content. FAQPage signals this clearly. |
| Perplexity | Actively uses structured Q&A content for citations. High value. |
| ChatGPT / Bing Chat | Reads FAQPage schema. Frequently cites concise Q&A pages. |
| Bing organic | Still shows FAQ rich results as of 2026. |
| Voice search | FAQPage remains the primary signal for "How do I…" / "What is…" voice answers. |

**Conclusion:** Implement FAQPage schema on all FAQ sections. The audience is AI search engines and Bing, not Google rich results. This matters because GEO (Generative Engine Optimization) is an increasingly important traffic channel in 2026 — Perplexity and AI Overviews already drive measurable referral traffic for B2B SaaS and consultancy sites.

---

## Which pages on implementor.si have FAQ sections

| Page | FAQ section | Priority |
|---|---|---|
| `/services` | 9+ questions — services, pricing, localization, AI | **High** — most search-intent queries land here |
| `/contact` | 5 questions — pre-call anxiety, NDA, timeline | **High** — bottom-of-funnel, AI engines frequently cite |
| `/` (homepage) | No dedicated FAQ, but "how we work" answers implicit questions | **Low** — implement only if adding a visible FAQ block |
| `/clients/*` | No FAQ | Skip |
| `/about` | No FAQ | Skip |

---

## Implementation: JSON-LD structure

Place a `<script type="application/ld+json">` block in the `<head>` of each page that has a FAQ section. In Vue/Inertia, inject via a composable into the `<Head>` component.

### Full JSON-LD template

```json
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "What does Slovenian localization actually cover?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "<p>Our Slovenian localization for Odoo includes the Slovenian chart of accounts, FURS fiscalization (certified), VAT reporting including reverse charge and EU triangulation, e-SLOG e-invoicing, bank statement parsers for NLB, NKBM, SKB and other Slovenian banks, and FURS reporting forms (DDV-O, REK). We build and maintain this ourselves — it is updated with every Odoo release and every change to Slovenian tax law.</p>"
      }
    },
    {
      "@type": "Question",
      "name": "How long does an Odoo implementation take?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "<p>A Standard package implementation typically goes live in 4–8 weeks. Enterprise implementations with custom modules, integrations, and data migrations range from 2–6 months depending on scope. We define the exact timeline in our written Statement of Work after the design phase.</p>"
      }
    }
  ]
}
```

### Vue/Inertia implementation pattern

Create a composable `useFaqSchema.ts` that accepts an array of `{ question, answer }` objects and injects the JSON-LD into `useHead()`:

```ts
// resources/js/composables/useFaqSchema.ts
import { useHead } from '@inertiajs/vue3'

interface FaqItem {
  question: string
  answer: string // HTML allowed: <p>, <ul>, <li>, <a>, <strong>, <em>
}

export function useFaqSchema(items: FaqItem[]) {
  useHead({
    script: [
      {
        type: 'application/ld+json',
        children: JSON.stringify({
          '@context': 'https://schema.org',
          '@type': 'FAQPage',
          mainEntity: items.map(({ question, answer }) => ({
            '@type': 'Question',
            name: question,
            acceptedAnswer: {
              '@type': 'Answer',
              text: answer,
            },
          })),
        }),
      },
    ],
  })
}
```

Call in the page component:

```ts
// In <script setup> of Services.vue
useFaqSchema([
  {
    question: 'What does Slovenian localization actually cover?',
    answer: '<p>Our Slovenian localization...</p>',
  },
  // ...
])
```

---

## Content rules for FAQ answers (for GEO/AI engine citation)

These rules are what make AI engines actually cite your answers, not just parse them:

1. **Answer the question in the first sentence.** Do not bury the answer. AI engines extract the first 1–2 sentences for citations.
2. **Be specific, not marketing-hedged.** "4–8 weeks" is citable. "Depends on your needs" is not.
3. **Include entity names.** Mention "Odoo", "Slovenia", "FURS", "Implementor" — not just pronouns. Entities help AI engines understand who is answering and why they're authoritative.
4. **No promotional language in answers.** "We are the best…" will not be cited. "We build and maintain our own Slovenian localization" will.
5. **Keep answers under 300 words.** Perplexity and AI Overviews prefer concise, direct answers.
6. **HTML is allowed but keep it clean.** `<p>`, `<ul>`, `<li>`, `<strong>` are fine. No `<div>` nesting, no inline styles.

---

## Recommended FAQ questions per page

### `/services` — 10 questions

**Odoo & implementation**
1. How long does an Odoo implementation take?
2. What if we already have an ERP — can we migrate from Pantheon, SAP, or a custom system?
3. Do you support both Odoo Community and Odoo Enterprise?
4. Can we self-host Odoo or do we have to use Odoo.sh?
5. What happens after go-live — is there ongoing support?

**Slovenian localization**
6. What does Slovenian localization actually cover?
7. Is FURS fiscalization included in your Standard package?

**AI**
8. Do you build AI systems independently of Odoo, or only as part of Odoo projects?
9. What LLMs do you work with (OpenAI, Claude, local models)?
10. Is our business data safe when you build a RAG system for us?

**Pricing**
11. How does pricing work for Enterprise implementations?
12. Can we keep our current accountant when we move to Odoo?

### `/contact` — 5 questions

1. Is the consultation really free with no commitment?
2. What should I prepare before the call?
3. What if we're already working with another Odoo partner?
4. How fast can you start after the initial call?
5. Do you sign NDAs before we share our business details?

---

## De-duplication rule

Google's documentation (even though rich results are gone) and AI engines penalise duplicate content. **If the same question appears on multiple pages, mark up only one instance.** Recommendation:

- Localization questions → `/services` only
- Pricing questions → `/services` only
- Pre-call / logistics questions → `/contact` only
- Do not duplicate between pages

---

## Additional schema to implement alongside FAQPage

These are not FAQPage but are part of the same structured data pass:

| Schema type | Where | Purpose |
|---|---|---|
| `Organization` | All pages (global) | Company identity, logo, contact, sameAs links |
| `LocalBusiness` | `/contact`, `/about` | Local search signals — address, opening hours, phone |
| `Service` | `/services` (per service) | Each service offering as a structured entity |
| `Person` | `/about` (per team member) | E-E-A-T signal — named certified experts |
| `BreadcrumbList` | All inner pages | Navigation structure for search engines |
| `WebSite` | Homepage | Enables sitelinks search box potential |
| `Article` | Blog posts (Stage 2) | E-E-A-T, date signals, author attribution |

### `Organization` sameAs — critical for GEO

The `sameAs` property on Organization links your site to authoritative external profiles. AI engines use this to verify entity identity. Include:

```json
"sameAs": [
  "https://www.odoo.com/partners/[your-slug]",
  "https://www.linkedin.com/company/implementor",
  "https://www.ajpes.si/[company-registration]"
]
```

This is especially important after the company rename — update the Odoo partner URL in `sameAs` as soon as the new profile slug is live.

---

## Odoo partner directory page

The current partner profile URL:
`https://www.odoo.com/sl_SI/partners/rounded-square-doo-17408392?country_id=192`

**After rename:** the slug `rounded-square-doo-17408392` will change. Update the `sameAs` in the Organization schema immediately when the new profile URL is live.

**What the profile currently shows (verified):**
- Silver Partner badge
- 3 Certified v19 experts
- 12 client references across: finance, manufacturing, IT, health, wholesale, construction
- 100% customer retention rate
- Largest client: 100+ users
- Average client size: 8 users

**How to use this on the site:**
- Link to it from the About page certification section ("Verified on Odoo's official partner directory →")
- Link to it from the footer alongside the Silver Partner badge
- Include the URL in `sameAs` on the Organization schema
- Do not embed the profile iframe — just a clean outbound link with `rel="noopener"` (no `nofollow` — this is a legitimate trust signal you want to pass)

---

## Build checklist

- [ ] Create `useFaqSchema.ts` composable
- [ ] Implement on `/services` (10–12 questions)
- [ ] Implement on `/contact` (5 questions)
- [ ] Create global `useOrganizationSchema.ts` composable — injected in the root layout
- [ ] `Organization` schema: name, url, logo, contactPoint, address, sameAs (LinkedIn + Odoo partner directory + AJPES)
- [ ] `LocalBusiness` schema on `/contact` and `/about`
- [ ] `BreadcrumbList` on all inner pages
- [ ] `Service` schema on `/services` (one per service offering, or grouped)
- [ ] `Person` schema on `/about` for each team member with certifications
- [ ] `WebSite` schema on homepage
- [ ] Update `sameAs` Odoo partner URL when company rename is complete
- [ ] Validate all schemas with Google Rich Results Test
- [ ] Validate with Schema.org validator
- [ ] Monitor Bing Webmaster Tools for FAQ rich result impressions (Bing still shows them)
- [ ] Set up Perplexity citation monitoring (search brand name + key questions periodically)

---

## What NOT to do

- Do not implement FAQPage expecting Google rich results — they are gone as of May 2026.
- Do not use `QAPage` (for user-submitted answers) — not applicable here.
- Do not mark up the same question on multiple pages.
- Do not write promotional answers ("We are Slovenia's best Odoo partner") — they will not be cited by AI engines and may be penalised.
- Do not add FAQ schema to pages that don't have a visible FAQ section — Google's guidelines require the content to be visible on the page.
