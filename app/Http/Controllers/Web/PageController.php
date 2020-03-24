<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Service;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
//        if (auth()->check() && auth()->user()->role_id != 4){
//            //check Admins Login and redirect to management page
//            return redirect()->route('management_dashboard');
//        }else{
            return view('front.index');
//        }
    }

    public function login()
    {
        return view('front.auth.login');
    }

    public function register()
    {
        return view('front.auth.register');
    }
}
