<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Followup extends Model
{
    use HasFactory;
    use SoftDeletes;
    //funcion relacion con la tabla users
    public function user1()
    {
        return $this->belongsTo('App\Models\User', 'id_usuario1');
    }
    //funcion relacion con la tabla users  
    public function user2()
    {
        return $this->belongsTo('App\Models\User', 'id_usuario2');
    }

}
