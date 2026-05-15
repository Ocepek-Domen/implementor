<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3'
import { ref } from 'vue'
import FinalCTABand from '@/components/marketing/FinalCTABand.vue'
import { useBreadcrumbSchema } from '@/composables/useBreadcrumbSchema'
import { useCountUp } from '@/composables/useCountUp'
import { useJsonLdSchema } from '@/composables/useJsonLdSchema'
import { useLocalBusinessSchema } from '@/composables/useLocalBusinessSchema'
import { useScrollReveal } from '@/composables/useScrollReveal'
import { clients, contact } from '@/routes'

const manifestoRef = ref<HTMLElement | null>(null)
const teamRef = ref<HTMLElement | null>(null)
const certsRef = ref<HTMLElement | null>(null)
const storyRef = ref<HTMLElement | null>(null)

useScrollReveal(manifestoRef)
useScrollReveal(teamRef)
useScrollReveal(certsRef)
useScrollReveal(storyRef)

const manifesto = [
    {
        statement: 'Seniors only on every project.',
        detail: 'No junior offload. No "we\'ll teach them on your project." Every client gets a certified expert from day one.',
    },
    {
        statement: 'Slovenian compliance is our problem, not yours.',
        detail: 'Our localization is ours. We built it, we maintain it, we update it when the law changes. You don\'t need to think about it.',
    },
    {
        statement: 'Short engagements over long ones.',
        detail: 'We\'d rather ship a tight scope in eight weeks than bill you for eighteen months. Fixed scope, fixed price, no surprises.',
    },
    {
        statement: 'Plain numbers, plain language.',
        detail: 'You\'ll get fixed-price proposals you can read in five minutes and a partner who tells you when something won\'t work.',
    },
]

const team = [
    {
        name: '[Placeholder Name]',
        role: 'Founder & Lead Consultant',
        bio: 'Certified Odoo Expert. Bio to be added before public launch.',
        certified: true,
    },
    {
        name: '[Placeholder Name]',
        role: 'Senior Odoo Consultant',
        bio: 'Certified Odoo Expert. Bio to be added before public launch.',
        certified: true,
    },
    {
        name: '[Placeholder Name]',
        role: 'Senior Odoo Developer',
        bio: 'Certified Odoo Expert. Bio to be added before public launch.',
        certified: true,
    },
]

const partnerStats = [
    { label: 'client references' },
    { label: 'customer retention' },
    { label: 'certified v19 experts' },
    { label: 'largest client (users)' },
]

const statRef0 = ref<HTMLElement | null>(null)
const statRef1 = ref<HTMLElement | null>(null)
const statRef2 = ref<HTMLElement | null>(null)
const statRef3 = ref<HTMLElement | null>(null)

useCountUp(statRef0, 12)
useCountUp(statRef1, 100, { suffix: '%' })
useCountUp(statRef2, 3)
useCountUp(statRef3, 100, { suffix: '+' })

useBreadcrumbSchema([
    { name: 'Home', url: 'https://implementor.si/' },
    { name: 'About', url: 'https://implementor.si/about' },
])

useLocalBusinessSchema()

useJsonLdSchema({
    '@type': 'ItemList',
    name: 'Implementor Team',
    itemListElement: team.map((member, i) => ({
        '@type': 'ListItem',
        position: i + 1,
        item: {
            '@type': 'Person',
            name: member.name,
            jobTitle: member.role,
            worksFor: { '@type': 'Organization', name: 'Implementor d.o.o.' },
            ...(member.certified ? {
                hasCredential: {
                    '@type': 'EducationalOccupationalCredential',
                    credentialCategory: 'certification',
                    name: 'Certified Odoo Expert',
                },
            } : {}),
        },
    })),
})
</script>

<template>
    <Head>
        <title>About Implementor — Slovenia's Odoo Silver Partner team</title>
        <meta
            name="description"
            content="Implementor is a Slovenian Odoo Silver Partner. Senior certified team, our own Slovenian localization, and a craft approach to Odoo implementations."
        />
    </Head>

    <!-- Hero -->
    <section class="relative bg-bg-light pb-20 pt-32 lg:pb-28 lg:pt-40 dark:bg-[#0c0710]">
        <div class="mx-auto w-full max-w-7xl px-6 lg:px-8">
            <div class="mb-6 inline-flex">
                <span
                    class="inline-flex items-center rounded-full border border-accent/30 bg-accent/10 px-3 py-1 text-[10px] font-semibold uppercase tracking-[0.15em] text-accent"
                >
                    About
                </span>
            </div>
            <h1
                class="mb-8 max-w-3xl font-serif leading-tight text-text-light dark:text-text-dark"
                style="font-size: clamp(36px, 5vw, 68px)"
            >
                A small, senior Odoo team.<br class="hidden sm:block" />
                <em>By design.</em>
            </h1>
            <p class="max-w-[600px] text-[16px] leading-relaxed text-text-light/60 dark:text-text-dark/60">
                We started Implementor because we believed Slovenian businesses deserved a modern, honest
                Odoo partner — not a black box, not a sales pipeline, not a junior factory. Three years in,
                we're a Silver Partner with a senior, certified team, our own Slovenian localization, and a
                client list that speaks for itself.
            </p>
        </div>
    </section>

    <!-- Manifesto strip -->
    <section class="bg-bg-light py-12 lg:py-16 dark:bg-[#060309]">
        <div class="mx-auto w-full max-w-7xl px-6 lg:px-8">
            <div ref="manifestoRef" class="divide-y divide-[#714b67]/20">
                <div
                    v-for="item in manifesto"
                    :key="item.statement"
                    class="flex flex-col gap-2 py-8 lg:flex-row lg:items-baseline lg:gap-16"
                >
                    <h2
                        class="shrink-0 font-serif leading-snug text-text-light lg:w-[420px] dark:text-text-dark"
                        style="font-size: clamp(20px, 2vw, 28px)"
                    >
                        {{ item.statement }}
                    </h2>
                    <p class="text-[14px] leading-relaxed text-text-light/50 lg:text-[15px] dark:text-text-dark/50">
                        {{ item.detail }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team grid -->
    <section class="bg-bg-light py-20 lg:py-28 dark:bg-[#0c0710]">
        <div class="mx-auto w-full max-w-7xl px-6 lg:px-8">
            <div class="mb-14">
                <div class="mb-4 inline-flex">
                    <span
                        class="inline-flex items-center rounded-full border border-accent/30 bg-accent/10 px-3 py-1 text-[10px] font-semibold uppercase tracking-[0.15em] text-accent"
                    >
                        The team
                    </span>
                </div>
                <h2
                    class="font-serif leading-tight text-text-light dark:text-text-dark"
                    style="font-size: clamp(28px, 3vw, 44px)"
                >
                    Senior. Certified. Accountable.
                </h2>
            </div>

            <div ref="teamRef" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <div
                    v-for="member in team"
                    :key="member.name"
                    class="flex flex-col rounded-2xl border border-[#714b67]/25 bg-white/60 p-7 dark:bg-linear-to-b dark:from-[#1f1226]/60 dark:to-[#0c0710]/40"
                >
                    <!-- Avatar placeholder -->
                    <div
                        class="mb-5 flex h-16 w-16 items-center justify-center rounded-full bg-[#714b67]/20 text-[#714b67]"
                        aria-hidden="true"
                    >
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                            <circle cx="12" cy="7" r="4" />
                        </svg>
                    </div>

                    <h3 class="mb-1 text-[15px] font-semibold text-text-light dark:text-text-dark">{{ member.name }}</h3>
                    <p class="mb-3 text-[12px] text-text-light/45 dark:text-text-dark/45">{{ member.role }}</p>

                    <div v-if="member.certified" class="mb-4 inline-flex">
                        <span
                            class="inline-flex items-center gap-1.5 rounded-full border border-accent/25 bg-accent/8 px-2.5 py-1 text-[10px] font-semibold text-accent/80"
                        >
                            <span aria-hidden="true">★</span>
                            Certified Odoo Expert
                        </span>
                    </div>

                    <p class="text-[13px] leading-relaxed text-text-light/40 dark:text-text-dark/40">{{ member.bio }}</p>
                </div>
            </div>

            <div class="mt-8 text-center">
                <Link
                    :href="contact.url()"
                    class="text-[13px] text-text-light/35 transition-colors duration-150 hover:text-text-light/60 dark:text-text-dark/35 dark:hover:text-text-dark/60"
                >
                    We're hiring — get in touch →
                </Link>
            </div>
        </div>
    </section>

    <!-- Certifications & Partner stats -->
    <section class="bg-[#f5f2fb] py-20 lg:py-28 dark:bg-[#0a0810]">
        <div class="mx-auto w-full max-w-7xl px-6 lg:px-8">
            <div ref="certsRef" class="grid grid-cols-1 gap-16 lg:grid-cols-2 lg:gap-20">
                <!-- Left: badges -->
                <div>
                    <div class="mb-6 inline-flex">
                        <span
                            class="inline-flex items-center rounded-full border border-accent/30 bg-accent/10 px-3 py-1 text-[10px] font-semibold uppercase tracking-[0.15em] text-accent"
                        >
                            Certifications
                        </span>
                    </div>
                    <h2
                        class="mb-8 font-serif leading-tight text-text-light dark:text-text-dark"
                        style="font-size: clamp(28px, 3vw, 44px)"
                    >
                        Verified. Every claim.
                    </h2>

                    <div class="flex flex-col gap-4">
                        <!-- Silver Partner badge -->
                        <div class="flex items-center gap-4 rounded-xl border border-[#714b67]/25 bg-white/60 p-5 dark:bg-[#1a0f20]/50">
                            <div
                                class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-[#714b67]/20"
                                aria-hidden="true"
                            >
                                <span class="text-[10px] font-bold text-[#714b67]">S</span>
                            </div>
                            <div>
                                <p class="text-[14px] font-semibold text-text-light dark:text-text-dark">Odoo Silver Partner</p>
                                <a
                                    href="https://www.odoo.com/sl_SI/partners/rounded-square-doo-17408392?country_id=192"
                                    target="_blank"
                                    rel="noopener"
                                    class="text-[12px] text-accent/60 transition-colors hover:text-accent"
                                >
                                    Verified on odoo.com →
                                </a>
                            </div>
                        </div>

                        <!-- Certified Experts -->
                        <div class="flex items-center gap-4 rounded-xl border border-[#714b67]/25 bg-white/60 p-5 dark:bg-[#1a0f20]/50">
                            <div
                                class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-accent/10"
                                aria-hidden="true"
                            >
                                <span class="text-[10px] font-bold text-accent">✓</span>
                            </div>
                            <div>
                                <p class="text-[14px] font-semibold text-text-light dark:text-text-dark">3 Certified Odoo Experts</p>
                                <p class="text-[12px] text-text-light/40 dark:text-text-dark/40">Certified on current Odoo version</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: partner stats from Odoo profile -->
                <div>
                    <p class="mb-8 text-[13px] uppercase tracking-widest text-text-light/25 dark:text-text-dark/25">
                        From our official Odoo partner profile
                    </p>
                    <div class="grid grid-cols-2 gap-6">
                        <div class="flex flex-col">
                            <span ref="statRef0" class="font-mono text-[32px] font-medium leading-none text-text-light dark:text-text-dark">0</span>
                            <span class="mt-1.5 text-[12px] text-text-light/40 dark:text-text-dark/40">{{ partnerStats[0].label }}</span>
                        </div>
                        <div class="flex flex-col">
                            <span ref="statRef1" class="font-mono text-[32px] font-medium leading-none text-text-light dark:text-text-dark">0</span>
                            <span class="mt-1.5 text-[12px] text-text-light/40 dark:text-text-dark/40">{{ partnerStats[1].label }}</span>
                        </div>
                        <div class="flex flex-col">
                            <span ref="statRef2" class="font-mono text-[32px] font-medium leading-none text-text-light dark:text-text-dark">0</span>
                            <span class="mt-1.5 text-[12px] text-text-light/40 dark:text-text-dark/40">{{ partnerStats[2].label }}</span>
                        </div>
                        <div class="flex flex-col">
                            <span ref="statRef3" class="font-mono text-[32px] font-medium leading-none text-text-light dark:text-text-dark">0</span>
                            <span class="mt-1.5 text-[12px] text-text-light/40 dark:text-text-dark/40">{{ partnerStats[3].label }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our story -->
    <section class="bg-bg-light py-20 lg:py-28 dark:bg-[#0c0710]">
        <div class="mx-auto w-full max-w-7xl px-6 lg:px-8">
            <div ref="storyRef" class="mx-auto max-w-2xl">
                <div class="mb-8 inline-flex">
                    <span
                        class="inline-flex items-center rounded-full border border-accent/30 bg-accent/10 px-3 py-1 text-[10px] font-semibold uppercase tracking-[0.15em] text-accent"
                    >
                        Our story
                    </span>
                </div>
                <div class="space-y-5 text-[15px] leading-relaxed text-text-light/60 dark:text-text-dark/60">
                    <p>
                        Implementor d.o.o. was founded in 2023 to do Odoo work the way we'd want it done
                        if we were the client. After years of watching Slovenian companies pay for
                        half-built localizations, juniors learning on the job, and ERP projects that ran
                        for years without going live, we built a different kind of partner — small enough
                        to care, certified enough to deliver, and Slovenian enough that compliance isn't
                        an afterthought.
                    </p>
                    <p>
                        Today, we work with Slovenian businesses from five-person teams on a Standard
                        package to mid-market operations spanning four countries on a full Enterprise
                        implementation. We're a senior, certified team. We're a Silver Partner. And we
                        ship our own Slovenian localization, which we maintain ourselves.
                    </p>
                    <p class="text-text-light/80 dark:text-text-dark/80">
                        We're not the biggest Odoo partner in Slovenia. We don't try to be. We're the
                        one that does the work properly.
                    </p>
                </div>

                <div class="mt-10 overflow-hidden rounded-2xl border border-primary/25">
                    <div class="relative w-full" style="padding-bottom: 56.25%">
                        <iframe
                            src="https://www.youtube-nocookie.com/embed/nbso3NVz3p8"
                            title="Implementor — company video"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen
                            loading="lazy"
                            class="absolute inset-0 h-full w-full"
                            style="border: 0"
                        ></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Location -->
    <section class="bg-[#f5f2fb] py-16 lg:py-20 dark:bg-[#0a0810]">
        <div class="mx-auto w-full max-w-7xl px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-12 lg:grid-cols-2 lg:gap-16">
                <div>
                    <h2
                        class="mb-6 font-serif leading-tight text-text-light dark:text-text-dark"
                        style="font-size: clamp(22px, 2.4vw, 32px)"
                    >
                        Where to find us
                    </h2>
                    <div class="space-y-3 text-[14px] text-text-light/55 dark:text-text-dark/55">
                        <p>Implementor d.o.o.</p>
                        <p>[Street address, Ljubljana, Slovenia]</p>
                        <p>
                            <a
                                href="mailto:hello@implementor.si"
                                class="text-accent/70 transition-colors hover:text-accent"
                            >
                                hello@implementor.si
                            </a>
                        </p>
                        <p>
                            <a
                                href="tel:+38600000000"
                                class="transition-colors hover:text-text-light/80 dark:hover:text-text-dark/80"
                            >
                                +386 00 000 000
                            </a>
                        </p>
                    </div>
                </div>
                <div>
                    <div class="overflow-hidden rounded-2xl border border-[#714b67]/20">
                        <iframe
                            src="https://www.openstreetmap.org/export/embed.html?bbox=14.4800%2C46.0300%2C14.5500%2C46.0650&amp;layer=mapnik"
                            width="100%"
                            height="200"
                            style="border:0;filter:invert(0.88) hue-rotate(180deg) saturate(0.6);"
                            loading="lazy"
                            title="Implementor office location — Ljubljana, Slovenia"
                            aria-label="Map showing Ljubljana, Slovenia"
                        ></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <FinalCTABand
        heading="Want to talk to one of us directly?"
        subheading="Every consultation is with a senior. No SDRs. No filtering. Just a conversation."
        cta-text="Book a free consultation"
    />
</template>
