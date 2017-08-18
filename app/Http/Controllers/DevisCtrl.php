<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Devis;
use App\Prestationdevis;

class DevisCtrl extends Controller
{
    
    public function storedevis(Request $request)
    {
    	$devis = new Devis;
        $devis->client = $request->input('client');
        $devis->objet = $request->input('objet');
        $devis->date_edition = $request->input('date');
        $devis->save();
        return back();

    }
    public function updatedevis(Request $request,$id)
    {
    	$devis = Devis::find($id);
        $devis->client = $request->input('client');
        $devis->objet = $request->input('objet');
        $devis->date_edition = $request->input('date');
        $devis->save();
        return back();

    }
    public function deletedevis($id)
    {
    	$devis = Devis::find($id);
    	$devis->delete();
        return back();

    }
    public function devis($id){
    	$devis = Devis::find($id);
    	return $devis;
    } 

    public function liste(){
    	$devis = Devis::all();
    	return view('commercial.devis',compact('devis'));
    } 

    public function details($id){
    	$devis = Devis::find($id);
    	return view('commercial.devis-details',compact('devis'));
    }


    //prestations 
    public function prestation($id)
    {
    	$prestation = Prestationdevis::find($id);
        return $prestation;

    }
    public function updateprestation(Request $request,$id)
    {
    	$prestation = Prestationdevis::find($id);
        $prestation->libelle = $request->input('libelle');
        $prestation->montant_ht = $request->input('montantht');
        $prestation->taxable = $request->input('taxable');
        $prestation->save();

        $devis = Devis::find($prestation->devis->id);
        $mtn_ht = $devis->prestation()->sum('montant_ht');
        $mtn_tax = $devis->prestation()->where('taxable','=','Oui')->sum('montant_ht');
        $mtn_ttc = $mtn_ht +($mtn_tax*0.2);
        $devis->total_ht = $mtn_ht;
        $devis->total_ttc = $mtn_ttc;
        $devis->save();
        return back();

    }
    public function storeprestation(Request $request,$id)
    {
    	$prestation = new Prestationdevis;
        $prestation->libelle = $request->input('libelle');
        $prestation->montant_ht = $request->input('montantht');
        $prestation->taxable = $request->input('taxable');
        $prestation->devis_id = $id;
        $prestation->save();

        $devis = Devis::find($id);
        $mtn_ht = $devis->prestation()->sum('montant_ht');
        $mtn_tax = $devis->prestation()->where('taxable','=','Oui')->sum('montant_ht');
        $mtn_ttc = $mtn_ht +($mtn_tax*0.2);
        $devis->total_ht = $mtn_ht;
        $devis->total_ttc = $mtn_ttc;
        $devis->save();
        return back();

    }
    public function deleteprestation($id)
    {
    	$prestation = Prestationdevis::find($id);
    	$prestation->delete();

        $devis = Devis::find($prestation->devis->id);
        $mtn_ht = $devis->prestation()->sum('montant_ht');
        $mtn_tax = $devis->prestation()->where('taxable','=','Oui')->sum('montant_ht');
        $mtn_ttc = $mtn_ht +($mtn_tax*0.2);
        $devis->total_ht = $mtn_ht;
        $devis->total_ttc = $mtn_ttc;
        $devis->save();
        return back();

    }

}
