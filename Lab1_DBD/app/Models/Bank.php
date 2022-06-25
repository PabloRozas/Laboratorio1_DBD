<?php

namespace App\Models;

use App\Models\Method;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Bank extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function Method()
    {
        return $this->hasMany('App\Models\Method');
    }

    
    
}
