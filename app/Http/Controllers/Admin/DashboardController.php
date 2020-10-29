<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    public function index()
    {
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

    public function users()
    {
        return view('admin.users', ['title' => 'الزبائن']);
    }

    public function roles()
    {
        return view('admin.roles',['title' => 'الأدوار']);
    }

    public function employeeProblemsIndex()
    {
        return view('admin.employeeProblems',['title'=>'جميع شكاوي الموظفين']);
    }

    // employee

    public function employeeProblem()
    {
        return view('admin.employee.problems',['title' => 'الشكاوي']);
    }

    public function notFound()
    {
        return view('admin.errors.404');
    }
}
