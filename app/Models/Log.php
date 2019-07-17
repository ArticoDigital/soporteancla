<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = ['description'];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
