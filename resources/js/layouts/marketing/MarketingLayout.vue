<script setup lang="ts">
import MarketingFooter from '@/components/marketing/MarketingFooter.vue';
import MarketingNav from '@/components/marketing/MarketingNav.vue';
</script>

<template>
    <div class="min-h-screen bg-[#fafaf7] text-[#1a0f1c] dark:bg-[#0f0a12] dark:text-[#f5f2ef]">
        <MarketingNav />
        <main>
            <slot />
        </main>
        <MarketingFooter />
    </div>
</template>
