<?php

namespace App\Http\Controllers\Dash;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;

class DashLoginController extends Controller
{

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::ADMIN;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('admin');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        $view_data['title'] = 'Admin Login';
        return view('admin.auth.login');
    }

    public function validateLogin(Request $request)
    {
        $admin = Admin::where('email', $request->email)->first();


        if (!$admin) {
            return redirect()->back()->withInput($request->only('email'))->withErrors([
                'password' => 'admin is not Exist!'
            ]);
        }
        if (!Hash::check($request->password, $admin->password)) {
            return redirect()->back()->withInput($request->only('email'))->withErrors([
                'password' => 'Password is wrong'
            ]);
        }

        // Validate the form data   
        // Attempt to log the user in
        if ($this->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended(route('dashboard'));
        }

        return redirect()->back()->withInput($request->only('email'))->withErrors([
            'password' => 'Invalid Email or Password!'
        ]);
    }

    protected function redirectPath()
    {
        if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo();
        }
        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/dashboard';
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard('admin')->logout();
        Session::flush();
        return redirect()->route('login');
    }
}
