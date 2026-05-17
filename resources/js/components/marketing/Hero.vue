<script setup lang="ts">
import { Link } from '@inertiajs/vue3'
import gsap from 'gsap'
import { onMounted, onUnmounted, ref } from 'vue'
import { useMagneticButton } from '@/composables/useMagneticButton'
import { clients, contact } from '@/routes'

const eyebrowRef = ref<HTMLElement | null>(null)
const h1Line1Inner = ref<HTMLElement | null>(null)
const h1Line2Inner = ref<HTMLElement | null>(null)
const subRef = ref<HTMLElement | null>(null)
const buttonsRef = ref<HTMLElement | null>(null)
const trustRef = ref<HTMLElement | null>(null)
const primaryBtnRef = ref<HTMLElement | null>(null)
const cardsRef = ref<HTMLElement | null>(null)
const gridRef = ref<HTMLElement | null>(null)
const scrolled = ref(false)

useMagneticButton(primaryBtnRef)

function setupMagneticRepulsion(): (() => void) | undefined {
    const grid = gridRef.value
    if (!grid) return

    const cards = Array.from(grid.querySelectorAll<HTMLElement>('.app-card'))
    const RADIUS = 170
    const STRENGTH = 0.22

    function onMouseMove(e: MouseEvent): void {
        cards.forEach((card) => {
            const rect = card.getBoundingClientRect()
            const cx = rect.left + rect.width / 2
            const cy = rect.top + rect.height / 2
            const dx = e.clientX - cx
            const dy = e.clientY - cy
            const dist = Math.sqrt(dx * dx + dy * dy)
            const force = Math.max(0, 1 - dist / RADIUS)

            gsap.to(card, {
                x: -dx * force * STRENGTH,
                y: -dy * force * STRENGTH,
                duration: 0.35,
                ease: 'power2.out',
                overwrite: 'auto',
            })
        })
    }

    function onMouseLeave(): void {
        gsap.to(cards, {
            x: 0,
            y: 0,
            duration: 0.6,
            ease: 'elastic.out(1, 0.4)',
            stagger: 0.02,
            overwrite: 'auto',
        })
    }

    grid.addEventListener('mousemove', onMouseMove)
    grid.addEventListener('mouseleave', onMouseLeave)

    return () => {
        grid.removeEventListener('mousemove', onMouseMove)
        grid.removeEventListener('mouseleave', onMouseLeave)
    }
}

let cleanupRepulsion: (() => void) | undefined

const odooApps = [
    { name: 'Accounting', module: 'account', url: 'https://www.odoo.com/sl_SI/app/accounting' },
    { name: 'CRM', module: 'crm', url: 'https://www.odoo.com/sl_SI/app/crm' },
    { name: 'Sales', module: 'sale', url: 'https://www.odoo.com/sl_SI/app/sales' },
    { name: 'Inventory', module: 'stock', url: 'https://www.odoo.com/sl_SI/app/inventory' },
    { name: 'Point of Sale', module: 'point_of_sale', url: 'https://www.odoo.com/sl_SI/app/point-of-sale-shop' },
    { name: 'Project', module: 'project', url: 'https://www.odoo.com/sl_SI/app/project' },
    { name: 'Purchase', module: 'purchase', url: 'https://www.odoo.com/sl_SI/app/purchase' },
    { name: 'Employees', module: 'hr', url: 'https://www.odoo.com/sl_SI/app/employees' },
    { name: 'Manufacturing', module: 'mrp', url: 'https://www.odoo.com/sl_SI/app/manufacturing' },
]

function iconUrl(module: string): string {
    return `https://download.odoocdn.com/icons/${module}/static/description/icon.svg`
}

function onScroll(): void {
    scrolled.value = window.scrollY > 100
}

onMounted(() => {
    window.addEventListener('scroll', onScroll, { passive: true })

    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return

    gsap.set(eyebrowRef.value, { opacity: 0, y: 14 })
    gsap.set([h1Line1Inner.value, h1Line2Inner.value], { y: '108%' })
    gsap.set(subRef.value, { opacity: 0, y: 10, filter: 'blur(6px)' })
    gsap.set([buttonsRef.value, trustRef.value], { opacity: 0, y: 12 })
    gsap.set(cardsRef.value, { opacity: 0, y: 22 })

    const tl = gsap.timeline()

    // Eyebrow fades up
    tl.to(eyebrowRef.value, { opacity: 1, y: 0, duration: 0.55, ease: 'power3.out' }, 0)
    // H1 lines rise through the overflow-hidden clip mask
    tl.to(h1Line1Inner.value, { y: '0%', duration: 0.9, ease: 'power4.out' }, 0.18)
    tl.to(h1Line2Inner.value, { y: '0%', duration: 0.9, ease: 'power4.out' }, 0.31)
    // Subtitle deblurs in
    tl.to(subRef.value, { opacity: 1, y: 0, filter: 'blur(0px)', duration: 0.6, ease: 'power3.out' }, 0.65)
    // CTAs and trust stagger up
    tl.to(buttonsRef.value, { opacity: 1, y: 0, duration: 0.5, ease: 'power3.out' }, 0.8)
    tl.to(trustRef.value, { opacity: 1, y: 0, duration: 0.5, ease: 'power3.out' }, 0.92)
    // Cards drift up alongside the text
    tl.to(cardsRef.value, { opacity: 1, y: 0, duration: 0.75, ease: 'power3.out' }, 0.5)

    // Magnetic repulsion on the app card grid
    cleanupRepulsion = setupMagneticRepulsion()
})

onUnmounted(() => {
    window.removeEventListener('scroll', onScroll)
    cleanupRepulsion?.()
})
</script>

<template>
    <section class="relative h-dvh overflow-hidden bg-bg-light dark:bg-bg-dark">
        <!-- Gradient mesh — light: Odoo purple rising from bottom-left + purple accent top-right -->
        <div
            class="pointer-events-none absolute inset-0"
            aria-hidden="true"
            style="background: radial-gradient(ellipse 60% 65% at 95% 5%, rgba(113,75,103,0.20) 0%, transparent 62%), radial-gradient(ellipse 72% 72% at -5% 108%, rgba(113,75,103,0.45) 0%, transparent 55%), radial-gradient(ellipse 45% 50% at 40% 60%, rgba(140,90,165,0.07) 0%, transparent 68%), radial-gradient(ellipse 30% 40% at 14% 0%, rgba(125,80,145,0.12) 0%, transparent 58%)"
        />
        <!-- Purple-tinted dot grid (light mode only) -->
        <div
            class="pointer-events-none absolute inset-0 dark:opacity-0"
            aria-hidden="true"
            style="background-image: radial-gradient(circle, rgba(113,75,103,0.09) 1px, transparent 1px); background-size: 28px 28px"
        />

        <div class="relative z-10 flex h-full items-center pt-20">
            <div class="mx-auto w-full max-w-7xl px-6 lg:px-8">
                <div class="flex flex-col gap-10 lg:flex-row lg:items-center lg:gap-16">

                    <!-- Left: headline + CTA -->
                    <div class="w-full lg:max-w-[55%]">
                        <!-- Eyebrow chip -->
                        <div ref="eyebrowRef" class="mb-6 inline-flex">
                            <span
                                class="inline-flex items-center rounded-full border border-accent/40 bg-accent/10 px-3 py-1 text-[10px] font-semibold uppercase tracking-[0.15em] text-[#714b67] dark:text-accent"
                            >
                                Business automation &amp; AI · Odoo Silver Partner · Slovenia
                            </span>
                        </div>

                        <!-- H1 — each line has an overflow-hidden mask so the inner span rises into view -->
                        <div class="mb-6">
                            <h1
                                class="font-serif text-text-light dark:text-text-dark"
                                style="font-size: clamp(42px, 5.5vw, 72px)"
                            >
                                <span class="block overflow-hidden pb-[0.06em]">
                                    <span ref="h1Line1Inner" class="block leading-[1.08]"
                                        >Odoo, done <em>properly</em>.</span
                                    >
                                </span>
                                <span class="block overflow-hidden pb-[0.06em]">
                                    <span ref="h1Line2Inner" class="block leading-[1.08]">For Slovenia.</span>
                                </span>
                            </h1>
                        </div>

                        <!-- Subtitle -->
                        <div ref="subRef" class="mb-10">
                            <p
                                class="max-w-[520px] text-base leading-relaxed text-text-light/60 dark:text-text-dark/65 lg:text-[17px]"
                            >
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
                                    class="inline-flex items-center rounded-full bg-[#714b67] px-6 py-3 text-sm font-medium text-white transition-[filter] duration-150 hover:brightness-110"
                                >
                                    <span data-magnetic-inner>Book a free consultation</span>
                                </Link>
                            </div>

                            <Link
                                :href="clients.url()"
                                class="ghost-btn relative inline-flex items-center py-1 text-sm font-medium text-text-light/60 transition-colors duration-150 hover:text-text-light dark:text-text-dark/60 dark:hover:text-text-dark"
                            >
                                See our work
                            </Link>
                        </div>

                        <!-- Trust row -->
                        <div ref="trustRef" class="flex flex-wrap items-center gap-x-6 gap-y-3">
                            <div
                                class="flex items-center gap-2 rounded-full border border-primary/25 bg-primary/8 px-3 py-1.5"
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
                                <span class="text-xs font-medium text-text-light/65 dark:text-text-dark/80"
                                    >Odoo Silver Partner</span
                                >
                            </div>

                            <span class="text-xs text-text-light/40 dark:text-text-dark/45"
                                >Certified Odoo experts</span
                            >

                            <div
                                class="hidden h-3.5 w-px bg-text-light/12 dark:bg-text-dark/15 sm:block"
                                aria-hidden="true"
                            />

                            <div class="flex items-center gap-4">
                                <img src="/images/clients/ilirika.png" alt="Ilirika" class="hero-trust-logo h-5 w-auto max-w-[72px] object-contain" />
                                <img src="/images/clients/nn-saunas.png" alt="NN Saunas" class="hero-trust-logo h-5 w-auto max-w-[72px] object-contain invert dark:invert-0" />
                                <img src="/images/clients/mobistekla.png" alt="Mobistekla" class="hero-trust-logo h-5 w-auto max-w-[72px] object-contain" />
                            </div>
                        </div>
                    </div>

                    <!-- Right: Odoo app cards grid -->
                    <div ref="cardsRef" class="hidden shrink-0 lg:block">
                        <div ref="gridRef" class="grid grid-cols-3 gap-2.5">
                            <a
                                v-for="app in odooApps"
                                :key="app.name"
                                :href="app.url"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="app-card group flex flex-col items-center gap-2.5 rounded-xl border border-black/6 bg-white p-4 shadow-xs transition-shadow duration-200 hover:shadow-md dark:border-white/8 dark:bg-[#1a1018] dark:hover:border-white/14"
                            >
                                <img
                                    :src="iconUrl(app.module)"
                                    :alt="app.name"
                                    width="44"
                                    height="44"
                                    class="h-11 w-11"
                                    loading="lazy"
                                />
                                <span
                                    class="text-center text-[10.5px] font-medium leading-tight text-text-light/65 transition-colors group-hover:text-text-light dark:text-text-dark/55 dark:group-hover:text-text-dark"
                                >
                                    {{ app.name }}
                                </span>
                            </a>
                        </div>
                        <p class="mt-3 text-center text-[10px] text-text-light/30 dark:text-text-dark/25">
                            80+ official apps ·
                            <a
                                href="https://www.odoo.com/sl_SI/page/all-apps"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="underline hover:text-text-light/60 dark:hover:text-text-dark/50"
                            >click to explore</a>
                        </p>
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
                    <span class="text-[9px] uppercase tracking-widest text-text-light/25 dark:text-text-dark/25"
                        >Scroll</span
                    >
                    <svg
                        class="scroll-chevron text-text-light/30 dark:text-text-dark/30"
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

.hero-trust-logo {
    opacity: 0.75;
    filter: grayscale(0);
    transition: opacity 200ms ease, filter 200ms ease;
}

.hero-trust-logo:hover {
    opacity: 0.45;
    filter: grayscale(1);
}
</style>
