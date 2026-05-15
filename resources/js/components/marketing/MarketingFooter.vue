<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { about, clients, contact, services } from '@/routes';
</script>

<template>
    <footer class="border-t border-white/10 bg-[#0f0a12] text-[#f5f2ef]">
        <div class="mx-auto max-w-7xl px-6 py-16 lg:px-8">
            <!-- Three columns -->
            <div class="grid grid-cols-1 gap-12 sm:grid-cols-2 lg:grid-cols-3">
                <!-- Services -->
                <div>
                    <h3 class="mb-5 text-xs font-semibold uppercase tracking-widest text-[#f5f2ef]/40">
                        Services
                    </h3>
                    <ul class="flex flex-col gap-3">
                        <li>
                            <Link :href="services.url()" class="text-sm text-[#f5f2ef]/70 transition-colors duration-150 hover:text-[#f5f2ef]">
                                Odoo Implementation
                            </Link>
                        </li>
                        <li>
                            <Link :href="services.url()" class="text-sm text-[#f5f2ef]/70 transition-colors duration-150 hover:text-[#f5f2ef]">
                                AI &amp; Automation
                            </Link>
                        </li>
                        <li>
                            <Link :href="services.url()" class="text-sm text-[#f5f2ef]/70 transition-colors duration-150 hover:text-[#f5f2ef]">
                                Slovenian Localization
                            </Link>
                        </li>
                        <li>
                            <Link :href="services.url()" class="text-sm text-[#f5f2ef]/70 transition-colors duration-150 hover:text-[#f5f2ef]">
                                Migrations
                            </Link>
                        </li>
                        <li>
                            <Link :href="services.url()" class="text-sm text-[#f5f2ef]/70 transition-colors duration-150 hover:text-[#f5f2ef]">
                                Support
                            </Link>
                        </li>
                    </ul>
                </div>

                <!-- Company -->
                <div>
                    <h3 class="mb-5 text-xs font-semibold uppercase tracking-widest text-[#f5f2ef]/40">
                        Company
                    </h3>
                    <ul class="flex flex-col gap-3">
                        <li>
                            <Link :href="about.url()" class="text-sm text-[#f5f2ef]/70 transition-colors duration-150 hover:text-[#f5f2ef]">
                                About
                            </Link>
                        </li>
                        <li>
                            <Link :href="clients.url()" class="text-sm text-[#f5f2ef]/70 transition-colors duration-150 hover:text-[#f5f2ef]">
                                Clients
                            </Link>
                        </li>
                        <li>
                            <Link :href="contact.url()" class="text-sm text-[#f5f2ef]/70 transition-colors duration-150 hover:text-[#f5f2ef]">
                                Contact
                            </Link>
                        </li>
                        <li>
                            <Link :href="contact.url()" class="text-sm text-[#f5f2ef]/70 transition-colors duration-150 hover:text-[#f5f2ef]">
                                We're hiring
                            </Link>
                        </li>
                    </ul>
                </div>

                <!-- Get in touch -->
                <div>
                    <h3 class="mb-5 text-xs font-semibold uppercase tracking-widest text-[#f5f2ef]/40">
                        Get in touch
                    </h3>
                    <ul class="flex flex-col gap-3">
                        <li>
                            <a
                                href="mailto:hello@implementor.si"
                                class="text-sm text-[#f5f2ef]/70 transition-colors duration-150 hover:text-[#f5f2ef]"
                            >
                                hello@implementor.si
                            </a>
                        </li>
                        <li>
                            <a
                                href="tel:+38600000000"
                                class="text-sm text-[#f5f2ef]/70 transition-colors duration-150 hover:text-[#f5f2ef]"
                            >
                                +386 00 000 000
                            </a>
                        </li>
                        <li>
                            <span class="text-sm text-[#f5f2ef]/70">
                                Placeholder Street 1, Ljubljana, Slovenia
                            </span>
                        </li>
                        <li>
                            <a
                                href="https://www.linkedin.com/company/implementor"
                                target="_blank"
                                rel="noopener"
                                class="text-sm text-[#f5f2ef]/70 transition-colors duration-150 hover:text-[#f5f2ef]"
                            >
                                LinkedIn →
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Bottom row -->
            <div class="mt-16 flex flex-col items-start gap-4 border-t border-white/10 pt-8 sm:flex-row sm:items-center sm:justify-between">
                <p class="text-xs text-[#f5f2ef]/40">
                    &copy; 2025 Implementor d.o.o.
                </p>

                <div class="flex flex-wrap items-center gap-6">
                    <a
                        href="https://www.odoo.com/sl_SI/partners/rounded-square-doo-17408392?country_id=192"
                        target="_blank"
                        rel="noopener"
                        class="flex items-center gap-2 text-xs text-[#f5f2ef]/40 transition-colors duration-150 hover:text-[#f5f2ef]/70"
                    >
                        <!-- Small Silver Partner badge mark -->
                        <span
                            class="inline-flex h-4 w-4 shrink-0 items-center justify-center rounded-full bg-[#714b67] text-[8px] font-bold text-white"
                            aria-hidden="true"
                        >
                            S
                        </span>
                        Odoo Silver Partner
                    </a>

                    <a href="#" class="text-xs text-[#f5f2ef]/40 transition-colors duration-150 hover:text-[#f5f2ef]/70">
                        Privacy
                    </a>
                    <a href="#" class="text-xs text-[#f5f2ef]/40 transition-colors duration-150 hover:text-[#f5f2ef]/70">
                        Terms
                    </a>
                </div>
            </div>
        </div>
    </footer>
</template>
