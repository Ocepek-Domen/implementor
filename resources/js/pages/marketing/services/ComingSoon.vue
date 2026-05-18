<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3'
import { services, contact } from '@/routes'

defineProps<{
    service: string
    message: string
}>()
</script>

<template>
    <Head :title="`${service} — Coming Soon | Implementor`" />

    <div class="relative flex min-h-[80vh] flex-col items-center justify-center overflow-hidden px-6 py-24 text-center">
        <!-- Soft glow backdrop -->
        <div class="pointer-events-none absolute inset-0 overflow-hidden" aria-hidden="true">
            <div
                class="absolute left-1/2 top-1/2 h-[500px] w-[500px] -translate-x-1/2 -translate-y-1/2 rounded-full bg-[#714b67]/10 blur-3xl"
            />
        </div>

        <!-- Badge -->
        <div
            class="relative mb-8 inline-flex items-center gap-2 rounded-full border border-[#714b67]/30 bg-[#714b67]/10 px-4 py-1.5 text-xs font-semibold uppercase tracking-widest text-[#714b67] dark:border-[#714b67]/40 dark:bg-[#714b67]/15"
        >
            <span aria-hidden="true">🛠️</span>
            <span>Still writing this one</span>
        </div>

        <!-- Service name -->
        <p class="relative mb-3 text-sm font-medium tracking-wide text-text-light/45 dark:text-text-dark/45">
            {{ service }}
        </p>

        <!-- Heading -->
        <h1
            class="relative mb-6 text-4xl font-bold tracking-tight text-text-light dark:text-text-dark md:text-5xl lg:text-6xl"
        >
            We're working on it.<br />
            <span class="text-[#714b67]">Promise.</span>
        </h1>

        <!-- Funny message -->
        <p
            class="relative mb-10 max-w-md text-base leading-relaxed text-text-light/55 dark:text-text-dark/55 md:text-lg"
        >
            {{ message }}
        </p>

        <!-- Actions -->
        <div class="relative flex flex-wrap justify-center gap-3">
            <Link
                :href="services.url()"
                class="rounded-lg bg-[#714b67] px-5 py-2.5 text-sm font-semibold text-white transition-colors hover:bg-[#5d3d54]"
            >
                ← Back to Services
            </Link>
            <Link
                :href="contact.url()"
                class="rounded-lg border border-[#714b67]/30 px-5 py-2.5 text-sm font-semibold text-[#714b67] transition-colors hover:border-[#714b67]/60 dark:border-[#714b67]/40 dark:text-[#c4a0b8] dark:hover:border-[#714b67]/70"
            >
                Contact us anyway
            </Link>
        </div>
    </div>
</template>
