<script setup lang="ts">
import { Form, Head, usePage } from '@inertiajs/vue3'
import { computed, ref } from 'vue'
import FaqAccordion from '@/components/marketing/FaqAccordion.vue'
import ContactController from '@/actions/App/Http/Controllers/ContactController'
import type { FaqItem } from '@/components/marketing/FaqAccordion.vue'
import { useBreadcrumbSchema } from '@/composables/useBreadcrumbSchema'
import { useFaqSchema } from '@/composables/useFaqSchema'
import { useLocalBusinessSchema } from '@/composables/useLocalBusinessSchema'

const page = usePage()
const submitted = computed(() => (page.props as Record<string, any>).flash?.success === true)

const companySize = ref('')
const selectedIntent = ref('')

const formAction = ContactController.store.url()

const companySizes = [
    { value: '1-10', label: '1–10 employees' },
    { value: '11-50', label: '11–50 employees' },
    { value: '51-200', label: '51–200 employees' },
    { value: '200+', label: '200+ employees' },
]

const intents = [
    { value: 'start-fresh', label: 'Start fresh on Odoo' },
    { value: 'migrate', label: 'Migrate from another ERP' },
    { value: 'existing-odoo', label: 'Get help with an existing Odoo' },
    { value: 'exploring', label: 'Just exploring' },
]

const nextSteps = [
    { step: '01', text: 'You send the form.' },
    { step: '02', text: 'We reply within 1 business day with times or a calendar link.' },
    { step: '03', text: '45-minute call with a senior consultant — your processes, our questions.' },
    { step: '04', text: 'A one-page recommendation in your inbox. No pitch deck. No commitment.' },
]

const faqItems: FaqItem[] = [
    {
        question: 'Is the consultation really free with no commitment?',
        answer: 'Yes — completely free, no strings attached. The call is 45 minutes with a certified consultant. We will listen to your situation, ask hard questions, and tell you honestly whether we are a good fit. There is no obligation to continue.',
    },
    {
        question: 'What should I prepare before the call?',
        answer: 'Nothing formal is required. It helps to have a rough sense of your company size, your current systems, and what is not working today. A few notes on what you want to achieve with Odoo is useful. We will guide the conversation from there.',
    },
    {
        question: 'What if we are already working with another Odoo partner?',
        answer: 'That is fine. We work with companies that are switching partners or looking for a second opinion. We will be honest about what we can improve and whether a transition makes sense.',
    },
    {
        question: 'How fast can you start after the initial call?',
        answer: 'For Standard packages, we can typically begin the design phase within 2–3 weeks of the discovery call. For Enterprise implementations, the timeline depends on scope — we agree on a start date during the design phase.',
    },
    {
        question: 'Do you sign NDAs before we share our business details?',
        answer: 'Yes. If you need an NDA before sharing sensitive information, let us know in the message field and we will arrange it before the call. Most clients are comfortable with a standard mutual NDA.',
    },
]

useBreadcrumbSchema([
    { name: 'Home', url: 'https://implementor.si/' },
    { name: 'Contact', url: 'https://implementor.si/contact' },
])

useFaqSchema(faqItems)
useLocalBusinessSchema()
</script>

<template>
    <Head>
        <title>Contact Implementor — Book a free Odoo consultation</title>
        <meta
            name="description"
            content="Book a free 45-minute consultation with Implementor's senior Odoo team. We listen first, scope second. No pitch deck."
        />
    </Head>

    <!-- Page hero -->
    <section class="relative bg-bg-light pb-16 pt-32 lg:pb-20 lg:pt-40 dark:bg-[#0c0710]">
        <div class="mx-auto w-full max-w-7xl px-6 lg:px-8">
            <div class="mb-6 inline-flex">
                <span
                    class="inline-flex items-center rounded-full border border-accent/30 bg-accent/10 px-3 py-1 text-[10px] font-semibold uppercase tracking-[0.15em] text-accent"
                >
                    Contact
                </span>
            </div>
            <h1
                class="mb-6 max-w-2xl font-serif leading-tight text-text-light dark:text-text-dark"
                style="font-size: clamp(36px, 5vw, 68px)"
            >
                Let's talk about your Odoo project.
            </h1>
            <p class="max-w-[520px] text-[16px] leading-relaxed text-text-light/60 dark:text-text-dark/60">
                A free 45-minute consultation with a senior consultant. We'll listen to your processes,
                ask hard questions, and tell you honestly whether we're a fit.
            </p>
        </div>
    </section>

    <!-- Form + sidebar -->
    <section class="bg-bg-light pb-20 lg:pb-28 dark:bg-[#0c0710]">
        <div class="mx-auto w-full max-w-7xl px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-16 lg:grid-cols-[1fr_360px] lg:gap-20">

                <!-- Form column -->
                <div>
                    <!-- Success state -->
                    <div
                        v-if="submitted"
                        class="rounded-2xl border border-accent/25 bg-accent/8 p-8"
                    >
                        <div class="mb-4 flex h-12 w-12 items-center justify-center rounded-full bg-accent/15">
                            <span class="text-lg text-accent">✓</span>
                        </div>
                        <h2 class="mb-3 font-serif text-[24px] leading-tight text-text-light dark:text-text-dark">
                            Thanks — we'll be in touch.
                        </h2>
                        <p class="text-[15px] leading-relaxed text-text-light/60 dark:text-text-dark/60">
                            We'll get back to you within 1 business day with available times. If you'd
                            prefer to reach us directly: <a href="mailto:info@implementor.si" class="text-accent/80 hover:text-accent">info@implementor.si</a>
                        </p>
                    </div>

                    <!-- The form -->
                    <Form
                        v-else
                        :action="formAction"
                        method="post"
                        #default="{ errors, processing }"
                    >
                        <!-- Honeypot — must be empty -->
                        <input type="text" name="website_url" class="hidden" tabindex="-1" autocomplete="off" aria-hidden="true" />

                        <div class="space-y-6">
                            <!-- Name + Company -->
                            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                                <div>
                                    <label for="name" class="mb-2 block text-[13px] font-medium text-text-light/70 dark:text-text-dark/70">
                                        Your name <span class="text-accent">*</span>
                                    </label>
                                    <input
                                        id="name"
                                        type="text"
                                        name="name"
                                        required
                                        autocomplete="name"
                                        class="w-full rounded-xl border border-[#714b67]/30 bg-text-light/5 px-4 py-3 text-[14px] text-text-light placeholder-text-light/25 outline-none transition-colors duration-150 focus:border-accent/50 focus:ring-0 dark:bg-[#1a0f20]/60 dark:text-text-dark dark:placeholder-text-dark/25"
                                        :class="{ 'border-red-500/60': errors.name }"
                                        placeholder="Jane Novak"
                                    />
                                    <p v-if="errors.name" class="mt-1.5 text-[12px] text-red-400">{{ errors.name }}</p>
                                </div>
                                <div>
                                    <label for="company_name" class="mb-2 block text-[13px] font-medium text-text-light/70 dark:text-text-dark/70">
                                        Company name
                                    </label>
                                    <input
                                        id="company_name"
                                        type="text"
                                        name="company_name"
                                        autocomplete="organization"
                                        class="w-full rounded-xl border border-[#714b67]/30 bg-text-light/5 px-4 py-3 text-[14px] text-text-light placeholder-text-light/25 outline-none transition-colors duration-150 focus:border-accent/50 focus:ring-0 dark:bg-[#1a0f20]/60 dark:text-text-dark dark:placeholder-text-dark/25"
                                        :class="{ 'border-red-500/60': errors.company_name }"
                                        placeholder="Acme d.o.o."
                                    />
                                    <p v-if="errors.company_name" class="mt-1.5 text-[12px] text-red-400">{{ errors.company_name }}</p>
                                </div>
                            </div>

                            <!-- Email + Phone -->
                            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                                <div>
                                    <label for="email" class="mb-2 block text-[13px] font-medium text-text-light/70 dark:text-text-dark/70">
                                        Work email <span class="text-accent">*</span>
                                    </label>
                                    <input
                                        id="email"
                                        type="email"
                                        name="email"
                                        required
                                        autocomplete="email"
                                        class="w-full rounded-xl border border-[#714b67]/30 bg-text-light/5 px-4 py-3 text-[14px] text-text-light placeholder-text-light/25 outline-none transition-colors duration-150 focus:border-accent/50 focus:ring-0 dark:bg-[#1a0f20]/60 dark:text-text-dark dark:placeholder-text-dark/25"
                                        :class="{ 'border-red-500/60': errors.email }"
                                        placeholder="jane@company.si"
                                    />
                                    <p v-if="errors.email" class="mt-1.5 text-[12px] text-red-400">{{ errors.email }}</p>
                                </div>
                                <div>
                                    <label for="phone" class="mb-2 block text-[13px] font-medium text-text-light/70 dark:text-text-dark/70">
                                        Phone <span class="font-normal text-text-light/30 dark:text-text-dark/30">(optional)</span>
                                    </label>
                                    <input
                                        id="phone"
                                        type="tel"
                                        name="phone"
                                        autocomplete="tel"
                                        class="w-full rounded-xl border border-[#714b67]/30 bg-text-light/5 px-4 py-3 text-[14px] text-text-light placeholder-text-light/25 outline-none transition-colors duration-150 focus:border-accent/50 focus:ring-0 dark:bg-[#1a0f20]/60 dark:text-text-dark dark:placeholder-text-dark/25"
                                        placeholder="+386 40 000 000"
                                    />
                                </div>
                            </div>

                            <!-- Company size -->
                            <div>
                                <p class="mb-3 text-[13px] font-medium text-text-light/70 dark:text-text-dark/70">
                                    Company size <span class="text-accent">*</span>
                                </p>
                                <div class="grid grid-cols-2 gap-3 sm:grid-cols-4">
                                    <label
                                        v-for="size in companySizes"
                                        :key="size.value"
                                        :class="[
                                            'flex cursor-pointer items-center justify-center rounded-xl border px-3 py-2.5 text-[13px] transition-colors duration-150',
                                            companySize === size.value
                                                ? 'border-accent/70 bg-accent/20 font-medium text-text-light dark:border-accent/60 dark:bg-accent/25 dark:text-text-dark'
                                                : 'border-[#714b67]/30 bg-text-light/5 text-text-light/65 dark:bg-[#1a0f20]/60 dark:text-text-dark/65',
                                        ]"
                                    >
                                        <input type="radio" name="company_size" :value="size.value" v-model="companySize" class="sr-only" />
                                        {{ size.label }}
                                    </label>
                                </div>
                                <p v-if="errors.company_size" class="mt-1.5 text-[12px] text-red-400">{{ errors.company_size }}</p>
                            </div>

                            <!-- Intent -->
                            <div>
                                <p class="mb-3 text-[13px] font-medium text-text-light/70 dark:text-text-dark/70">
                                    What are you looking to do? <span class="text-accent">*</span>
                                </p>
                                <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
                                    <label
                                        v-for="intent in intents"
                                        :key="intent.value"
                                        :class="[
                                            'flex cursor-pointer items-center gap-3 rounded-xl border px-4 py-3 text-[13px] transition-colors duration-150',
                                            selectedIntent === intent.value
                                                ? 'border-accent/70 bg-accent/20 font-medium text-text-light dark:border-accent/60 dark:bg-accent/25 dark:text-text-dark'
                                                : 'border-[#714b67]/30 bg-text-light/5 text-text-light/65 dark:bg-[#1a0f20]/60 dark:text-text-dark/65',
                                        ]"
                                    >
                                        <input type="radio" name="intent" :value="intent.value" v-model="selectedIntent" class="sr-only" />
                                        {{ intent.label }}
                                    </label>
                                </div>
                                <p v-if="errors.intent" class="mt-1.5 text-[12px] text-red-400">{{ errors.intent }}</p>
                            </div>

                            <!-- Message -->
                            <div>
                                <label for="message" class="mb-2 block text-[13px] font-medium text-text-light/70 dark:text-text-dark/70">
                                    Tell us about your business
                                    <span class="font-normal text-text-light/30 dark:text-text-dark/30">(optional)</span>
                                </label>
                                <textarea
                                    id="message"
                                    name="message"
                                    rows="4"
                                    class="w-full resize-none rounded-xl border border-[#714b67]/30 bg-text-light/5 px-4 py-3 text-[14px] text-text-light placeholder-text-light/25 outline-none transition-colors duration-150 focus:border-accent/50 focus:ring-0 dark:bg-[#1a0f20]/60 dark:text-text-dark dark:placeholder-text-dark/25"
                                    placeholder="2–3 sentences is plenty. What you're running now, what's not working, what you want to achieve."
                                />
                            </div>

                            <!-- Privacy consent -->
                            <div>
                                <label class="flex cursor-pointer items-start gap-3">
                                    <input
                                        type="checkbox"
                                        name="privacy_consent"
                                        value="1"
                                        class="mt-0.5 h-4 w-4 shrink-0 rounded border-[#714b67]/40 bg-text-light/5 accent-accent dark:bg-[#1a0f20]"
                                    />
                                    <span class="text-[13px] leading-snug text-text-light/50 dark:text-text-dark/50">
                                        I agree to the processing of my personal data for the purpose of responding
                                        to this inquiry, in accordance with GDPR.
                                    </span>
                                </label>
                                <p v-if="errors.privacy_consent" class="mt-1.5 text-[12px] text-red-400">{{ errors.privacy_consent }}</p>
                            </div>

                            <!-- Submit -->
                            <div>
                                <button
                                    type="submit"
                                    :disabled="processing"
                                    class="inline-flex cursor-pointer items-center gap-2 rounded-full bg-accent px-8 py-3.5 text-sm font-medium text-white transition-[filter,opacity] duration-150 hover:brightness-110 disabled:cursor-not-allowed disabled:opacity-50"
                                >
                                    <svg
                                        v-if="processing"
                                        class="h-4 w-4 animate-spin"
                                        xmlns="http://www.w3.org/2000/svg"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        aria-hidden="true"
                                    >
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" />
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z" />
                                    </svg>
                                    {{ processing ? 'Sending…' : 'Send & book a slot →' }}
                                </button>
                            </div>
                        </div>
                    </Form>
                </div>

                <!-- Sidebar: what happens next -->
                <div class="lg:pt-2">
                    <h3 class="mb-8 font-serif text-[20px] leading-snug text-text-light dark:text-text-dark">
                        What happens next
                    </h3>
                    <div class="space-y-6">
                        <div
                            v-for="item in nextSteps"
                            :key="item.step"
                            class="flex items-start gap-4"
                        >
                            <div
                                class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full border border-accent/35 bg-accent/8"
                            >
                                <span class="font-mono text-[11px] font-medium text-accent">{{ item.step }}</span>
                            </div>
                            <p class="pt-1 text-[14px] leading-snug text-text-light/55 dark:text-text-dark/55">{{ item.text }}</p>
                        </div>
                    </div>

                    <!-- Direct contact -->
                    <div class="mt-12 space-y-3 border-t border-[#714b67]/20 pt-8">
                        <p class="text-[11px] uppercase tracking-widest text-text-light/25 dark:text-text-dark/25">Or reach us directly</p>
                        <a
                            href="mailto:info@implementor.si"
                            class="block text-[14px] text-accent/70 transition-colors hover:text-accent"
                        >
                            info@implementor.si
                        </a>
                        <a
                            href="tel:+38600000000"
                            class="block text-[14px] text-text-light/45 transition-colors hover:text-text-light/70 dark:text-text-dark/45 dark:hover:text-text-dark/70"
                        >
                            +386 00 000 000
                        </a>
                        <a
                            href="https://www.linkedin.com/company/implementor"
                            target="_blank"
                            rel="noopener"
                            class="block text-[14px] text-text-light/45 transition-colors hover:text-text-light/70 dark:text-text-dark/45 dark:hover:text-text-dark/70"
                        >
                            LinkedIn →
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Office / map -->
    <section class="bg-[#f5f2fb] py-16 lg:py-20 dark:bg-[#0a0810]">
        <div class="mx-auto w-full max-w-7xl px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-10 lg:grid-cols-2 lg:gap-16">
                <div>
                    <h2 class="mb-5 font-serif leading-tight text-text-light dark:text-text-dark" style="font-size: clamp(22px, 2.4vw, 32px)">
                        Come visit us
                    </h2>
                    <div class="space-y-2 text-[14px] text-text-light/55 dark:text-text-dark/55">
                        <p>Implementor d.o.o.</p>
                        <p>[Street address, Ljubljana, Slovenia]</p>
                        <p class="text-[13px] italic text-text-light/35 dark:text-text-dark/35">Visiting? Book ahead — we'll have coffee ready.</p>
                    </div>
                </div>
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
    </section>

    <!-- Trust strip -->
    <section class="bg-[#f5f2fb] py-12 dark:bg-[#0a0810]">
        <div class="mx-auto w-full max-w-7xl px-6 lg:px-8">
            <div class="flex flex-wrap items-center gap-6 text-[12px] text-text-light/35 dark:text-text-dark/35">
                <div class="flex items-center gap-2">
                    <span
                        class="inline-flex h-4 w-4 items-center justify-center rounded-full bg-primary text-[8px] font-bold text-white"
                        aria-hidden="true"
                    >S</span>
                    Odoo Silver Partner
                </div>
                <span class="hidden sm:inline" aria-hidden="true">·</span>
                <span>Senior, certified Odoo team</span>
                <span class="hidden sm:inline" aria-hidden="true">·</span>
                <span>Clients including Ilirika, NN Saunas, Mobistekla</span>
            </div>
        </div>
    </section>

    <FaqAccordion
        :items="faqItems"
        eyebrow="Before the call"
        heading="Questions we get before every consultation."
    />
</template>
