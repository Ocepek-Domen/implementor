# plan-contact.md — Contact

## Goal & primary CTA
**Goal:** Convert intent into a booked consultation. Reduce friction. Look serious. Set expectations for what happens next.

**Primary CTA:** Submit the consultation form
**Secondary CTAs:** Email directly · phone · LinkedIn

## Persona served
Both. Form is short, but a single question routes them.

## SEO
- **Title:** Contact Implementor — Book a free Odoo consultation
- **Meta description:** Book a free 45-minute consultation with Implementor's senior Odoo team. We listen first, scope second. No pitch deck.
- **Schema:** `ContactPage`, `Organization`, `LocalBusiness`

---

## Section-by-section breakdown

### 1. Page hero (S1)
- Eyebrow: `Contact`
- H1: **Let's talk about your Odoo project.**
- Sub: A free 45-minute consultation with a senior consultant. We'll listen to your processes, ask hard questions, and tell you honestly whether we're a fit.

### 2. The form (S1) — main column
**Layout:** Single-column form, generous spacing, ~480px wide. To the right (on desktop only): a sticky "what happens next" sidebar (see §3).

**Fields:**
1. Your name *
2. Company name *
3. Work email *
4. Phone (optional)
5. **Company size** * — radio:
   - 1–10 people
   - 11–50 people
   - 51–200 people
   - 200+ people
   *(This silently routes the lead internally: smaller sizes get matched to the Starter package response, larger sizes get our calendar link. The applicant never sees a different brand or external link — every response is from Implementor.)*
6. **What are you looking to do?** * — radio:
   - Start fresh on Odoo
   - Migrate from another ERP
   - Get help with an existing Odoo
   - Just exploring
7. **Tell us about your business** — open textarea (optional, encourage 2–3 sentences)
8. Privacy consent checkbox (GDPR compliance)
9. **Submit** button: "Send & book a slot →"

**On submit:**
- Form validation client-side first, server-side via Laravel rules
- Success state replaces the form: a confirmation message ("Thanks — we'll get back within 1 business day") + a Cal.com or our own calendar link to book directly
- Email notification to the team via Laravel mail
- Lead saved to DB for follow-up
- (S2) Optional auto-email to the lead with a tailored response based on company size and intent

### 3. "What happens next" sidebar (S1)
**Purpose:** Reduce form anxiety. Set expectations.

**Layout:** A small card next to the form on desktop, below the form on mobile.

**Content:**
- **Step 1.** You send the form.
- **Step 2.** We reply within 1 business day with a calendar link or a short email back.
- **Step 3.** 45-minute call with a senior consultant — your processes, our questions.
- **Step 4.** A one-page recommendation in your inbox. No pitch deck. No commitment.

### 4. Direct contact details (S1)
**Purpose:** Some people don't fill forms. Give them an obvious alternative.

**Layout:** Three small cards in a row (stack on mobile).

- 📧 **Email** — hello@implementor.si
- 📞 **Phone** — +386 [number]
- 💼 **LinkedIn** — link to company page

### 5. Office / map (S1)
- Address (same as About page)
- Embedded map (Leaflet/OpenStreetMap)
- "Visiting? Book ahead — we'll have coffee ready."

### 6. FAQ (S1, short)
**Purpose:** Pre-empt the most common pre-call questions.

Accordion, 4–5 questions.

- Is the consultation really free?
- What should I prepare for the call?
- What if we're already on Odoo with another partner?
- How fast can you start?
- Do you sign NDAs?

### 7. Trust footer (S1)
Small reminder of credentials right above the page footer.
- Odoo Silver Partner badge
- "Senior, certified Odoo team"
- "Clients including Ilirika, NN Saunas, Mobistekla"

---

## Form-handling technical notes

- Laravel form request validation
- CSRF token (handled by Inertia)
- Honeypot field for bot defence (hidden input named e.g. `website_url`)
- Rate-limit submissions per IP (Laravel's built-in middleware)
- Spam check on the textarea (simple link-count heuristic, no third-party)
- Store full submission in DB with timestamp + IP for traceability
- Send notification email to a configurable inbox (env-driven)
- (S2) Webhook to Slack or email digest

---

## Open questions
- [ ] Calendar tool — Cal.com, custom (build a slot picker in Laravel), or just "we'll email you a slot"?
  - Recommendation: Stage 1 = no calendar widget, just "we reply within 1 business day with times". Stage 2 = Cal.com embed.
- [ ] Final phone number to display
- [ ] Final office address — full display or "by appointment"?
- [ ] Whether the form has a "How did you hear about us?" field (useful but extends form)
- [ ] Whether to add a file upload (process docs, existing system info) — could be Stage 2

## Build checklist (S1)
- [ ] Page route + Inertia view
- [ ] Form Vue component (with all fields above)
- [ ] Laravel form request + validation
- [ ] Database migration for `consultation_requests` table
- [ ] Mailable for team notification
- [ ] Honeypot + rate limiting
- [ ] Success state UI (replaces form on submit)
- [ ] Sticky sidebar component
- [ ] Direct contact cards
- [ ] Embedded map
- [ ] FAQ accordion (reuse component from Services)
- [ ] Trust footer
- [ ] OG image for Contact
