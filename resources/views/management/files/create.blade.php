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
                    <h3 class="page-title text-iranyekan">افزودن فایل جدید به فروشگاه</h3>
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
                <form action="{{route('manager_service_store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-6 form-group">
                        <label for="">وابستگی</label>
                        <select name="parent_id" class="browser-default" id="">
                            <option></option>
                            @foreach($services as $service)
                                <option value="{{$service->id}}">{{$service->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6 form-group">
                        <label for="">نام خدمت</label>
                        <input value="{{old('name')}}" type="text" class="form-control" name="name" required>
                    </div>
                    <div class="col-6 form-group">
                        <label for="">پیوند یکتا</label>
                        <input type="text" value="{{old('slug')}}" class="form-control" name="slug" required placeholder="مثال : architect">
                        <small>به صورت انگلیسی وارد شود</small>
                    </div>
                    <div class="col-6 form-group">
                        <label for="">توضیحات کوتاه</label>
                        <textarea name="short_description" id="" cols="30" rows="5">{{old('short_description')}}</textarea>
                    </div>
                    <div class="col-6 form-group">
                        <label for="">توضیحات کامل</label>
                        <textarea name="long_description" id="" cols="30" rows="5">{{old('long_description')}}</textarea>
                    </div>
                    <div class="col-6 form-group">
                        <label for="">لوگوی خدمت</label>
                        <input type="file" name="logo" class="form-control">
                        <small>اختیاری</small>
                    </div>
                    <div class="col-6 form-group">
                        <label for="">مدت انجام خدمت</label>
                        <input type="text" value="{{old('time_to_do')}}" name="time_to_do" class="form-control">
                        <small>اختیاری</small>
                    </div>
                    <div class="col-6 form-group">
                        <label for="">هزینه انجام خدمت</label>
                        <input type="number" value="{{old('price')}}" name="price" class="form-control">
                        <small>اختیاری - قیمت وارده شده به تومان محاسبه میشود</small>
                    </div>
                    <div class="col-6 form-group">
                        <label for="">هزینه با تخفیف انجام خدمت</label>
                        <input type="number" value="{{old('sale')}}" name="sale" class="form-control">
                        <small>اختیاری - قیمت وارده شده به تومان محاسبه میشود</small>
                    </div>
                    <div class="col-6 form-group">
                        <label for="">نام های دیگر</label>
                        <input type="text" value="{{old('other_name')}}" name="other_name" class="form-control">
                        <small>اختیاری</small>
                    </div>
                    <div class="col-6 form-group">
                        <label for="">آیا ویژه است</label>
                        <select name="is_special" class="form-control" id="">
                            <option  value="1">بله</option>
                            <option value="0">خیر</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-lg">افزودن خدمت جدید</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')


@endsection
