<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SongPlaylist extends Model
{
    use HasFactory, SoftDeletes;

    //funcion de relacion con la tabla playlist
    public function playlist()
    {
        return $this->belongsTo('App\Models\Playlist');
    }

    //funcion de relacion con la tabla songs
    public function song()
    {
        return $this->belongsTo('App\Models\Song');
    }

}
