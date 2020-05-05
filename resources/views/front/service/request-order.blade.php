@extends('layouts.front')
@section('head')
    <style>
        .text-right{
            text-align: right!important;
        }
    </style>

@endsection
@section('title')
    پلاس عمران - ثبت سفارش
@endsection
@section('content')
    <!-- Start Main Banner Area -->
    <div class="main-banner">
        <div class="container">
            <div class="row align-items-center m-0">
                <div class="col-lg-6 p-0">
                    <div class="main-banner-content">
                        <h2 class="text-white text-iranyekan">ثبت سفارش برای  <strong>{{$service->name}}</strong></h2>
                        <p class="mt-4 font-17">
                            برای ثبت سافرش خودت ابتدا باید در پلاس عمران ثبت نام کنید.
                            <br>
                            بعد از ثبت نام از همین صفحه میتونید فرم مربوط به سفارش رو پر کنید تا بچه های پلاس عمران در اسرع وقت باهاتون تماس بگیرند.
                            <br>
                            فقط توجه داشته باشید لطفا فرم سفارش به دقت و تماما کامل نمایید.
                        </p>
                    </div>
                </div>

                <div class="col-lg-6 p-0">
                    <div class="banner-image">
                        <img src="{{asset('management/images/ordering.svg')}}" alt="image">
                    </div>
                </div>
            </div>
        </div>
        <div class="shape-img1"><img src="{{asset('template/img/shape-image/1.png')}}" alt="imgae"></div>
    </div>
    <!-- End Main Banner Area -->
    <section class="features-area bg-image ptb-100">
        <div class="container-fluid">
            <div class="section-title">
                <h4 class="text-iranyekan">فرم سفارش {{$service->name}}</h4>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-7 col-sm-12 text-right">
                    @if(!auth()->check())
                        <div class="alert alert-danger">
                            <h5><i class="fas fa-info"></i> نکته :</h5>
                            <p class="mt-2 font-16">
                                کاربر گرامی برای ثبت سفارش، ابتدا باید وارد حساب کاربریتون بشید.
                            </p>
                        </div>
                    @endif
                    <div class="mt-3">
                        <form action="{{route('front.service.request.order.store',['service'=>$service->id])}}" enctype="multipart/form-data" method="post">
                        @csrf
                            <div class="form-group">
                                <label for="">موضوع سفارشتون</label>
                                <input class="form-control" value="{{old('title_form')}}" name="title_form" required type="text">
                            </div>
                        <div class="form-group">
                            <label for="">توضیحات کامل سفارشتون</label>
                            <textarea name="description_form" required class="form-control" id="" cols="30" rows="6">{{old('description_form')}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">اگه نمومه کاری به صورت فایل مدنظرتون هست برامون ارسال کنید</label>
                            <input class="form-control"  name="file" multiple="multiple" required type="file">
                        </div>
                        <div class="form-group">
                            <button type="submit" @if(!auth()->check()) disabled class="btn btn-secondary rounded" @else class="btn btn-info rounded" @endif >ثبت سفارش</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>


@endsection
