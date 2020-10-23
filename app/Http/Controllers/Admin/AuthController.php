<?php

namespace App\Http\Controllers\Admin;

use App\Events\Admin\LoginEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use Exception;
use Illuminate\Auth\Events\Login;
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
            $admin = Auth::guard('admin')->attempt($credentials);
            if (!$admin) {
                return redirect()->back()->with('error', 'البيانات المدخلة غير صحيحة أو لا يمكنك الدخول.')->withInput(['email' => $request->email]);
            }

            event(new Login('admin', auth('admin')->user(), false));
            // event(new LoginEvent(auth('admin')->user()));
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
