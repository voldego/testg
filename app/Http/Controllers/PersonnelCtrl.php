<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personnel;

class PersonnelCtrl extends Controller
{
    // REQUETTTE PERSONNEL
    public function liste(){
    	$personnels = Personnel::all();
    	return view('comptable.personnel',compact('personnels'));
    }
    public function personnel($id){
    	$personnel = Personnel::find($id);
    	return $personnel;
    }
    public function delete($id){
    	$personnel = Personnel::find($id);
    	$personnel->delete();
    	return back();
    }
    public function store(Request $request){
    	$personnel = new Personnel;
    	$personnel->name = $request->input('name');
    	$personnel->cin = $request->input('cin');
    	$personnel->tel = $request->input('tel');
    	$personnel->cnss = $request->input('cnss');
    	$personnel->rib = $request->input('rib');
    	$personnel->email = $request->input('email');
    	$personnel->fonction = $request->input('fonction');
    	$personnel->banque = $request->input('banque');
    	$personnel->etat = $request->input('etat');
    	$personnel->date_naissance = $request->input('date');
    	$personnel->adresse = $request->input('adresse');
    	$personnel->adresse_banque = $request->input('abanque');
    	$personnel->save();
    	return back();
    }
     public function update(Request $request, $id){
    	$personnel = Personnel::find($id);
    	$personnel->name = $request->input('name');
    	$personnel->cin = $request->input('cin');
    	$personnel->tel = $request->input('tel');
    	$personnel->cnss = $request->input('cnss');
    	$personnel->rib = $request->input('rib');
    	$personnel->email = $request->input('email');
    	$personnel->fonction = $request->input('fonction');
    	$personnel->banque = $request->input('banque');
    	$personnel->etat = $request->input('etat');
    	$personnel->date_naissance = $request->input('date');
    	$personnel->adresse = $request->input('adresse');
    	$personnel->adresse_banque = $request->input('abanque');
    	$personnel->save();
    	return back();
    }
     public function details($id){
    	$personnel = Personnel::find($id);
    	return view('comptable.personnel-details',compact('personnel'));
    }

    //REQUETTE CONTRAT TRAVAIL PERSONNEL






}
