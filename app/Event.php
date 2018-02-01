<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Model;

class Event extends Model
{
    protected $collection = "events";
}
