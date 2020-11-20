<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Notifications\ResponseAdminNotification;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $notifications = auth()->user()->notifications->where('type', 'App\Notifications\NotifyUsers');
        return view('home', ['notifications' => $notifications]);
    }

    public function realEstateOwnerDashboard()
    {
        return view('realEstateOwner.dashboard', ['title' => 'title']);
    }

    public function response(Request $request)
    {
        if ($request->has('response')) {
            $response = $request->validate(['response' => 'required', 'notification_id' => 'required']);
            Admin::find(1)->notify(new ResponseAdminNotification($response));
        } else
            $response = $request->validate(['notification_id' => 'required']);

        auth()->user()->notifications->where('id', $response['notification_id'])->markAsRead();
        return redirect()->route('home');
    }
}
