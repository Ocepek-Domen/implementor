<script setup lang="ts">
import { computed, onMounted, onUnmounted, ref } from 'vue'

const progress = ref(0)
const visible = ref(false)

const CIRCUMFERENCE = 2 * Math.PI * 18

const dashOffset = computed(() => CIRCUMFERENCE * (1 - progress.value / 100))

function onScroll(): void {
    const scrollTop = window.scrollY
    const docHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight
    const pct = docHeight > 0 ? Math.round((scrollTop / docHeight) * 100) : 0
    progress.value = pct
    visible.value = pct > 3
}

function scrollToTop(): void {
    window.scrollTo({ top: 0, behavior: 'smooth' })
}

onMounted(() => {
    window.addEventListener('scroll', onScroll, { passive: true })
    onScroll()
})

onUnmounted(() => {
    window.removeEventListener('scroll', onScroll)
})
</script>

<template>
    <Transition
        enter-active-class="transition-all duration-300 ease-out"
        enter-from-class="translate-y-4 opacity-0 scale-75"
        enter-to-class="translate-y-0 opacity-100 scale-100"
        leave-active-class="transition-all duration-200 ease-in"
        leave-from-class="translate-y-0 opacity-100 scale-100"
        leave-to-class="translate-y-4 opacity-0 scale-75"
    >
        <button
            v-if="visible"
            type="button"
            aria-label="Scroll to top"
            class="fixed bottom-6 right-6 z-50 flex size-12 cursor-pointer items-center justify-center rounded-full bg-text-light/10 backdrop-blur-md transition-transform hover:scale-110 active:scale-95 dark:bg-bg-dark/80"
            @click="scrollToTop"
        >
            <!-- Circular progress ring -->
            <svg
                class="-rotate-90 absolute inset-0"
                width="48"
                height="48"
                viewBox="0 0 48 48"
                aria-hidden="true"
            >
                <!-- Track -->
                <circle
                    cx="24"
                    cy="24"
                    r="18"
                    fill="none"
                    stroke="#714b67"
                    stroke-width="2.5"
                    stroke-opacity="0.3"
                />
                <!-- Progress -->
                <circle
                    cx="24"
                    cy="24"
                    r="18"
                    fill="none"
                    stroke="#714b67"
                    stroke-width="2.5"
                    stroke-linecap="round"
                    :stroke-dasharray="CIRCUMFERENCE"
                    :stroke-dashoffset="dashOffset"
                    class="transition-[stroke-dashoffset] duration-150"
                />
            </svg>
            <!-- Arrow up icon -->
            <svg
                width="16"
                height="16"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2.5"
                stroke-linecap="round"
                stroke-linejoin="round"
                class="text-text-light dark:text-text-dark"
                aria-hidden="true"
            >
                <path d="M12 19V5M5 12l7-7 7 7" />
            </svg>
        </button>
    </Transition>
</template>
