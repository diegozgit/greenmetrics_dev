<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
class LoginController extends Controller
{
    /**
     * Display login page.
     *
     * @return Renderable
     */
    public function show()
    {
        return view('auth.login');
    }

    /**
     * Handle account login request
     *
     * @param LoginRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();

        if (Auth::validate($credentials)){
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended();
            }
        }

        if (Auth::guard('admin')->validate($credentials)){
            if (Auth::guard('admin')->attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended();
            }
        }

        if (Auth::guard('supplier')->validate($credentials)){
            if (Auth::guard('supplier')->attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended();
            }
        }

        return redirect()->to('login')->withErrors(trans('auth.failed'));
    }

    /**
     * Handle response after user authenticated
     *
     * @param Request $request
     * @param Auth $user
     *
     * @return \Illuminate\Http\Response
     */
    protected function authenticated(Request $request, $user)
    {
        return redirect()->intended();
    }
}
