<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cnss;

class CnssCtrl extends Controller
{
    //
    public function liste(){
    	$cnss = Cnss::all();
    	return view('fiscale.cnss',compact('cnss'));
    } 

    public function cnss($id){
    	$cnss = Cnss::find($id);
    	return $cnss;
    }

    public function store(Request $request){
    	$cnss = new Cnss;
    	$cnss->exercice = $request->input('exercice');
    	$cnss->client = $request->input('client');
    	$cnss->masse_salariale = $request->input('masse');
    	$cnss->pen_cnss = $request->input('pencnss');
    	$cnss->pen_amo = $request->input('penamo');
    	$cnss->date_pay = $request->input('datepay');
    	$cnss->date_depot = $request->input('datedep');
    	$cnss->save();
    	return back();
    }

     public function update(Request $request,$id){
    	$cnss = Cnss::find($id);
    	$cnss->exercice = $request->input('exercice');
    	$cnss->client = $request->input('client');
    	$cnss->masse_salariale = $request->input('masse');
    	$cnss->pen_cnss = $request->input('pencnss');
    	$cnss->pen_amo = $request->input('penamo');
    	$cnss->date_pay = $request->input('datepay');
    	$cnss->date_depot = $request->input('datedep');
    	$cnss->save();
    	return back();
    }

    public function delete($id){
    	$cnss = Cnss::find($id);
    	$cnss->delete();
    	return back();
    }


}
