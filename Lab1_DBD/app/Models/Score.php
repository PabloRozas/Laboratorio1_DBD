<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;
    public function courseRating()
    {
        return $this->hasMany('App\Rating');
    }
    
}
