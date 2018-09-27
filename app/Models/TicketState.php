<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketState extends Model
{
    //
    protected $fillable = [
        'name', 'description','isActive'
    ];
}
