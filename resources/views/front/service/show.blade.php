@extends('layouts.front')

@section('head')
    <style>
        .text-orange
        {
            color: #f66b46 !important;
        }
        .bg-pink
        {
            background-color: rgba(250, 129, 133, 0.62) !important;
        }
    </style>

@endsection
@section('content')
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2 class="text-iranyekan">خدمات</h2>
               <h3 class="text-iranyekan mt-3 text-light">{{$service->name}}</h3>
            </div>
        </div>
    </div>
    @if($service->children()->where('is_public',1)->count() > 0)
    <section class="services-area ptb-100">
        <div class="container-fluid">
            <div class="section-title">
                    <span>
                    </span>
                <h3 class="text-iranyekan text-orange">خدمات زیر مجموعه {{$service->name}}</h3>
            </div>

            <div class="row">
                @foreach($service->children()->where('is_public',1)->get() as $sub)
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <a href="{{route('front.service.show',['service'=>$sub->slug])}}">
                    <div class="services-box">
                        <div class="icon">
                            <i class="fa fa-box-open mt-4"></i>
                        </div>

                        <h3>{{$sub->name}}</h3>
                        <p class="text-justify">{{$sub->short_description}}</p>

                        <a href="{{route('front.service.show',['service'=>$sub->slug])}}" class="details-btn"><i class="flaticon-arrow-pointing-to-right"></i></a>

                        <div class="image-box">
                            <img src="{{asset('template/img/shape-image/1.png')}}" alt="image">
                            <img src="{{asset('template/img/shape-image/1.png')}}" alt="image">
                        </div>
                    </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        <hr>
    </section>
    @endif
    <section class="about-area ptb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                    <div class="about-content">
                        <h3 class="text-iranyekan">توضیحاتی در مورد {{$service->name}}</h3>
                        <p class="text-justify font-17">
                            {{$service->long_description}}
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="about-image">
                        <img src="{{asset('template/img/bg/service-main.svg')}}" alt="image">
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if($service->is_product == 1)
    <section class="offer-area ptb-100 jarallax" data-jarallax='{"speed": 0.2}'>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                    <div class="offer-content">
                        <h3 class="text-iranyekan text-light">همین الان و به سادگی میتونی این خدمتو سفارش بدی !</h3>

                        <div class="price mt-4">
                            <h4 class="text-light text-iranyekan">هزینه انجام خدمت :</h4>
                            @if(!empty($service->sale))
                            <span class="old-price">{{number_format(\Illuminate\Support\Facades\Crypt::decrypt($service->price))}}</span>
                            <span class="new-price">{{number_format(\Illuminate\Support\Facades\Crypt::decrypt($service->sale))}} تومان</span>
                                @elseif(!empty($service->price))
                                <span class="new-price">{{number_format(\Illuminate\Support\Facades\Crypt::decrypt($service->price))}} تومان</span>

                            @endif
                        </div>

                        <ul class="features-list">
                            <li>برای ثبت سفارش از لینک زیر وارد صفحه ثبت سفارش شوید</li>
                            <li>لطفا در هنگام ثبت سفارش تمامی اطلاعات خواسته شده را به دقت کامل کنید</li>
                        </ul>

                        <a href="{{route('front.service.request.order',['service'=>$service->slug])}}" class="btn btn-primary text-iranyekan">ثبت سفارش {{$service->name}}</a>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12">
                    <div class="offer-time">
                        <h3 class="text-iranyekan text-orange">مدت تقریبی انجام کار : </h3>
                        <h4 class="mt-4 text-light">
                            @if(empty($service->time_to_do))
                                {{$service->time_to_do}}
                                @else
                                <i class="fa fa-phone"></i>    باهاتون تماس میگیرم
                            @endif
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    <section class="services-area ptb-100">
        <div class="container-fluid">
            <div class="section-title">
                <h3 class="text-iranyekan">موارد مرتبط با  {{$service->name}}</h3>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <a href="">
                        <div class="services-box bg-pink">
                            <div class="icon">
                                <i class="fa fa-clone mt-4"></i>
                            </div>
                            <h3 class="text-iranyekan text-light">نمونه کارها</h3>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <a href="">
                        <div class="services-box">
                            <div class="icon">
                                <i class="fa fa-book mt-4"></i>
                            </div>
                            <h3 class="text-iranyekan ">مقالات</h3>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <a href="">
                        <div class="services-box">
                            <div class="icon">
                                <i class="fa fa-images mt-4"></i>
                            </div>
                            <h3 class="text-iranyekan ">گالری تصاویر</h3>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <a href="">
                        <div class="services-box">
                            <div class="icon">
                                <i class="fa fa-file mt-4"></i>
                            </div>
                            <h3 class="text-iranyekan ">فروشگاه فایل</h3>
                        </div>
                    </a>
                </div>
            </div>

        </div>
        <hr>
    </section>


@endsection
@section('script')

@endsection
