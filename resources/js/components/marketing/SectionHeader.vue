<script setup lang="ts">
import EyebrowBadge from './EyebrowBadge.vue'

defineProps<{
    eyebrow: string
    heading: string
}>()
</script>

<template>
    <div>
        <EyebrowBadge class="mb-4">{{ eyebrow }}</EyebrowBadge>
        <h2
            class="font-serif leading-tight text-text-light dark:text-text-dark"
            style="font-size: clamp(28px, 3vw, 44px)"
        >
            {{ heading }}
        </h2>
    </div>
</template>
