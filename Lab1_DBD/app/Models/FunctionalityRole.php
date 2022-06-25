<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FunctionalityRole extends Model
{
    use HasFactory, SoftDeletes;

    //Funcion de realcion con tabla functionality
    public function functionality()
    {
        return $this->belongsTo('App\Models\Functionality');
    }

    //Funcion de relacion con la tabla roles
    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }
    
}
