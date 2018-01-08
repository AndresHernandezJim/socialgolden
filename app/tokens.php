<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tokens extends Model
{
    //
    protected $table = 'claves';
   
    protected $fillable = [
        'user_id','token',
    ];
}
