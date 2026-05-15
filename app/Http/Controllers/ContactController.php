<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreConsultationRequest;
use App\Mail\ConsultationSubmitted;
use App\Models\ConsultationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(StoreConsultationRequest $request): RedirectResponse
    {
        $consultation = ConsultationRequest::query()->create([
            ...$request->validated(),
            'ip_address' => $request->ip(),
        ]);

        Mail::to(config('mail.contact_recipient'))->send(
            new ConsultationSubmitted($consultation)
        );

        return redirect()->route('contact')->with('success', true);
    }
}
