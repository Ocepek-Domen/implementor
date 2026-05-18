<script setup lang="ts">
import { onMounted, onUnmounted, ref } from 'vue'
import gsap from 'gsap'
import { ScrollTrigger } from 'gsap/ScrollTrigger'

gsap.registerPlugin(ScrollTrigger)

interface LogoItem {
    name: string
    src?: string
    featured?: boolean
    logoClass?: string
}

const props = withDefaults(defineProps<{
    logos?: LogoItem[]
    eyebrow?: string
}>(), {
    logos: () => [
        { name: 'Mobistekla', src: '/images/clients/mobistekla.png', featured: true },
        { name: 'Ilirika', src: '/images/clients/ilirika.png', featured: true },
        { name: 'NN Saunas', src: '/images/clients/nn-saunas.png', featured: true, logoClass: 'invert dark:invert-0' },
        { name: 'Ainvest', src: '/images/clients/ainvest.png' },
        { name: 'Gatom', src: '/images/clients/gatom.png' },
        { name: 'Herbio', src: '/images/clients/herbio.png' },
        { name: 'PLT', src: '/images/clients/plt.png' },
        { name: 'Sigmateh', src: '/images/clients/sigmateh.png' },
        { name: 'Solven Energija', src: '/images/clients/solven.png' },
        { name: 'Vitalni za vedno', src: '/images/clients/vitalni.svg' },
    ],
    eyebrow: 'Trusted by Slovenian businesses',
})

const sectionRef = ref<HTMLElement | null>(null)
let st: ScrollTrigger | null = null

onMounted(() => {
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return

    gsap.set(sectionRef.value, { opacity: 0 })

    st = ScrollTrigger.create({
        trigger: sectionRef.value,
        start: 'top 88%',
        onEnter: () => {
            gsap.to(sectionRef.value, {
                opacity: 1,
                duration: 0.8,
                ease: 'power2.out',
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
    <section
        ref="sectionRef"
        class="border-y border-text-light/8 bg-text-light/4 py-12 dark:border-text-dark/8 dark:bg-text-dark/4"
    >
        <p class="mb-9 text-center text-xs font-medium uppercase tracking-[0.15em] text-text-light/40 dark:text-text-dark/40">
            {{ props.eyebrow }}
        </p>

        <div class="marquee-viewport overflow-hidden">
            <div class="marquee-track flex items-center">
                <template v-for="pass in 4" :key="pass">
                    <div
                        v-for="logo in props.logos"
                        :key="`${pass}-${logo.name}`"
                        class="mr-20 flex shrink-0 items-center justify-center"
                        :aria-hidden="pass > 1 ? 'true' : undefined"
                    >
                        <img
                            v-if="logo.src"
                            :src="logo.src"
                            :alt="logo.name"
                            :class="[logo.featured ? 'logo-featured' : 'logo-gray', logo.logoClass]"
                            class="h-7 w-auto max-w-[110px] object-contain"
                        />
                        <div
                            v-else
                            class="logo-text flex h-7 min-w-[80px] items-center justify-center rounded px-3 ring-1 ring-text-light/10 dark:ring-text-dark/10"
                        >
                            <span class="text-[11px] font-semibold tracking-wide text-text-light/25 dark:text-text-dark/25">
                                {{ logo.name }}
                            </span>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </section>
</template>

<style scoped>
.marquee-viewport {
    -webkit-mask-image: linear-gradient(to right, transparent, black 8%, black 92%, transparent);
    mask-image: linear-gradient(to right, transparent, black 8%, black 92%, transparent);
}

.marquee-track {
    width: max-content;
    animation: marquee 38s linear infinite;
    will-change: transform;
}

.marquee-track:hover {
    animation-play-state: paused;
}

@keyframes marquee {
    from { transform: translateX(0); }
    to { transform: translateX(-25%); }
}

.logo-featured {
    opacity: 0.8;
    transition: opacity 200ms ease, transform 200ms ease;
}

.logo-featured:hover {
    opacity: 1;
    transform: translateY(-3px);
}

.logo-gray {
    opacity: 0.45;
    filter: grayscale(0.6) saturate(0.7);
    transition: opacity 200ms ease, filter 200ms ease, transform 200ms ease;
}

.logo-gray:hover {
    opacity: 0.85;
    filter: grayscale(0) saturate(1);
    transform: translateY(-3px);
}

.logo-text {
    transition: ring-color 200ms ease;
}
</style>
