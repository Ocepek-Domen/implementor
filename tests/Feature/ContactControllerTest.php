<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;

uses(RefreshDatabase::class);

$validPayload = fn () => [
    'name' => 'Jane Novak',
    'company_name' => 'Acme d.o.o.',
    'email' => 'jane@acme.si',
    'phone' => '+386 40 123 456',
    'company_size' => '11-50',
    'intent' => 'start-fresh',
    'message' => 'Looking to move from Pantheon.',
    'privacy_consent' => '1',
];

beforeEach(function () {
    Mail::fake();
});

it('stores a valid consultation request and redirects with success', function () use ($validPayload) {
    $response = $this->post('/contact', $validPayload());

    $response->assertRedirect('/contact');
    $response->assertSessionHas('success', true);

    $this->assertDatabaseHas('consultation_requests', [
        'email' => 'jane@acme.si',
        'company_size' => '11-50',
        'intent' => 'start-fresh',
    ]);
});

it('sends a notification email on valid submission', function () use ($validPayload) {
    $this->post('/contact', $validPayload());

    Mail::assertSentCount(1);
});

it('rejects submission when required fields are missing', function () {
    $response = $this->post('/contact', []);

    $response->assertSessionHasErrors(['name', 'company_name', 'email', 'company_size', 'intent', 'privacy_consent']);
    $this->assertDatabaseCount('consultation_requests', 0);
});

it('rejects an invalid email address', function () use ($validPayload) {
    $payload = array_merge($validPayload(), ['email' => 'not-an-email']);

    $response = $this->post('/contact', $payload);

    $response->assertSessionHasErrors('email');
});

it('rejects an invalid company_size value', function () use ($validPayload) {
    $payload = array_merge($validPayload(), ['company_size' => 'lots']);

    $this->post('/contact', $payload)->assertSessionHasErrors('company_size');
});

it('rejects an invalid intent value', function () use ($validPayload) {
    $payload = array_merge($validPayload(), ['intent' => 'world-domination']);

    $this->post('/contact', $payload)->assertSessionHasErrors('intent');
});

it('blocks submission when honeypot field is filled', function () use ($validPayload) {
    $payload = array_merge($validPayload(), ['website_url' => 'http://spam.example.com']);

    $this->post('/contact', $payload)->assertSessionHasErrors('website_url');
    $this->assertDatabaseCount('consultation_requests', 0);
});

it('allows optional fields to be omitted', function () use ($validPayload) {
    $payload = array_merge($validPayload(), ['phone' => null, 'message' => null]);

    $response = $this->post('/contact', $payload);

    $response->assertRedirect('/contact');
    $this->assertDatabaseHas('consultation_requests', [
        'email' => 'jane@acme.si',
        'phone' => null,
        'message' => null,
    ]);
});
