<?php

namespace App\Http\Controllers\Site;
 
use App\Http\Controllers\Controller;
use App\Http\Controllers\SiteController;
use Laravel\Illuminate\Cookies\CookieServiceProvider;
use Laravel\Illuminate\Session\Middleware\StartSession;
use App\Models\Product;
use App\Models\UserAdres; 
use App\Models\User; 
use App\Models\Order; 
use App\Models\Category; 
use App\Models\City; 
use App\Models\CityTown; 
use Input;
use Auth;
use Validator;

class MemberAccountController extends SiteController
{
	 
	public function getIndex () 
	{  

		$siparisler = Order::where('UyeID', Auth::User()->id)->get();
		$adresler = UserAdres::where('user_id', Auth::User()->id)->get();
		return view(theme('member.account'), compact('siparisler', 'adresler'));
	}
 
	public function getProfile () 
	{

		return view(theme('member.account'));
	}

	public function getAdresler() 
	{

		$adresler = UserAdres::where('user_id', Auth::User()->id)->get();

		return view(theme('member.adresler'), compact('adresler'));
	}
	public function getAdresekle ()  
	{
		$ilListe = UserAdres::iller();
		$ilceListe = UserAdres::iller();
		return view(theme('member.adresekle'), compact('ilListe', 'ilceListe'));
	}
	public function postAdresekle ()  
	{
		$validator = Validator::make(Input::all(), ['AdresAdSoyad'=>'required']);
		$validator_message = $validator->messages()->first();
		if ($validator->fails()) {
			return redirect()->back()->withMessage($validator_message);
		} 
		$add = new UserAdres;
		$add->user_id = Auth::User()->id;
		$add->AdresAdSoyad 			= Input::get('AdresAdSoyad');
		$add->AdresAdres 			= Input::get('AdresAdres');
		$add->AdresIlID 			= Input::get('AdresIlID');
		$add->AdresIlceID 			= Input::get('AdresIlceID');
		$add->AdresTelefon1 		= Input::get('AdresTelefon1');
		$add->AdresCep 				= Input::get('AdresCep');
		$add->FaturaUnvan 			= Input::get('FaturaUnvan');
		$add->FaturaAdres 			= Input::get('FaturaAdres');
		$add->FaturaIlID 			= Input::get('FaturaIlID');
		$add->FaturaIlceID 			= Input::get('FaturaIlceID');
		$add->FaturaTelefon1 		= Input::get('FaturaTelefon1');
		$add->FaturaCep 			= Input::get('FaturaCep');
		$add->FaturaVergiDaire 		= Input::get('FaturaVergiDaire');
		$add->FaturaVergiNumara 	= Input::get('FaturaVergiNumara');
		$add->save();
		if ($add->save()) {
			return redirect('hesap/adresler'); 
		}else{
			return redirect()->back()->withMessage('Adres Oluşturulamadı');
		}
		return view(theme('member.adresekle'));
	}

	public function getAdressil($id){
		$record = UserAdres::findOrFail($id);
		$record->delete();
		return redirect('hesap/adresler');
	}

 
}