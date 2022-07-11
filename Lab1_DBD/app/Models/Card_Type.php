<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Card_Type extends Model
{
    use HasFactory, SoftDeletes;

    public function Method()
    {
        return $this->hasMany('App\Models\Method');
    }

}
