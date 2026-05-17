<script setup lang="ts">
import { ref } from 'vue'
import { useScrollReveal } from '@/composables/useScrollReveal'
import EyebrowBadge from './EyebrowBadge.vue'

const leftRef = ref<HTMLElement | null>(null)
const rightRef = ref<HTMLElement | null>(null)

useScrollReveal(leftRef)
useScrollReveal(rightRef, { delay: 0.15 })

const badges = [
    { label: 'AI features natively in Odoo' },
    { label: 'RAG systems — your documents, your AI' },
    { label: 'AI chatbots for customers and internal teams' },
    { label: 'AI-to-Odoo integrations' },
    { label: 'All built on your data — no generic black boxes' },
]
</script>

<template>
    <section class="bg-bg-light py-20 lg:py-28 dark:bg-[#060309]">
        <div class="mx-auto w-full max-w-7xl px-6 lg:px-8">
            <div class="grid grid-cols-1 items-center gap-12 lg:grid-cols-2 lg:gap-20">
                <!-- Left column: text -->
                <div ref="leftRef">
                    <EyebrowBadge class="mb-5">AI that works with your data</EyebrowBadge>

                    <h2
                        class="mb-6 font-serif leading-tight text-text-light dark:text-text-dark"
                        style="font-size: clamp(26px, 2.8vw, 42px)"
                    >
                        We build AI into your business — not just your software.
                    </h2>

                    <p class="text-[15px] leading-relaxed text-text-light/60 dark:text-text-dark/60">
                        From AI features inside Odoo to standalone RAG systems that let your team query
                        your own documents and data — we design, build, and integrate AI that actually
                        earns its place.
                    </p>
                </div>

                <!-- Right column: badge grid -->
                <div ref="rightRef" class="grid grid-cols-1 gap-3">
                    <div
                        v-for="badge in badges"
                        :key="badge.label"
                        class="flex items-center gap-3 rounded-xl border border-primary/20 bg-text-light/5 px-4 py-3.5 dark:bg-[#0f0820]/60"
                    >
                        <span
                            class="flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-accent/15 text-[10px] font-bold text-accent"
                            aria-hidden="true"
                        >✓</span>
                        <span class="text-[13px] leading-snug text-text-light/75 dark:text-text-dark/75">{{ badge.label }}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
