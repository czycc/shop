<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Relate extends Model
{
    protected $guarded = ['id'];

    public function machine()
    {
        return $this->belongsTo('App\Models\Machine');
    }
}
