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

            $‌main_services = Service::whereNull('parent_id')->where('is_public',1)->get();
            return view('index',compact('‌main_services'));
//        }
    }
}
