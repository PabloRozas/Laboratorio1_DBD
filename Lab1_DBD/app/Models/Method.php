<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Method extends Model
{
    use HasFactory;
    public function Bank()
    {
        return $this->belongsTo('App\Bank');
    }
    public function CardType()
    {
        return $this->belongsTo('App\Card_Type');
    }
}
