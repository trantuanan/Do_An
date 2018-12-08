<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class CustomerLoginController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest:customer')->except('logout');
	}

    public function showLoginForm()
    {
    	return view('auth.customer-login');
    }

    public function login(Request $request)
    {
    	$this->validate($request, [
    		'mail_address' => 'required|email|string',
    		'password' => 'required|min: 6|string'
    	]);

    	$input = [
    		'mail_address' => $request->mail_address,
    		'password' => $request->password
    	];

    	if (Auth::guard('customer')->attempt($input, $request->remember)) {
    		return redirect()->intended(Route('customer.dashboard'));
    	}
    	
    	return redirect()->back()->withInput($request->only('email','remember'));
    }

    protected function guard()
    {
        return Auth::guard();
    }

    protected $redirectTo = '/customer';

    public function logout(Request $request)
    {
        Auth::guard('customer')->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect()->guest(route( 'home' ));
    }
}
