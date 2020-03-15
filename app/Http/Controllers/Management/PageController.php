<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function login()
    {
        return view('management.auth.login');
    }

    public function dashboard()
    {
        return view('management.dashboard.index');
    }
}
