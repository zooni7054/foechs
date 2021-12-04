<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

use DB;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('settings.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        foreach($request->all() as $key => $value){
            if($key != '_token'){
                DB::table('settings')->where('key', $key)->update(array('value' => $value));
            }
        }

        Session::flash('success', 'Setting is updated successfully!');
        return redirect()->back();
    }

}