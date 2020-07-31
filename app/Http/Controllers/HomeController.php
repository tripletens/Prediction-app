<?php

namespace App\Http\Controllers;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userrole = auth()->user()->role;
        if($userrole == 'user'){
            return view('user_dashboard.index');
        } 
    }
    public function profile()
    {
        $userrole = auth()->user()->role;
        if ($userrole == 'user') {
            return view('user_dashboard.profile');
        }
    }
    public function settings()
    {
        $userrole = auth()->user()->role;
        if ($userrole == 'user') {
            return view('user_dashboard.profile-setting');
        }
    }
}
