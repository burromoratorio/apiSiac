<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Waypoint extends Model
{
    protected $table = 'WAYPOINTS';
    protected $primaryKey = 'waypoint_id';
    public $timestamps = false;
}
