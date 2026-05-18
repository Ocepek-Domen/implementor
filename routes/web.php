<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'marketing/Home')->name('home');
Route::inertia('/services', 'marketing/Services')->name('services');
Route::inertia('/clients', 'marketing/Clients')->name('clients');
Route::inertia('/clients/ilirika', 'marketing/clients/Ilirika')->name('clients.ilirika');
Route::inertia('/clients/nn-saunas', 'marketing/clients/NnSaunas')->name('clients.nn-saunas');
Route::inertia('/clients/mobistekla', 'marketing/clients/Mobistekla')->name('clients.mobistekla');
Route::inertia('/about', 'marketing/About')->name('about');

Route::inertia('/services/business-automation', 'marketing/services/ComingSoon', [
    'service' => 'Business Automation & ERP',
    'message' => 'This page is currently automating itself into existence. Our Odoo consultant is managing the project plan.',
])->name('services.business-automation');

Route::inertia('/services/rag-ai', 'marketing/services/ComingSoon', [
    'service' => 'RAG & AI Systems',
    'message' => 'We asked our own RAG system to write this page. It confidently made up three of our services and quoted a competitor.',
])->name('services.rag-ai');

Route::inertia('/services/slovenian-localization', 'marketing/services/ComingSoon', [
    'service' => 'Slovenian Localization',
    'message' => 'V delu — that\'s Slovenian for "in progress." At least the localization itself actually works.',
])->name('services.slovenian-localization');

Route::inertia('/services/integrations', 'marketing/services/ComingSoon', [
    'service' => 'Integrations',
    'message' => 'This page isn\'t connected to anything yet. We\'re aware of the irony.',
])->name('services.integrations');

Route::inertia('/services/custom-development', 'marketing/services/ComingSoon', [
    'service' => 'Custom Development',
    'message' => 'Our developer is building this page. Then refactoring it. Then refactoring the refactor.',
])->name('services.custom-development');

Route::inertia('/services/ai-powered-odoo', 'marketing/services/ComingSoon', [
    'service' => 'AI-Powered Odoo',
    'message' => 'We outsourced this page to AI. It gave us a 14-step prompt chain and a disclaimer about hallucinations.',
])->name('services.ai-powered-odoo');

Route::inertia('/services/support', 'marketing/services/ComingSoon', [
    'service' => 'Support & Training',
    'message' => 'The person writing this page is currently being trained. We\'re working on a recursive solution.',
])->name('services.support');

Route::inertia('/services/migrations', 'marketing/services/ComingSoon', [
    'service' => 'Migrations',
    'message' => 'Migrating content from our brains to this page. The schema mapping is harder than expected.',
])->name('services.migrations');

Route::inertia('/services/odoo-implementation', 'marketing/services/ComingSoon', [
    'service' => 'Odoo Implementation',
    'message' => 'This page is in the discovery phase. We\'ll go live after stakeholder sign-off.',
])->name('services.odoo-implementation');

Route::inertia('/services/multi-company', 'marketing/services/ComingSoon', [
    'service' => 'Multi-company & Multi-currency',
    'message' => 'We\'re writing this page in three languages simultaneously. The exchange rate between languages is unfavorable.',
])->name('services.multi-company');

Route::inertia('/services/manufacturing', 'marketing/services/ComingSoon', [
    'service' => 'Manufacturing & Inventory',
    'message' => 'Work in progress — literally. Current stock: 0 pages. Reorder point: soon.',
])->name('services.manufacturing');

Route::inertia('/services/ai-chatbots', 'marketing/services/ComingSoon', [
    'service' => 'AI Chatbots',
    'message' => 'Our chatbot keeps going off-topic when asked to describe itself. We\'re tuning the prompt.',
])->name('services.ai-chatbots');

Route::inertia('/services/ai-odoo-integrations', 'marketing/services/ComingSoon', [
    'service' => 'AI-Odoo Integrations',
    'message' => 'This page will automatically appear in your Odoo once the integration is set up. Any day now.',
])->name('services.ai-odoo-integrations');
Route::inertia('/contact', 'marketing/Contact')->name('contact');
Route::inertia('/politika-zasebnosti', 'marketing/PrivacyPolicy')->name('privacy-policy');
Route::inertia('/pogoji-uporabe', 'marketing/Terms')->name('terms');
Route::post('/contact', [ContactController::class, 'store'])
    ->middleware('throttle:5,10')
    ->name('contact.store');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
