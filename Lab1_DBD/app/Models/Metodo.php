<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metodo extends Model
{
    use HasFactory;
    public function bancos()
    {
        return $this->belongsTo('App\Bank');
    }
    public function tipos(){
        return $this->belongsTo('App\Card_Type')
    }
}
