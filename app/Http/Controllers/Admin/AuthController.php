<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use Exception;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function getLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(LoginRequest $request)
    {
        try {
            $credentials = ['email' => $request->email, 'password' => $request->password];
            if (Auth::guard('admin')->attempt($credentials)) {
                // $user = Auth::guard('admin')->user();
                // Auth::guard('admin')->login($user);
                return redirect()->route('admin.dashboard');
            }
            return redirect()->back()->with('error', 'البيانات المدخلة غير صحيحة')->withInput(['email' => $request->email]);
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'حصلت مشكلة في النظام.');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.loginForm');
    }
}
