<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Model;

class Email extends Model
{
    //
    protected $collection = "emails";
}
