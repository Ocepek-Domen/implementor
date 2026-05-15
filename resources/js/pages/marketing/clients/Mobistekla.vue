<script setup lang="ts">
import CaseStudy from '@/components/marketing/CaseStudy.vue'
import type { CaseStudyData } from '@/components/marketing/CaseStudy.vue'
import { ilirika, nnSaunas } from '@/routes/clients'

const data: CaseStudyData = {
    seo: {
        title: 'Mobistekla — Whole-business migration, 10+ tools replaced by one Odoo | Implementor',
        description: 'How Implementor replaced 10+ standalone tools across Mobistekla\'s entire operation with a single Odoo — from repair ops and inventory to accounting, invoicing, and a customer self-service portal.',
    },
    name: 'Mobistekla',
    industry: 'Mobile Device Repair (B2B + B2C)',
    outcome: 'Replaced 10+ standalone tools with one Odoo — full business migration.',
    logo: '/images/clients/mobistekla.png',
    logoStyle: 'filter: brightness(0) invert(1)',
    stats: [
        { value: '10+', label: 'tools replaced' },
        { value: '10,000+', label: 'repairs per year' },
        { value: '80%', label: 'completed in 24h' },
        { value: '22', label: 'brands serviced' },
    ],
    challenge: {
        intro: 'Mobistekla\'s entire operation ran across more than 10 separate applications — repair tickets managed in one tool, invoicing in another, inventory in a third, customer communication scattered across email. With volume growing past 10,000 repairs per year, they needed a single platform that could consolidate everything: repair lifecycle, parts consumption, accounting, carrier integrations, and customer self-service, for both their B2B and B2C workflows.',
        bullets: [
            'More than 10 separate tools covering repair tickets, accounting, invoicing, inventory, and customer comms — no integration between them',
            'Repair tickets managed across spreadsheets and email — no central tracking or visibility',
            'Customers had no way to check the status of their device',
            'Technician workflows, parts consumption, and labour time untracked',
            'Multiple delivery carriers (DHL, DPD, UPS, Slovenian Post) with no integration',
            'B2B and B2C operations with no clear separation in pricing, invoicing, or account management',
        ],
    },
    built: [
        'Full Odoo Enterprise implementation replacing all 10+ standalone tools',
        'Odoo Helpdesk + Inventory + Sales as the core repair operations platform',
        'Accounting and invoicing consolidated within the same Odoo instance',
        'Custom Odoo modules for repair ticket lifecycle, parts consumption, and technician reports',
        'Customer portal for real-time self-service repair status tracking',
        'Integrations with DHL, DPD, UPS, and Slovenian Post',
        'B2B pricing and account management alongside B2C flows',
        'Slovenian fiscalization for full retail compliance',
    ],
    quote: 'Placeholder quote — to be supplied by Mobistekla before public launch.',
    outcomes: [
        '10+ standalone tools replaced by one unified Odoo implementation',
        '10,000+ repairs per year processed on a single integrated platform',
        '80% of repairs completed within 24 hours with the workflow to support it',
        'Customers self-serve status checks, reducing inbound call volume',
        'Specific performance metrics to be confirmed with the client',
    ],
    modules: [
        'Odoo Enterprise',
        'Helpdesk',
        'Inventory',
        'Accounting',
        'Sales',
        'Customer Portal',
        'Custom Modules',
        'Shipping Integrations',
        'Slovenian Localization',
    ],
    related: [
        { name: 'Ilirika', industry: 'Brokerage & Corporate Finance', href: ilirika.url(), logo: '/images/clients/ilirika.png', logoStyle: 'filter: brightness(0) invert(1)' },
        { name: 'NN Saunas', industry: 'Premium Manufacturing & Export', href: nnSaunas.url(), logo: '/images/clients/nn-saunas.png', logoStyle: 'mix-blend-mode: screen' },
    ],
}
</script>

<template>
    <CaseStudy :data="data" />
</template>
