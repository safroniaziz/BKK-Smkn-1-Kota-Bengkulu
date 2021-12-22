<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function alumniRegister(Request $request){
        Validator::extend('without_spaces', function($attr, $value){
            return preg_match('/^\S*$/u', $value);
        });
        $messages = [
            'required' => ':attribute harus diisi',
            'without_spaces'    =>  ':attribute tidak boleh menggunakan spasi'
        ];
        $attributes = [
            'usernameLogin'   =>  'Username Login',
            'namaLengkap'   =>  'Nama Lengkap',
            'email'   =>  'Email',
            'password'   =>  'Password',
        ];
        $this->validate($request, [
            'usernameLogin'    =>  'required|string|without_spaces',
            'namaLengkap'    =>  'required',
            'email'    =>  'required|email|string|unique:users',
            'password'    =>  'required',
        ],$messages,$attributes);
        User::create([
            'usernameLogin' => $request->usernameLogin,
            'namaAlumni' => $request->namaLengkap,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status'    =>  'nonaktif',
        ]);
        $notification = array(
            'message' => 'Anda sudah terdaftar, harap untuk menunggu verifikasi dari operator agar bisa login!',
            'alert-type' => 'success'
        );
        return redirect()->route('login')->with($notification);
    }
}
