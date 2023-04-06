<?php

namespace App\LinkShortener\Queries;

use App\Models\ShortenedLinks;
use Illuminate\Support\Collection;

class ShortenedLinksQueries
{
    public function isTokenExists(string $token): bool
    {
        return ShortenedLinks::whereToken($token)->exists();
    }

    public function getAllExpiredLinks(array $columns = ['*']): Collection
    {
        return ShortenedLinks::whereExpired(true)->get($columns);
    }

    public function deleteByTokens(Collection $tokens): int
    {
        return ShortenedLinks::whereIn('token', $tokens)->delete();
    }
}
