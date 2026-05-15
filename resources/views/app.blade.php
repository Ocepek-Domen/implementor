<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"  @class(['dark' => ($appearance ?? 'system') == 'dark'])>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- Inline script to detect system dark mode preference and apply it immediately --}}
        <script>
            (function() {
                const appearance = '{{ $appearance ?? "system" }}';

                if (appearance === 'system') {
                    const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

                    if (prefersDark) {
                        document.documentElement.classList.add('dark');
                    }
                }
            })();
        </script>

        {{-- Inline style to set the HTML background color based on our theme in app.css --}}
        <style>
            html {
                background-color: oklch(1 0 0);
            }

            html.dark {
                background-color: oklch(0.145 0 0);
            }
        </style>

        <link rel="icon" href="/favicon.ico" sizes="any">
        <link rel="icon" href="/favicon.svg" type="image/svg+xml">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">

        <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "Organization",
            "name": "Implementor d.o.o.",
            "url": "https://implementor.si",
            "logo": "https://implementor.si/images/logo.png",
            "contactPoint": {
                "@@type": "ContactPoint",
                "email": "hello@@implementor.si",
                "contactType": "customer service"
            },
            "sameAs": [
                "https://www.odoo.com/sl_SI/partners/rounded-square-doo-17408392?country_id=192",
                "https://www.linkedin.com/company/implementor"
            ]
        }
        </script>

        {{-- Google Search Console domain verification (no consent required) --}}
        @if(config('analytics.gsc_verification'))
        <meta name="google-site-verification" content="{{ config('analytics.gsc_verification') }}">
        @endif

        {{-- Google Consent Mode v2 — defaults denied, restores granted state for returning visitors.
             Must run before GTM so tags fire with the correct consent on first script evaluation. --}}
        @if(config('analytics.gtm_id'))
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() { window.dataLayer.push(arguments); }
            gtag('consent', 'default', {
                ad_storage: 'denied',
                ad_user_data: 'denied',
                ad_personalization: 'denied',
                analytics_storage: 'denied',
                wait_for_update: 500
            });
            (function () {
                try {
                    if (localStorage.getItem('implementor_cookie_consent') === 'granted') {
                        gtag('consent', 'update', {
                            ad_storage: 'granted',
                            ad_user_data: 'granted',
                            ad_personalization: 'granted',
                            analytics_storage: 'granted'
                        });
                    }
                } catch (e) {}
            })();
        </script>
        {{-- Google Tag Manager --}}
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','{{ config('analytics.gtm_id') }}');</script>
        @endif

        {{-- Meta Pixel ID — read by CookieBanner.vue to init the pixel after consent --}}
        @if(config('analytics.meta_pixel_id'))
        <meta name="meta-pixel-id" content="{{ config('analytics.meta_pixel_id') }}">
        @endif

        @fonts

        @vite(['resources/css/app.css', 'resources/js/app.ts', "resources/js/pages/{$page['component']}.vue"])
        <x-inertia::head>
            <title>{{ config('app.name', 'Laravel') }}</title>
        </x-inertia::head>
    </head>
    <body class="font-sans antialiased">
        {{-- GTM noscript fallback --}}
        @if(config('analytics.gtm_id'))
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{ config('analytics.gtm_id') }}" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        @endif
        <x-inertia::app />
    </body>
</html>
