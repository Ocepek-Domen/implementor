<script setup lang="ts">
import { Link } from '@inertiajs/vue3'
import { ref } from 'vue'
import { useScrollReveal } from '@/composables/useScrollReveal'
import { ilirika, mobistekla, nnSaunas } from '@/routes/clients'

const sectionRef = ref<HTMLElement | null>(null)
useScrollReveal(sectionRef)

interface Industry {
    name: string
    modules: string[]
    client?: string
    href?: string
}

const industries: Industry[] = [
    {
        name: 'Financial Services',
        modules: ['Accounting', 'CRM', 'Multi-company', 'Multi-currency'],
        client: 'Ilirika',
        href: ilirika.url(),
    },
    {
        name: 'Manufacturing & Export',
        modules: ['Manufacturing', 'Inventory', 'Sales', 'Purchase', 'Multi-warehouse'],
        client: 'NN Saunas',
        href: nnSaunas.url(),
    },
    {
        name: 'Services & Retail',
        modules: ['Helpdesk', 'Inventory', 'POS', 'Custom modules', 'AI'],
        client: 'Mobistekla',
        href: mobistekla.url(),
    },
    {
        name: 'Wholesale & Distribution',
        modules: ['Inventory', 'Purchase', 'Sales', 'Logistics'],
    },
    {
        name: 'Professional Services',
        modules: ['Project', 'Timesheets', 'Invoicing', 'CRM'],
    },
    {
        name: 'E-commerce',
        modules: ['Website', 'eCommerce', 'Inventory', 'Payment'],
    },
]
</script>

<template>
    <section class="relative bg-bg-light py-20 lg:py-28 dark:bg-[#0c0710]">
        <div class="mx-auto w-full max-w-7xl px-6 lg:px-8">
            <!-- Section header -->
            <div class="mb-14">
                <div class="mb-4 inline-flex">
                    <span
                        class="inline-flex items-center rounded-full border border-[#c8a951]/30 bg-[#c8a951]/10 px-3 py-1 text-[10px] font-semibold uppercase tracking-[0.15em] text-[#c8a951]"
                    >
                        Industries
                    </span>
                </div>
                <h2
                    class="font-serif leading-tight text-text-light dark:text-text-dark"
                    style="font-size: clamp(28px, 3vw, 44px)"
                >
                    Industries we know.
                </h2>
            </div>

            <div ref="sectionRef" class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                <component
                    :is="industry.href ? Link : 'div'"
                    v-for="industry in industries"
                    :key="industry.name"
                    :href="industry.href"
                    :class="[
                        'group flex flex-col rounded-2xl border p-6 transition-colors duration-200',
                        industry.href
                            ? 'cursor-pointer border-[#714b67]/30 bg-white/60 hover:border-primary/55 dark:bg-linear-to-b dark:from-[#1f1226]/70 dark:to-[#0c0710]/50'
                            : 'border-[#714b67]/15 bg-text-light/5 opacity-50 dark:bg-[#0c0710]/40',
                    ]"
                >
                    <h3 class="mb-3 text-[15px] font-semibold text-text-light dark:text-text-dark">
                        {{ industry.name }}
                    </h3>

                    <div class="mb-4 flex flex-wrap gap-1.5">
                        <span
                            v-for="mod in industry.modules"
                            :key="mod"
                            class="rounded-full border border-[#714b67]/25 bg-[#714b67]/10 px-2.5 py-0.5 text-[11px] text-text-light/55 dark:text-text-dark/55"
                        >
                            {{ mod }}
                        </span>
                    </div>

                    <div v-if="industry.client" class="mt-auto flex items-center gap-2">
                        <span class="text-[12px] text-text-light/35 dark:text-text-dark/35">Case study:</span>
                        <span class="text-[12px] font-medium text-[#c8a951]/75 transition-colors duration-150 group-hover:text-[#c8a951]">
                            {{ industry.client }} →
                        </span>
                    </div>

                    <p v-else class="mt-auto text-[12px] text-text-light/25 dark:text-text-dark/25">
                        More cases coming
                    </p>
                </component>
            </div>
        </div>
    </section>
</template>
