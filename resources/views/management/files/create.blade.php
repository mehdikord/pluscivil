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
                <form action="{{route('manager_file_store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">انتخاب دسته بندی</label>
                        <select name="service_id" class="browser-default" id="">
                            @foreach($services as $service)
                                <option value="{{$service->id}}">{{$service->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">نام فایل</label>
                        <input value="{{old('name')}}" type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="">توضیحات کامل</label>
                        <textarea name="description" id="" cols="30" rows="5">{{old('description')}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">قیمت فایل</label>
                        <input type="number" value="{{old('price')}}" name="price" class="form-control">
                        <small>قیمت وارده شده به تومان محاسبه میشود</small>
                    </div>
                    <div class="form-group">
                        <label for="">قیمت فایل با تخفیف</label>
                        <input type="number" value="{{old('sale')}}" name="sale" class="form-control">
                        <small>اختیاری - قیمت وارده شده به تومان محاسبه میشود</small>
                    </div>
                    <div class="form-group">
                        <label for="">ارسال فایل</label>
                        <input type="file" name="file" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">در فروشگاه فعال باشد</label>
                        <select name="is_active" class="form-control" id="">
                            <option  value="1">بله</option>
                            <option value="0">خیر</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">آیا ویژه است</label>
                        <select name="is_special" class="form-control" id="">
                            <option  value="1">بله</option>
                            <option value="0">خیر</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-lg">افزودن فایل جدید</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')


@endsection
