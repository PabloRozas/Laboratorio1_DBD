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
