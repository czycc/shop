<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Relate extends Model
{
    protected $guarded = ['id'];

    public function machine()
    {
        return $this->hasOne('App\Models\Machine');
    }
}
