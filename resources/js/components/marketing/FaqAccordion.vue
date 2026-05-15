<script setup lang="ts">
import { ref } from 'vue'

export interface FaqItem {
    question: string
    answer: string
}

interface Props {
    items: FaqItem[]
    eyebrow?: string
    heading?: string
}

const props = withDefaults(defineProps<Props>(), {
    eyebrow: 'FAQ',
    heading: 'Common questions.',
})

const openIndex = ref<number | null>(null)

function toggle(index: number): void {
    openIndex.value = openIndex.value === index ? null : index
}
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
                        {{ props.eyebrow }}
                    </span>
                </div>
                <h2
                    class="font-serif leading-tight text-text-light dark:text-text-dark"
                    style="font-size: clamp(28px, 3vw, 44px)"
                >
                    {{ props.heading }}
                </h2>
            </div>

            <!-- Accordion -->
            <div class="mx-auto max-w-3xl divide-y divide-[#714b67]/20">
                <div
                    v-for="(item, index) in props.items"
                    :key="index"
                    class="py-5"
                >
                    <button
                        type="button"
                        class="flex w-full items-start justify-between gap-4 text-left"
                        :aria-expanded="openIndex === index"
                        @click="toggle(index)"
                    >
                        <span
                            class="text-[15px] font-medium leading-snug text-text-light transition-colors duration-150 dark:text-text-dark"
                            :class="openIndex === index ? 'text-text-light dark:text-text-dark' : 'text-text-light/80 dark:text-text-dark/80'"
                        >
                            {{ item.question }}
                        </span>
                        <span
                            class="mt-0.5 shrink-0 text-[#c8a951]/60 transition-transform duration-200"
                            :class="openIndex === index ? 'rotate-45' : 'rotate-0'"
                            aria-hidden="true"
                        >
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                                <path d="M12 5v14M5 12h14" />
                            </svg>
                        </span>
                    </button>

                    <Transition
                        enter-active-class="transition-all duration-200 ease-out overflow-hidden"
                        enter-from-class="max-h-0 opacity-0"
                        enter-to-class="max-h-[800px] opacity-100"
                        leave-active-class="transition-all duration-150 ease-in overflow-hidden"
                        leave-from-class="max-h-[800px] opacity-100"
                        leave-to-class="max-h-0 opacity-0"
                    >
                        <div v-if="openIndex === index" class="pt-3">
                            <p class="text-[14px] leading-relaxed text-text-light/55 dark:text-text-dark/55">
                                {{ item.answer }}
                            </p>
                        </div>
                    </Transition>
                </div>
            </div>
        </div>
    </section>
</template>
