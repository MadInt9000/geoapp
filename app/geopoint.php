<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeoPoint extends Model
{
    //
	protected $table = 'points';
	protected $fillable =  ['lat', 'lon', 'geotext' /*, 'geopt'*/ ];

}
