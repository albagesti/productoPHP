<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Config;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = '/alumno';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:writer')->except('logout');
    }

    public function showAdminLoginForm()
    {
        return view('auth.login', [
            'url' => Config::get('constants.guards.admin')
        ]);
    }

    public function showWriterLoginForm()
    {
        return view('auth.login', [
            'url' => Config::get('constants.guards.writer')
        ]);
    }

    protected function validator(Request $request)
    {
        return $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:3'
        ]);
    }

    protected function guardLogin(Request $request, $guard)
    {
        $this->validator($request);

        return Auth::guard($guard)->attempt(
            [
                'email' => $request->email,
                'password' => $request->password
            ],
            $request->get('remember')
        );
    }

    public function adminLogin(Request $request)
    {
        if ($this->guardLogin($request, Config::get('constants.guards.admin'))) {
            return redirect()->intended('/admin/admin');
        }

        return back()->withInput($request->only('email', 'remember'));
    }

    public function writerLogin(Request $request)
    {
        if ($this->guardLogin($request,Config::get('constants.guards.writer'))) {
            return redirect()->intended('/writer');
        }

        return back()->withInput($request->only('email', 'remember'));
    }
}
