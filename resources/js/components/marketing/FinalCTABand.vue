<script setup lang="ts">
import { Link } from '@inertiajs/vue3'
import { ref } from 'vue'
import { useMagneticButton } from '@/composables/useMagneticButton'
import { useScrollReveal } from '@/composables/useScrollReveal'
import { contact } from '@/routes'

interface Props {
    heading?: string
    subheading?: string
    ctaText?: string
    ctaHref?: string
}

const props = withDefaults(defineProps<Props>(), {
    heading: "Let's talk about your business.",
    subheading:
        '45 minutes, free, no slide deck. ERP, AI, or both — we\'ll tell you honestly if we\'re the right fit.',
    ctaText: 'Book your free consultation',
    ctaHref: undefined,
})

const resolvedHref = props.ctaHref ?? contact.url()

const contentRef = ref<HTMLElement | null>(null)
const ctaBtnRef = ref<HTMLElement | null>(null)

useScrollReveal(contentRef)
useMagneticButton(ctaBtnRef)
</script>

<template>
    <section
        class="relative overflow-hidden bg-gradient-to-br from-[#714b67]/12 via-[#2d0a45]/8 to-bg-light py-24 lg:py-32 dark:to-[#0c0710]"
    >
        <!-- Ambient glow -->
        <div
            class="pointer-events-none absolute inset-0 flex items-center justify-center"
            aria-hidden="true"
        >
            <div
                class="h-[400px] w-[600px] rounded-full bg-[#714b67]/8 blur-[120px]"
            />
        </div>

        <div class="relative mx-auto w-full max-w-7xl px-6 lg:px-8">
            <div ref="contentRef" class="mx-auto max-w-2xl text-center">
                <h2
                    class="mb-5 font-serif leading-tight text-text-light dark:text-text-dark"
                    style="font-size: clamp(28px, 3vw, 44px)"
                >
                    {{ heading }}
                </h2>

                <p class="mb-10 text-[15px] leading-relaxed text-text-light/60 dark:text-text-dark/60">
                    {{ subheading }}
                </p>

                <div ref="ctaBtnRef" class="mb-5 inline-flex rounded-full">
                    <Link
                        :href="resolvedHref"
                        class="inline-flex items-center rounded-full bg-[#c8a951] px-8 py-3.5 text-sm font-medium text-[#1a0f1c] transition-[filter] duration-150 hover:brightness-110"
                    >
                        <span data-magnetic-inner>{{ ctaText }}</span>
                    </Link>
                </div>

                <p class="text-[13px] text-text-light/35 dark:text-text-dark/35">
                    Or email us at
                    <a
                        href="mailto:hello@implementor.si"
                        class="text-text-light/55 underline underline-offset-2 transition-colors duration-150 hover:text-text-light/80 dark:text-text-dark/55 dark:hover:text-text-dark/80"
                    >
                        hello@implementor.si
                    </a>
                </p>
            </div>
        </div>
    </section>
</template>
