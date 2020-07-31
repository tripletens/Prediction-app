<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    //
    protected $table = 'tickets';
    //Primary key
    protected $primarykey = 'id';
    //timestamps
    public $timestamps = true;
}
