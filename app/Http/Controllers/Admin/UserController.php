<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:super-admin|manager');
    }

    public function index()
    {
        return view('admin.users');
    }
}
