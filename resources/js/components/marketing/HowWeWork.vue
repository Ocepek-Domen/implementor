<script setup lang="ts">
import gsap from 'gsap'
import { ScrollTrigger } from 'gsap/ScrollTrigger'
import { onMounted, onUnmounted, ref } from 'vue'
import type { ComponentPublicInstance } from 'vue'
import theme from '@/theme'
import SectionHeader from './SectionHeader.vue'

gsap.registerPlugin(ScrollTrigger)

interface Props {
    extended?: boolean
}

const props = withDefaults(defineProps<Props>(), {
    extended: false,
})

interface Step {
    number: string
    title: string
    subtitle: string
    description: string
    bullets: string[]
    deliverable: string
}

const steps: Step[] = [
    {
        number: '01',
        title: 'Discover',
        subtitle: 'Free · 45 minutes',
        description: "We map your processes, ask hard questions, and tell you honestly whether Odoo fits.",
        bullets: [
            'Process mapping conversation',
            'Honest fit assessment',
            'Recommended Odoo modules',
            'Rough timeline and budget range',
        ],
        deliverable: 'One-page recommendation email after the call',
    },
    {
        number: '02',
        title: 'Design',
        subtitle: '2–4 weeks',
        description: 'A real workshop with your team. You leave with a plan you own — not a sales deck.',
        bullets: [
            'Detailed workshop with your team',
            'Module list with configurations',
            'Integration architecture',
            'Fixed-price implementation proposal',
        ],
        deliverable: 'Written Statement of Work — yours to keep',
    },
    {
        number: '03',
        title: 'Build',
        subtitle: '4 weeks to several months',
        description: 'Sprint-based delivery. You see the system take shape every week — no black box.',
        bullets: [
            'Weekly demos with your team',
            'Configuration, integrations, data migration',
            'User acceptance testing',
            'Admin and end-user training',
        ],
        deliverable: 'A live Odoo instance with your data and your users trained',
    },
    {
        number: '04',
        title: 'Live & grow',
        subtitle: 'Ongoing',
        description: 'Go-live is a milestone, not an ending. We stay with you as the business changes.',
        bullets: [
            '30-day hypercare post go-live',
            'Quarterly health checks',
            'New features as your business evolves',
            'SLA-backed support',
        ],
        deliverable: 'Defined SLA and a named consultant who knows your system',
    },
]

const sectionRef = ref<HTMLElement | null>(null)
const lineRef = ref<HTMLElement | null>(null)
const nodeRefs = ref<(HTMLElement | null)[]>([null, null, null, null])
const labelRefs = ref<(HTMLElement | null)[]>([null, null, null, null])

const storedTriggers: ScrollTrigger[] = []

function setNodeRef(el: Element | ComponentPublicInstance | null, index: number): void {
    nodeRefs.value[index] = el as HTMLElement | null
}

function setLabelRef(el: Element | ComponentPublicInstance | null, index: number): void {
    labelRefs.value[index] = el as HTMLElement | null
}

onMounted(() => {
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return

    const section = sectionRef.value
    if (!section) return

    // Extended mode: animate step cards on scroll
    if (props.extended) {
        const cards = [...section.querySelectorAll<HTMLElement>('.extended-step')]
        gsap.set(cards, { opacity: 0, y: 32 })
        const st = ScrollTrigger.create({
            trigger: section,
            start: 'top 75%',
            onEnter: () => {
                gsap.to(cards, {
                    opacity: 1,
                    y: 0,
                    duration: theme.duration.reveal / 1000,
                    ease: theme.gsap.spring.ease,
                    stagger: 0.08,
                })
            },
        })
        storedTriggers.push(st)
        return
    }

    if (window.innerWidth < 1024) {
        const mobileSteps = [...section.querySelectorAll<HTMLElement>('.mobile-step')]
        gsap.set(mobileSteps, { opacity: 0, y: 16 })
        const st = ScrollTrigger.create({
            trigger: section,
            start: 'top 75%',
            onEnter: () => {
                gsap.to(mobileSteps, {
                    opacity: 1,
                    y: 0,
                    duration: theme.duration.reveal / 1000,
                    ease: theme.gsap.spring.ease,
                    stagger: 0.1,
                })
            },
        })
        storedTriggers.push(st)
        return
    }

    const line = lineRef.value
    const nodes = nodeRefs.value.filter(Boolean) as HTMLElement[]
    const labels = labelRefs.value.filter(Boolean) as HTMLElement[]

    if (!line || nodes.length < 4 || labels.length < 4) return

    const lineDuration = 1.6

    gsap.set(line, { scaleX: 0, transformOrigin: 'left center' })
    nodes.forEach((node) =>
        gsap.set(node, { scale: 1, boxShadow: '0 0 0 0px rgba(113,75,103,0)' }),
    )
    labels.forEach((label) => gsap.set(label, { opacity: 0, y: 16 }))

    const tl = gsap.timeline({ paused: true })

    tl.to(line, { scaleX: 1, duration: lineDuration, ease: 'none' })

    nodes.forEach((node, i) => {
        const t = (i / (nodes.length - 1)) * lineDuration
        tl.to(
            node,
            {
                scale: 1.15,
                boxShadow: '0 0 0 6px rgba(113,75,103,0.2), 0 0 24px rgba(113,75,103,0.45)',
                duration: 0.18,
                ease: 'power2.out',
            },
            t,
        )
        tl.to(
            node,
            {
                scale: 1,
                boxShadow: '0 0 0 0px rgba(113,75,103,0)',
                duration: 0.28,
                ease: 'back.out(2)',
            },
            t + 0.18,
        )
        tl.to(labels[i], { opacity: 1, y: 0, duration: 0.45, ease: 'power3.out' }, t + 0.06)
    })

    const st = ScrollTrigger.create({
        trigger: section,
        start: 'top 70%',
        onEnter: () => tl.play(),
    })
    storedTriggers.push(st)
})

onUnmounted(() => {
    storedTriggers.forEach((st) => st.kill())
    storedTriggers.length = 0
})
</script>

<template>
    <section ref="sectionRef" class="relative bg-bg-light py-20 lg:py-28 dark:bg-[#0c0710]">
        <div class="mx-auto w-full max-w-7xl px-6 lg:px-8">
            <SectionHeader class="mb-16" eyebrow="The process" heading="Calm, structured, no black box." />

            <!-- Extended mode: 2×2 grid of detail cards -->
            <div v-if="props.extended" class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <div
                    v-for="step in steps"
                    :key="step.number"
                    class="extended-step rounded-2xl border border-[#714b67]/25 bg-white/60 p-7 lg:p-8 dark:bg-linear-to-b dark:from-[#1f1226]/60 dark:to-[#0c0710]/40"
                >
                    <div class="mb-5 flex items-center gap-4">
                        <div
                            class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full border border-[#714b67]/35 bg-[#714b67]/8"
                        >
                            <span class="font-mono text-sm font-medium text-[#714b67]">{{ step.number }}</span>
                        </div>
                        <div>
                            <h3 class="text-[16px] font-semibold leading-snug text-text-light dark:text-text-dark">{{ step.title }}</h3>
                            <span class="text-[12px] text-[#714b67]/70">{{ step.subtitle }}</span>
                        </div>
                    </div>

                    <p class="mb-5 text-[14px] leading-relaxed text-text-light/60 dark:text-text-dark/60">{{ step.description }}</p>

                    <ul class="mb-5 space-y-2">
                        <li
                            v-for="bullet in step.bullets"
                            :key="bullet"
                            class="flex items-start gap-2.5 text-[13px] leading-snug text-text-light/55 dark:text-text-dark/55"
                        >
                            <span class="mt-0.5 text-[11px] font-bold text-[#714b67]/60" aria-hidden="true">→</span>
                            {{ bullet }}
                        </li>
                    </ul>

                    <div class="flex items-start gap-2 rounded-lg border border-[#714b67]/15 bg-[#714b67]/5 px-3.5 py-2.5">
                        <span class="mt-0.5 text-[11px] font-bold text-[#714b67]" aria-hidden="true">✓</span>
                        <span class="text-[12px] leading-snug text-[#714b67]/80">{{ step.deliverable }}</span>
                    </div>
                </div>
            </div>

            <!-- Standard mode: horizontal timeline (desktop) + stacked (mobile) -->
            <template v-else>
                <!-- Desktop: horizontal timeline -->
                <div class="relative hidden lg:block">
                    <div
                        class="pointer-events-none absolute"
                        style="top: 22px; left: 12.5%; right: 12.5%; height: 1px; background: rgba(113,75,103,0.25)"
                        aria-hidden="true"
                    >
                        <div ref="lineRef" class="h-full bg-[#714b67]" style="will-change: transform" />
                    </div>

                    <div class="grid grid-cols-4">
                        <div
                            v-for="(step, index) in steps"
                            :key="step.number"
                            class="flex flex-col items-center px-5 text-center"
                        >
                            <div
                                :ref="(el) => setNodeRef(el, index)"
                                class="relative z-10 mb-6 flex h-11 w-11 items-center justify-center rounded-full border border-[#714b67]/35 bg-bg-light dark:bg-[#0c0710]"
                                style="will-change: transform, box-shadow"
                            >
                                <span class="font-mono text-sm font-medium text-[#714b67]">{{ step.number }}</span>
                            </div>

                            <div :ref="(el) => setLabelRef(el, index)" class="flex flex-col items-center gap-2">
                                <h3 class="text-[15px] font-semibold text-text-light dark:text-text-dark">{{ step.title }}</h3>
                                <p class="max-w-[200px] text-[13px] leading-relaxed text-text-light/55 dark:text-text-dark/55">
                                    {{ step.description }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mobile: vertical stacked steps -->
                <div class="flex flex-col gap-8 lg:hidden">
                    <div
                        v-for="step in steps"
                        :key="step.number"
                        class="mobile-step flex items-start gap-5"
                    >
                        <div
                            class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full border border-[#714b67]/35 bg-[#714b67]/8"
                        >
                            <span class="font-mono text-sm font-medium text-[#714b67]">{{ step.number }}</span>
                        </div>
                        <div class="pt-1.5">
                            <h3 class="mb-1.5 text-[15px] font-semibold text-text-light dark:text-text-dark">{{ step.title }}</h3>
                            <p class="text-[14px] leading-relaxed text-text-light/55 dark:text-text-dark/55">{{ step.description }}</p>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </section>
</template>
