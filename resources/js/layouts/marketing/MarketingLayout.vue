<script setup lang="ts">
import { router } from '@inertiajs/vue3'
import gsap from 'gsap'
import { onMounted, onUnmounted, ref } from 'vue'
import CookieBanner from '@/components/marketing/CookieBanner.vue'
import MarketingFooter from '@/components/marketing/MarketingFooter.vue'
import MarketingNav from '@/components/marketing/MarketingNav.vue'
import ScrollUpButton from '@/components/marketing/ScrollUpButton.vue'

const contentRef = ref<HTMLElement | null>(null)
const progressRef = ref<HTMLElement | null>(null)

const prefersReducedMotion =
    typeof window !== 'undefined' && window.matchMedia('(prefers-reduced-motion: reduce)').matches

let removeStart: (() => void) | null = null
let removeFinish: (() => void) | null = null
let progressTween: gsap.core.Tween | null = null

function startProgress(): void {
    if (prefersReducedMotion || !progressRef.value) { return }
    gsap.killTweensOf(progressRef.value)
    gsap.set(progressRef.value, { scaleX: 0, opacity: 1, transformOrigin: 'left center' })
    progressTween = gsap.to(progressRef.value, { scaleX: 0.7, duration: 0.3, ease: 'power1.out' })
}

function finishProgress(): void {
    if (prefersReducedMotion || !progressRef.value) { return }
    if (progressTween) { progressTween.kill() }
    gsap.to(progressRef.value, {
        scaleX: 1,
        duration: 0.15,
        ease: 'power1.out',
        onComplete: () => {
            if (progressRef.value) {
                gsap.to(progressRef.value, { opacity: 0, duration: 0.2, delay: 0.05 })
            }
        },
    })
}

onMounted(() => {
    removeStart = router.on('start', () => {
        startProgress()
        if (!prefersReducedMotion && contentRef.value) {
            gsap.to(contentRef.value, { opacity: 0, duration: 0.15, ease: 'power1.in' })
        }
    })

    removeFinish = router.on('finish', () => {
        finishProgress()
        if (!prefersReducedMotion && contentRef.value) {
            gsap.fromTo(
                contentRef.value,
                { opacity: 0, y: 16 },
                { opacity: 1, y: 0, duration: 0.2, ease: 'back.out(1.2)', clearProps: 'all' },
            )
        }
    })
})

onUnmounted(() => {
    removeStart?.()
    removeFinish?.()
})
</script>

<template>
    <div class="min-h-screen bg-[#fafaf7] text-[#1a0f1c] dark:bg-[#0f0a12] dark:text-[#f5f2ef]">
        <!-- Amber progress bar -->
        <div
            ref="progressRef"
            class="pointer-events-none fixed left-0 top-0 z-[9999] h-[3px] w-full origin-left bg-[#714b67] opacity-0"
            aria-hidden="true"
        />

        <MarketingNav />
        <main ref="contentRef">
            <slot />
        </main>
        <MarketingFooter />
        <CookieBanner />
        <ScrollUpButton />
    </div>
</template>
