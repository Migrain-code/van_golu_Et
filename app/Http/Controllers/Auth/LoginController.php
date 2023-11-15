<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function username()
    {
        return 'phone';
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        $admin = User::where('phone', clearPhone($request->input('phone')))->first();

        if ($admin && Hash::check($request->input('password'), $admin->password)) {
            Auth::guard('admin')->loginUsingId($admin->id);
            return to_route('admin.home')->with('response', [
                'status' => "success",
                'message' => "Yönetim Sistemine Hoşgeldiniz"
            ]);
        } else {
            return to_route('login')->with('response', [
                'status' => "error",
                'message' => "Telefon Numarası veya Şifre Hatalı"
            ]);
        }
    }
}
