<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){
        $input = $request->all();
        $messages = [
            'required' => ':attribute harus diisi',
        ];
        $attributes = [
            'usernameLogin'    =>  'Username',
            'password'    =>  'Password',
        ];
        $this->validate($request,[
            'usernameLogin' =>  'required',
            'password' =>  'required',
        ],$messages,$attributes);
        if (auth()->attempt(array('usernameLogin'   =>  $input['usernameLogin'], 'password' =>  $input['password'],'isAktif'  =>  'aktif'))) {
            if (Auth::check()) {
                $notification1 = array(
                    'message' => 'Berhasil, akun login sebagai alumni!',
                    'alert-type' => 'success'
                );
                return redirect()->route('alumni.dashboard')->with($notification1);;
            } else {
                return redirect()->route('login')->with('error','Password salah atau akun sudah tidak aktif');
            }
        }else{
            $notification = array(
                'message' => 'Gagal, Password salah atau akun sudah tidak aktif!',
                'alert-type' => 'error'
            );
            return redirect()->route('login')->with($notification);
        }
        
    }

    public function usernameLogin()
    {
        return 'usernameLogin';
    }

    public function logout(){
        Auth::guard()->logout();
        return redirect()->route('login');
    }
}
