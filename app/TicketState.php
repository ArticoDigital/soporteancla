<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketState extends Model
{
    //
    protected $fillable = [
        'name', 'description','isActive'
    ];
}
