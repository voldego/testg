<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tva;

class TvaCtrl extends Controller
{
    public function liste(){
    	$tva = Tva::all();
    	return view('fiscale.tva',compact('tva'));
    }

    public function details($id){
    	$tva = Tva::find($id);
    	return view('fiscale.tva-details',compact('tva'));
    }

    public function tva($id){
    	$tva = Tva::find($id);
    	return $tva;
    }

    public function delete($id){
    	$tva = Tva::find($id);
    	$tva->delete();
    	return back();
    }

    public function store(Request $request){
    	$tva = new Tva;
    	$tva->exercice = $request->input('exercice');
    	$tva->periode = $request->input('periode');
    	$tva->credit_precedent = $request->input('cp');
    	$tva->ca_ht = $request->input('caht');
    	$tva->tva_col = $request->input('tvacol');
    	$tva->tva_due = $request->input('tvadue');
    	$tva->credit_tva_periode = $request->input('ctva');
    	$tva->date_depot = $request->input('datedep');
    	$tva->observation = $request->input('observation');
    	$tva->save();
    	return back();
    }

      public function update(Request $request,$id){
    	$tva = Tva::find($id);
    	$tva->exercice = $request->input('exercice');
    	$tva->periode = $request->input('periode');
    	$tva->credit_precedent = $request->input('cp');
    	$tva->ca_ht = $request->input('caht');
    	$tva->tva_col = $request->input('tvacol');
    	$tva->tva_due = $request->input('tvadue');
    	$tva->credit_tva_periode = $request->input('ctva');
    	$tva->date_depot = $request->input('datedep');
    	$tva->observation = $request->input('observation');
    	$tva->save();
    	return back();
    }

}
