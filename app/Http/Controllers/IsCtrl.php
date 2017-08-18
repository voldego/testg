<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Is;
class IsCtrl extends Controller
{
    //
    public function liste(){
    	$is = Is::all();
    	return view('fiscale.is',compact('is'));
    }

    public function is($id){
    	$is = Is::find($id);
    	return $is;
    }

    public function delete($id){
    	$is = Is::find($id);
    	$is->delete();
    	return back();
    }

    public function store(Request $request){
    	$is = new Is;
    	$is->exercice = $request->input('exercice');
    	$is->ca_ht = $request->input('caht');
    	$is->r_comptable = $request->input('rc');
    	$is->r_fiscale = $request->input('rf');
    	$is->impot = $request->input('ipay');
    	$is->save();
    	return back();
    }

      public function update(Request $request,$id){
    	$is = Is::find($id);
    	$is->exercice = $request->input('exercice');
    	$is->ca_ht = $request->input('caht');
    	$is->r_comptable = $request->input('rc');
    	$is->r_fiscale = $request->input('rf');
    	$is->impot = $request->input('ipay');
    	$is->save();
    	return back();
    }

}
