<script setup lang="ts">
import { Head } from '@inertiajs/vue3'
import { onMounted, onUnmounted } from 'vue'
import AISpotlight from '@/components/marketing/AISpotlight.vue'
import BentoGrid from '@/components/marketing/BentoGrid.vue'
import ClientCards from '@/components/marketing/ClientCards.vue'
import FinalCTABand from '@/components/marketing/FinalCTABand.vue'
import Hero from '@/components/marketing/Hero.vue'
import HowWeWork from '@/components/marketing/HowWeWork.vue'
import LocalizationSpotlight from '@/components/marketing/LocalizationSpotlight.vue'
import PricingTeaser from '@/components/marketing/PricingTeaser.vue'
import TrustStrip from '@/components/marketing/TrustStrip.vue'
import TwoPaths from '@/components/marketing/TwoPaths.vue'

const websiteSchema = {
    '@context': 'https://schema.org',
    '@type': 'WebSite',
    url: 'https://implementor.si/',
    name: 'Implementor',
    description: 'Slovenian Odoo Silver Partner & AI Systems',
}

let schemaScript: HTMLScriptElement | null = null

onMounted(() => {
    schemaScript = document.createElement('script')
    schemaScript.type = 'application/ld+json'
    schemaScript.textContent = JSON.stringify(websiteSchema)
    document.head.appendChild(schemaScript)
})

onUnmounted(() => {
    schemaScript?.remove()
    schemaScript = null
})
</script>

<template>
    <Head>
        <title>Implementor — Slovenian Odoo Silver Partner &amp; AI Systems</title>
        <meta
            name="description"
            content="We help Slovenian businesses automate their operations with Odoo ERP and AI. Our own Slovenian localization and fiscalization. Senior certified team. From €15 per user per month."
        />
        <meta property="og:title" content="Implementor — Slovenian Odoo Silver Partner &amp; AI Systems" />
        <meta
            property="og:description"
            content="We help Slovenian businesses automate their operations with Odoo ERP and AI. Our own Slovenian localization and fiscalization. Senior certified team. From €15 per user per month."
        />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="https://implementor.si/" />
    </Head>

    <Hero />
    <TrustStrip />
    <TwoPaths />
    <ClientCards />
    <BentoGrid />
    <LocalizationSpotlight />
    <AISpotlight />
    <HowWeWork />
    <PricingTeaser />
    <FinalCTABand />
</template>
