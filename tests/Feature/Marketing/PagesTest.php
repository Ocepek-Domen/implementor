<?php

test('home page is accessible', function () {
    $this->withoutVite()
        ->get(route('home'))
        ->assertOk()
        ->assertInertia(fn ($page) => $page->component('marketing/Home'));
});

test('services page is accessible', function () {
    $this->withoutVite()
        ->get(route('services'))
        ->assertOk()
        ->assertInertia(fn ($page) => $page->component('marketing/Services'));
});

test('clients page is accessible', function () {
    $this->withoutVite()
        ->get(route('clients'))
        ->assertOk()
        ->assertInertia(fn ($page) => $page->component('marketing/Clients'));
});

test('about page is accessible', function () {
    $this->withoutVite()
        ->get(route('about'))
        ->assertOk()
        ->assertInertia(fn ($page) => $page->component('marketing/About'));
});

test('contact page is accessible', function () {
    $this->withoutVite()
        ->get(route('contact'))
        ->assertOk()
        ->assertInertia(fn ($page) => $page->component('marketing/Contact'));
});
