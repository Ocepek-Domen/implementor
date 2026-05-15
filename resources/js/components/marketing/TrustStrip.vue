<script setup lang="ts">
import { onMounted, onUnmounted, ref } from 'vue'
import gsap from 'gsap'
import { ScrollTrigger } from 'gsap/ScrollTrigger'
import theme from '@/theme'

gsap.registerPlugin(ScrollTrigger)

interface LogoItem {
    name: string
    src?: string
    placeholder?: boolean
}

const props = withDefaults(defineProps<{
    logos?: LogoItem[]
    eyebrow?: string
}>(), {
    logos: () => [
        { name: 'Ilirika' },
        { name: 'NN Saunas' },
        { name: 'Mobistekla' },
        { name: '', placeholder: true },
        { name: '', placeholder: true },
    ],
    eyebrow: 'Trusted by Slovenian businesses from 5 to over 100 people.',
})

const stripRef = ref<HTMLElement | null>(null)
const eyebrowRef = ref<HTMLElement | null>(null)
const logoItemRefs = ref<(HTMLElement | null)[]>([])
let st: ScrollTrigger | null = null

function setLogoRef(el: unknown, i: number): void {
    logoItemRefs.value[i] = el instanceof HTMLElement ? el : null
}

onMounted(() => {
    const logoEls = logoItemRefs.value.filter((el): el is HTMLElement => el !== null)

    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        return
    }

    const allEls = [eyebrowRef.value, ...logoEls].filter((el): el is HTMLElement => el !== null)
    gsap.set(allEls, { opacity: 0, y: 20 })

    st = ScrollTrigger.create({
        trigger: stripRef.value,
        onEnter: () => {
            gsap.to(eyebrowRef.value, {
                opacity: 1,
                y: 0,
                duration: 0.5,
                ease: 'power4.out',
            })
            gsap.to(logoEls, {
                opacity: 1,
                y: 0,
                ...theme.gsap.spring,
                stagger: theme.stagger.card / 1000,
                delay: 0.2,
            })
        },
    })
})

onUnmounted(() => {
    st?.kill()
    st = null
})
</script>

<template>
    <section ref="stripRef" class="border-y border-text-light/8 bg-text-light/4 py-14 dark:border-text-dark/8 dark:bg-text-dark/4">
        <div class="mx-auto w-full max-w-7xl px-6 lg:px-8">
            <p
                ref="eyebrowRef"
                class="mb-10 text-center text-xs font-medium uppercase tracking-[0.15em] text-text-light/40 dark:text-text-dark/40"
            >
                {{ props.eyebrow }}
            </p>

            <div class="flex flex-wrap items-center justify-center gap-8 sm:gap-12">
                <div
                    v-for="(logo, i) in props.logos"
                    :key="logo.name || i"
                    :ref="(el) => setLogoRef(el, i)"
                    class="flex items-center justify-center"
                >
                    <img
                        v-if="logo.src"
                        :src="logo.src"
                        :alt="logo.name"
                        class="logo-img h-8 w-auto max-w-[120px] object-contain"
                    />

                    <div
                        v-else-if="!logo.placeholder"
                        class="logo-badge flex h-8 min-w-[88px] items-center justify-center rounded px-3 ring-1 ring-text-light/12 transition-shadow duration-200 hover:ring-text-light/25 dark:ring-text-dark/12 dark:hover:ring-text-dark/25"
                    >
                        <span class="text-[11px] font-semibold tracking-wide text-text-light/35 dark:text-text-dark/35">
                            {{ logo.name }}
                        </span>
                    </div>

                    <div
                        v-else
                        class="h-8 w-24 rounded bg-text-light/8 dark:bg-text-dark/8"
                        aria-hidden="true"
                    />
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>
.logo-img {
    filter: grayscale(1) opacity(0.45);
    transition: filter 200ms ease;
}

.logo-img:hover {
    filter: grayscale(0) opacity(1);
}

.logo-badge:hover span {
    color: rgb(26 15 28 / 0.6);
}

:global(.dark) .logo-badge:hover span {
    color: rgb(245 242 239 / 0.6);
}

.logo-badge span {
    transition: color 200ms ease;
}
</style>
