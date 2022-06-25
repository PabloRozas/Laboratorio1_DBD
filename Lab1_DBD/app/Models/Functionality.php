<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Functionality extends Model
{
    use HasFactory;
    use SoftDeletes;

    //Funcion de relacion con la tabla roles_functionalities
    public function roles_functionalities()
    {
        return $this->hasMany('App\Models\Roles_Functionalities');
    }
}
