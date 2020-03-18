@extends('layouts.management')
@section('head')
    <style>
        th,td{
            text-align: right!important;
        }
        .user-profile{
            width: 45px;
            height: 45px;
            border-radius: 50%;
            border: 1.5px solid #2C97EC;
        }
    </style>
@endsection
@section('content')
    <div class="block-header">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="p-4">
                    <h3 class="page-title text-iranyekan">ویرایش خدمدت : {{$service->name}} </h3>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix">
        <div class="card">
            <div class="header">
                <h2>اطلاعات خواسته شده را به طور دقیق کامل کنید </h2>
            </div>
            <div class="body">
                <form class="form-row" action="{{route('manager_service_update',['service'=>$service->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-6 form-group">
                        <label for="">وابستگی</label>
                        <select name="parent_id" class="browser-default" id="">
                            <option></option>
                            @foreach($services as $item)
                                <option @if($service->parent_id == $item->id) selected @endif value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6 form-group">
                        <label for="">نام خدمت</label>
                        <input value="{{$service->name}}" type="text" class="form-control" name="name" required>
                    </div>
                    <div class="col-6 form-group">
                        <label for="">پیوند یکتا</label>
                        <input type="text" value="{{$service->slug}}" class="form-control" name="slug" required placeholder="مثال : architect">
                        <small>به صورت انگلیسی وارد شود</small>
                    </div>
                    <div class="col-6 form-group">
                        <label for="">توضیحات کوتاه</label>
                        <textarea name="short_description" id="" cols="30" rows="5">{{$service->short_description}}</textarea>
                    </div>
                    <div class="col-6 form-group">
                        <label for="">توضیحات کامل</label>
                        <textarea name="long_description" id="" cols="30" rows="5">{{$service->long_description}}</textarea>
                    </div>
                    <div class="col-6 form-group">
                        <div class="alert alert-info">
                            <p>فقط در صورت ویرایش لوگوی جدید را انتخاب کنید</p>
                        </div>
                        <label for="">لوگوی خدمت</label>
                        <input type="file" name="logo" class="form-control">
                        <small>اختیاری</small>
                    </div>
                    <div class="col-6 form-group">
                        <label for="">مدت انجام خدمت</label>
                        <input type="text" value="{{$service->time_to_do}}" name="time_to_do" class="form-control">
                        <small>اختیاری</small>
                    </div>
                    <div class="col-6 form-group">
                        <label for="">هزینه انجام خدمت</label>
                        <input type="number" @if(!empty($service->price))value="{{\Illuminate\Support\Facades\Crypt::decrypt($service->price)}}"@endif name="price" class="form-control">
                        <small>اختیاری - قیمت وارده شده به تومان محاسبه میشود</small>
                    </div>
                    <div class="col-6 form-group">
                        <label for="">هزینه با تخفیف انجام خدمت</label>
                        <input type="number" @if(!empty($service->sale))value="{{\Illuminate\Support\Facades\Crypt::decrypt($service->sale)}}"@endif name="sale" class="form-control">
                        <small>اختیاری - قیمت وارده شده به تومان محاسبه میشود</small>
                    </div>
                    <div class="col-6 form-group">
                        <label for="">نام های دیگر</label>
                        <input type="text" value="{{$service->other_name}}" name="other_name" class="form-control">
                        <small>اختیاری</small>
                    </div>
                    <div class="col-6 form-group">
                        <label for="">آیا ویژه است</label>
                        <select name="is_special" class="form-control" id="">
                            <option @if($service->is_special == 1) selected @endif value="1">بله</option>
                            <option @if($service->is_special == 0) selected @endif value="0">خیر</option>
                        </select>
                    </div>
                    <div class="col-6 form-group">
                        <label for="">آیا به عنوان محصول است</label>
                        <select name="is_product" class="form-control" id="">
                            <option @if($service->is_product == 1) selected @endif value="1">بله</option>
                            <option @if($service->is_product == 0) selected @endif value="0">خیر</option>
                        </select>
                    </div>
                    <div class="col-6 form-group">
                        <label for="">درسایت نشان داده شود</label>
                        <select name="is_public" class="form-control" id="">
                            <option @if($service->is_public == 1) selected @endif value="1">بله</option>
                            <option @if($service->is_public == 0) selected @endif value="0">خیر</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <hr>
                        <div class="form-group">
                            <button class="btn btn-primary btn-lg">ویرایش خدمت</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')


@endsection
