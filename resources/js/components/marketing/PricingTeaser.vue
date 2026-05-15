<script setup lang="ts">
import { Link } from '@inertiajs/vue3'
import { ref } from 'vue'
import { useMagneticButton } from '@/composables/useMagneticButton'
import { useScrollReveal } from '@/composables/useScrollReveal'
import { contact } from '@/routes'

const contentRef = ref<HTMLElement | null>(null)
const primaryBtnRef = ref<HTMLElement | null>(null)

useScrollReveal(contentRef)
useMagneticButton(primaryBtnRef)
</script>

<template>
    <section class="relative bg-bg-light py-20 lg:py-28 dark:bg-[#0c0710]">
        <div class="mx-auto w-full max-w-7xl px-6 lg:px-8">
            <div ref="contentRef" class="mx-auto max-w-2xl text-center">
                <h2
                    class="mb-5 font-serif leading-tight text-text-light dark:text-text-dark"
                    style="font-size: clamp(28px, 3vw, 44px)"
                >
                    Transparent pricing.
                </h2>

                <p class="mx-auto mb-10 max-w-xl text-[15px] leading-relaxed text-text-light/60 dark:text-text-dark/60">
                    Our Standard package begins at €15 per user per month — fully Slovenian-compliant,
                    no setup fee. Enterprise implementations are scoped after our free consultation.
                </p>

                <div class="flex flex-wrap items-center justify-center gap-4">
                    <!-- Ghost pill — disabled, Stage 2 -->
                    <div class="tooltip-wrap relative inline-flex">
                        <button
                            type="button"
                            disabled
                            aria-disabled="true"
                            class="inline-flex cursor-not-allowed items-center rounded-full border border-text-light/15 px-6 py-3 text-sm font-medium text-text-light/30 dark:border-text-dark/15 dark:text-text-dark/30"
                        >
                            See full pricing
                        </button>
                        <span
                            class="tooltip pointer-events-none absolute -top-9 left-1/2 -translate-x-1/2 whitespace-nowrap rounded-full bg-text-light/10 px-3 py-1 text-[11px] text-text-light/60 opacity-0 shadow-lg transition-opacity duration-150 dark:bg-[#1f1226] dark:text-text-dark/60"
                            role="tooltip"
                        >
                            Coming soon
                        </span>
                    </div>

                    <!-- Primary magnetic pill -->
                    <div ref="primaryBtnRef" class="inline-flex rounded-full">
                        <Link
                            :href="contact.url()"
                            class="inline-flex items-center rounded-full bg-[#c8a951] px-6 py-3 text-sm font-medium text-[#1a0f1c] transition-[filter] duration-150 hover:brightness-110"
                        >
                            <span data-magnetic-inner>Book a consultation</span>
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>
.tooltip-wrap:hover .tooltip {
    opacity: 1;
}
</style>
