<script setup lang="ts">
import { ref } from 'vue'
import { useScrollReveal } from '@/composables/useScrollReveal'

const leftRef = ref<HTMLElement | null>(null)
const rightRef = ref<HTMLElement | null>(null)

useScrollReveal(leftRef)
useScrollReveal(rightRef, { delay: 0.15 })

const badges = [
    { label: 'Slovenian chart of accounts' },
    { label: 'FURS fiscalization (certified)' },
    { label: 'VAT — general, reverse charge, EU triangulation' },
    { label: 'e-SLOG e-invoicing' },
    { label: 'Payroll-ready integrations' },
    { label: 'Bank statement parsers (NLB, NKBM, SKB, and others)' },
    { label: 'FURS reporting forms (DDV-O, REK, and others)' },
    { label: 'Quarterly updates — every law change, every Odoo release' },
]
</script>

<template>
    <section class="bg-[#f5f2fb] py-20 lg:py-28 dark:bg-[#0a0810]">
        <div class="mx-auto w-full max-w-7xl px-6 lg:px-8">
            <div class="grid grid-cols-1 items-start gap-12 lg:grid-cols-2 lg:gap-20">
                <!-- Left column: text -->
                <div ref="leftRef">
                    <div class="mb-5 inline-flex">
                        <span
                            class="inline-flex items-center rounded-full border border-accent/30 bg-accent/10 px-3 py-1 text-[10px] font-semibold uppercase tracking-[0.15em] text-accent"
                        >
                            Our biggest difference
                        </span>
                    </div>

                    <h2
                        class="mb-6 font-serif leading-tight text-text-light dark:text-text-dark"
                        style="font-size: clamp(26px, 2.8vw, 42px)"
                    >
                        Slovenian localization and fiscalization, by us.
                    </h2>

                    <p class="mb-6 text-[15px] leading-relaxed text-text-light/60 dark:text-text-dark/60">
                        We build and maintain our own Slovenian localization suite for Odoo. That means the
                        chart of accounts, FURS-certified fiscalization, VAT including reverse charge and EU
                        triangulation, e-SLOG for e-invoicing, bank parsers, and the dozens of small
                        adjustments that make Odoo behave like a Slovenian system instead of a generic
                        European one.
                    </p>

                    <p class="text-[15px] leading-relaxed text-text-light/60 dark:text-text-dark/60">
                        We don't rent it from anyone. We don't depend on anyone. When Slovenian tax law
                        changes, we ship the update. When a new Odoo version releases, our localization is
                        ready.
                    </p>
                </div>

                <!-- Right column: badge grid -->
                <div ref="rightRef" class="grid grid-cols-1 gap-3 sm:grid-cols-2">
                    <div
                        v-for="badge in badges"
                        :key="badge.label"
                        class="flex items-start gap-3 rounded-xl border border-primary/25 bg-white/60 px-4 py-3.5 dark:bg-[#1a0f20]/50"
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
