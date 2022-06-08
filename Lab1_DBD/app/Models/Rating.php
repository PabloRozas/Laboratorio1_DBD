<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    public function Score()
    {
        return $this->belongsTo('App\Score');
    }
    public function User()
    {
        return $this->belongsTo('App\User');
    }
    public function Song()
    {
        return $this->belongsTo('App\Song');
    }
}
