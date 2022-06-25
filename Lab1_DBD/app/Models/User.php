<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    public function Role()
    {
        return $this->belongsTo('App\Role');
    }

    public function Method()
    {
        return $this->belongsTo('App\Method');
    }
    public function Rating()
    {
        return $this->hasMany('App\Rating');

    }
    public function Playlist()
    {
        return $this->hasMany('App\Playlist');

    }
    public function Album()
    {
        return $this->hasMany('App\Album');

    }
    //Funcion relación con la tabla followups
    public function Followups()
    {
        return $this->belongsTo('App\Followup');
    }



    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'fecha_nacimiento',
        'suscripcion',
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

        /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
