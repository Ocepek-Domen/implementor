<script setup lang="ts">
import { ref } from 'vue'
import { useScrollReveal } from '@/composables/useScrollReveal'

const leftRef = ref<HTMLElement | null>(null)
const rightRef = ref<HTMLElement | null>(null)

useScrollReveal(leftRef)
useScrollReveal(rightRef, { delay: 0.15 })

const badges = [
    { label: 'AI-powered document processing — invoices, contracts, forms' },
    { label: 'Forecasting and demand planning with AI' },
    { label: 'Email and ticket auto-classification' },
    { label: 'RAG knowledge bases — query your own manuals, procedures, history' },
    { label: 'Internal AI assistants for your team' },
    { label: 'Customer-facing AI chatbots' },
    { label: 'Odoo ↔ LLM integrations (OpenAI, Claude, local models)' },
    { label: 'Custom AI pipelines built around your workflows' },
]
</script>

<template>
    <section class="bg-bg-light py-20 lg:py-28 dark:bg-[#060309]">
        <div class="mx-auto w-full max-w-7xl px-6 lg:px-8">
            <div class="grid grid-cols-1 items-start gap-12 lg:grid-cols-2 lg:gap-20">
                <!-- Left column: text -->
                <div ref="leftRef">
                    <div class="mb-5 inline-flex">
                        <span
                            class="inline-flex items-center rounded-full border border-accent/30 bg-accent/10 px-3 py-1 text-[10px] font-semibold uppercase tracking-[0.15em] text-accent"
                        >
                            The AI layer
                        </span>
                    </div>

                    <h2
                        class="mb-6 font-serif leading-tight text-text-light dark:text-text-dark"
                        style="font-size: clamp(26px, 2.8vw, 42px)"
                    >
                        Your business data is an untapped asset. We help you use it.
                    </h2>

                    <p class="mb-6 text-[15px] leading-relaxed text-text-light/60 dark:text-text-dark/60">
                        We build AI into your operations — not as a buzzword, but as concrete tools that
                        save your team hours every week. AI features natively in Odoo. RAG systems your
                        team can actually query. Chatbots trained on your processes. And integrations that
                        connect Odoo's structured data with the reasoning power of modern LLMs.
                    </p>

                    <p class="text-[15px] leading-relaxed text-text-light/60 dark:text-text-dark/60">
                        No generic AI. Everything trained on your data, your documents, your business.
                        We work with OpenAI, Anthropic Claude, and local open-source models — whatever
                        fits your compliance and infrastructure requirements.
                    </p>
                </div>

                <!-- Right column: badge grid -->
                <div ref="rightRef" class="grid grid-cols-1 gap-3 sm:grid-cols-2">
                    <div
                        v-for="badge in badges"
                        :key="badge.label"
                        class="flex items-start gap-3 rounded-xl border border-primary/20 bg-text-light/5 px-4 py-3.5 dark:bg-[#0f0820]/60"
                    >
                        <span
                            class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-accent/15 text-[10px] font-bold text-accent"
                            aria-hidden="true"
                        >✓</span>
                        <span class="text-[13px] leading-snug text-text-light/75 dark:text-text-dark/75">{{ badge.label }}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
