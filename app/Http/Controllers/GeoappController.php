<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Response;
use App\GeoPoint;

class GeoappController extends Controller
{
    //

	public function index()
	{
		 
		return Response::json(GeoPoint::all(), 200); // 200 OK
	}

	public function show($id)
	{
		return Response::json(GeoPoint::find($id), 200); // 200 OK
	}

	public function store(Request $request)
	{

		if(!preg_match("/^[0-9\.]+$/",$request->input('lat')) ||
			!preg_match("/^[0-9\.]+$/",$request->input('lon')))
		{
			$status=406; // 406 Not Acceptable
		} else {

			$gp=GeoPoint::create(array("lat"=> $request->input('lat'),
					"lon"=> $request->input('lon'),
					"geotext" => $request->input('text') 
					/*,
					"geopt" => "GeomFromText(POINT(".
						$request->input('lat')." ".
						$request->input('lon')."))"*/ ));

		        $status=is_object($gp)?201:500; // 201 Created or 500 Internal Server Error
		}

		return Response::make("", $status);
	}

}
