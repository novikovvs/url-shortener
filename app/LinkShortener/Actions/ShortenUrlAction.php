<?php

namespace App\LinkShortener\Actions;

use App\LinkShortener\Services\TokenGeneratorService;
use App\LinkShortener\Services\UrlBuilderService;
use App\Models\ShortenedLinks;
use Throwable;

class ShortenUrlAction
{
    public function __construct(
        private readonly TokenGeneratorService $tokenGeneratorService,
        private readonly UrlBuilderService $urlBuilderService
    ) {
    }

    /**
     * @throws Throwable
     */
    public function exec(string $url): string
    {
        $link = new ShortenedLinks();
        $link->base_link = $url;
        $link->token = $this
            ->tokenGeneratorService
            ->tryGenerateToken();

        $link->saveOrFail();

        return $this
            ->urlBuilderService
            ->buildByToken($link->token);
    }
}
