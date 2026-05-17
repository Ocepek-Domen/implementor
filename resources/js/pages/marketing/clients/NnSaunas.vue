<script setup lang="ts">
import CaseStudy from '@/components/marketing/CaseStudy.vue'
import type { CaseStudyData } from '@/components/marketing/CaseStudy.vue'
import { ilirika, mobistekla } from '@/routes/clients'

const data: CaseStudyData = {
    seo: {
        title: 'NN Saunas — Manufacturing, distribution, and sales on one Odoo | Implementor',
        description: 'How Implementor built a full manufacturing operations platform for NN Saunas — from configurable product quotes to multi-country distribution on a single Odoo instance.',
    },
    name: 'NN Saunas',
    industry: 'Premium Manufacturing & Export',
    outcome: 'A manufacturer running production, multi-country distribution, and showroom partners on a single Odoo.',
    stats: [
        { value: '2000+', label: 'saunas installed' },
        { value: '5+', label: 'export countries' },
        { value: '1993', label: 'founded' },
        { value: '100%', label: 'custom-built units' },
    ],
    challenge: {
        intro: 'NN Saunas builds custom-configured saunas at scale — every order is unique, but every order also has to flow through the same production line, supplier network, and international distribution chain. Their existing setup was entirely fragmented, with no single view from quote to delivery.',
        bullets: [
            'Quotes and product configurations managed in spreadsheets',
            'Production planning disconnected from incoming sales orders',
            'Multi-country distributor relationships not centrally tracked',
            'Stock and component tracking across the factory floor was manual',
            'No visibility from quote → manufacturing → shipped to international showroom',
        ],
    },
    built: [
        'Odoo Manufacturing (MRP) for the full production floor',
        'Bills of Materials for configurable, made-to-order products',
        'Sales and CRM for the international dealer and showroom network',
        'Inventory management across multiple warehouses',
        'Purchase workflows for component and material sourcing',
        'Slovenian localization for all fiscal and tax compliance',
    ],
    quote: 'Placeholder quote — to be supplied by NN Saunas before public launch.',
    outcomes: [
        'A single system from configurator to shipping label',
        'Production planning connected directly to sales orders',
        'Full visibility into the international dealer pipeline',
        'Specific performance metrics to be confirmed with the client',
    ],
    modules: [
        'Odoo Enterprise',
        'Manufacturing',
        'Inventory',
        'Sales',
        'CRM',
        'Purchase',
        'Multi-warehouse',
        'Slovenian Localization',
    ],
    related: [
        { name: 'Ilirika', industry: 'Brokerage & Corporate Finance', href: ilirika.url() },
        { name: 'Mobistekla', industry: 'Mobile Device Repair', href: mobistekla.url() },
    ],
}
</script>

<template>
    <CaseStudy :data="data" />
</template>
