<?php

namespace App\Http\Controllers;
use App\Place;
use Validator;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
 	public function add (Request $request) {
  		$validator = Validator::make($request->all(), [
    	'city' => 'required|max:255',
    	'address' => 'required|max:255',
    	'phone' => 'required|min:12',
  		]);

  		if ($validator->fails()) {
    	return redirect('/')
      	->withErrors($validator)->withInput();;
  		}
  		$place = new Place;
  		$place->city = $request->city;
  		$place->address = $request->address;
  		$place->phone = $request->phone;
  		$place->save();
  		return redirect('/admin');
	}
		public function delete (Place $place) {
			$place->delete();
			return redirect('/admin');
		}
}
