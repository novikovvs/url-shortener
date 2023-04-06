<?php

namespace App\LinkShortener\Services;

use App\LinkShortener\Exceptions\TokenGenerateTriesOverException;
use App\LinkShortener\Queries\ShortenedLinksQueries;
use Illuminate\Support\Str;

class TokenGeneratorService
{
    private const GENERATE_TOKEN_TRIES = 10;

    public function __construct(
        public readonly ShortenedLinksQueries $queries
    ) {
    }

    public function tryGenerateToken(): string
    {
        $triesCounter = self::GENERATE_TOKEN_TRIES;
        do {
            $token = Str::random(6);
        } while ($this->queries->isTokenExists($token) || !--$triesCounter);

        if (!$triesCounter) {
            throw new TokenGenerateTriesOverException();
        }

        return $token;
    }
}
