<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    public function Genre()
    {
        return $this->belongsTo('App\Genre');
    }
    public function Location()
    {
        return $this->belongsTo('App\Location');
    }

    public function Album()
    {
        return $this->belongsTo('App\Album');
    }

    public function Playlists(){
        return $this->belongsToMany('App\Playlist');
    }
    public function Rating()
    {
        return $this->hasMany('App\Rating');
    }

}
