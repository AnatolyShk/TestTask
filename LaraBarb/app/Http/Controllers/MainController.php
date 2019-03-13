<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Service;
use App\Place;
class MainController extends Controller
{
  function index()
  {
    return view('login');
  }
    function checklogin(Request $request)
  {
    $this->validate($request, [
    'login'   => 'required',
    'password'  => 'required|min:3']);
    $user_data = array(
    'email'  => $request->get('name'),
    'password'  => $request->get('password')
  );
    if(Auth::attempt($user_data))
  {
    return redirect('main/succeslogin');
  }
  }
  function succeslogin()
  {
    $services = Service::orderBy('created_at', 'asc')->get();
    $places = Place::orderBy('created_at', 'asc')->get();
    return view('/admin',
    ['services' => $services,
    'places' => $places]);}

  function logout()
  {
    Auth::logout();
    $services = Service::orderBy('created_at', 'asc')->get();
    $places = Place::orderBy('created_at', 'asc')->get();
    return view('land',
    ['services' => $services,
    'places' => $places]);
  }
}
