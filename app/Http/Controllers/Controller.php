<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function __construct()
    {
        $this->middleware(function ($request, $next) {
            $logged = Auth::user();
            if ($logged) {
                $this->logged_user_id = $logged->id;
                $this->logged_username = $logged->username;
                $this->logged_name = $logged->name;
                $this->logged_email = $logged->email;
                $this->logged_username = $logged->username;
                $this->logged_role_name = $logged->role_name;

                View::share('logged_user_id', $logged->id);
                View::share('logged_username', $logged->username);
                View::share('logged_name', $logged->name);
                View::share('logged_email', $logged->email);
                View::share('logged_photo', $logged->url_img);
                if ($logged->roles->pluck('name')->toArray()) {
                    View::share('logged_role_name', $logged->roles->pluck('name')->toArray()[0]);
                } else {

                    //kalo tidak punya peran/roles dipaksa logout
                    Session::flush();

                    Auth::logout();

                    return redirect('login')->with('noready', 'Peran pengguna belum ditentukan! silahkan hubungi administrator')->with('username', $logged->username);
                }
            }

            return $next($request);
        });
    }
}
