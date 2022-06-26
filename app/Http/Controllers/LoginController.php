<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use DB;

class LoginController extends Controller
{
    /**
     * Display login page.
     * 
     * @return Renderable
     */
    public function show()
    {
        return view('auth.login');
    }

    /**
     * Handle account login request
     * 
     * @param LoginRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();
        if (!Auth::validate($credentials)) :
            if (isset($credentials['username'])) {
                $username = $credentials['username'];
            } else {
                $username = $credentials['email'];
            }

            $emailorusername = DB::table('users')->where('username', $username)->orWhere('email', $username)->get();
            if (count($emailorusername) == 0) {
                return redirect()->to('login')
                    ->withErrors(__(88))->with('password', $credentials['password']);
            } else {
                return redirect()->to('login')
                    ->withErrors(__(99))->with('username', $username);
            }

        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);

        return $this->authenticated($request, $user);
    }

    /**
     * Handle response after user authenticated
     * 
     * @param Request $request
     * @param Auth $user
     * 
     * @return \Illuminate\Http\Response
     */
    protected function authenticated(Request $request, $user)
    {
        return redirect()->intended();
    }
}
