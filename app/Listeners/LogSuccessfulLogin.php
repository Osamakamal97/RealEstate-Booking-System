<?php

namespace App\Listeners;

use App\Models\AdminTracker;
use Carbon\Carbon;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Session;

class LogSuccessfulLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        // $last_login = Carbon::now();
        // if ($user->last_login_at == null)
        //     $last_login = Carbon::yesterday();
        // else
        //     $last_login = Carbon::parse($user->last_login_at);
        // $now = Carbon::now();
        // if ($last_login->day != $now->day) {
        //     $user->last_login_at = date('Y-m-d H:i:s');
        //     $user->last_login_ip = $this->request->ip();
        //     $user->save();
        // }
    }
}
