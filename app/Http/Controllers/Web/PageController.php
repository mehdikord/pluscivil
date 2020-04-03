<?php

namespace App\Http\Controllers\Web;

use App\Faq;
use App\File;
use App\Http\Controllers\Controller;
use App\Service;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $faqs = Faq::where('is_active',1)->get();
        return view('front.index',compact('faqs'));
    }

    public function login()
    {
        return view('front.auth.login');
    }

    public function register()
    {
        return view('front.auth.register');
    }
    public function file_store()
    {
        $files = File::all();
        return view('front.store.file-store',compact('files'));
    }
}
