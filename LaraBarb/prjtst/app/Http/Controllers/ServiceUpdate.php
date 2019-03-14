<?php

namespace App\Http\Controllers;
use App\Service;
use Validator;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceUpdate extends Controller
{
    public function uprank(Request $request,$id) {
        DB::update('update services set isMain = 1  where id = ?',[$id]);
        // echo "<script>history.back()</script>";
        return redirect('/admin');

    }
    public function lowerrank(Request $request,$id) {
        DB::update('update services set isMain = 0  where id = ?',[$id]);
        // echo "<script>history.back()</script>";
        return redirect('/admin');
    }
    public function add (Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255']);
        if ($validator->fails()) {
            return redirect('/')
            ->withInput()
            ->withErrors($validator);
        }
        $serv = new Service;
        $serv->name = $request->name;
        $serv->cost = $request->cost;
        $serv->save();
        if($request->isMethod('post'))
        {
            if($request->hasFile('image')) 
            {
                $file = $request->file('image');
                $file->move(public_path() . '/css/pictures/service',$serv->id.'.png');
            }
        }
        return redirect('/admin');
    }
    public function delete (Service $service) {
    $service->delete();
    unlink(getcwd()."/css/pictures/service"."/"."$service->id.png");
    return redirect('/admin');
}
}
