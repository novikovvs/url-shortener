<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ShortenedLinks.
 *
 * @property string $shortened_link
 * @property string $base_link
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $expired
 * @property string $token
 * @method static \Illuminate\Database\Eloquent\Builder|ShortenedLinks newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShortenedLinks newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShortenedLinks query()
 * @method static \Illuminate\Database\Eloquent\Builder|ShortenedLinks whereBaseLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShortenedLinks whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShortenedLinks whereExpired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShortenedLinks whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShortenedLinks whereToken($value)
 * @mixin \Eloquent
 */
class ShortenedLinks extends Model
{
    protected $primaryKey = null;

    public $incrementing = false;
}
