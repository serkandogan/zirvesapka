<?php

namespace App\Http\Controllers\Site;
 
use App\Http\Controllers\Controller;
use App\Http\Controllers\SiteController;
use App\Models\Product;
use App\Models\Category; 
use App\Models\User; 
use Input;
use Auth;
use Validator;

use Laravel\Illuminate\Cookies\CookieServiceProvider;
use Laravel\Illuminate\Session\Middleware\StartSession;

class MemberController extends SiteController
{
	
	public function getIndex () 
	{  
		return view(theme('member.login'));
	}
 
	public function getLogin () 
	{
		if(Auth::check()) {
			return redirect('/');
		}
		return view(theme('member.login'));
	}
	public function getRegister () 
	{
		if(Auth::check()) {
			return redirect('/');
		}
		return view(theme('member.login'));
	}

	public function postLogin()
	{
		$validator = Validator::make(Input::all(), ['email'=>'required', 'password'=>'required']);
		$message = $validator->messages()->first();
		if ($validator->fails()) {
			return redirect()->back()->withMessage($message)->withInput();
		}

 		if (Auth::attempt(['email' => e(Input::get('email')), 'password' => e(Input::get('password'))])) {
            return redirect()->intended('hesap');
        } else {
            return redirect()->back()->withMessage('Giriş başarısız! Lütfen tekrar daha sonra deneyiniz');
        }
	}

	/*
	 * Üye Kayıt Methodu
	 */
	public function postRegister()
	{
		$validator = Validator::make(Input::all(), ['email'=>'required|unique:users', 'password'=>'required|min:6']);
		$message = $validator->messages()->first();
		if (Input::get('password')<>Input::get('confirm_password')) {
			return redirect()->back()->withMessage("Girmiş olduğunuz şifreler farklı!")->withInput();
		}
		if ($validator->fails()) {
			return redirect()->back()->withMessage($message)->withInput();
		}
		$add = new User;
		$add->name = Input::get('name');
		$add->email = Input::get('email');
		$add->password = bcrypt(Input::get('password'));
		$add->roleType = 1;
		$add->save();

		if ($add->save()) {
			return redirect('uye/login')->withMessage('Tebrikler! Başarıyla kaydınız oluşturulmuştur.');
		}else{
			return redirect('uye/register')->withMessage('Hata! Kaydınız oluşturulamadı! Lütfen tekrar daha sonra deneyiniz')->withInput();
		}
	}


	public function getLogout() 
	{
		if(Auth::check()) {
			Auth::logout();
		}
		return redirect('uye/login');
	}

}