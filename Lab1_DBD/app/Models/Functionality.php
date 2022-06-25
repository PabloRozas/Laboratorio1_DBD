<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Functionality extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function Role()
    {
        return $this->belongsToMany('App\Role');
    }
}
