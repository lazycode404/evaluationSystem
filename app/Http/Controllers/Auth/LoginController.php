<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
    //protected $redirectTo = RouteServiceProvider::HOME;
    public function authenticated()
    {
        if(Auth::user()->status == 1)
        {
            if(Auth::user()->role == '0') // 0 = System Admin | 1 = Admin | 2 = User
            {
                return redirect('admin/dashboard');
            }
            elseif(Auth::user()->role == '1')
            {
                return redirect('admin/dashboard');
            }
            else
            {
                return redirect('/home')->with('success','Logged in Successfully');
            }
        }
        else
        { 
            Auth::logout();
            return redirect('/')->with('error','Your account is not activated');
        }
        
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
