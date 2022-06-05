<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    public function subjectScore()
    {
        return $this->belongsTo('App\Score');
    }
    public function subjectUser()
    {
        return $this->belongsTo('App\User');
    }
    public function subjectSong()
    {
        return $this->belongsTo('App\Song');
    }
}
