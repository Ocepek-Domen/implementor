<script setup lang="ts">
import { Link } from '@inertiajs/vue3'
import gsap from 'gsap'
import { ScrollTrigger } from 'gsap/ScrollTrigger'
import { onMounted, onUnmounted, ref } from 'vue'
import { use3DTilt } from '@/composables/use3DTilt'
import { ilirika, mobistekla, nnSaunas } from '@/routes/clients'
import theme from '@/theme'

gsap.registerPlugin(ScrollTrigger)

const sectionRef = ref<HTMLElement | null>(null)
const card0Ref = ref<HTMLElement | null>(null)
const card1Ref = ref<HTMLElement | null>(null)
const card2Ref = ref<HTMLElement | null>(null)

use3DTilt(card0Ref, { maxTilt: 8 })
use3DTilt(card1Ref, { maxTilt: 8 })
use3DTilt(card2Ref, { maxTilt: 8 })

interface ClientData {
    name: string
    industry: string
    outcome: string
    metric: string
    href: string
    logo?: string
    logoStyle?: string
}

const clients: ClientData[] = [
    {
        name: 'Mobistekla',
        industry: 'Mobile device repair',
        outcome: 'Replaced 10+ standalone tools with one Odoo — full business migration.',
        metric: '10+ tools replaced',
        href: mobistekla.url(),
        logo: '/images/clients/mobistekla.png',
        logoStyle: 'filter: brightness(0) invert(1)',
    },
    {
        name: 'Ilirika',
        industry: 'Brokerage & Finance',
        outcome: 'CRM and accounting for a regulated, multi-country brokerage.',
        metric: '4 countries',
        href: ilirika.url(),
        logo: '/images/clients/ilirika.png',
        logoStyle: 'filter: brightness(0) invert(1)',
    },
    {
        name: 'NN Saunas',
        industry: 'Premium manufacturing',
        outcome: '2000+ custom saunas, one production platform.',
        metric: '2,000+ units',
        href: nnSaunas.url(),
        logo: '/images/clients/nn-saunas.png',
        logoStyle: 'mix-blend-mode: screen',
    },
]

const storedTriggers: ScrollTrigger[] = []

onMounted(() => {
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return

    const cards = [card0Ref.value, card1Ref.value, card2Ref.value].filter(
        Boolean,
    ) as HTMLElement[]
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
</script>

<template>
    <section class="relative bg-bg-light py-20 lg:py-28 dark:bg-[#0c0710]">
        <div class="mx-auto w-full max-w-7xl px-6 lg:px-8">
            <!-- Section header -->
            <div class="mb-14">
                <div class="mb-4 inline-flex">
                    <span
                        class="inline-flex items-center rounded-full border border-[#c8a951]/30 bg-[#c8a951]/10 px-3 py-1 text-[10px] font-semibold uppercase tracking-[0.15em] text-[#c8a951]"
                    >
                        Clients
                    </span>
                </div>
                <h2
                    class="font-serif leading-tight text-text-light dark:text-text-dark"
                    style="font-size: clamp(28px, 3vw, 44px)"
                >
                    One partner. Three very different businesses.
                </h2>
            </div>

            <!-- Cards grid -->
            <div ref="sectionRef" class="grid grid-cols-1 gap-6 lg:grid-cols-3">
                <!-- Card 0: Mobistekla -->
                <div
                    ref="card0Ref"
                    class="group flex flex-col rounded-2xl border border-[#714b67]/25 bg-white/60 p-7 lg:p-8 dark:bg-linear-to-b dark:from-[#1f1226]/70 dark:to-[#0c0710]/50"
                >
                    <div class="mb-6 flex h-12 items-center">
                        <img
                            v-if="clients[0].logo"
                            :src="clients[0].logo"
                            :alt="`${clients[0].name} logo`"
                            class="h-8 w-auto max-w-[112px] object-contain opacity-75"
                            :style="clients[0].logoStyle"
                        />
                        <div
                            v-else
                            class="flex h-9 w-28 items-center justify-center rounded-lg bg-text-light/8 dark:bg-text-dark/8"
                            :aria-label="`${clients[0].name} logo placeholder`"
                        >
                            <span class="text-[11px] font-medium text-text-light/40 dark:text-text-dark/40">{{ clients[0].name }}</span>
                        </div>
                    </div>

                    <span class="mb-3 text-[11px] font-semibold uppercase tracking-[0.12em] text-[#714b67]">
                        {{ clients[0].industry }}
                    </span>

                    <p class="mb-8 grow text-[14px] leading-relaxed text-text-light/55 dark:text-text-dark/55">
                        {{ clients[0].outcome }}
                    </p>

                    <p class="mb-7 font-mono text-[32px] font-medium leading-none text-text-light dark:text-text-dark">
                        {{ clients[0].metric }}
                    </p>

                    <Link
                        :href="clients[0].href"
                        class="inline-flex items-center gap-1.5 text-[13px] font-medium text-[#c8a951]/75 transition-colors duration-150 hover:text-[#c8a951]"
                    >
                        Read case study
                        <span
                            class="inline-block transition-transform duration-200 group-hover:translate-x-1"
                            aria-hidden="true"
                        >→</span>
                    </Link>
                </div>

                <!-- Card 1: Ilirika -->
                <div
                    ref="card1Ref"
                    class="group flex flex-col rounded-2xl border border-[#714b67]/25 bg-white/60 p-7 lg:p-8 dark:bg-linear-to-b dark:from-[#1f1226]/70 dark:to-[#0c0710]/50"
                >
                    <div class="mb-6 flex h-12 items-center">
                        <img
                            v-if="clients[1].logo"
                            :src="clients[1].logo"
                            :alt="`${clients[1].name} logo`"
                            class="h-8 w-auto max-w-[112px] object-contain opacity-75"
                            :style="clients[1].logoStyle"
                        />
                        <div
                            v-else
                            class="flex h-9 w-28 items-center justify-center rounded-lg bg-text-light/8 dark:bg-text-dark/8"
                            :aria-label="`${clients[1].name} logo placeholder`"
                        >
                            <span class="text-[11px] font-medium text-text-light/40 dark:text-text-dark/40">{{ clients[1].name }}</span>
                        </div>
                    </div>

                    <span class="mb-3 text-[11px] font-semibold uppercase tracking-[0.12em] text-[#714b67]">
                        {{ clients[1].industry }}
                    </span>

                    <p class="mb-8 grow text-[14px] leading-relaxed text-text-light/55 dark:text-text-dark/55">
                        {{ clients[1].outcome }}
                    </p>

                    <p class="mb-7 font-mono text-[32px] font-medium leading-none text-text-light dark:text-text-dark">
                        {{ clients[1].metric }}
                    </p>

                    <Link
                        :href="clients[1].href"
                        class="inline-flex items-center gap-1.5 text-[13px] font-medium text-[#c8a951]/75 transition-colors duration-150 hover:text-[#c8a951]"
                    >
                        Read case study
                        <span
                            class="inline-block transition-transform duration-200 group-hover:translate-x-1"
                            aria-hidden="true"
                        >→</span>
                    </Link>
                </div>

                <!-- Card 2: NN Saunas -->
                <div
                    ref="card2Ref"
                    class="group flex flex-col rounded-2xl border border-[#714b67]/25 bg-white/60 p-7 lg:p-8 dark:bg-linear-to-b dark:from-[#1f1226]/70 dark:to-[#0c0710]/50"
                >
                    <div class="mb-6 flex h-12 items-center">
                        <img
                            v-if="clients[2].logo"
                            :src="clients[2].logo"
                            :alt="`${clients[2].name} logo`"
                            class="h-8 w-auto max-w-[112px] object-contain opacity-75"
                            :style="clients[2].logoStyle"
                        />
                        <div
                            v-else
                            class="flex h-9 w-28 items-center justify-center rounded-lg bg-text-light/8 dark:bg-text-dark/8"
                            :aria-label="`${clients[2].name} logo placeholder`"
                        >
                            <span class="text-[11px] font-medium text-text-light/40 dark:text-text-dark/40">{{ clients[2].name }}</span>
                        </div>
                    </div>

                    <span class="mb-3 text-[11px] font-semibold uppercase tracking-[0.12em] text-[#714b67]">
                        {{ clients[2].industry }}
                    </span>

                    <p class="mb-8 grow text-[14px] leading-relaxed text-text-light/55 dark:text-text-dark/55">
                        {{ clients[2].outcome }}
                    </p>

                    <p class="mb-7 font-mono text-[32px] font-medium leading-none text-text-light dark:text-text-dark">
                        {{ clients[2].metric }}
                    </p>

                    <Link
                        :href="clients[2].href"
                        class="inline-flex items-center gap-1.5 text-[13px] font-medium text-[#c8a951]/75 transition-colors duration-150 hover:text-[#c8a951]"
                    >
                        Read case study
                        <span
                            class="inline-block transition-transform duration-200 group-hover:translate-x-1"
                            aria-hidden="true"
                        >→</span>
                    </Link>
                </div>
            </div>
        </div>
    </section>
</template>
