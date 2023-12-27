<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\PersonalAccessToken as SanctumPersonalAccessToken;


/**
 * App\Models\PersonalAccessToken
 *
 * @property-read Model|Eloquent $tokenable
 * @method static Builder|PersonalAccessToken newModelQuery()
 * @method static Builder|PersonalAccessToken newQuery()
 * @method static Builder|PersonalAccessToken query()
 */
class PersonalAccessToken extends SanctumPersonalAccessToken
{
    protected $fillable = ['name', 'token', 'abilities','last_used_ip'];

    protected $guarded = ['last_used_ip'];


    public function forceFill(array $attributes): PersonalAccessToken
    {
        if (config('sanctum.get_ip_user')) {

            $attributes = array_merge($attributes, ['last_used_ip' => request()->ip()]);
        }
        return parent::forceFill($attributes);
    }


}
