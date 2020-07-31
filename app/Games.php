<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Games extends Model
{
    //
    protected $table = 'games';
    //Primary key
    protected $primarykey = 'id';
    //timestamps
    public $timestamps = true;
}
