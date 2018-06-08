<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class PasswordController extends Controller {

	use ResetsPasswords;

	protected $subject      = 'Şifre Sıfırlama Bağlantısı';
	protected $redirectTo   = '/admin/dashboard';
	protected $redirectPath = '/admin/dashboard';

	public function __construct() {
		$this->middleware('guest');
	}
}
