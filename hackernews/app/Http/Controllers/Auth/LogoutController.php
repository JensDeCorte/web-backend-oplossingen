<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LogoutController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    public function getLogout()
    {
        $this->auth->logout();
        Session::flush();
        return redirect($this->redirectTo);
    }

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }
}
