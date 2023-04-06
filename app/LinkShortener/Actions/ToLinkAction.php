<?php

namespace App\LinkShortener\Actions;

use App\Models\ShortenedLinks;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class ToLinkAction
{
    public function exec(ShortenedLinks $link): \Illuminate\Http\RedirectResponse
    {
        try {
            DB::beginTransaction();
            $link->expired = true;
            $link->save();
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            Log::error($exception->getMessage());
        }

        return Redirect::to($link->base_link);
    }
}
