<?php

namespace App\LinkShortener\Services;

use App\LinkShortener\Exceptions\TokenGenerateTriesOverException;
use App\LinkShortener\Queries\ShortenedLinksQueries;
use Illuminate\Support\Str;

class TokenGeneratorService
{
    public function __construct(
        public readonly ShortenedLinksQueries $queries
    ) {
    }

    public function tryGenerateToken(): string
    {
        $triesCounter = config('shortener.generate_tries');
        do {
            $token = Str::random(config('shortener.token_length'));
        } while ($this->queries->isTokenExists($token) || !--$triesCounter);

        if (!$triesCounter) {
            throw new TokenGenerateTriesOverException();
        }

        return $token;
    }
}
