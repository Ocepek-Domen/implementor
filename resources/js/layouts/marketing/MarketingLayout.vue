<script setup lang="ts">
import { useHead } from '@inertiajs/vue3';
import MarketingFooter from '@/components/marketing/MarketingFooter.vue';
import MarketingNav from '@/components/marketing/MarketingNav.vue';

useHead({
    script: [
        {
            type: 'application/ld+json',
            children: JSON.stringify({
                '@context': 'https://schema.org',
                '@type': 'Organization',
                name: 'Implementor d.o.o.',
                url: 'https://implementor.si',
                logo: 'https://implementor.si/images/logo.png',
                contactPoint: {
                    '@type': 'ContactPoint',
                    email: 'hello@implementor.si',
                    contactType: 'customer service',
                },
                sameAs: [
                    'https://www.odoo.com/sl_SI/partners/rounded-square-doo-17408392?country_id=192',
                    'https://www.linkedin.com/company/implementor',
                ],
            }),
        },
    ],
});
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
