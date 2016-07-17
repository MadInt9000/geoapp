<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Response;
use App\GeoPoint;

class YamapController extends Controller
{
    //

	public function index(Request $request)
	{

		if(preg_match("/^([0-9\.]+),([0-9\.]+),([0-9\.]+),([0-9\.]+)$/",
				$request->input("bbox"),$matches))
		{
			$points = GeoPoint::whereRaw('lat BETWEEN ? and ? AND lon BETWEEN ? and ?', 
					array($matches[1],$matches[3],$matches[2],$matches[4]))->get();

			// Yandex.maps json object
			$yam['type']="FeatureCollection";
			$yam['features']=array();

			foreach ($points as $element)
			{
				$yam['features'][]=array("type"=>"Feature",
							"id"=>$element['id'],
							"geometry"=>array("type"=>"Point",
								"coordinates"=>array($element['lat'],
										$element['lon'])),
							"properties"=>array("iconContent"=>
								htmlspecialchars($element['geotext']))
							);
			}

			return Response::json($yam,200)->setCallback($request->input("callback"));;
		}

		return Response::make("",400);
	}
}
