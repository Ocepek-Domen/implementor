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

function beforeEnter(el: Element): void {
    const e = el as HTMLElement
    e.style.height = '0'
    e.style.opacity = '0'
    e.style.overflow = 'hidden'
}

function enter(el: Element, done: () => void): void {
    const e = el as HTMLElement
    const height = e.scrollHeight
    e.style.transition = 'height 220ms ease-out, opacity 220ms ease-out'
    e.style.height = `${height}px`
    e.style.opacity = '1'
    e.addEventListener('transitionend', done, { once: true })
}

function afterEnter(el: Element): void {
    const e = el as HTMLElement
    e.style.height = 'auto'
    e.style.overflow = ''
    e.style.transition = ''
}

function beforeLeave(el: Element): void {
    const e = el as HTMLElement
    e.style.height = `${e.scrollHeight}px`
    e.style.overflow = 'hidden'
}

function leave(el: Element, done: () => void): void {
    const e = el as HTMLElement
    // Force reflow so the browser registers the starting height
    void e.offsetHeight
    e.style.transition = 'height 160ms ease-in, opacity 160ms ease-in'
    e.style.height = '0'
    e.style.opacity = '0'
    e.addEventListener('transitionend', done, { once: true })
}

function afterLeave(el: Element): void {
    const e = el as HTMLElement
    e.style.height = ''
    e.style.overflow = ''
    e.style.opacity = ''
    e.style.transition = ''
}
</script>

<template>
    <section class="relative bg-bg-light py-20 lg:py-28 dark:bg-[#0c0710]">
        <div class="mx-auto w-full max-w-7xl px-6 lg:px-8">
            <!-- Section header -->
            <div class="mb-14">
                <div class="mb-4 inline-flex">
                    <span
                        class="inline-flex items-center rounded-full border border-[#714b67]/30 bg-[#714b67]/10 px-3 py-1 text-[10px] font-semibold uppercase tracking-[0.15em] text-[#714b67]"
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
                        class="flex w-full cursor-pointer items-start justify-between gap-4 text-left"
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
                            class="mt-0.5 shrink-0 text-[#714b67]/60 transition-transform duration-200"
                            :class="openIndex === index ? 'rotate-45' : 'rotate-0'"
                            aria-hidden="true"
                        >
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                                <path d="M12 5v14M5 12h14" />
                            </svg>
                        </span>
                    </button>

                    <Transition
                        :css="false"
                        @before-enter="beforeEnter"
                        @enter="enter"
                        @after-enter="afterEnter"
                        @before-leave="beforeLeave"
                        @leave="leave"
                        @after-leave="afterLeave"
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
