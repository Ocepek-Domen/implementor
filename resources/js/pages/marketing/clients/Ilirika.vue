<script setup lang="ts">
import CaseStudy from '@/components/marketing/CaseStudy.vue'
import type { CaseStudyData } from '@/components/marketing/CaseStudy.vue'
import { mobistekla, nnSaunas } from '@/routes/clients'

const data: CaseStudyData = {
    seo: {
        title: 'Ilirika — CRM and multi-company accounting for a regulated brokerage | Implementor',
        description: 'How Implementor implemented Odoo CRM and consolidated multi-company accounting for Ilirika, one of Slovenia\'s longest-standing brokerage houses, operating across four countries.',
    },
    name: 'Ilirika',
    industry: 'Brokerage & Corporate Finance',
    outcome: 'CRM and accounting for a regulated, multi-country brokerage.',
    logo: '/images/clients/ilirika.png',
    stats: [
        { value: '4', label: 'countries' },
        { value: '50+', label: 'international markets' },
        { value: '25+', label: 'years of operations' },
        { value: '100+', label: 'users' },
    ],
    challenge: {
        intro: 'Ilirika is one of Slovenia\'s longest-standing brokerage houses, operating subsidiaries across Slovenia, Croatia, Serbia, and North Macedonia with clients trading on 50+ international markets. Their primary needs were a structured CRM for regulated client onboarding — with KYC workflows, document tracking, and audit trails — alongside consolidated multi-company accounting across all four entities.',
        bullets: [
            'Regulated client onboarding with KYC and AML workflows handled without a unified CRM',
            'Multi-company consolidation across SI/HR/RS/MK subsidiaries without a single view',
            'Strict regulatory reporting requirements across four jurisdictions',
            'Integration with banking, clearing, and regulated reporting systems',
            'Full Slovenian fiscalization at compliance level',
        ],
    },
    built: [
        'Odoo CRM with structured client onboarding, KYC tracking, and status visibility',
        'Odoo Enterprise multi-company, multi-currency across all four entities',
        'Our Slovenian localization with appropriate jurisdictional adaptations',
        'Document management with full audit trails for compliance',
        'Consolidated financial reporting across all subsidiaries',
        'Integrations with banking and regulated reporting systems',
    ],
    quote: 'Placeholder quote — to be supplied by Ilirika before public launch.',
    outcomes: [
        'One CRM and accounting platform replacing fragmented per-entity systems',
        'Structured, trackable client onboarding reducing compliance risk',
        'Audit-ready financial reporting across four countries',
        'Specific performance metrics to be confirmed with the client',
    ],
    modules: [
        'Odoo Enterprise',
        'CRM',
        'Accounting',
        'Documents',
        'Multi-company',
        'Multi-currency',
        'Slovenian Localization',
    ],
    related: [
        { name: 'NN Saunas', industry: 'Premium Manufacturing & Export', href: nnSaunas.url(), logo: '/images/clients/nn-saunas.png', logoClass: 'invert dark:invert-0' },
        { name: 'Mobistekla', industry: 'Mobile Device Repair', href: mobistekla.url(), logo: '/images/clients/mobistekla.png' },
    ],
}
</script>

<template>
    <CaseStudy :data="data" />
</template>
