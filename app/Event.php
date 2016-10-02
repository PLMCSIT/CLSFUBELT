<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class EventController
 *
 * @author  The scaffold-interface created at 2016-09-23 01:09:15pm
 * @link  https://github.com/amranidev/scaffold-interface
 */
class Event extends Model
{
	
	
    public $timestamps = false;
    
    protected $table = 'events';

	
}
