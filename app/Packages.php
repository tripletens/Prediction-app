<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Packages extends Model
{
    protected $table = 'packages';
    //Primary key
    protected $primarykey = 'id';
    //timestamps
    public $timestamps = true;
}
