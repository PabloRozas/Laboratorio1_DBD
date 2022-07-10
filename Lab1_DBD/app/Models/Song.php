<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];
    public function Genre()
    {
        return $this->hasOne(Genre::class, 'id', 'id_genero');
    }
    public function Location()
    {
        return $this->hasOne(Location::class, 'id', 'id_pais');
    }

    public function Album()
    {
        return $this->hasOne(Album::class, 'id', 'id_album');
    }

    //funcion de realcion con la tabla playlist_songs
    public function playlist_songs()
    {
        return $this->hasMany('App\Models\Playlist_Songs');
    }

    public function Rating()
    {
        return $this->hasMany('App\Rating');
    }
}
