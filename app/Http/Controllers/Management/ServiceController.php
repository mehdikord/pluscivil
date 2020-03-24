<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $data = Service::query();

        $services = $data->paginate(20);
        return view('management.services.index',compact('services'));
    }

    public function create()
    {
        $services = Service::select(['name','id'])->get();

        return view('management.services.create',compact('services'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|min:3|max:225|unique:services',
            'slug'=>'required|unique:services',
            'parent_id'=>'nullable|numeric',
            'price'=>'nullable|min:1|numeric',
            'sale'=>'nullable|min:1|numeric',
            'is_special'=>'required|numeric',
            'is_product'=>'required|numeric',
            'is_public'=>'required|numeric',
        ]);
        if (isset($request->logo) && $request->file('logo')->isValid()){
            $name = "service-".Str::random(10).'.'.$request->file('logo')->extension();
            $request->file('logo')->move('uploads/images/services',$name);
            $path ="uploads/images/services/".$name;
        }else{
            $path=null;
        }
        $slug = str_replace(' ','-',$request->slug);
        if (Service::where('slug',$slug)->exists()){
            alert_message('این پیوند یکتا قبلا انتخاب شده است','error');
            return back();
        }
        if ($request->filled('parent_id'))
        {
            $get_parent = Service::find($request->parent_id);
            $link=$get_parent->link."/".$slug;
        }else{
            $link=$slug;
        }
        if ($request->filled('price')){
            $price = Crypt::encrypt($request->price);
        }else{
            $price=null;
        }
        if ($request->filled('sale')){
            $sale = Crypt::encrypt($request->sale);
        }else{
            $sale=null;
        }
        Service::create([
            'user_id'=>auth()->id(),
            'name'=>$request->name,
            'slug'=>$slug,
            'parent_id'=>$request->parent_id,
            'link'=>$link,
            'logo'=>$path,
            'short_description'=>$request->short_description,
            'long_description'=>$request->long_description,
            'time_to_do'=>$request->time_to_do,
            'other_name'=>$request->other_name,
            'is_special'=>$request->is_special,
            'is_product'=>$request->is_product,
            'is_public'=>$request->is_public,
            'price'=>$price,
            'sale'=>$sale,
        ]);
        alert_message('خدمت جدید با موفقیت ایجاد شد','success');
        return redirect()->route('manager_service_index');

    }

    public function edit(Service $service)
    {
        $services = Service::select(['name','id'])->get();
        return view('management.services.edit',compact('service','services'));
    }

    public function delete(Service $service)
    {
        $service->children()->delete();
        $service->delete();
        alert_message('خدمت مورد نظر با موفقیت حذف گردید','success');
        return back();
    }

    public function update(Service $service,Request $request)
    {
        $this->validate($request,[
            'name'=>"required|min:3|max:225|unique:services,name,$service->id",
            'slug'=>"required|unique:services,slug,$service->id",
            'parent_id'=>'nullable|numeric',
            'price'=>'nullable|min:1|numeric',
            'sale'=>'nullable|min:1|numeric',
            'is_special'=>'required|numeric',
            'is_product'=>'required|numeric',
            'is_public'=>'required|numeric',
        ]);
        $slug = str_replace(' ','-',$request->slug);
        if ($service->slug != $request->slug && Service::where('slug',$slug)->exists()){
            alert_message('این پیوند یکتا قبلا انتخاب شده است','error');
            return back();
        }
        if (isset($request->logo) && $request->file('logo')->isValid()){
            $name = "service-".Str::random(10).'.'.$request->file('logo')->extension();
            $request->file('logo')->move('uploads/images/services',$name);
            $path ="uploads/images/services/".$name;
        }else{
            $path=$service->logo;
        }
        if ($request->filled('price')){
            $price = Crypt::encrypt($request->price);
        }else{
            $price=null;
        }
        if ($request->filled('sale')){
            $sale = Crypt::encrypt($request->sale);
        }else{
            $sale=null;
        }
        $check=$service->slug;
        $service->update([
            'user_id'=>auth()->id(),
            'name'=>$request->name,
            'slug'=>$request->slug,
            'parent_id'=>$request->parent_id,
            'logo'=>$path,
            'short_description'=>$request->short_description,
            'long_description'=>$request->long_description,
            'time_to_do'=>$request->time_to_do,
            'other_name'=>$request->other_name,
            'is_special'=>$request->is_special,
            'is_product'=>$request->is_product,
            'is_public'=>$request->is_public,
            'price'=>$price,
            'sale'=>$sale,
        ]);
        if ($slug != $check){
            foreach (Service::all() as $item){
                $item->update(['link'=>$item->nested_slug]);
            }
        }
        alert_message('خدمت مورد نظر با موفقیت ویرایش گردید','success');
        return back();
    }
}
