<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Shop_user
 *
 * @mixin \Eloquent
 */
class Shop_user extends Model
{
    protected $fillable = ['openid', 'name', 'mobile', 'birthday', 'location', 'coin', 'sign'];

    public function tickets()
    {
        return $this->belongsToMany('App\Models\Ticket');
    }
}
