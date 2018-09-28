<?php

namespace App\Models;

use App\User;
use Cake\Chronos\Chronos;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class Comment extends Model
{
    //
    protected $fillable = ['comment_text', 'file_included', 'user_id', 'ticket_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function getCreatedAtAttribute($value)
    {
        Date::setLocale('es');

        $date = new Date($value);
        return $date->format('l j \d\e F Y H:i:s');
    }
}
