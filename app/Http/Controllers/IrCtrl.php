<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ir;

class IrCtrl extends Controller
{
    //
    public function liste(){
    	$ir = Ir::all();
    	return view('fiscale.ir',compact('ir'));
    }

    public function ir($id){
    	$ir = Ir::find($id);
    	return $ir;
    }

    public function delete($id){
    	$ir = Ir::find($id);
    	$ir->delete();
    	return back();
    }

    public function store(Request $request){
    	$ir = new Ir;
    	$ir->exercice = $request->input('exercice');
    	$ir->periode = $request->input('periode');
    	$ir->masse_salariale = $request->input('masse');
    	$ir->montant_ir = $request->input('mir');
    	$ir->date_pay = $request->input('datepay');
    	$ir->quittance = $request->input('quitance');
    	$ir->save();
    	return back();
    }

      public function update(Request $request,$id){
    	$ir = Ir::find($id);
    	$ir->exercice = $request->input('exercice');
    	$ir->periode = $request->input('periode');
    	$ir->masse_salariale = $request->input('masse');
    	$ir->montant_ir = $request->input('mir');
    	$ir->date_pay = $request->input('datepay');
    	$ir->quittance = $request->input('quitance');
    	$ir->save();
    	return back();
    }

}
