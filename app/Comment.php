<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = ['comment_text','file_included','user_id','ticket_id'];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function ticket(){
        return $this->belongsTo(Ticket::class);
    }
}
