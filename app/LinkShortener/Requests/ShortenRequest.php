<?php

namespace App\LinkShortener\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShortenRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'url' => 'required|url',
        ];
    }
}
