<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory;
    public function Song(){
        return $this->belongsToMany('App\Song');
    }
    public function User(){
        return $this->belongsTo('App\User');
    }
}
