<script setup lang="ts">
import { Link } from '@inertiajs/vue3'
import gsap from 'gsap'
import { ScrollTrigger } from 'gsap/ScrollTrigger'
import { onMounted, onUnmounted, ref } from 'vue'
import { contact } from '@/routes'
import theme from '@/theme'

gsap.registerPlugin(ScrollTrigger)

interface Props {
    compact?: boolean
}

const props = withDefaults(defineProps<Props>(), {
    compact: false,
})

const sectionRef = ref<HTMLElement | null>(null)
const cardARef = ref<HTMLElement | null>(null)
const cardBRef = ref<HTMLElement | null>(null)
const splitLineRef = ref<HTMLElement | null>(null)

const standardBullets = [
    'From €15 per user per month',
    'Slovenian fiscalization included',
    'Live in weeks',
    'Best for 5–30 employees',
]

const enterpriseBullets = [
    'End-to-end project ownership',
    'Full Slovenian compliance',
    'AI-powered workflows',
    'Best for 30 to over 100 employees',
]

const storedTriggers: ScrollTrigger[] = []

onMounted(() => {
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return

    const cardA = cardARef.value
    const cardB = cardBRef.value

    if (!cardA || !cardB) return

    if (props.compact || window.innerWidth < 1024) {
        // Compact / mobile: individual slide-up with stagger
        gsap.set([cardA, cardB], { opacity: 0, y: 40, scale: 0.96 })
        ;[cardA, cardB].forEach((card, i) => {
            const st = ScrollTrigger.create({
                trigger: card,
                onEnter: () => {
                    gsap.to(card, {
                        opacity: 1,
                        y: 0,
                        scale: 1,
                        delay: i * 0.1,
                        ...theme.gsap.spring,
                    })
                },
            })
            storedTriggers.push(st)
        })
        return
    }

    // Desktop full: pinned split animation
    const splitLine = splitLineRef.value
    const section = sectionRef.value
    if (!splitLine || !section) return

    gsap.set(cardA, { x: 'calc(100% + 1.5rem)' })
    gsap.set(cardB, { x: 'calc(-100% - 1.5rem)' })
    gsap.set(splitLine, { opacity: 0, scaleY: 0 })

    const st = ScrollTrigger.create({
        trigger: section,
        start: 'top 60%',
        onEnter: () => {
            gsap.to([cardA, cardB], {
                x: 0,
                duration: theme.duration.signature / 1000,
                ease: 'back.out(1.4)',
            })
            gsap.timeline({ delay: 0.42 })
                .to(splitLine, { opacity: 1, scaleY: 1, duration: 0.18, ease: 'power2.out' })
                .to(splitLine, { opacity: 0, scaleY: 0, duration: 0.28, ease: 'power2.in' })
        },
    })
    storedTriggers.push(st)
})

onUnmounted(() => {
    storedTriggers.forEach((st) => st.kill())
    storedTriggers.length = 0
})
</script>

<template>
    <section ref="sectionRef" :class="['relative bg-bg-light dark:bg-[#0c0710]', props.compact ? 'py-16 lg:py-20' : 'py-20 lg:py-28']">
        <div class="mx-auto w-full max-w-7xl px-6 lg:px-8">
            <!-- Section header shown only in compact mode -->
            <div v-if="props.compact" class="mb-10">
                <div class="mb-4 inline-flex">
                    <span
                        class="inline-flex items-center rounded-full border border-[#c8a951]/30 bg-[#c8a951]/10 px-3 py-1 text-[10px] font-semibold uppercase tracking-[0.15em] text-[#c8a951]"
                    >
                        Two paths
                    </span>
                </div>
                <h2
                    class="font-serif leading-tight text-text-light dark:text-text-dark"
                    style="font-size: clamp(28px, 3vw, 44px)"
                >
                    Which path fits your business?
                </h2>
            </div>

            <!-- Overflow clip for the split animation -->
            <div class="relative overflow-hidden">
                <!-- Amber split line — desktop, GSAP-controlled -->
                <div
                    ref="splitLineRef"
                    class="pointer-events-none absolute inset-y-0 left-1/2 hidden w-px -translate-x-1/2 bg-[#c8a951] lg:block"
                    aria-hidden="true"
                />

                <div class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-6">
                    <!-- Card A: Standard -->
                    <div
                        ref="cardARef"
                        class="flex flex-col rounded-2xl border border-[#714b67]/30 bg-gradient-to-br from-[#714b67]/18 to-[#714b67]/5 p-8 lg:p-10"
                    >
                        <div class="mb-6 inline-flex">
                            <span
                                class="inline-flex items-center rounded-full border border-[#c8a951]/25 bg-[#c8a951]/8 px-3 py-1 text-[10px] font-semibold uppercase tracking-[0.14em] text-[#c8a951]"
                            >
                                For small teams
                            </span>
                        </div>

                        <h2
                            class="mb-4 font-serif leading-tight text-text-light dark:text-text-dark"
                            style="font-size: clamp(28px, 2.8vw, 42px)"
                        >
                            Standard
                        </h2>

                        <p class="mb-8 text-[15px] leading-relaxed text-text-light/60 dark:text-text-dark/60">
                            A clean Odoo setup with our Slovenian localization built in. Configured,
                            deployed, and supported by us.
                        </p>

                        <ul class="mb-10 space-y-3">
                            <li
                                v-for="item in standardBullets"
                                :key="item"
                                class="flex items-start gap-3"
                            >
                                <span class="mt-0.5 text-[13px] font-bold text-[#c8a951]">✓</span>
                                <span class="text-[14px] leading-snug text-text-light/70 dark:text-text-dark/70">{{ item }}</span>
                            </li>
                        </ul>

                        <div class="mt-auto">
                            <Link
                                :href="contact.url()"
                                class="inline-flex items-center rounded-full bg-[#c8a951] px-6 py-3 text-sm font-medium text-[#1a0f1c] transition-[filter] duration-150 hover:brightness-110"
                            >
                                Book a consultation
                            </Link>
                        </div>
                    </div>

                    <!-- Card B: Enterprise -->
                    <div
                        ref="cardBRef"
                        class="flex flex-col rounded-2xl border border-[#4a1060]/35 bg-[#f5f0ff]/40 p-8 lg:p-10 dark:bg-linear-to-br dark:from-[#2d0a45]/35 dark:to-[#150830]/55"
                    >
                        <div class="mb-6 inline-flex">
                            <span
                                class="inline-flex items-center rounded-full border border-[#714b67]/30 bg-[#714b67]/12 px-3 py-1 text-[10px] font-semibold uppercase tracking-[0.14em] text-text-light/65 dark:text-text-dark/65"
                            >
                                For mid-market &amp; growing companies
                            </span>
                        </div>

                        <h2
                            class="mb-4 font-serif leading-tight text-text-light dark:text-text-dark"
                            style="font-size: clamp(28px, 2.8vw, 42px)"
                        >
                            Enterprise
                        </h2>

                        <p class="mb-8 text-[15px] leading-relaxed text-text-light/60 dark:text-text-dark/60">
                            Tailored Odoo for complex operations. Manufacturing, multi-company, AI
                            integrations, custom modules — scoped to your business.
                        </p>

                        <ul class="mb-10 space-y-3">
                            <li
                                v-for="item in enterpriseBullets"
                                :key="item"
                                class="flex items-start gap-3"
                            >
                                <span class="mt-0.5 text-[13px] font-bold text-[#c8a951]">✓</span>
                                <span class="text-[14px] leading-snug text-text-light/70 dark:text-text-dark/70">{{ item }}</span>
                            </li>
                        </ul>

                        <div class="mt-auto">
                            <Link
                                :href="contact.url()"
                                class="inline-flex items-center rounded-full bg-[#c8a951] px-6 py-3 text-sm font-medium text-[#1a0f1c] transition-[filter] duration-150 hover:brightness-110"
                            >
                                Book a consultation
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
