<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('not_member')->except('login');
    }

    public function login()
    {
        if (auth()->check())
        {
            return redirect()->route('management_dashboard');

        }else{
            return view('management.auth.login');
        }
    }

    public function dashboard()
    {
        return view('management.dashboard.index');
    }
}
