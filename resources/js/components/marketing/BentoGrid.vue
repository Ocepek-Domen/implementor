<script setup lang="ts">
import { Link } from '@inertiajs/vue3'
import gsap from 'gsap'
import { ScrollTrigger } from 'gsap/ScrollTrigger'
import { onMounted, onUnmounted, ref } from 'vue'
import type { ComponentPublicInstance } from 'vue'
import theme from '@/theme'
import SectionHeader from './SectionHeader.vue'

gsap.registerPlugin(ScrollTrigger)

export interface BentoTile {
    title: string
    description: string
    span: 1 | 2
    iconHtml: string
    aiStyle?: boolean
    href?: string
}

interface Props {
    eyebrow?: string
    heading?: string
    tiles?: BentoTile[]
}

const props = withDefaults(defineProps<Props>(), {
    eyebrow: 'What we do',
    heading: 'Business automation, ERP, and AI — under one roof.',
    tiles: () => [
        {
            title: 'Business Automation & ERP',
            description: 'Full Odoo setup, from analysis to go-live. Connect finance, operations, sales, and logistics on one platform.',
            span: 2,
            iconHtml: `<rect x="3" y="3" width="7" height="7" rx="1.5" stroke-width="1.5"/><rect x="14" y="3" width="7" height="7" rx="1.5" stroke-width="1.5"/><rect x="3" y="14" width="7" height="7" rx="1.5" stroke-width="1.5"/><rect x="14" y="14" width="7" height="7" rx="1.5" stroke-width="1.5"/>`,
            href: '/services/business-automation',
        },
        {
            title: 'RAG & AI Systems',
            description: 'Custom knowledge bases and document Q&A powered by your own data.',
            span: 1,
            iconHtml: `<ellipse cx="12" cy="5" rx="9" ry="3" stroke-width="1.5"/><path d="M3 5v14c0 1.66 4.03 3 9 3s9-1.34 9-3V5" stroke-width="1.5"/><path d="M3 12c0 1.66 4.03 3 9 3s9-1.34 9-3" stroke-width="1.5"/>`,
            aiStyle: true,
            href: '/services/rag-ai',
        },
        {
            title: 'Slovenian Localization',
            description: 'Our own fiscalization, FURS, chart of accounts — built for Slovenian law.',
            span: 1,
            iconHtml: `<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" stroke-width="1.5"/><path d="m9 12 2 2 4-4" stroke-width="1.5"/>`,
            href: '/services/slovenian-localization',
        },
        {
            title: 'Integrations',
            description: 'Connect Odoo to banks, e-commerce, logistics, BI, and AI models.',
            span: 1,
            iconHtml: `<path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71" stroke-width="1.5"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71" stroke-width="1.5"/>`,
            href: '/services/integrations',
        },
        {
            title: 'Custom Development',
            description: 'Odoo modules and standalone software built to your processes.',
            span: 1,
            iconHtml: `<polyline points="16 18 22 12 16 6" stroke-width="1.5"/><polyline points="8 6 2 12 8 18" stroke-width="1.5"/>`,
            href: '/services/custom-development',
        },
        {
            title: 'AI-Powered Odoo',
            description: 'AI features built into your Odoo: document AI, smart forecasting, email classification, automated workflows.',
            span: 2,
            iconHtml: `<path d="M9 3 10.5 7 14 8.5l-3.5 1.5L9 14 7.5 10 4 8.5 7.5 7z" stroke-width="1.5"/><path d="m18 1 .75 2.25L21 4l-2.25.75L18 7l-.75-2.25L15 4l2.25-.75z" stroke-width="1.5"/><path d="m18 17 .75 2.25L21 20l-2.25.75L18 23l-.75-2.25L15 20l2.25-.75z" stroke-width="1.5"/>`,
            aiStyle: true,
            href: '/services/ai-powered-odoo',
        },
        {
            title: 'Support & Training',
            description: 'Onboarding, hypercare, and ongoing optimization — we stay with you after go-live.',
            span: 2,
            iconHtml: `<path d="M3 18v-6a9 9 0 0 1 18 0v6" stroke-width="1.5"/><path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3z" stroke-width="1.5"/><path d="M3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z" stroke-width="1.5"/>`,
            href: '/services/support',
        },
        {
            title: 'Migrations',
            description: 'From Pantheon, SAP B1, or any legacy ERP to Odoo — with full data integrity.',
            span: 2,
            iconHtml: `<path d="M5 12h14" stroke-width="1.5"/><path d="m12 5 7 7-7 7" stroke-width="1.5"/>`,
            href: '/services/migrations',
        },
    ],
})

const sectionRef = ref<HTMLElement | null>(null)
const tileRefs = ref<(HTMLElement | null)[]>([])
const storedTriggers: ScrollTrigger[] = []
const tiltCleanups: (() => void)[] = []

function setTileRef(el: Element | ComponentPublicInstance | null, index: number): void {
    tileRefs.value[index] = el as HTMLElement | null
}

function applyTilt(el: HTMLElement, maxTilt = 6): () => void {
    const perspective = 800

    function onMove(e: MouseEvent): void {
        const rect = el.getBoundingClientRect()
        const nx = ((e.clientX - rect.left) / rect.width) * 2 - 1
        const ny = ((e.clientY - rect.top) / rect.height) * 2 - 1
        gsap.to(el, {
            rotateX: -ny * maxTilt,
            rotateY: nx * maxTilt,
            transformPerspective: perspective,
            duration: 0.1,
            ease: 'none',
        })
    }

    function onLeave(): void {
        gsap.to(el, {
            rotateX: 0,
            rotateY: 0,
            ...theme.gsap.spring,
        })
    }

    el.addEventListener('mousemove', onMove)
    el.addEventListener('mouseleave', onLeave)

    return () => {
        el.removeEventListener('mousemove', onMove)
        el.removeEventListener('mouseleave', onLeave)
    }
}

onMounted(() => {
    const tileEls = tileRefs.value.filter(Boolean) as HTMLElement[]
    if (!tileEls.length || !sectionRef.value) return

    if (!window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        gsap.set(tileEls, { opacity: 0, y: 40, scale: 0.96 })

        const st = ScrollTrigger.create({
            trigger: sectionRef.value,
            start: 'top 75%',
            onEnter: () => {
                gsap.to(tileEls, {
                    opacity: 1,
                    y: 0,
                    scale: 1,
                    duration: theme.duration.reveal / 1000,
                    ease: theme.gsap.spring.ease,
                    stagger: theme.stagger.card / 1000,
                })
            },
        })
        storedTriggers.push(st)

        if (!('ontouchstart' in window) && navigator.maxTouchPoints === 0) {
            tileEls.forEach((el) => {
                tiltCleanups.push(applyTilt(el, 6))
            })
        }
    }
})

onUnmounted(() => {
    storedTriggers.forEach((st) => st.kill())
    storedTriggers.length = 0
    tiltCleanups.forEach((fn) => fn())
    tiltCleanups.length = 0
})
</script>

<template>
    <section class="relative bg-bg-light py-20 lg:py-28 dark:bg-[#0c0710]">
        <div class="mx-auto w-full max-w-7xl px-6 lg:px-8">
            <SectionHeader class="mb-14" :eyebrow="props.eyebrow" :heading="props.heading" />

            <!-- Bento grid -->
            <div
                ref="sectionRef"
                class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4"
            >
                <component
                    :is="tile.href ? Link : 'div'"
                    v-for="(tile, index) in props.tiles"
                    :key="tile.title"
                    :ref="(el: any) => setTileRef(el, index)"
                    :href="tile.href"
                    :class="[
                        'bento-tile group relative flex flex-col rounded-2xl border p-6 lg:p-7',
                        tile.href ? 'cursor-pointer' : 'cursor-default',
                        tile.span === 2 ? 'md:col-span-2' : 'md:col-span-1',
                        tile.aiStyle
                            ? 'border-[#4a1060]/35 bg-[#f5f0ff]/60 dark:bg-linear-to-b dark:from-[#120828]/70 dark:to-[#060309]/60'
                            : 'border-[#714b67]/25 bg-white/60 dark:bg-linear-to-b dark:from-[#1f1226]/70 dark:to-[#0c0710]/50',
                    ]"
                >
                    <!-- Icon -->
                    <div class="mb-5">
                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#714b67]/20">
                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                class="h-5 w-5 text-[#714b67]"
                                aria-hidden="true"
                            >
                                <g v-html="tile.iconHtml" />
                            </svg>
                        </div>
                    </div>

                    <!-- Title -->
                    <h3 class="mb-2 text-[15px] font-semibold leading-snug text-text-light dark:text-text-dark">
                        {{ tile.title }}
                    </h3>

                    <!-- Description -->
                    <p class="grow text-[13px] leading-relaxed text-text-light/55 dark:text-text-dark/55">
                        {{ tile.description }}
                    </p>

                    <!-- Learn more — revealed on hover, only when tile links somewhere -->
                    <span
                        v-if="tile.href"
                        class="mt-4 self-end text-[12px] font-medium text-[#714b67]/65 opacity-0 transition-opacity duration-200 group-hover:opacity-100"
                        aria-hidden="true"
                    >
                        Learn more →
                    </span>
                </component>
            </div>
        </div>
    </section>
</template>

<style scoped>
.bento-tile {
    transition: box-shadow 250ms ease;
}

.bento-tile:hover {
    box-shadow:
        0 0 0 1px rgba(113, 75, 103, 0.5),
        0 8px 40px rgba(113, 75, 103, 0.2);
}
</style>
