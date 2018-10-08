<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceSubcategory extends Model
{
    //
    protected $fillable = [
        'name', 'description', 'isActive', 'service_category_id'
    ];

    public function serviceCategory()
    {
        return $this->belongsTo(ServiceCategory::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
