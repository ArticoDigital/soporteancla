<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketState extends Model
{
    //
    protected $fillable = [
        'name', 'description', 'isActive'
    ];

        public function nameClass()
    {
        return str_slug($this->name);
    }

}
