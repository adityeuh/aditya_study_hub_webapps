<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{

    protected $logged_user_id = 0;
    protected $logged_username = '';
    protected $logged_name = '';
    protected $logged_email = '';
    protected $logged_role_name = '';


    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if (Auth::check()) {          

            return view('home.index');
        } else {
            return view('auth.login');
        }
    }
}
