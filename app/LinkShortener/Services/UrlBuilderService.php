<?php

namespace App\LinkShortener\Services;

use Illuminate\Support\Facades\URL;

class UrlBuilderService
{
    public function buildByToken(string $token): string
    {
        return URL::to($token);
    }
}
