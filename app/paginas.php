<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class paginas extends Model
{
  protected $table = 'paginas';
   
    protected $fillable = [
        'user_id','nombre','p_id','token',
    ];
}
