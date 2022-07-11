<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Playlist extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    //Funcion de relacion con la tabla playlist_songs
    public function playlist_songs()
    {
        return $this->hasMany('App\Models\Playlist_Songs');
    }

    public function User(){
        return $this->belongsTo('App\User');
    }
}
