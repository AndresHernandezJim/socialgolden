<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class publicacionesprogramadas extends Model
{
     protected $table = 'subidas';
   
    protected $fillable = [
        'idpost','tiempounix',
    ];
}
