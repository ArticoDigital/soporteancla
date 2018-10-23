<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    //
    protected $fillable = [
        'name', 'description', 'isActive'
    ];

    public function subcategories()
    {
        return $this->hasMany(ServiceSubcategory::class)->where('isActive',"=",1);
    }

}
