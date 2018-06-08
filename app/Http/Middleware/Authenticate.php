<?php

namespace App\Http\Middleware;

use App\Http\Requests\Request;
use Closure;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

class Authenticate
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \Closure $next
	 * @param  string|null $guard
	 * @return mixed
	 */
	public function handle($request, Closure $next, $guard = null)
	{

		$sid = Input::get("sid");
		if (isset($sid))
		{
			$b = Auth::loginUsingId(Crypt::decrypt($sid));
		} else
		{
			//return Redirect::to("https://kursistem.com/kur/index.php");
		}


		if (Auth::guard($guard)->guest())
		{
			if ($request->ajax() || $request->wantsJson())
			{
				return response('Unauthorized.', 401);
			} else
			{
				return redirect()->guest('login');
			}
		}


		return $next($request);
	}
}
