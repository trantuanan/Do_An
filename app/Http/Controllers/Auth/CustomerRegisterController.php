<?php

namespace App\Http\Controllers\Auth;

use App\Models\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

class CustomerRegisterController extends Controller 
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('auth.customer-register');
    }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/customer';

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'address' => 'max:255',
            'phone' => array('string','max:15' ),
            'ngaysinh' => 'required|date',
            'mail_address' => 'required|string|email|max:255|unique:customers',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    public function register(Request $request)
    {

         $v =$this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        return redirect()->Route('customer.dashboard')->with('success', 'Tạo tài khoản thành công!');
    }

    protected function registered(Request $request, $user)
    {
        //
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // dd($data);
        $customer = new Customer();
        return $customer->createCustomer($data);
    }
}
