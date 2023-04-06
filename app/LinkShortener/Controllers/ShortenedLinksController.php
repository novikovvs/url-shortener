<?php

namespace App\LinkShortener\Controllers;

use App\LinkShortener\Actions\ShortenUrlAction;
use App\LinkShortener\Actions\ToLinkAction;
use App\LinkShortener\Requests\ShortenRequest;
use App\Models\ShortenedLinks;
use Illuminate\Http\RedirectResponse;

class ShortenedLinksController
{
    public function shorten(ShortenRequest $request, ShortenUrlAction $action): string
    {
        return $action->exec($request->get('url'));
    }

    public function toLink(ShortenedLinks $link, ToLinkAction $action): RedirectResponse
    {
        return $action->exec($link);
    }
}
