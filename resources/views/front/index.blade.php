@extends('layouts.front')
@section('title')
    پلاس عمران
    @endsection
@section('content')
    <!-- Start Main Banner Area -->
    <div class="main-banner">
        <div class="container">
            <div class="row align-items-center m-0">
                <div class="col-lg-6 p-0">
                    <div class="main-banner-content">
                        <h2 class="text-white text-iranyekan">ثبت سفارش در <strong>پلاس عمران</strong></h2>
                        <p>
                            با اولین ثبت سفارش یه تخفیف باور نکردی و یه کار عالی از ما دریافت کن !
                        </p>
                        <div class="btn-box">
                            <a href="#" class="btn btn-primary">ثبت سفارش</a>

                        </div>
                    </div>
                </div>

                <div class="col-lg-6 p-0">
                    <div class="banner-image">
                        <img src="{{asset('template/img/banner-img1.png')}}" alt="image">
                    </div>
                </div>
            </div>
        </div>

        <div class="shape-img1"><img src="{{asset('template/img/shape-image/1.png')}}" alt="imgae"></div>
    </div>
    <!-- End Main Banner Area -->

    <!-- Start Features Area -->
    <section class="features-area bg-image ptb-100">
        <div class="container">
            <div class="section-title">
                <h2 class="text-iranyekan">خدمات اصلی ما</h2>
            </div>

            <div class="row">
                @foreach($main_services as $main_service)
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-features-box">
                        <div class="icon">
                            @if($main_service->logo != null)
                            <img src="{{asset($main_service->logo)}}" alt="">
                            @else
                                <i class="fas fa-box-open"></i>
                            @endif
                        </div>

                        <h3 class="text-iranyekan">{{$main_service->name}}</h3>

                        <p>{{$main_service->short_description}}</p>

                        <div class="back-icon">
                            <i class="flaticon-speedometer"></i>
                        </div>

                        <a href="#" class="details-btn"><i class="flaticon-arrow-pointing-to-right"></i></a>

                        <div class="image-box">
                            <img src="{{asset('template/img/shape-image/2.png')}}" alt="image">
                            <img src="{{asset('template/img/shape-image/2.png')}}" alt="image">
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Features Area -->

    <!-- Start About Area -->
    <section class="about-area ptb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                    <div class="about-content">
                        <h2 class="text-iranyekan">به ما اعتماد کنید! </h2>
                        <p>
                            تیم حرفه ای و خستگی ناپذیر پلاس عمران در تلاشند تا با دانش و تخصص خود،
                            <br>
                            تمام خواسته های شما را به طور کامل و دقیق برآورده کنند
                            <br>
                            و بهترین خروجی را به شما تحویل دهند.
                        </p>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12">
                    <div class="about-image">
                        <img src="{{asset('/template/img/about-img1.png')}}" alt="image">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Area -->

    <!-- Start Services Area -->
    <section class="services-area bg-image ptb-100">
        <div class="container">
            <div class="section-title">
                    <span>
                        <span class="icon">
                            <i class="flaticon-technical-support"></i>
                        </span>
                    </span>
                <h2 class="text-iranyekan">ویژگی های منحصر به فرد ما</h2>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-services-box">
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>

                        <h3 class="text-iranyekan">تیم حرفه ای و خلاق</h3>
                        <p>
                            بچه های حرفه و خلاق پلاس عمران با انرژی زیاد در تلاشند بهترین کارو به شما ارائه بدن!
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-services-box">
                        <div class="icon">
                            <i class="fas fa-microchip"></i>
                        </div>

                        <h3 class="text-iranyekan">استفاده از جدیدترین ها</h3>
                        <p>استفاده از بهترین نرم افزار ها و جدیدترین تکنولوژی ها و ابزار دنیا برای بالا بردن سطح کیفی</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-services-box">
                        <div class="icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>

                        <h3 class="text-iranyekan">امنیت بالا</h3>
                        <p>
                            وبسایت پلاس عمران، محیطی ایمین برای حفظ و نگهداری اطلاعات شما
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-services-box">
                        <div class="icon">
                            <i class="fas fa-headset"></i>
                        </div>

                        <h3 class="text-iranyekan">پشتیبانی 24/7</h3>

                        <p>
                            تیم پشتیبانی پلاس عمران همه روز پاسخگو مشکلات و سؤالات مشتریان هستند
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-services-box">
                        <div class="icon">
                            <i class="fas fa-hands-helping"></i>
                        </div>

                        <h3 class="text-iranyekan">همراهی کامل</h3>
                        <p>تیم اجرایی پلاس عمران در تمام مراحل انجام سفارش شما، همراه شما هستند !</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-services-box">
                        <div class="icon">
                            <i class="fas fa-laptop"></i>
                        </div>

                        <h3 class="text-iranyekan">رابط کاربری ساده</h3>
                        <p>
                            در سایت پلاس عمران به راحتی سفارش دهید،خرید کنید و نتیجه را تحویل بگیرید
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Services Area -->

    <!-- Start FAQ Area -->
    <section class="faq-area bg-image ptb-100 ">
        <div class="container">
            <div class="section-title">
                    <span>
                        <span class="icon">
                            <i class="fas fa-question"></i>
                        </span>
                    </span>
                <h2 class="text-iranyekan">سوالات متداول</h2>
            </div>

            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="faq-accordion">
                        <ul class="accordion">
                            @foreach($faqs as $faq)
                            <li class="accordion-item">
                                <a class="accordion-title" href="javascript:void(0)">
                                    <i class="flaticon-add"></i>
                                    {{$faq->question}}
                                </a>
                                <p class="accordion-content">
                                    {{$faq->answer}}
                                </p>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End FAQ Area -->

    <!-- Start CTA Area -->
    <section class="cta-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 col-md-12">
                    <div class="cta-content">
                        <h3>چطوری با در ارتباط باشید ؟</h3>
                        <a href="#">09111232525</a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12">
                    <div class="cta-btn">
                        <a href="#" class="btn btn-primary">تماس با ما !</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End CTA Area -->

    <!-- Start Blog Area -->

    <!-- End Blog Area -->
    @endsection
