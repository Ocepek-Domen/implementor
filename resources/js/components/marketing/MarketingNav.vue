<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { onMounted, onUnmounted, ref } from 'vue';
import { useAppearance } from '@/composables/useAppearance';
import { useCurrentUrl } from '@/composables/useCurrentUrl';
import { about, clients, contact, home, services } from '@/routes';

const { resolvedAppearance, updateAppearance } = useAppearance();
const { isCurrentUrl } = useCurrentUrl();

const isScrolled = ref(false);
const isMenuOpen = ref(false);

function handleScroll() {
    isScrolled.value = window.scrollY > 60;
}

function toggleTheme() {
    updateAppearance(resolvedAppearance.value === 'dark' ? 'light' : 'dark');
}

function openMenu() {
    isMenuOpen.value = true;
    document.body.style.overflow = 'hidden';
}

function closeMenu() {
    isMenuOpen.value = false;
    document.body.style.overflow = '';
}

onMounted(() => {
    window.addEventListener('scroll', handleScroll, { passive: true });
});

onUnmounted(() => {
    window.removeEventListener('scroll', handleScroll);
    document.body.style.overflow = '';
});

const navLinks = [
    { label: 'Services', href: services.url() },
    { label: 'Clients', href: clients.url() },
    { label: 'About', href: about.url() },
    { label: 'Contact', href: contact.url() },
];
</script>

<template>
    <header
        :class="[
            'fixed left-0 right-0 top-0 z-50 w-full transition-all duration-200',
            isScrolled
                ? 'border-b border-black/5 bg-[#fafaf7]/85 py-3 backdrop-blur-md dark:border-white/5 dark:bg-[#0f0a12]/85'
                : 'bg-transparent py-5',
        ]"
    >
        <div class="mx-auto flex h-full max-w-7xl items-center justify-between px-6 lg:px-8">
            <!-- Logo -->
            <Link
                :href="home.url()"
                class="font-serif text-xl text-[#1a0f1c] dark:text-[#f5f2ef]"
            >
                Implementor
            </Link>

            <!-- Desktop nav links -->
            <nav class="hidden items-center gap-8 md:flex">
                <Link
                    v-for="link in navLinks"
                    :key="link.href"
                    :href="link.href"
                    :class="[
                        'text-sm font-medium transition-colors duration-150',
                        isCurrentUrl(link.href)
                            ? 'text-[#1a0f1c] dark:text-[#f5f2ef]'
                            : 'text-[#1a0f1c]/50 hover:text-[#1a0f1c] dark:text-[#f5f2ef]/50 dark:hover:text-[#f5f2ef]',
                    ]"
                >
                    {{ link.label }}
                </Link>
            </nav>

            <!-- Right: theme toggle + CTA + hamburger -->
            <div class="flex items-center gap-3">
                <button
                    type="button"
                    aria-label="Toggle theme"
                    class="hidden h-9 w-9 items-center justify-center rounded-full text-[#1a0f1c]/50 transition-colors hover:text-[#1a0f1c] dark:text-[#f5f2ef]/50 dark:hover:text-[#f5f2ef] md:flex"
                    @click="toggleTheme"
                >
                    <!-- Sun — shown in dark mode -->
                    <svg
                        v-if="resolvedAppearance === 'dark'"
                        xmlns="http://www.w3.org/2000/svg"
                        width="18"
                        height="18"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        aria-hidden="true"
                    >
                        <circle cx="12" cy="12" r="4" />
                        <path d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M6.34 17.66l-1.41 1.41M19.07 4.93l-1.41 1.41" />
                    </svg>
                    <!-- Moon — shown in light mode -->
                    <svg
                        v-else
                        xmlns="http://www.w3.org/2000/svg"
                        width="18"
                        height="18"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        aria-hidden="true"
                    >
                        <path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z" />
                    </svg>
                </button>

                <Link
                    :href="contact.url()"
                    data-magnetic
                    class="hidden items-center rounded-full bg-[#c8a951] px-4 py-2 text-sm font-medium text-[#1a0f1c] transition-[filter] duration-150 hover:brightness-110 md:inline-flex"
                >
                    Book a call
                </Link>

                <!-- Hamburger / close toggle (mobile only) -->
                <button
                    type="button"
                    :aria-label="isMenuOpen ? 'Close menu' : 'Open menu'"
                    class="flex h-9 w-9 items-center justify-center rounded-full text-[#1a0f1c] dark:text-[#f5f2ef] md:hidden"
                    @click="isMenuOpen ? closeMenu() : openMenu()"
                >
                    <svg
                        v-if="!isMenuOpen"
                        xmlns="http://www.w3.org/2000/svg"
                        width="20"
                        height="20"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        aria-hidden="true"
                    >
                        <line x1="4" x2="20" y1="6" y2="6" />
                        <line x1="4" x2="20" y1="12" y2="12" />
                        <line x1="4" x2="20" y1="18" y2="18" />
                    </svg>
                    <svg
                        v-else
                        xmlns="http://www.w3.org/2000/svg"
                        width="20"
                        height="20"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        aria-hidden="true"
                    >
                        <path d="M18 6 6 18M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </header>

    <!-- Mobile full-screen overlay — z-40 sits behind the fixed nav (z-50) -->
    <Transition
        enter-active-class="transition-all duration-300 ease-out"
        enter-from-class="opacity-0 -translate-y-3"
        enter-to-class="opacity-100 translate-y-0"
        leave-active-class="transition-all duration-200 ease-in"
        leave-from-class="opacity-100 translate-y-0"
        leave-to-class="opacity-0 -translate-y-3"
    >
        <div
            v-if="isMenuOpen"
            class="fixed inset-0 z-40 flex flex-col bg-[#fafaf7] pt-20 dark:bg-[#0f0a12] md:hidden"
        >
            <!-- Centered nav links -->
            <nav class="flex flex-1 flex-col items-center justify-center gap-8">
                <Link
                    v-for="link in navLinks"
                    :key="link.href"
                    :href="link.href"
                    class="text-3xl font-medium text-[#1a0f1c] transition-colors hover:text-[#714b67] dark:text-[#f5f2ef] dark:hover:text-[#c8a951]"
                    @click="closeMenu"
                >
                    {{ link.label }}
                </Link>
            </nav>

            <!-- Bottom bar: theme toggle + CTA -->
            <div class="flex items-center justify-between px-6 pb-10">
                <button
                    type="button"
                    aria-label="Toggle theme"
                    class="flex h-10 w-10 items-center justify-center rounded-full text-[#1a0f1c]/50 transition-colors hover:text-[#1a0f1c] dark:text-[#f5f2ef]/50 dark:hover:text-[#f5f2ef]"
                    @click="toggleTheme"
                >
                    <svg
                        v-if="resolvedAppearance === 'dark'"
                        xmlns="http://www.w3.org/2000/svg"
                        width="20"
                        height="20"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        aria-hidden="true"
                    >
                        <circle cx="12" cy="12" r="4" />
                        <path d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M6.34 17.66l-1.41 1.41M19.07 4.93l-1.41 1.41" />
                    </svg>
                    <svg
                        v-else
                        xmlns="http://www.w3.org/2000/svg"
                        width="20"
                        height="20"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        aria-hidden="true"
                    >
                        <path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z" />
                    </svg>
                </button>

                <Link
                    :href="contact.url()"
                    class="rounded-full bg-[#c8a951] px-6 py-2.5 text-sm font-medium text-[#1a0f1c]"
                    @click="closeMenu"
                >
                    Book a call
                </Link>
            </div>
        </div>
    </Transition>
</template>
