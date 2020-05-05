<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Service;
use foo\bar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function show($service)
    {
        $service = Service::where('slug',$service)->first();
        if (empty($service) || $service->is_public == 0)
        {
            abort(404);
        }

        return view('front.service.show',compact('service'));
    }

    public function request_order($service)
    {
        $service = Service::where('slug',$service)->first();
        if (empty($service) || $service->is_public == 0 || $service->is_product == 0)
        {
            abort(404);
        }
        return view('front.service.request-order',compact('service'));
    }

    public function request_order_store(Service $service,Request $request)
    {
        if (!auth()->check()){
            return redirect()->route('login');
        }
        if ($service->is_product == 0 || $service->is_public == 0){
            abort(404);
        }
        $this->validate($request,[
            'title_form'=>'required|max:225',
            'description_form'=>'required',
            'file'=>'nullable|mimes:doc,docm,docx,ppt,pptx,xlsx,xlsm,xltx,xltm,mpp,pdf,jpg,png,jpeg',
        ]);

        if (isset($request->file))
        {
            if ($request->file('file')->isValid())
            {
                $path =Storage::put('public/requests',$request->file('file'));
            }else
            {
                $path=null;
            }
        }else{
            $path=null;
        }

        \App\Request::create([
            'user_id'=>auth()->id(),
            'service_id'=>$service->id,
            'title_form'=>$request->title_form,
            'description_form'=>$request->description_form,
            'file_form'=>$path
        ]);
        simple_message('انجام شد','کاربر گرامی سفارش شما با موفقیت ثبت شد . به زودی تیم پلاس عمران با شما تماس میگیرند. شما میتوانید در همین صفحه وضعیت سفارش خود را پیگیری کنید ','success','باشه');
        return back();


    }
}
