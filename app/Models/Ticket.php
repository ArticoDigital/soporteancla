<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Ticket extends Model
{
    use Notifiable;

    protected $fillable = ['name', 'subject', 'company', 'cellphone',
        'email', 'sap_number', 'identification',
        'sell_point', 'operation_center', 'user_id',
        'service_subcategory_id', 'ticket_state_id', 'request',
        'address', 'city_id', 'file', 'file2', 'file3', 'city_text', 'is_invoiced',
        'invoice_number', 'invoice_cost'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function serviceSubcategory()
    {
        return $this->belongsTo(ServiceSubcategory::class);
    }

    public function ticketState()
    {
        return $this->belongsTo(TicketState::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function Comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function scopeSearch($query, $data)
    {
        new TicketSearch($query, $data);
        return $query->orderBy('created_at', 'desc')->paginate(10);
    }
    public function scopeSearchExcel($query, $data)
    {
        new TicketSearch($query, $data);
        return $query->orderBy('created_at', 'desc')->get();
    }

}
