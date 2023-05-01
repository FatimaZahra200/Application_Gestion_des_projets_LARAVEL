<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\Auth\LoginRequest;

class ClientsAuthController extends Controller
{
    //
    /**
     * Display admin login view
     *
     * @return \Illuminate\View\View
     */
    
    public function showLoginForm()
    {
        if (Auth::guard('client')->check()) {
            return redirect()->route('clientDashboard');
        } else {
            return view('auth.clientLogin');
        }
    }

    /**
     * Handle an incoming admin authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */


    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(auth()->guard('client')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            $user = auth()->user();

            return redirect()->intended(url('/clientDashboard'));
        } else {
            return redirect()->back()->withError('Credentials doesn\'t match.');
        }
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */


    public function logout(Request $request)
    {
        Auth::guard('client')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
