<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use Auth;
use Psy\Util\Str;
use App\User;
use Illuminate\Support\Facades\Storage;

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

    public function github()
    {
        return Socialite::driver('github')->redirect();
    }

    public function githubRedirect()
    {
        $user =  Socialite::driver('github')->stateless()->user();
        $this->_registerOrLogin($user);
        return redirect()->route('home');
    }


    public function google()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleRedirect()
    {
        $user =  Socialite::driver('google')->stateless()->user();
        $this->_registerOrLogin($user);
        return redirect()->route('home');
    }

    public function facebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookRedirect()
    {
        $user =  Socialite::driver('facebook')->stateless()->user();
        $this->_registerOrLogin($user);
        return redirect()->route('home');
    }


    public function linkedIn()
    {
        return Socialite::driver('linkedin')->redirect();
    }

    public function linkedInRedirect()
    {
        $user =  Socialite::driver('linkedin')->stateless()->user();
        $this->_registerOrLogin($user);
        return redirect()->route('home');
    }


    public function _registerOrLogin($data)
    {
        $user = User::where('email','=',$data->email)->first();

        if(!$user){
            $imageName = time().'.jpg';
            Storage::disk('public')->put('users/images/'.$imageName, file_get_contents($data->avatar));
            $user = new User();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->password = null;
            $user->id_bureau= 1;
            $user->image = $imageName;
            $user->save();

        }

        Auth::login($user);
    }
}
