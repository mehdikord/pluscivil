<?php

namespace App\Http\Controllers\Management;

use App\File;
use App\File_image;
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
            'service_id'=>'required|numeric',
            'name'=>'required',
            'price'=>'required|numeric|min:1',
            'sale'=>'nullable|numeric',
            'is_active'=>'numeric',
            'is_special'=>'numeric',
            'file'=>'required|mimes:doc,docm,docx,ppt,pptx,xlsx,xlsm,xltx,xltm,mpp,pdf',
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
            'file'=>"private/".$path,
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

    public function edit(File $file)
    {
        $services = Service::select(['id','name'])->get();
        return view('management.files.edit',compact('file','services'));


    }

    public function update(File $file,Request $request)
    {
        $this->validate($request,[
            'service_id'=>'required|numeric',
            'name'=>'required',
            'price'=>'required|numeric|min:1',
            'sale'=>'nullable|numeric',
            'is_active'=>'numeric',
            'is_special'=>'numeric',
            'file'=>'nullable|mimes:doc,docm,docx,ppt,pptx,xlsx,xlsm,xltx,xltm,mpp,pdf',
        ]);
        if ($request->filled('sale'))
        {
            $sale  = Crypt::encrypt($request->sale);
        }else{
            $sale=null;
        }
        if ($request->filled('file'))
        {
            if ($request->file('file')->isValid())
            {
                $path = "private/".Storage::disk('private')->put('',$request->file('file'),'private');
            }else
            {
                $path=null;
            }

            if ($request->file('file')->isValid())
            {
                $extension = $request->file('file')->extension();
            }else{
                $extension=null;
            }
        }else{
            $extension=$file->extension;
            $path=$file->file;
        }
        $file->update([
            'user_id'=>auth()->id(),
            'service_id'=>$request->service_id,
            'name'=>$request->name,
            'file'=>$path,
            'extension'=>$extension,
            'price'=>Crypt::encrypt($request->price),
            'sale'=>$sale,
            'description'=>$request->description,
            'is_active'=>$request->is_active,
            'is_special'=>$request->is_special,
        ]);
        alert_message('فایی مورد نظر با موفقیت ویرایش شد','success');
        return back();
    }

    public function active(File $file)
    {
        if ($file->is_active==1)
        {
            $file->update(['is_active'=>0]);
            alert_message('نمایش فایل در فروشگاه غیرفعال شد','success');
        }else{
            $file->update(['is_active'=>1]);
            alert_message('نمایش فایل در فروشگاه فعال شد','success');
        }
        return back();
    }
    public function special(File $file)
    {
        if ($file->is_special==1)
        {
            $file->update(['is_special'=>0]);
            alert_message('حالت ویژه فایل غیرفعال شد','success');
        }else{
            $file->update(['is_special'=>1]);
            alert_message('حالت ویژه فایل فعال شد','success');
        }
        return back();
    }

    public function download(File $file)
    {
        $name=$file->code.'.'.$file->extension;
        return Storage::download($file->file,$name);
    }

    public function add_image(File $file,Request $request)
    {
        $this->validate($request,[
           'image'=>'required|image'
        ]);

        if ($request->file('image')->isValid()){
            $path = Storage::put('public/files/preview/',$request->file('image'));

        }else{
            $path=null;
        }
        $file->images()->create([
           'user_id'=>auth()->id(),
            'image'=>$path,
        ]);
        alert_message('تصویر جدید برای فایل اضافه شد','success');
        return back();
    }

    public function delete_image(File_image $image)
    {
        if (!empty($image->image))
        {
            Storage::delete($image->image);
        }
        $image->delete();
        alert_message('تصویر فایل باموفقیت حذف شد','success');
        return back();
    }
}
