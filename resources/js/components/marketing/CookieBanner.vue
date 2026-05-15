<script setup lang="ts">
import { router } from '@inertiajs/vue3'
import { onMounted, onUnmounted, ref } from 'vue'

const STORAGE_KEY = 'implementor_cookie_consent'

const visible = ref(false)
let pixelLoaded = false
let removeNavigateListener: (() => void) | null = null

onMounted(() => {
    const stored = localStorage.getItem(STORAGE_KEY)
    if (!stored) {
        visible.value = true
    } else if (stored === 'granted') {
        initTracking()
    }
})

function updateGoogleConsent(status: 'granted' | 'denied'): void {
    window.gtag?.('consent', 'update', {
        ad_storage: status,
        ad_user_data: status,
        ad_personalization: status,
        analytics_storage: status,
    })
}

function initMetaPixel(): void {
    if (pixelLoaded) { return }
    const pixelId = document.querySelector<HTMLMetaElement>('meta[name="meta-pixel-id"]')?.content
    if (!pixelId) { return }
    pixelLoaded = true

    // eslint-disable-next-line @typescript-eslint/no-explicit-any
    const w = window as any
    ;(function (f: Window & typeof globalThis, b: Document, e: string, v: string) {
        if (f.fbq) { return }
        const n = (f.fbq = function (...a: unknown[]) {
            // eslint-disable-next-line @typescript-eslint/no-explicit-any
            ;(n as any).callMethod ? (n as any).callMethod(...a) : (n as any).queue.push(a)
        })
        // eslint-disable-next-line @typescript-eslint/no-explicit-any
        if (!f._fbq) { (f as any)._fbq = n }
        // eslint-disable-next-line @typescript-eslint/no-explicit-any
        const m = n as any
        m.push = m
        m.loaded = true
        m.version = '2.0'
        m.queue = []
        const t = b.createElement(e) as HTMLScriptElement
        t.async = true
        t.src = v
        const s = b.getElementsByTagName(e)[0]
        s.parentNode?.insertBefore(t, s)
    })(w, document, 'script', 'https://connect.facebook.net/en_US/fbevents.js')

    w.fbq('init', pixelId)
    w.fbq('track', 'PageView')

    removeNavigateListener = router.on('navigate', () => {
        w.fbq?.('track', 'PageView')
    })
}

function initTracking(): void {
    updateGoogleConsent('granted')
    initMetaPixel()
}

function accept(): void {
    localStorage.setItem(STORAGE_KEY, 'granted')
    initTracking()
    visible.value = false
}

function reject(): void {
    localStorage.setItem(STORAGE_KEY, 'denied')
    updateGoogleConsent('denied')
    visible.value = false
}

onUnmounted(() => {
    removeNavigateListener?.()
})
</script>

<template>
    <Transition
        enter-active-class="transition-all duration-300 ease-out"
        enter-from-class="translate-y-4 opacity-0"
        enter-to-class="translate-y-0 opacity-100"
        leave-active-class="transition-all duration-200 ease-in"
        leave-from-class="translate-y-0 opacity-100"
        leave-to-class="translate-y-4 opacity-0"
    >
        <div
            v-if="visible"
            class="fixed bottom-4 left-1/2 z-50 w-[calc(100%-2rem)] max-w-xl -translate-x-1/2 rounded-2xl border border-primary/25 bg-bg-light/95 px-5 py-4 shadow-xl backdrop-blur-md dark:bg-bg-dark/95"
            role="dialog"
            aria-modal="true"
            aria-label="Cookie consent"
        >
            <p class="mb-4 text-[13px] leading-relaxed text-text-light/65 dark:text-text-dark/65">
                We use cookies for analytics and marketing (Google, Meta). Necessary cookies are always active.
                <a href="/politika-zasebnosti" class="text-text-light/80 underline underline-offset-2 hover:text-text-light dark:text-text-dark/80 dark:hover:text-text-dark">Privacy policy</a>
            </p>
            <div class="flex items-center gap-3">
                <button
                    type="button"
                    class="rounded-lg bg-primary px-4 py-2 text-[13px] font-medium text-white transition-colors hover:bg-[#8a5c7e]"
                    @click="accept"
                >
                    Accept all
                </button>
                <button
                    type="button"
                    class="rounded-lg border border-text-light/20 px-4 py-2 text-[13px] text-text-light/70 transition-colors hover:border-text-light/40 hover:text-text-light dark:border-text-dark/20 dark:text-text-dark/70 dark:hover:border-text-dark/40 dark:hover:text-text-dark"
                    @click="reject"
                >
                    Necessary only
                </button>
            </div>
        </div>
    </Transition>
</template>
