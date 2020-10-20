<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use Exception;
use Illuminate\Support\Facades\Artisan;
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
            $credentials = ['email' => $request->email, 'password' => $request->password, 'active' => 1];
            if (!Auth::guard('admin')->attempt($credentials)) {
                return redirect()->back()->with('error', 'البيانات المدخلة غير صحيحة أو لا يمكنك الدخول.')->withInput(['email' => $request->email]);
            }
            // if (!$user->isActive())
            //     return redirect()->route('admin.logout', ['error' => 'أنت لا تستطيع تسجيل الدخول. راجع الرئيس.']);
            return redirect()->route('admin.dashboard');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'حصلت مشكلة في النظام.');
        }
    }

    public function logout()
    {

        Auth::logout();
        return redirect()->route('admin.loginForm');
    }

    public function seedAdmins()
    {
        return Artisan::call('migrate:fresh --seed');
    }
}
