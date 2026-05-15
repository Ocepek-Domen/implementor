<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConsultationRequest extends Model
{
    protected $fillable = [
        'name',
        'company_name',
        'email',
        'phone',
        'company_size',
        'intent',
        'message',
        'privacy_consent',
        'ip_address',
    ];

    protected function casts(): array
    {
        return [
            'privacy_consent' => 'boolean',
        ];
    }
}
