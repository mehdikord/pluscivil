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
    public function file_store(Request $request)
    {
        $categories = Service::where('is_public',1)->get();
        $file_date = File::query();
        $special_date = File::query();
        if ($request->filled('category'))
        {
            $file_date->whereHas('service',function ($q)use($request){
                $q->where('slug',$request->category);
            });
            $special_date->whereHas('service',function ($q)use($request){
                $q->where('slug',$request->category);
            });
        }
        if ($request->filled('search'))
        {
            $special_date->where('name','like','%'.$request->search.'%');
            $file_date->where('name','like','%'.$request->search.'%');
        }
        $files = $file_date->where('is_active',1)->orderByDesc('id')->take('5')->get();
        $specials = $special_date->where('is_active',1)->where('is_special',1)->get();
        return view('front.store.file-store',compact('files','specials','categories'));
    }

    public function show_file($file)
    {
        if(File::where('code',$file)->where('is_active',1)->exists())
        {
            $file = File::where('code',$file)->where('is_active',1)->first();
            return view('front.store.show',compact('file'));

        }else
        {
            abort(404);
        }

    }
}
