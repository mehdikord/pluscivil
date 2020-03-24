<?php

namespace App\Http\Controllers\Management;

use App\Faq;
use App\Http\Controllers\Controller;
use App\Service;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $services = Service::select(['id','name'])->get();
        $data = Faq::query();

        $faqs = $data->paginate(20);
        return view('management.settings.faq_index',compact('faqs','services'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
           'question'=>'required|max:225',
           'answer'=>'required',
           'is_active'=>'required|numeric',
            'service_id'=>'required|numeric',
        ]);
        Faq::create([
           'user_id'=>auth()->id(),
            'service_id'=>$request->service_id,
            'question'=>$request->question,
            'answer'=>$request->answer,
            'is_active'=>$request->is_active,
        ]);
        alert_message('سوال جدید با موفقیت ایجاد شد','success');
        return back();
    }

    public function update(Faq $faq,Request $request)
    {
        $this->validate($request,[
            'question'=>'required|max:225',
            'answer'=>'required',
            'is_active'=>'required|numeric',
            'service_id'=>'required|numeric',
        ]);
        $faq->update([
            'user_id'=>auth()->id(),
            'service_id'=>$request->service_id,
            'question'=>$request->question,
            'answer'=>$request->answer,
            'is_active'=>$request->is_active,
        ]);
        alert_message('سوال با موفقیت ویزایش شد','success');
        return back();
    }

    public function delete(Faq $faq)
    {
        $faq->delete();
        alert_message('سوال با موفقیت حذف شد','success');
        return back();
    }

    public function change(Faq $faq)
    {
        if ($faq->is_active == 1)
        {
            $faq->update(['is_active'=>0]);
            alert_message('سوال با موفقیت غیرفعال شد','success');
            return back();
        }else{
            $faq->update(['is_active'=>1]);
            alert_message('سوال با موفقیت فعال شد','success');
            return back();
        }
    }
}
