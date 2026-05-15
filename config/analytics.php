<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Google Tag Manager
    |--------------------------------------------------------------------------
    |
    | Set GTM_ID in .env, e.g. GTM_ID=GTM-XXXXXXX
    | GTM handles GA4, Google Ads, and Consent Mode v2.
    |
    */
    'gtm_id' => env('GTM_ID', ''),

    /*
    |--------------------------------------------------------------------------
    | Meta (Facebook) Pixel
    |--------------------------------------------------------------------------
    |
    | Set META_PIXEL_ID in .env, e.g. META_PIXEL_ID=1234567890
    | Loaded only after the visitor grants marketing consent.
    |
    */
    'meta_pixel_id' => env('META_PIXEL_ID', ''),

    /*
    |--------------------------------------------------------------------------
    | Google Search Console
    |--------------------------------------------------------------------------
    |
    | Set GOOGLE_SITE_VERIFICATION in .env with the value from GSC.
    | Adds a <meta name="google-site-verification"> tag — no consent required.
    |
    */
    'gsc_verification' => env('GOOGLE_SITE_VERIFICATION', ''),
];
