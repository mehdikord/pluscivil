<?php

namespace App\Http\Controllers\Web;

use App\Faq;
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
        $faqs = Faq::where('is_active',1)->get();
            return view('front.index',compact('faqs'));
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
