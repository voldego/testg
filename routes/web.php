<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
Route::middleware(['auth'])->group(function () {
   
});
Route::get('/', function(){
	return view('home.accueil');
});
Route::get('/login', function(){
	return view('auth.login');
});

//Devis
Route::get('/devis/liste','DevisCtrl@liste');
Route::get('/devis/{id}/details','DevisCtrl@details');
Route::post('/devis','DevisCtrl@storedevis');
Route::get('/delete/devis/{id}','DevisCtrl@deletedevis');
Route::get('/devis/{id}','DevisCtrl@devis');
Route::post('/update/devis/{id}/','DevisCtrl@updatedevis');
Route::post('/devis/{id}/prestation','DevisCtrl@storeprestation');
Route::post('/update/devis/prestation/{id}','DevisCtrl@updateprestation');
Route::get('/devis/prestation/{id}','DevisCtrl@prestation');
Route::get('/delete/devis/prestation/{id}','DevisCtrl@deleteprestation');

//USERS
Route::get('/users/liste', 'UsersCtrl@liste');
Route::get('/user/{id}', 'UsersCtrl@user');
Route::get('/delete/user/{id}', 'UsersCtrl@delete');
Route::post('/user', 'UsersCtrl@store');
Route::post('/update/user/{id}', 'UsersCtrl@update');

//CNSS
Route::get('/cnss/liste','CnssCtrl@liste');
Route::get('/cnss/{id}','CnssCtrl@cnss');
Route::get('/delete/cnss/{id}','CnssCtrl@delete');
Route::post('/cnss','CnssCtrl@store');
Route::post('update/cnss/{id}','CnssCtrl@update');

//IR
Route::get('/ir/liste','IrCtrl@liste');
Route::get('/ir/{id}','IrCtrl@ir');
Route::get('/delete/ir/{id}','IrCtrl@delete');
Route::post('/ir','IrCtrl@store');
Route::post('update/ir/{id}','IrCtrl@update');

//IS
Route::get('/is/liste','IsCtrl@liste');
Route::get('/is/{id}','IsCtrl@is');
Route::get('/delete/is/{id}','IsCtrl@delete');
Route::post('/is','IsCtrl@store');
Route::post('update/is/{id}','IsCtrl@update');

//TVA
Route::get('/tva/liste','TvaCtrl@liste');
Route::get('/tva/{id}','TvaCtrl@tva');
Route::get('/delete/tva/{id}','TvaCtrl@delete');
Route::post('/tva','TvaCtrl@store');
Route::post('update/tva/{id}','TvaCtrl@update');
Route::get('/tva/{id}/details', 'TvaCtrl@details');

//PERSONNELS
Route::get('/personnel/liste','PersonnelCtrl@liste');
Route::get('/personnel/{id}','PersonnelCtrl@personnel');
Route::get('/delete/personel/{id}','PersonnelCtrl@delete');
Route::post('/personnel','PersonnelCtrl@store');
Route::post('update/personnel/{id}','PersonnelCtrl@update');
Route::get('/personnel/{id}/details', 'PersonnelCtrl@details');

//CONTRATS DE TRAVAIL
Route::get('/personel/contrat/{id}','PersonnelCtrl@contrat');
Route::get('/delete/personnel/contrat/{id}','PersonnelCtrl@deletecontrat');
Route::post('/personnel/{id}/contrat','PersonnelCtrl@storecontrat');
Route::post('/update/personnel/contrat/{id}','PersonnelCtrl@updatecontrat');

//BULLETIN DE PAIE
Route::get('/personel/paie/{id}','PersonnelCtrl@paie');
Route::get('/delete/personnel/paie/{id}','PersonnelCtrl@deletepaie');
Route::post('/personnel/{id}/paie','PersonnelCtrl@storepaie');
Route::post('/update/personnel/paie/{id}','PersonnelCtrl@updatepaie');

//ATTESTATION DE TRAVAIL
Route::get('/personel/at/{id}','PersonnelCtrl@at');
Route::get('/delete/personnel/at/{id}','PersonnelCtrl@deleteat');
Route::post('/personnel/{id}/at','PersonnelCtrl@storeat');
Route::post('/update/personnel/at/{id}','PersonnelCtrl@updateat');

//ATTESTATION DE CONGE
Route::get('/personel/ac/{id}','PersonnelCtrl@ac');
Route::get('/delete/personnel/ac/{id}','PersonnelCtrl@deleteac');
Route::post('/personnel/{id}/ac','PersonnelCtrl@storeac');
Route::post('/update/personnel/ac/{id}','PersonnelCtrl@updateac');




//factures
Route::get('/facture/liste', function(){
	return view('commercial.facture');
});
Route::get('/facture/1/details', function(){
	return view('commercial.facture-details');
});
Route::get('/dj/liste', function(){
	return view('dj.dossier');
});
Route::get('/personals/liste', function(){
	return view('dj.personals');
});




