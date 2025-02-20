<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
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

    public function showLoginForm()
  {
        if(auth()->user()){
        redirect('consultant')->with('error', "Already logged in!");
      }
      return view('auth.login');
    }

    public function login(Request $request)
  {

    $this->validate($request, [
      'email' => 'required|email',
      'password' => 'required',
    ]);

    // dd($request);
    // $user_type = Auth::user()->user_type;
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        // if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
      // Log user Now
      return redirect()->intended(route('admin.consultants'));
    } else {
      session()->flash('sticky_error', 'Invalid Login');
      return back();
    }
  }

    public function logout(Request $request)
  {
    $this->guard()->logout();

    $request->session()->invalidate();

    return redirect()->route('login');
  }
}
