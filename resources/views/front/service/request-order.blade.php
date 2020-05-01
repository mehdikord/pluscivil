@extends('layouts.front')
@section('head')

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


@endsection
