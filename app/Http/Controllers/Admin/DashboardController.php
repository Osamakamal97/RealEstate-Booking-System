<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\NotifyUsers;

class DashboardController extends Controller
{

    public function index()
    {
        // $user = User::find(1);
        // dd($user->notifications->get(0)->markAsRead());

        return view('admin.dashboard');
    }

    public function test()
    {
        return view('test');
    }

    public function admins()
    {
        return view('admin.admins', ['title' => 'المدارء والموظفين']);
    }

    public function permissions()
    {
        return view('admin.permissions', ['title' => 'الصلاحيات']);
    }

    public function realEstateOwners()
    {
        return view('admin.realEstateOwner', ['title' => 'أصحاب العقارات']);
    }

    public function realEstateFacilities()
    {
        return view('admin.realEstateFacilities', ['title' => 'مرافق العقارات']);
    }

    public function users()
    {
        return view('admin.users', ['title' => 'الزبائن']);
    }

    public function notifyUsers()
    {
        return view('admin.notifyUsers', ['title' => 'إشعار الزبائن']);
    }

    public function usersResponse()
    {
        return view('admin.usersResponse', ['title' => 'إشعار الزبائن']);
    }

    public function roles()
    {
        return view('admin.roles', ['title' => 'الأدوار']);
    }

    public function employeeProblemsIndex()
    {
        return view('admin.employeeProblems', ['title' => 'جميع شكاوي الموظفين']);
    }

    public function profile()
    {
        return view('admin.profile', ['title' => 'الملف الشخصي']);
    }

    // employee

    public function employeeProblem()
    {
        return view('admin.employee.problems', ['title' => 'الشكاوي']);
    }

    public function notFound()
    {
        return view('admin.errors.404');
    }
}
