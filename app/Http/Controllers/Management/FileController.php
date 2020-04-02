<?php

namespace App\Http\Controllers\Management;

use App\File;
use App\Http\Controllers\Controller;
use App\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $data = File::query();

        $files = $data->paginate(20);

        return view('management.files.index',compact('files'));
    }

    public function create()
    {
        $services = Service::select(['id','name'])->get();
        return view('management.files.create',compact('services'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'service_id'=>'nullable|numeric',
            'name'=>'required',
            'price'=>'required|numeric|min:1',
            'sale'=>'nullable|numeric',
            'is_active'=>'numeric',
            'is_special'=>'numeric',
            'file'=>'required|image',
        ]);
        if ($request->filled('sale'))
        {
            $sale  = Crypt::encrypt($request->sale);
        }else{
            $sale=null;
        }
        $code = auth()->id().rand(100000000,9999999999);
        if ($request->file('file')->isValid())
        {
            $path = Storage::disk('private')->put('',$request->file('file'),'private');
        }
        $token = Str::random(20).uniqid();
        $file = File::create([
            'user_id'=>auth()->id(),
            'service_id'=>$request->service_id,
            'name'=>$request->name,
            'code'=>$code,
            'token'=>$token,
            'file'=>"private".$path,
            'extension'=>$request->file('file')->extension(),
            'price'=>Crypt::encrypt($request->price),
            'sale'=>$sale,
            'description'=>$request->description,
            'is_active'=>$request->is_active,
            'is_special'=>$request->is_special,
        ]);
        alert_message('فایل جدید با موفقیت به فروشگاه اضافه شد','success');
        return back();
    }
}
