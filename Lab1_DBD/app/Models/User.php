<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function autenticacion()
    {
        return $this->hasOne('App\Authentication');
    }
    public function subjectRoles()
    {
        return $this->belongsTo('App\Rol');
    }

    public function courseMetodos()
    {
        return $this->hasMany('App\Method');
    }
    public function courseRating()
    {
        return $this->hasMany('App\Course');

    }
    public function coursePlaylist()
    {
        return $this->hasMany('App\Playlist');

    }
    public function courseAlbum()
    {
        return $this->hasMany('App\Album');

    }
    public function subjectSong()
    {
        return $this->belongsTo('App\Song');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        //    'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        //  'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
