<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop_user_ticket extends Model
{
    protected $guarded = ['id'];

    public function ticket()
    {
        return $this->hasOne('App\Models\Ticket');
    }
}
