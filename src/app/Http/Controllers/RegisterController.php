<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\RegisterAdminRequest;
use App\Http\Requests\RegisterSupplierRequest;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /**
     * Display register page.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('auth.register');
    }

    public function showAdmin()
    {
        return view('auth.register-admin');
    }

    public function showSupplier()
    {
        return view('auth.register-supplier');
    }

    /**
     * Handle account registration request
     *
     * @param RegisterRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request)
    {
        $user = User::create($request->validated());

        event(new Registered($user));

        auth()->login($user);

        return redirect('/')->with('success', "Registrazione avvenuta con successo.");
    }

    public function registerAdmin(RegisterAdminRequest $request)
    {
        $admin = Admin::create($request->validated());

        event(new Registered($admin));

        auth()->guard('admin')->login($admin);

        return redirect('/')->with('success', "Registrazione avvenuta con successo.");
    }

    public function registerSupplier(RegisterSupplierRequest $request)
    {
        $supplier = Supplier::create($request->validated());

        event(new Registered($supplier));

        return redirect('/')->with('success', "Registrazione avvenuta con successo.");
    }

}
