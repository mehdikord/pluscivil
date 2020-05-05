<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Province;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function admins_index()
    {
        $provinces = Province::all();
        $data = User::query();
        $data->where('role_id','<',4)->orderBy('id','DESC');
        $users = $data->paginate(20);
        return view('management.users.admins',compact('users','provinces'));
    }

    public function admins_store(Request $request)
    {
        $this->validate($request,[
           'name'=>'required|min:3|max:225',
           'email'=>'required|email|unique:users',
            'phone'=>'nullable|numeric|unique:users|regex:/^09[0-9]{9}$/',
            'province_id'=>'nullable|numeric',
            'gender_id'=>'nullable|numeric',
            'city_id'=>'nullable|numeric',
            '‌‌‌role_id'=>'required|numeric',
            'password'=>'required|min:6|confirmed',
        ]);
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'gender_id'=>$request->gender_id,
            'province_id'=>$request->province_id,
            'city_id'=>$request->city_id,
            'role_id'=>$request->‌‌‌role_id,
            'password'=>Hash::make($request->password),
        ]);
        alert_message('مدیر جدید با موفقیت ایجاد شد','success');
        return back();
    }

    public function admins_update(User $admin,Request $request)
    {
        $this->validate($request,[
            'name'=>'required|min:3|max:225',
            'email'=>"required|email|unique:users,phone,$admin->id",
            'phone'=>"nullable|numeric|unique:users,phone,$admin->id|regex:/^09[0-9]{9}$/",
            'province_id'=>'nullable|numeric',
            'gender_id'=>'nullable|numeric',
            'city_id'=>'nullable|numeric',
            '‌‌‌role_id'=>'required|numeric',
        ]);
        $admin->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'gender_id'=>$request->gender_id,
            'province_id'=>$request->province_id,
            'city_id'=>$request->city_id,
            'role_id'=>$request->‌‌‌role_id,
        ]);
        alert_message('اطلاعات مدیر مورد نظر با موفقیت ایجاد شد','success');
        return back();
    }

    public function admins_delete(User $admin)
    {
        $admin->delete();
        alert_message('مدیر مورد نظر با موفقیت حذف شد','success');
        return back();

    }
}
