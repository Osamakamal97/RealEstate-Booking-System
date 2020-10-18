<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function give()
    {
        return auth()->user()->hasPermissionTo('delete');
        // return auth()->user()->hasPermissionTo('delete');
    }

    public function view()
    {
        return 'this is view';
    }

    public function edit()
    {
        return 'this is edit';
    }

    public function delete()
    {
        return 'this is delete';
    }
}
