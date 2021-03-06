<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
	
	protected function attemptLogin(Request $request)
    {
		
		if ($this->guard()->attempt(['name' => $request->email, 'password' => $request->password],$request->has('remember'))) {
		
				return;
		} 
		
		elseif ($this->guard()->attempt(['email'=> $request->email, 'password' => $request->password],$request->has('remember'))) {
		
				return;
		}
    }

}
