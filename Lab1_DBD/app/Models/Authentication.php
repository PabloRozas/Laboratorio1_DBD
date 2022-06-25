<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Authentication extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'password',
    ];

    public function User()
    {
        return $this->belongsTo('App\Models\User');
    }

}
