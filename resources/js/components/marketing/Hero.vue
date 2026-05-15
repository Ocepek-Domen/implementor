<script setup lang="ts">
import { Link } from '@inertiajs/vue3'
import gsap from 'gsap'
import { onMounted, onUnmounted, ref } from 'vue'
import WebGLNoise from '@/components/WebGLNoise.vue'
import { useMagneticButton } from '@/composables/useMagneticButton'
import { useScrambleText } from '@/composables/useScrambleText'
import { clients, contact } from '@/routes'
import theme from '@/theme'

const eyebrowRef = ref<HTMLElement | null>(null)
const h1WrapRef = ref<HTMLElement | null>(null)
const subRef = ref<HTMLElement | null>(null)
const buttonsRef = ref<HTMLElement | null>(null)
const trustRef = ref<HTMLElement | null>(null)
const h1Line1Ref = ref<HTMLElement | null>(null)
const primaryBtnRef = ref<HTMLElement | null>(null)
const scrolled = ref(false)

const { scramble } = useScrambleText(h1Line1Ref, 'Odoo, done properly.', {
    duration: theme.duration.signature,
})

useMagneticButton(primaryBtnRef)

function onScroll(): void {
    scrolled.value = window.scrollY > 100
}

onMounted(() => {
    const blocks = [
        eyebrowRef.value,
        h1WrapRef.value,
        subRef.value,
        buttonsRef.value,
        trustRef.value,
    ].filter(Boolean) as HTMLElement[]

    gsap.set(blocks, { opacity: 0, y: 24 })
    gsap.to(blocks, {
        opacity: 1,
        y: 0,
        duration: 0.6,
        ease: 'power4.out',
        stagger: theme.stagger.hero / 1000,
    })

    scramble()
    setTimeout(() => {
        if (h1Line1Ref.value) {
            h1Line1Ref.value.innerHTML = 'Odoo, done <em>properly</em>.'
        }
    }, theme.duration.signature + 20)

    window.addEventListener('scroll', onScroll, { passive: true })
})

onUnmounted(() => {
    window.removeEventListener('scroll', onScroll)
})
</script>

<template>
    <section class="relative h-[100dvh] overflow-hidden">
        <WebGLNoise />

        <div class="relative z-10 flex h-full items-center pt-20">
            <div class="mx-auto w-full max-w-7xl px-6 lg:px-8">
                <div class="w-full lg:max-w-[60%]">
                    <!-- Eyebrow chip -->
                    <div ref="eyebrowRef" class="mb-6 inline-flex">
                        <span
                            class="inline-flex items-center rounded-full border border-[#c8a951]/30 bg-[#c8a951]/10 px-3 py-1 text-[10px] font-semibold uppercase tracking-[0.15em] text-[#c8a951]"
                        >
                            Business automation &amp; AI · Odoo Silver Partner · Slovenia
                        </span>
                    </div>

                    <!-- H1 -->
                    <div ref="h1WrapRef" class="mb-6">
                        <h1
                            class="font-serif leading-[1.08] text-[#f5f2ef]"
                            style="font-size: clamp(42px, 5.5vw, 72px)"
                        >
                            <span ref="h1Line1Ref" class="block">Odoo, done properly.</span>
                            <span class="block">For Slovenia.</span>
                        </h1>
                    </div>

                    <!-- Subtitle -->
                    <div ref="subRef" class="mb-10">
                        <p class="max-w-[520px] text-base leading-relaxed text-[#f5f2ef]/65 lg:text-[17px]">
                            We help Slovenian businesses automate their operations, connect their teams, and get off
                            the spreadsheets — on one platform. Slovenian-ready out of the box. From €15 per user
                            per month.
                        </p>
                    </div>

                    <!-- CTA buttons -->
                    <div ref="buttonsRef" class="mb-12 flex flex-wrap items-center gap-4">
                        <div ref="primaryBtnRef" class="inline-flex rounded-full">
                            <Link
                                :href="contact.url()"
                                class="inline-flex items-center rounded-full bg-[#c8a951] px-6 py-3 text-sm font-medium text-[#1a0f1c] transition-[filter] duration-150 hover:brightness-110"
                            >
                                <span data-magnetic-inner>Book a free consultation</span>
                            </Link>
                        </div>

                        <Link
                            :href="clients.url()"
                            class="ghost-btn relative inline-flex items-center py-1 text-sm font-medium text-[#f5f2ef]/75 transition-colors duration-150 hover:text-[#f5f2ef]"
                        >
                            See our work
                        </Link>
                    </div>

                    <!-- Trust row -->
                    <div ref="trustRef" class="flex flex-wrap items-center gap-x-6 gap-y-3">
                        <div
                            class="flex items-center gap-2 rounded-full border border-[#714b67]/40 bg-[#714b67]/15 px-3 py-1.5"
                        >
                            <svg
                                width="12"
                                height="12"
                                viewBox="0 0 24 24"
                                fill="#714b67"
                                xmlns="http://www.w3.org/2000/svg"
                                aria-hidden="true"
                            >
                                <polygon
                                    points="12,2 15.09,8.26 22,9.27 17,14.14 18.18,21.02 12,17.77 5.82,21.02 7,14.14 2,9.27 8.91,8.26"
                                />
                            </svg>
                            <span class="text-xs font-medium text-[#f5f2ef]/80">Odoo Silver Partner</span>
                        </div>

                        <span class="text-xs text-[#f5f2ef]/45">Certified Odoo experts</span>

                        <div class="hidden h-3.5 w-px bg-[#f5f2ef]/15 sm:block" aria-hidden="true" />

                        <div class="flex items-center gap-3">
                            <div
                                v-for="i in 3"
                                :key="i"
                                class="h-6 w-20 rounded-sm bg-[#f5f2ef]/8"
                                :aria-label="`Client logo placeholder ${i}`"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scroll indicator -->
        <Transition
            enter-active-class="transition-opacity duration-500 delay-1000"
            enter-from-class="opacity-0"
            leave-active-class="transition-opacity duration-300"
            leave-to-class="opacity-0"
        >
            <div
                v-if="!scrolled"
                class="pointer-events-none absolute bottom-8 left-1/2 z-10 -translate-x-1/2"
                aria-hidden="true"
            >
                <div class="flex flex-col items-center gap-1.5">
                    <span class="text-[9px] uppercase tracking-widest text-[#f5f2ef]/25">Scroll</span>
                    <svg
                        class="scroll-chevron text-[#f5f2ef]/30"
                        width="16"
                        height="16"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >
                        <polyline points="6 9 12 15 18 9" />
                    </svg>
                </div>
            </div>
        </Transition>
    </section>
</template>

<style scoped>
.ghost-btn::after {
    content: '';
    position: absolute;
    bottom: -2px;
    left: 0;
    width: 0;
    height: 1px;
    background-color: currentColor;
    transition: width 220ms cubic-bezier(0.22, 1, 0.36, 1);
}

.ghost-btn:hover::after {
    width: 100%;
}

@keyframes scroll-chevron-bounce {
    0%,
    100% {
        transform: translateY(0);
        opacity: 0.3;
    }
    50% {
        transform: translateY(5px);
        opacity: 0.6;
    }
}

.scroll-chevron {
    animation: scroll-chevron-bounce 2s ease-in-out infinite;
}
</style>
