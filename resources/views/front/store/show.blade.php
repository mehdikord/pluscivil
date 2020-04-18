@extends('layouts.front')
@section('head')
    <style>
        .text-right
        {
            text-align: right!important;
        }
    </style>
    @endsection

@section('content')
    <div class="main-banner file-store-bg">
        <div class="container">
            <div class="row align-items-center m-0">
                <div class="col-lg-6 p-0">
                    <div class="main-banner-content">
                        <h2 class="text-white text-iranyekan"><strong>فروشگاه فایل</strong></h2>
                        <p>
                            در حوضه مهندسی عمران و معماری هر فایلی که بخای اینجا پیدا میشه !
                        </p>
                        <hr>
                        <div class="btn-box">
                            <h5 class="text-iranyekan text-white">اسم فایلتو جستجو کن</h5>
                            <form action="" class="mt-3">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="search" placeholder="دنبال چه فایلی هستی ؟">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-success"><i class="fas fa-search"></i> جستجو</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 p-0">
                    <div class="banner-image">
                        <img src="{{asset('template/img/bg/file-store-bg2.svg')}}" alt="image">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->

    <!-- Start Product Details Area -->
    <section class="product-details-area ptb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 mt-2">
                    <div class="alert alert-primary">
                        <h5 class="text-iranyekan text-right"><i CLASS="fa fa-info"></i> راهنمای خرید و دریافت : </h5>
‍‍‍‍                    ‍‍‍‍‍‍‍     <p class="text-right">
                         برای دریافت فایل های غیر رایگان، پس از پرداخت موفق دکمه دریافت فایل در همین صفحه به شما نمایش داده  میشود
                            <br>
                            توجه داشته باشید برای دریافت فایل باید فایل مورد نظر با خود مرورگر دانلود کنید و از دانلود منیجر استفاده نکنید.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="product-details-image">
                        <img src="{{asset('template/img/bg/file-single.svg')}}" alt="image">
                    </div>
                </div>

                <div class="col-lg-6 col-md-12">
                    <div class="product-details-desc">
                        <h3 class="text-iranyekan">{{$file->name}}</h3>
                        @if(!empty($file->sale))
                        <div class="price">
                            <span class="new-price text-danger font-22">{{number_format(\Illuminate\Support\Facades\Crypt::decrypt($file->sale))}}</span>
                            <span class="old-price font-20">{{number_format(\Illuminate\Support\Facades\Crypt::decrypt($file->price))}} تومان</span>
                        </div>
                        @elseif(!empty($file->price))
                            <div class="price">
                                <h5 class="new-price mt-1 text-danger">{{number_format(\Illuminate\Support\Facades\Crypt::decrypt($file->price))}} تومان</h5>
                            </div>
                        @else
                            <div class="price">
                                <h5 class="new-price mt-1 text-danger">رایگان</h5>
                            </div>
                        @endif
                        <h6 class="mb-2 text-iranyekan text-primary">توضیحات : </h6>
                        <p class="mt-3 text-justify">{{$file->description}}</p>
                        <div class="buy-checkbox-btn">
                            <div class="item">
                                <a href="#" class="buy-btn text-iranyekan">@if($file->price == null && $file->sale == null) دریافت فایل <i></i>@else پرداخت و دریافت @endif</a>
                            </div>
                        </div>

                    </div>
                </div>


                <div class="col-lg-12 col-md-12">
                    <div class="tab products-details-tab">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <ul class="tabs">
                                    <li><a class="text-iranyekan" href="#"><i class="fas fa-images"></i> پیش ‌نمایش</a></li>


                                </ul>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="tab_content">
                                    <div class="tabs_item">
                                        <div class="products-details-tab-content">
                                            @if($file->images()->count() < 1)
                                                <div class="mt-3 text-center">
                                                    <img src="{{asset('template/img/bg/file-no-image.svg')}}" class="mt-3" width="300" alt="">
                                                    <h6 class="text-iranyekan mt-3">هیچ پیش نمایشی برای این فایل یافت نشد!</h6>
                                                </div>

                                                @else

                                            @endif

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

