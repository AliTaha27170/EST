<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Business;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = Business::where('email',$data['email'])->first();
        if($user->id == $data['id']){
        return User::create([
            'id' => $data['id'],
            'name' => $user->name,
            'role' => '2',
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        }
    }

    // public function verify($token)
    // {
    //     $user = Business::where('email_token',$token)->first();
    //     $user->status = 1;
    //     if($user->save()){
    //         return view('auth.register',['user'=>$user]);
    //     }
    // }
}
