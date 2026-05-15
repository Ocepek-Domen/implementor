<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreConsultationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'company_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'company_size' => ['required', 'in:1-10,11-50,51-200,200+'],
            'intent' => ['required', 'in:start-fresh,migrate,existing-odoo,exploring'],
            'message' => ['nullable', 'string', 'max:2000'],
            'privacy_consent' => ['required', 'accepted'],
            'website_url' => ['prohibited'],
        ];
    }

    public function messages(): array
    {
        return [
            'privacy_consent.accepted' => 'You must agree to our privacy policy to submit.',
            'website_url.prohibited' => 'This field must be empty.',
        ];
    }
}
