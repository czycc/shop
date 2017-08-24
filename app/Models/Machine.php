<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    public $timestamps = false;
    protected $guarded = ['id'];

    public function relate()
    {
        return $this->hasOne('App\Models\Relate');
    }
}
