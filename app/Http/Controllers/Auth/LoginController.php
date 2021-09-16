<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    // protected $redirectTo = RouteServiceProvider::DASHBOARD;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

        // Semua method & function ada di AuthenticatesUsers
    }

    // Override function showLoginForm dari AuthenticatesUsers
    public function showLoginForm()
    {
        return view('auth.login');
        // return view('otentikasi.login');    // Ubah pakai hlm login custom sendiri
    }

    // Override function username dari AuthenticatesUsers
    public function username()
    {
        // return 'email';
        return 'username';  // Ubah credential login jadi pakai username bukan email
    }
}
