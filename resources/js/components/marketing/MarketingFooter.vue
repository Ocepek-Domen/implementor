<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { about, clients, contact, privacyPolicy, services, terms } from '@/routes';
</script>

<template>
    <footer class="border-t border-text-light/10 bg-bg-light text-text-light dark:border-white/10 dark:bg-bg-dark dark:text-text-dark">
        <div class="mx-auto max-w-7xl px-6 py-16 lg:px-8">
            <!-- Three columns -->
            <div class="grid grid-cols-1 gap-12 sm:grid-cols-2 lg:grid-cols-3">
                <!-- Services -->
                <div>
                    <h3 class="mb-5 text-xs font-semibold uppercase tracking-widest text-text-light/65 dark:text-text-dark/65">
                        Services
                    </h3>
                    <ul class="flex flex-col gap-3">
                        <li>
                            <Link :href="services.url()" class="text-sm text-text-light/70 transition-colors duration-150 hover:text-text-light dark:text-text-dark/70 dark:hover:text-text-dark">
                                Odoo Implementation
                            </Link>
                        </li>
                        <li>
                            <Link :href="services.url()" class="text-sm text-text-light/70 transition-colors duration-150 hover:text-text-light dark:text-text-dark/70 dark:hover:text-text-dark">
                                AI &amp; Automation
                            </Link>
                        </li>
                        <li>
                            <Link :href="services.url()" class="text-sm text-text-light/70 transition-colors duration-150 hover:text-text-light dark:text-text-dark/70 dark:hover:text-text-dark">
                                Slovenian Localization
                            </Link>
                        </li>
                        <li>
                            <Link :href="services.url()" class="text-sm text-text-light/70 transition-colors duration-150 hover:text-text-light dark:text-text-dark/70 dark:hover:text-text-dark">
                                Migrations
                            </Link>
                        </li>
                        <li>
                            <Link :href="services.url()" class="text-sm text-text-light/70 transition-colors duration-150 hover:text-text-light dark:text-text-dark/70 dark:hover:text-text-dark">
                                Support
                            </Link>
                        </li>
                    </ul>
                </div>

                <!-- Company -->
                <div>
                    <h3 class="mb-5 text-xs font-semibold uppercase tracking-widest text-text-light/65 dark:text-text-dark/65">
                        Company
                    </h3>
                    <ul class="flex flex-col gap-3">
                        <li>
                            <Link :href="about.url()" class="text-sm text-text-light/70 transition-colors duration-150 hover:text-text-light dark:text-text-dark/70 dark:hover:text-text-dark">
                                About
                            </Link>
                        </li>
                        <li>
                            <Link :href="clients.url()" class="text-sm text-text-light/70 transition-colors duration-150 hover:text-text-light dark:text-text-dark/70 dark:hover:text-text-dark">
                                Featured Works
                            </Link>
                        </li>
                        <li>
                            <Link :href="contact.url()" class="text-sm text-text-light/70 transition-colors duration-150 hover:text-text-light dark:text-text-dark/70 dark:hover:text-text-dark">
                                Contact
                            </Link>
                        </li>
                        <li>
                            <Link :href="contact.url()" class="text-sm text-text-light/70 transition-colors duration-150 hover:text-text-light dark:text-text-dark/70 dark:hover:text-text-dark">
                                We're hiring
                            </Link>
                        </li>
                    </ul>
                </div>

                <!-- Get in touch -->
                <div>
                    <h3 class="mb-5 text-xs font-semibold uppercase tracking-widest text-text-light/65 dark:text-text-dark/65">
                        Get in touch
                    </h3>
                    <ul class="flex flex-col gap-3">
                        <li>
                            <a
                                href="mailto:info@implementor.si"
                                class="text-sm text-text-light/70 transition-colors duration-150 hover:text-text-light dark:text-text-dark/70 dark:hover:text-text-dark"
                            >
                                info@implementor.si
                            </a>
                        </li>
                        <li>
                            <a
                                href="tel:+38600000000"
                                class="text-sm text-text-light/70 transition-colors duration-150 hover:text-text-light dark:text-text-dark/70 dark:hover:text-text-dark"
                            >
                                +386 00 000 000
                            </a>
                        </li>
                        <li>
                            <span class="text-sm text-text-light/70 dark:text-text-dark/70">
                                Placeholder Street 1, Ljubljana, Slovenia
                            </span>
                        </li>
                        <li>
                            <a
                                href="https://www.linkedin.com"
                                target="_blank"
                                rel="noopener"
                                class="text-sm text-text-light/70 transition-colors duration-150 hover:text-text-light dark:text-text-dark/70 dark:hover:text-text-dark"
                            >
                                LinkedIn →
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Bottom row -->
            <div class="mt-16 flex flex-col items-start gap-4 border-t border-text-light/10 pt-8 sm:flex-row sm:items-center sm:justify-between dark:border-white/10">
                <p class="text-xs text-text-light/65 dark:text-text-dark/65">
                    &copy; 2026 Implementor d.o.o.
                </p>

                <div class="flex flex-wrap items-center gap-6">
                    <a
                        href="https://www.odoo.com/sl_SI/partners/rounded-square-doo-17408392?country_id=192"
                        target="_blank"
                        rel="noopener"
                        class="flex items-center gap-2 text-xs text-text-light/65 transition-colors duration-150 hover:text-text-light dark:text-text-dark/65 dark:hover:text-text-dark"
                    >
                        <!-- Small Silver Partner badge mark -->
                        <span
                            class="inline-flex h-4 w-4 shrink-0 items-center justify-center rounded-full bg-primary text-[8px] font-bold text-white"
                            aria-hidden="true"
                        >
                            S
                        </span>
                        Odoo Silver Partner
                    </a>

                    <Link :href="privacyPolicy.url()" class="text-xs text-text-light/65 transition-colors duration-150 hover:text-text-light dark:text-text-dark/65 dark:hover:text-text-dark">
                        Politika zasebnosti
                    </Link>
                    <Link :href="terms.url()" class="text-xs text-text-light/65 transition-colors duration-150 hover:text-text-light dark:text-text-dark/65 dark:hover:text-text-dark">
                        Pogoji uporabe
                    </Link>
                </div>
            </div>
        </div>
    </footer>
</template>
