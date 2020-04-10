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
                    <h3 class="page-title text-iranyekan">ویرایش فایل : {{$file->name}}</h3>
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
                <form action="{{route('manager_file_update',['file'=>$file->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">انتخاب دسته بندی</label>
                        <select name="service_id" class="browser-default" id="">
                            @foreach($services as $service)
                                <option @if($file->service_id == $service->id) selected @endif value="{{$service->id}}">{{$service->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">نام فایل</label>
                        <input value="{{$file->name}}" type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="">توضیحات کامل</label>
                        <textarea name="description" id="" cols="30" rows="5">{{$file->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">قیمت فایل</label>
                        <input type="number" value="{{\Illuminate\Support\Facades\Crypt::decrypt($file->price)}}" name="price" class="form-control">
                        <small>قیمت وارده شده به تومان محاسبه میشود</small>
                    </div>
                    <div class="form-group">
                        <label for="">قیمت فایل با تخفیف</label>
                        <input type="number" value="@if($file->sale != null){{\Illuminate\Support\Facades\Crypt::decrypt($file->sale)}}@endif" name="sale" class="form-control">
                        <small>اختیاری - قیمت وارده شده به تومان محاسبه میشود</small>
                    </div>
                    <div class="form-group">
                        <div class="alert alert-danger">
                            <h5><i class="fas fa-warning"></i> نکته:</h5>
                            <p>فقط اگر میخواهید خود فایل را نیز ویرایش کنید،فایل جدید را ارسال کنید در غیر این صورت قسمت ارسال فایل را نادیده بگیرید.</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">ارسال فایل</label>
                        <input type="file" name="file" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">در فروشگاه فعال باشد</label>
                        <select name="is_active" class="form-control" id="">
                            <option @if($file->is_active ==1) selected @endif  value="1">بله</option>
                            <option @if($file->is_active ==0) selected @endif value="0">خیر</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">آیا ویژه است</label>
                        <select name="is_special" class="form-control" id="">
                            <option @if($file->is_special ==1) selected @endif value="1">بله</option>
                            <option @if($file->is_special ==0) selected @endif value="0">خیر</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-lg">ویرایش فایل</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')


@endsection
