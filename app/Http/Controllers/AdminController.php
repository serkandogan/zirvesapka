<?php

namespace App\Http\Controllers;

use Auth;

class AdminController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth'); 
		
		if (Auth::User()->roleType != 10) {
			Auth::logout();
			// redirect('home/dashboard');
		}
		
	}
 
}