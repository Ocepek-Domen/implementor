<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3'
import { onMounted, onUnmounted, ref } from 'vue'
import gsap from 'gsap'
import { ScrollTrigger } from 'gsap/ScrollTrigger'
import FinalCTABand from '@/components/marketing/FinalCTABand.vue'
import { useBreadcrumbSchema } from '@/composables/useBreadcrumbSchema'
import { useScrollReveal } from '@/composables/useScrollReveal'

gsap.registerPlugin(ScrollTrigger)

export interface CaseStudyData {
    seo: { title: string; description: string }
    name: string
    industry: string
    outcome: string
    logo?: string
    logoStyle?: string
    stats: { value: string; label: string }[]
    challenge: { intro: string; bullets: string[] }
    built: string[]
    quote: string
    outcomes: string[]
    modules: string[]
    related: { name: string; industry: string; href: string; logo?: string; logoStyle?: string }[]
}

interface Props {
    data: CaseStudyData
}

const props = defineProps<Props>()

const challengeRef = ref<HTMLElement | null>(null)
const builtRef = ref<HTMLElement | null>(null)
const outcomesRef = ref<HTMLElement | null>(null)
const statsRowRef = ref<HTMLElement | null>(null)

useScrollReveal(challengeRef)
useScrollReveal(builtRef, { delay: 0.1 })
useScrollReveal(outcomesRef)

let statsTrigger: ScrollTrigger | null = null

function parseStatValue(raw: string): { numeric: number; prefix: string; suffix: string } {
    const cleaned = raw.replace(/,/g, '')
    const match = cleaned.match(/^([€$]?)(\d+(?:\.\d+)?)([\+%]?)$/)
    if (!match) return { numeric: 0, prefix: '', suffix: raw }
    return { numeric: parseFloat(match[2]), prefix: match[1], suffix: match[3] }
}

onMounted(() => {
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return
    const row = statsRowRef.value
    if (!row) return
    const spans = [...row.querySelectorAll<HTMLElement>('.stat-number')]
    if (!spans.length) return

    statsTrigger = ScrollTrigger.create({
        trigger: row,
        start: 'top 85%',
        onEnter: () => {
            spans.forEach((span, i) => {
                const stat = props.data.stats[i]
                if (!stat) return
                const { numeric, prefix, suffix } = parseStatValue(stat.value)
                const proxy = { v: 0 }
                const fmt = (n: number) => `${prefix}${n >= 1000 ? Math.round(n).toLocaleString('en') : Math.round(n)}${suffix}`
                gsap.to(proxy, {
                    v: numeric * 1.03, duration: 0.9, ease: 'power3.out', delay: i * 0.08,
                    onUpdate: () => { span.textContent = fmt(proxy.v) },
                    onComplete: () => gsap.to(proxy, {
                        v: numeric, duration: 0.35, ease: 'power2.in',
                        onUpdate: () => { span.textContent = fmt(proxy.v) },
                    }),
                })
            })
        },
    })
})

onUnmounted(() => {
    statsTrigger?.kill()
    statsTrigger = null
})

useBreadcrumbSchema([
    { name: 'Home', url: 'https://implementor.si/' },
    { name: 'Clients', url: 'https://implementor.si/clients' },
    { name: props.data.name, url: `https://implementor.si/clients/${props.data.name.toLowerCase().replace(/\s+/g, '-')}` },
])
</script>

<template>
    <Head>
        <title>{{ props.data.seo.title }}</title>
        <meta name="description" :content="props.data.seo.description" />
    </Head>

    <!-- Slim hero -->
    <section class="relative bg-bg-light pb-12 pt-32 lg:pb-16 lg:pt-40 dark:bg-[#0c0710]">
        <div class="mx-auto w-full max-w-7xl px-6 lg:px-8">
            <div class="mb-6 inline-flex">
                <span
                    class="inline-flex items-center rounded-full border border-[#c8a951]/30 bg-[#c8a951]/10 px-3 py-1 text-[10px] font-semibold uppercase tracking-[0.15em] text-[#c8a951]"
                >
                    Case study
                </span>
            </div>

            <div class="mb-8 flex flex-wrap items-center gap-4">
                <img
                    v-if="props.data.logo"
                    :src="props.data.logo"
                    :alt="`${props.data.name} logo`"
                    class="logo-img h-9 w-auto max-w-[120px] object-contain"
                    :style="props.data.logoStyle"
                />
                <div
                    v-else
                    class="flex h-10 w-28 items-center justify-center rounded-lg bg-text-light/8 dark:bg-text-dark/8"
                    :aria-label="`${props.data.name} logo placeholder`"
                >
                    <span class="text-[11px] font-medium text-text-light/40 dark:text-text-dark/40">{{ props.data.name }}</span>
                </div>
                <span class="text-[12px] font-semibold uppercase tracking-[0.12em] text-[#714b67]">
                    {{ props.data.industry }}
                </span>
            </div>

            <h1
                class="mb-6 max-w-3xl font-serif leading-tight text-text-light dark:text-text-dark"
                style="font-size: clamp(28px, 4vw, 54px)"
            >
                {{ props.data.outcome }}
            </h1>

            <!-- At-a-glance stats -->
            <div ref="statsRowRef" class="mt-10 flex flex-wrap gap-8 border-t border-[#714b67]/20 pt-10">
                <div
                    v-for="stat in props.data.stats"
                    :key="stat.label"
                    class="flex flex-col"
                >
                    <span class="stat-number font-mono text-[32px] font-medium leading-none text-text-light dark:text-text-dark">
                        {{ stat.value }}
                    </span>
                    <span class="mt-1.5 text-[12px] text-text-light/40 dark:text-text-dark/40">{{ stat.label }}</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Disclaimer notice -->
    <section class="bg-bg-light dark:bg-[#0c0710]">
        <div class="mx-auto w-full max-w-7xl px-6 lg:px-8">
            <div class="rounded-xl border border-[#c8a951]/15 bg-[#c8a951]/5 px-5 py-3.5">
                <p class="text-[12px] leading-snug text-text-light/45 dark:text-text-dark/45">
                    This case study is displayed with the client's approval. Final detailed content and client
                    quotes will be added before public launch.
                </p>
            </div>
        </div>
    </section>

    <!-- The challenge -->
    <section class="bg-bg-light py-16 lg:py-20 dark:bg-[#0c0710]">
        <div class="mx-auto w-full max-w-7xl px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-12 lg:grid-cols-2 lg:gap-20">
                <div ref="challengeRef">
                    <h2
                        class="mb-6 font-serif leading-tight text-text-light dark:text-text-dark"
                        style="font-size: clamp(22px, 2.4vw, 32px)"
                    >
                        The challenge
                    </h2>
                    <p class="mb-6 text-[15px] leading-relaxed text-text-light/60 dark:text-text-dark/60">
                        {{ props.data.challenge.intro }}
                    </p>
                    <ul class="space-y-3">
                        <li
                            v-for="bullet in props.data.challenge.bullets"
                            :key="bullet"
                            class="flex items-start gap-3 text-[14px] leading-snug text-text-light/55 dark:text-text-dark/55"
                        >
                            <span class="mt-0.5 shrink-0 text-[#c8a951]/60">→</span>
                            {{ bullet }}
                        </li>
                    </ul>
                </div>

                <!-- What we built -->
                <div ref="builtRef">
                    <h2
                        class="mb-6 font-serif leading-tight text-text-light dark:text-text-dark"
                        style="font-size: clamp(22px, 2.4vw, 32px)"
                    >
                        What we built
                    </h2>
                    <ul class="space-y-3">
                        <li
                            v-for="item in props.data.built"
                            :key="item"
                            class="flex items-start gap-3 text-[14px] leading-snug text-text-light/55 dark:text-text-dark/55"
                        >
                            <span
                                class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-[#c8a951]/15 text-[10px] font-bold text-[#c8a951]"
                                aria-hidden="true"
                            >✓</span>
                            {{ item }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Pull quote -->
    <section class="bg-bg-light py-12 lg:py-16 dark:bg-[#060309]">
        <div class="mx-auto w-full max-w-7xl px-6 lg:px-8">
            <blockquote class="mx-auto max-w-2xl text-center">
                <p
                    class="font-serif italic leading-relaxed text-text-light/50 dark:text-text-dark/50"
                    style="font-size: clamp(18px, 2vw, 26px)"
                >
                    "{{ props.data.quote }}"
                </p>
                <footer class="mt-4 text-[12px] text-text-light/30 dark:text-text-dark/30">
                    — Placeholder quote · client sign-off pending
                </footer>
            </blockquote>
        </div>
    </section>

    <!-- Outcomes + modules -->
    <section class="bg-bg-light py-16 lg:py-20 dark:bg-[#0c0710]">
        <div class="mx-auto w-full max-w-7xl px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-12 lg:grid-cols-2 lg:gap-20">
                <!-- Outcomes -->
                <div ref="outcomesRef">
                    <h2
                        class="mb-6 font-serif leading-tight text-text-light dark:text-text-dark"
                        style="font-size: clamp(22px, 2.4vw, 32px)"
                    >
                        Outcomes
                    </h2>
                    <ul class="space-y-3">
                        <li
                            v-for="outcome in props.data.outcomes"
                            :key="outcome"
                            class="flex items-start gap-3 text-[14px] leading-snug text-text-light/60 dark:text-text-dark/60"
                        >
                            <span class="mt-0.5 text-[#c8a951]/60">✓</span>
                            {{ outcome }}
                        </li>
                    </ul>
                </div>

                <!-- Tech stack -->
                <div>
                    <h2
                        class="mb-6 font-serif leading-tight text-text-light dark:text-text-dark"
                        style="font-size: clamp(22px, 2.4vw, 32px)"
                    >
                        Tech stack
                    </h2>
                    <div class="flex flex-wrap gap-2">
                        <span
                            v-for="mod in props.data.modules"
                            :key="mod"
                            class="rounded-full border border-[#714b67]/30 bg-[#714b67]/10 px-3.5 py-1.5 text-[12px] font-medium text-text-light/65 dark:text-text-dark/65"
                        >
                            {{ mod }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related case studies -->
    <section class="bg-[#f5f2fb] py-16 lg:py-20 dark:bg-[#0a0810]">
        <div class="mx-auto w-full max-w-7xl px-6 lg:px-8">
            <h2
                class="mb-10 font-serif leading-tight text-text-light dark:text-text-dark"
                style="font-size: clamp(22px, 2.4vw, 32px)"
            >
                More case studies
            </h2>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <Link
                    v-for="rel in props.data.related"
                    :key="rel.name"
                    :href="rel.href"
                    class="group flex flex-col rounded-2xl border border-[#714b67]/25 bg-white/60 p-6 transition-colors duration-200 hover:border-primary/50 dark:bg-linear-to-b dark:from-[#1f1226]/70 dark:to-[#0c0710]/50"
                >
                    <img
                        v-if="rel.logo"
                        :src="rel.logo"
                        :alt="`${rel.name} logo`"
                        class="logo-img mb-4 h-7 w-auto max-w-[96px] object-contain"
                        :style="rel.logoStyle"
                    />
                    <div
                        v-else
                        class="mb-4 flex h-9 w-24 items-center justify-center rounded-lg bg-text-light/8 dark:bg-text-dark/8"
                    >
                        <span class="text-[10px] font-medium text-text-light/40 dark:text-text-dark/40">{{ rel.name }}</span>
                    </div>
                    <span class="mb-2 text-[11px] font-semibold uppercase tracking-[0.12em] text-[#714b67]">
                        {{ rel.industry }}
                    </span>
                    <span class="mt-auto text-[13px] font-medium text-[#c8a951]/70 transition-colors group-hover:text-[#c8a951]">
                        Read case study →
                    </span>
                </Link>
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
