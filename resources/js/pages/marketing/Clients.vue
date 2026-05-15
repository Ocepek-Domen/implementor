<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3'
import gsap from 'gsap'
import { ScrollTrigger } from 'gsap/ScrollTrigger'
import { onMounted, onUnmounted, ref } from 'vue'
import FinalCTABand from '@/components/marketing/FinalCTABand.vue'
import { use3DTilt } from '@/composables/use3DTilt'
import { useBreadcrumbSchema } from '@/composables/useBreadcrumbSchema'
import { ilirika, mobistekla, nnSaunas } from '@/routes/clients'
import theme from '@/theme'

gsap.registerPlugin(ScrollTrigger)

const card0Ref = ref<HTMLElement | null>(null)
const card1Ref = ref<HTMLElement | null>(null)
const card2Ref = ref<HTMLElement | null>(null)
const sectionRef = ref<HTMLElement | null>(null)

use3DTilt(card0Ref, { maxTilt: 6 })
use3DTilt(card1Ref, { maxTilt: 6 })
use3DTilt(card2Ref, { maxTilt: 6 })

const storedTriggers: ScrollTrigger[] = []

const clients = [
    {
        ref: card0Ref,
        name: 'Mobistekla',
        industry: 'Mobile Device Repair (B2B + B2C)',
        outcome: 'Replaced 10+ standalone tools with one Odoo — full business migration.',
        description: 'Mobistekla\'s entire operation ran across more than 10 separate applications — repair tickets, accounting, invoicing, inventory, and customer communication each in a different tool. We replaced everything with a single Odoo implementation, custom-built for their B2B and B2C repair workflows, carrier integrations, and customer self-service portal.',
        metrics: [
            { value: '10+', label: 'tools replaced' },
            { value: '10,000+', label: 'repairs/year' },
            { value: '80%', label: 'done in 24h' },
        ],
        modules: ['Odoo Enterprise', 'Helpdesk', 'Inventory', 'Accounting', 'Sales', 'Customer Portal', 'Shipping Integrations', 'Custom Modules'],
        href: mobistekla.url(),
        logo: '/images/clients/mobistekla.png',
        logoStyle: 'filter: brightness(0) invert(1)',
    },
    {
        ref: card1Ref,
        name: 'Ilirika',
        industry: 'Brokerage & Corporate Finance',
        outcome: 'CRM and accounting for a regulated, multi-country brokerage.',
        description: 'Ilirika is one of Slovenia\'s longest-standing brokerage houses, with subsidiaries across four countries and clients trading on 50+ international markets. We implemented Odoo CRM and multi-company accounting across all four entities, handling regulated client onboarding with KYC workflows, document tracking, and consolidated financial reporting.',
        metrics: [
            { value: '4', label: 'countries' },
            { value: '50+', label: 'markets' },
            { value: '25+', label: 'years of ops' },
        ],
        modules: ['Odoo Enterprise', 'CRM', 'Multi-company', 'Accounting', 'Documents'],
        href: ilirika.url(),
        logo: '/images/clients/ilirika.png',
        logoStyle: 'filter: brightness(0) invert(1)',
    },
    {
        ref: card2Ref,
        name: 'NN Saunas',
        industry: 'Premium Manufacturing & Export',
        outcome: 'A manufacturer running production, multi-country distribution, and showroom partners on a single Odoo.',
        description: 'NN Saunas builds custom-configured saunas at scale — every order is unique, but every order has to flow through the same production line, supplier network, and international distribution chain across Austria, Germany, Belgium, Norway, and the USA.',
        metrics: [
            { value: '2,000+', label: 'saunas installed' },
            { value: '5+', label: 'export countries' },
            { value: '1993', label: 'founded' },
        ],
        modules: ['Manufacturing', 'Inventory', 'Sales', 'Purchase', 'Multi-warehouse'],
        href: nnSaunas.url(),
        logo: '/images/clients/nn-saunas.png',
        logoStyle: 'mix-blend-mode: screen',
    },
]

onMounted(() => {
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return

    const cards = [card0Ref.value, card1Ref.value, card2Ref.value].filter(Boolean) as HTMLElement[]
    if (!cards.length || !sectionRef.value) return

    gsap.set(cards, { clipPath: 'inset(100% 0 0 0)' })

    const st = ScrollTrigger.create({
        trigger: sectionRef.value,
        start: 'top 80%',
        onEnter: () => {
            gsap.to(cards, {
                clipPath: 'inset(0% 0 0 0)',
                duration: theme.duration.reveal / 1000,
                ease: 'power4.out',
                stagger: theme.stagger.section / 1000,
            })
        },
    })
    storedTriggers.push(st)
})

onUnmounted(() => {
    storedTriggers.forEach((st) => st.kill())
    storedTriggers.length = 0
})

useBreadcrumbSchema([
    { name: 'Home', url: 'https://implementor.si/' },
    { name: 'Clients', url: 'https://implementor.si/clients' },
])
</script>

<template>
    <Head>
        <title>Clients &amp; Case Studies — Slovenian Odoo implementations | Implementor</title>
        <meta
            name="description"
            content="Three Slovenian businesses — finance, manufacturing, and services — running on Odoo implemented by Implementor. See the case studies."
        />
    </Head>

    <!-- Hero -->
    <section class="relative bg-bg-light pb-16 pt-32 lg:pb-20 lg:pt-40 dark:bg-[#0c0710]">
        <div class="mx-auto w-full max-w-7xl px-6 lg:px-8">
            <div class="mb-6 inline-flex">
                <span
                    class="inline-flex items-center rounded-full border border-accent/30 bg-accent/10 px-3 py-1 text-[10px] font-semibold uppercase tracking-[0.15em] text-accent"
                >
                    Clients
                </span>
            </div>
            <h1
                class="mb-6 font-serif leading-tight text-text-light dark:text-text-dark"
                style="font-size: clamp(36px, 5vw, 68px)"
            >
                Three Slovenian businesses.<br class="hidden sm:block" />
                Three very different operations.<br class="hidden sm:block" />
                <em>One partner.</em>
            </h1>
            <p class="max-w-[560px] text-[16px] leading-relaxed text-text-light/60 dark:text-text-dark/60">
                From regulated finance to export manufacturing to high-volume service operations — see how
                Odoo, done right, scales with the business.
            </p>
        </div>
    </section>

    <!-- Client cards -->
    <section class="relative bg-bg-light pb-20 lg:pb-28 dark:bg-[#0c0710]">
        <div ref="sectionRef" class="mx-auto w-full max-w-7xl px-6 lg:px-8">
            <div class="flex flex-col gap-6">
                <div
                    v-for="(client, i) in clients"
                    :key="client.name"
                    :ref="i === 0 ? card0Ref : i === 1 ? card1Ref : card2Ref"
                    class="group flex flex-col rounded-2xl border border-[#714b67]/25 bg-white/60 p-8 lg:flex-row lg:items-start lg:gap-12 lg:p-10 dark:bg-linear-to-b dark:from-[#1f1226]/70 dark:to-[#0c0710]/50"
                >
                    <!-- Left: text -->
                    <div class="flex-1">
                        <!-- Logo + industry -->
                        <div class="mb-6 flex items-center gap-4">
                            <img
                                v-if="client.logo"
                                :src="client.logo"
                                :alt="`${client.name} logo`"
                                class="logo-img h-8 w-auto max-w-[112px] object-contain"
                                :style="client.logoStyle"
                            />
                            <div
                                v-else
                                class="flex h-10 w-28 items-center justify-center rounded-lg bg-text-light/8 dark:bg-text-dark/8"
                                :aria-label="`${client.name} logo placeholder`"
                            >
                                <span class="text-[11px] font-medium text-text-light/40 dark:text-text-dark/40">{{ client.name }}</span>
                            </div>
                            <span class="text-[11px] font-semibold uppercase tracking-[0.12em] text-[#714b67]">
                                {{ client.industry }}
                            </span>
                        </div>

                        <h2
                            class="mb-4 font-serif leading-tight text-text-light dark:text-text-dark"
                            style="font-size: clamp(22px, 2.4vw, 32px)"
                        >
                            {{ client.outcome }}
                        </h2>

                        <p class="mb-6 text-[14px] leading-relaxed text-text-light/55 dark:text-text-dark/55">
                            {{ client.description }}
                        </p>

                        <!-- Module chips -->
                        <div class="mb-8 flex flex-wrap gap-2">
                            <span
                                v-for="mod in client.modules"
                                :key="mod"
                                class="rounded-full border border-[#714b67]/25 bg-[#714b67]/10 px-3 py-1 text-[11px] text-text-light/55 dark:text-text-dark/55"
                            >
                                {{ mod }}
                            </span>
                        </div>

                        <Link
                            :href="client.href"
                            class="inline-flex items-center gap-1.5 text-[13px] font-medium text-accent/75 transition-colors duration-150 hover:text-accent"
                        >
                            Read case study
                            <span
                                class="inline-block transition-transform duration-200 group-hover:translate-x-1"
                                aria-hidden="true"
                            >→</span>
                        </Link>
                    </div>

                    <!-- Right: metrics -->
                    <div class="mt-8 flex shrink-0 flex-row gap-6 lg:mt-0 lg:w-52 lg:flex-col lg:gap-8">
                        <div
                            v-for="metric in client.metrics"
                            :key="metric.label"
                            class="flex flex-col"
                        >
                            <span class="font-mono text-[28px] font-medium leading-none text-text-light lg:text-[32px] dark:text-text-dark">
                                {{ metric.value }}
                            </span>
                            <span class="mt-1 text-[12px] text-text-light/40 dark:text-text-dark/40">{{ metric.label }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <FinalCTABand
        heading="Want to be the next one?"
        subheading="We'll listen first. Pitch later, only if it fits."
        cta-text="Book a free consultation"
    />
</template>

<style scoped>
.logo-img {
    opacity: 0.75;
    transition: transform 200ms ease, opacity 200ms ease;
}

.logo-img:hover {
    opacity: 1;
    transform: translateY(-3px);
}
</style>
