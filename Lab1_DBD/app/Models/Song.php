<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    public function subjectGenero()
    {
        return $this->belongsTo('App\Genre');
    }
    public function subjectPais()
    {
        return $this->belongsTo('App\Location');
    }

    public function subjectAlbum()
    {
        return $this->belongsTo('App\Album');
    }

    public function subjectPlaylists(){
        return $this->belongsToMany('App\Playlist');
    }
    public function courseRating()
    {
        return $this->hasMany('App\Rating');
    }

}
