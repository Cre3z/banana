<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Model;

class Guest extends Model
{
    protected $collection = "guests";
    
    public $fillable = ['name', 'surname', 'cell', 'email', 'invited', 'plus_one', 'rsvp', 'accommodation', 'dietary', 'token'];
}
