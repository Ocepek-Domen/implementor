<script setup lang="ts">
import { Head } from '@inertiajs/vue3'
import AIDeepDive from '@/components/marketing/AIDeepDive.vue'
import BentoGrid from '@/components/marketing/BentoGrid.vue'
import FaqAccordion from '@/components/marketing/FaqAccordion.vue'
import FinalCTABand from '@/components/marketing/FinalCTABand.vue'
import HowWeWork from '@/components/marketing/HowWeWork.vue'
import IndustriesGrid from '@/components/marketing/IndustriesGrid.vue'
import LocalizationDeepDive from '@/components/marketing/LocalizationDeepDive.vue'
import TwoPaths from '@/components/marketing/TwoPaths.vue'
import type { BentoTile } from '@/components/marketing/BentoGrid.vue'
import type { FaqItem } from '@/components/marketing/FaqAccordion.vue'
import { useBreadcrumbSchema } from '@/composables/useBreadcrumbSchema'
import { useFaqSchema } from '@/composables/useFaqSchema'
import { useJsonLdSchema } from '@/composables/useJsonLdSchema'

const servicesTiles: BentoTile[] = [
    {
        title: 'Odoo Implementation',
        description: 'Discovery, configuration, data migration, training, and go-live. A complete implementation managed by our senior team from day one.',
        span: 2,
        iconHtml: `<rect x="3" y="3" width="7" height="7" rx="1.5" stroke-width="1.5"/><rect x="14" y="3" width="7" height="7" rx="1.5" stroke-width="1.5"/><rect x="3" y="14" width="7" height="7" rx="1.5" stroke-width="1.5"/><rect x="14" y="14" width="7" height="7" rx="1.5" stroke-width="1.5"/>`,
    },
    {
        title: 'Slovenian Localization & Fiscalization',
        description: 'Our own FURS-certified fiscalization, chart of accounts, e-SLOG, and VAT modules — built and maintained by us.',
        span: 1,
        iconHtml: `<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" stroke-width="1.5"/><path d="m9 12 2 2 4-4" stroke-width="1.5"/>`,
    },
    {
        title: 'Integrations',
        description: 'Connect Odoo to banks, payment providers, e-commerce platforms, logistics providers, and custom APIs.',
        span: 1,
        iconHtml: `<path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71" stroke-width="1.5"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71" stroke-width="1.5"/>`,
    },
    {
        title: 'Custom Module Development',
        description: 'Purpose-built Odoo modules that match your exact process — not workarounds, not compromises.',
        span: 1,
        iconHtml: `<polyline points="16 18 22 12 16 6" stroke-width="1.5"/><polyline points="8 6 2 12 8 18" stroke-width="1.5"/>`,
    },
    {
        title: 'Migrations from Legacy ERP',
        description: 'From Pantheon, SAP Business One, Microsoft Dynamics, or any custom system — full data integrity, tested before go-live.',
        span: 1,
        iconHtml: `<path d="M5 12h14" stroke-width="1.5"/><path d="m12 5 7 7-7 7" stroke-width="1.5"/>`,
    },
    {
        title: 'Multi-company & Multi-currency',
        description: 'Consolidated multi-entity reporting across subsidiaries, countries, and currencies in one Odoo instance.',
        span: 1,
        iconHtml: `<rect x="2" y="7" width="20" height="14" rx="2" stroke-width="1.5"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16" stroke-width="1.5"/>`,
    },
    {
        title: 'Manufacturing & Inventory',
        description: 'BOMs, work centres, MRP, multi-warehouse, barcoding, and real-time production tracking.',
        span: 1,
        iconHtml: `<path d="M12 2L2 7l10 5 10-5-10-5z" stroke-width="1.5"/><path d="M2 17l10 5 10-5" stroke-width="1.5"/><path d="M2 12l10 5 10-5" stroke-width="1.5"/>`,
    },
    {
        title: 'Support & Hypercare',
        description: 'Post go-live support packages with SLA guarantees, 30-day hypercare, and quarterly health checks.',
        span: 2,
        iconHtml: `<path d="M3 18v-6a9 9 0 0 1 18 0v6" stroke-width="1.5"/><path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3z" stroke-width="1.5"/><path d="M3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z" stroke-width="1.5"/>`,
    },
    {
        title: 'AI-Powered Odoo',
        description: 'AI features natively in Odoo: document processing, smart forecasting, email classification, and automated workflow triggers.',
        span: 2,
        iconHtml: `<path d="M9 3 10.5 7 14 8.5l-3.5 1.5L9 14 7.5 10 4 8.5 7.5 7z" stroke-width="1.5"/><path d="m18 1 .75 2.25L21 4l-2.25.75L18 7l-.75-2.25L15 4l2.25-.75z" stroke-width="1.5"/><path d="m18 17 .75 2.25L21 20l-2.25.75L18 23l-.75-2.25L15 20l2.25-.75z" stroke-width="1.5"/>`,
        aiStyle: true,
    },
    {
        title: 'RAG Systems',
        description: 'Custom knowledge bases that let your team query your own documents, manuals, and data with natural language.',
        span: 1,
        iconHtml: `<ellipse cx="12" cy="5" rx="9" ry="3" stroke-width="1.5"/><path d="M3 5v14c0 1.66 4.03 3 9 3s9-1.34 9-3V5" stroke-width="1.5"/><path d="M3 12c0 1.66 4.03 3 9 3s9-1.34 9-3" stroke-width="1.5"/>`,
        aiStyle: true,
    },
    {
        title: 'AI Chatbots',
        description: 'Customer-facing or internal assistants trained on your business content, processes, and Odoo data.',
        span: 1,
        iconHtml: `<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" stroke-width="1.5"/>`,
        aiStyle: true,
    },
    {
        title: 'AI-Odoo Integrations',
        description: 'Pipe AI model outputs directly into Odoo workflows. Connect Odoo structured data to LLMs and external AI systems.',
        span: 2,
        iconHtml: `<rect x="2" y="2" width="9" height="9" rx="1.5" stroke-width="1.5"/><rect x="13" y="2" width="9" height="9" rx="1.5" stroke-width="1.5"/><rect x="2" y="13" width="9" height="9" rx="1.5" stroke-width="1.5"/><path d="M17.5 13v9M13 17.5h9" stroke-width="1.5"/>`,
        aiStyle: true,
    },
]

const faqItems: FaqItem[] = [
    {
        question: 'How long does an Odoo implementation take?',
        answer: 'A Standard package implementation typically goes live in 4–8 weeks. Enterprise implementations with custom modules, integrations, and data migrations range from 2–6 months depending on scope. We define the exact timeline in our written Statement of Work after the design phase.',
    },
    {
        question: 'What if we already have an ERP — can we migrate from Pantheon, SAP, or a custom system?',
        answer: 'Yes. We have migrated clients from Pantheon, SAP Business One, and custom-built systems. Migration includes data mapping, cleaning, test imports, and a go-live cutover plan. We do not go live until the migrated data has been validated by your team.',
    },
    {
        question: 'What does Slovenian localization actually cover?',
        answer: 'Our Slovenian localization for Odoo includes the Slovenian chart of accounts, FURS fiscalization (certified), VAT reporting including reverse charge and EU triangulation, e-SLOG e-invoicing, bank statement parsers for NLB, NKBM, SKB and other Slovenian banks, and FURS reporting forms (DDV-O, REK). We build and maintain this ourselves — it is updated with every Odoo release and every change to Slovenian tax law.',
    },
    {
        question: 'Is FURS fiscalization included in the Standard package?',
        answer: 'Yes. Slovenian fiscalization is included in every package we deliver. It is part of our own localization and is not an optional add-on.',
    },
    {
        question: 'Do you support both Odoo Community and Odoo Enterprise?',
        answer: 'We work primarily with Odoo Enterprise for client implementations, as it includes the full feature set, official support, and is required for our localization. For simple internal tooling projects, Community may be appropriate — we will advise based on your needs.',
    },
    {
        question: 'Can we self-host Odoo, or do we have to use Odoo.sh?',
        answer: 'Both options work with our implementations. We support Odoo.sh (Odoo\'s managed cloud platform), self-hosted VPS (we can recommend infrastructure), and on-premise installations. We will advise on the right hosting model for your team size, compliance needs, and budget.',
    },
    {
        question: 'What happens after go-live — is there ongoing support?',
        answer: 'Every implementation includes a 30-day hypercare window. After that, we offer SLA-backed support packages with defined response times, plus quarterly health checks. We also handle new features and module additions as your business grows.',
    },
    {
        question: 'Can we keep our current accountant when we move to Odoo?',
        answer: 'Yes. Most of our clients keep their accountant. Odoo integrates with Slovenian accounting practices and we configure the chart of accounts and VAT settings to match your current setup. Your accountant will have access to the Odoo accounting module.',
    },
    {
        question: 'Do you build AI systems independently of Odoo, or only as part of Odoo projects?',
        answer: 'Both. We build RAG systems, AI chatbots, and AI pipelines as standalone projects for clients who do not use Odoo, and we also integrate AI capabilities into existing Odoo instances. The AI work is independent of the ERP work — though they combine well.',
    },
    {
        question: 'What LLMs do you work with?',
        answer: 'We work with OpenAI models (GPT-4o and derivatives), Anthropic Claude, and local open-source models (Mistral, LLaMA, and others via Ollama or vLLM). Model choice depends on your compliance requirements, data sensitivity, and budget. We will recommend based on your specific use case.',
    },
    {
        question: 'Is our data safe when you build a RAG system for us?',
        answer: 'Yes. For sensitive data, we default to local model deployments so your documents never leave your infrastructure. For cloud-based models, we use API-only access with no model training on your data. We will walk through the data flow and sign NDAs before any document access.',
    },
    {
        question: 'How does pricing work for Enterprise implementations?',
        answer: 'Enterprise implementations are scoped and fixed-priced after our free 45-minute discovery call and a paid 2–4 week design phase. You receive a written Statement of Work with a line-item breakdown before any build work begins. No open-ended time-and-materials billing.',
    },
]

useBreadcrumbSchema([
    { name: 'Home', url: 'https://implementor.si/' },
    { name: 'Services', url: 'https://implementor.si/services' },
])

useFaqSchema(faqItems)

useJsonLdSchema({
    '@type': 'Service',
    serviceType: 'Odoo ERP Implementation',
    provider: { '@type': 'Organization', name: 'Implementor d.o.o.', url: 'https://implementor.si' },
    areaServed: { '@type': 'Country', name: 'Slovenia' },
    hasOfferCatalog: {
        '@type': 'OfferCatalog',
        name: 'Odoo Implementation Services',
        itemListElement: [
            { '@type': 'Offer', itemOffered: { '@type': 'Service', name: 'Odoo Implementation' } },
            { '@type': 'Offer', itemOffered: { '@type': 'Service', name: 'Slovenian Localization & Fiscalization' } },
            { '@type': 'Offer', itemOffered: { '@type': 'Service', name: 'AI Systems & RAG' } },
            { '@type': 'Offer', itemOffered: { '@type': 'Service', name: 'ERP Migrations' } },
            { '@type': 'Offer', itemOffered: { '@type': 'Service', name: 'Custom Odoo Development' } },
        ],
    },
})
</script>

<template>
    <Head>
        <title>Services — Odoo Implementation, Localization &amp; AI | Implementor</title>
        <meta
            name="description"
            content="Odoo implementations for Slovenian businesses. Our own Slovenian localization and fiscalization, AI systems, integrations, custom development, migrations, and senior support."
        />
        <meta property="og:title" content="Services — Odoo Implementation, Localization &amp; AI | Implementor" />
        <meta
            property="og:description"
            content="Odoo implementations for Slovenian businesses. Localization, fiscalization, integrations, custom development, migrations, and support. Senior, certified team."
        />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="https://implementor.si/services" />
    </Head>

    <!-- Page hero -->
    <section class="relative bg-bg-light pb-16 pt-32 lg:pb-20 lg:pt-40 dark:bg-[#0c0710]">
        <div class="mx-auto w-full max-w-7xl px-6 lg:px-8">
            <div class="mb-6 inline-flex">
                <span
                    class="inline-flex items-center rounded-full border border-accent/30 bg-accent/10 px-3 py-1 text-[10px] font-semibold uppercase tracking-[0.15em] text-accent"
                >
                    Services
                </span>
            </div>
            <h1
                class="mb-6 font-serif leading-tight text-text-light dark:text-text-dark"
                style="font-size: clamp(36px, 5vw, 68px)"
            >
                Business automation, ERP, and AI.<br class="hidden sm:block" />
                <em>Done properly.</em>
            </h1>
            <p class="max-w-[560px] text-[16px] leading-relaxed text-text-light/60 dark:text-text-dark/60">
                From a turnkey Odoo setup to a full AI-powered business platform — one senior team,
                one partner, one phone number.
            </p>
        </div>
    </section>

    <TwoPaths :compact="true" />

    <BentoGrid
        :tiles="servicesTiles"
        eyebrow="All our services"
        heading="Business automation, ERP, and AI — under one roof."
    />

    <LocalizationDeepDive />

    <AIDeepDive />

    <HowWeWork :extended="true" />

    <IndustriesGrid />

    <FaqAccordion
        :items="faqItems"
        eyebrow="FAQ"
        heading="Questions we get before every project."
    />

    <FinalCTABand
        heading="Not sure which path fits? Let's figure it out together."
        subheading="45 minutes. Free. No pitch deck. We'll listen, ask hard questions, and tell you honestly whether we're a fit."
        cta-text="Book a free consultation"
    />
</template>
