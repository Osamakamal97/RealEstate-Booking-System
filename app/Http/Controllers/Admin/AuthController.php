<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use App\Models\AdminTracker;
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
            $admin = Auth::guard('admin')->attempt($credentials);
            if (!$admin) {
                return redirect()->back()->with('error', 'البيانات المدخلة غير صحيحة أو لا يمكنك الدخول.')->withInput(['email' => $request->email]);
            }
            AdminTracker::create(['user_id' => auth('admin')->id(), 'start_at' => time(), 'date' => now()->toDateString()]);
            return redirect()->route('admin.dashboard');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'حصلت مشكلة في النظام.');
        }
    }

    public function logout()
    {
        $tracker = AdminTracker::where('user_id', auth('admin')->user()->id)->get()->last();
        $tracker->end_at = time();
        $tracker->save();
        Auth::logout();
        return redirect()->route('admin.loginForm');
    }

    public function seedAdmins()
    {
        return Artisan::call('migrate:fresh --seed');
    }
}
