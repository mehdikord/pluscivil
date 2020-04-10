@extends('layouts.front')

@section('head')
    <style>
        .file-store-bg
        {
            background-image: none;
            background-color: #262b3a;

        }
        ::placeholder
        {
            color: #c4c4c4 !important;
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
    <section class="boxes-area">
        <div class="container">
            <div class="row mt-5 ">
                <div class="col-md-3">
                    <div class="single-box">
                        <div class="icon">
                            <i class="fas fa-file-powerpoint mt-3"></i>
                        </div>
                        <h6 class="text-iranyekan">پاورپونت های ارائه</h6>
                        <div class="image-box">
                            <img src="{{asset('template/img/shape-image/1.png')}}" alt="image">
                            <img src="{{asset('template/img/shape-image/1.png')}}" alt="image">
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="single-box">
                        <div class="icon">
                            <i class="fas fa-pencil-ruler mt-3"></i>
                        </div>
                        <h6 class="text-iranyekan">بخشنامه ها و مقررات</h6>
                        <div class="image-box">
                            <img src="{{asset('template/img/shape-image/1.png')}}" alt="image">
                            <img src="{{asset('template/img/shape-image/1.png')}}" alt="image">
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="single-box">
                        <div class="icon">
                            <i class="fas fa-book-open mt-3"></i>
                        </div>
                        <h6 class="text-iranyekan">چکیده کتاب ها</h6>
                        <div class="image-box">
                            <img src="{{asset('template/img/shape-image/1.png')}}" alt="image">
                            <img src="{{asset('template/img/shape-image/1.png')}}" alt="image">
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="single-box">
                        <div class="icon">
                            <i class="fas fa-newspaper mt-3"></i>
                        </div>
                        <h6 class="text-iranyekan">مقالات داخلی و خارجی</h6>
                        <div class="image-box">
                            <img src="{{asset('template/img/shape-image/1.png')}}" alt="image">
                            <img src="{{asset('template/img/shape-image/1.png')}}" alt="image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="shop-area ptb-100">
        <div class="container">
                @if(request()->filled('search'))
                    <div class="mb-4" style="text-align: right!important;">
                    <h4 class="text-iranyekan text-primary">نتایج جستجو برای : {{request()->search}}</h4>
                    </div>
                @endif
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="woocommerce-topbar">
                        <div class="row align-items-center">
                            <div class="col-lg-8 col-md-7">
                                <div class="woocommerce-result-count">
                                    <h3 class="text-iranyekan">فایل های جدید</h3>
                                    <p>فایل های جدیدا اضافه شده به فروشگاه</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-5">
                                <div class="woocommerce-topbar-ordering">
                                    <select onchange="location = this.value;">
                                        <option disabled selected>انتخاب دسته بندی</option>
                                        @foreach($categories as $category)
                                            <option @if(request()->category == $category->slug) selected @endif value="?category={{$category->slug}}">{{$category->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    @if($files->count() < 1)
                        @include('includes.store-nodata')
                        @else
                    <div class="row">
                        @foreach($files as $file)
                        <div class="col-md-3">
                            <div class="single-product-box shadow">
                                <div class="product-image">
                                    <a href="{{route('front.file.store.show',['file'=>$file->code])}}">
                                        <img src="{{asset('template/img/bg/file-lock.svg')}}" alt="image">
                                    </a>
                                    @if(!empty($file->sale))<span class="sale-btn">{{number_format(\Illuminate\Support\Facades\Crypt::decrypt($file->price) - \Illuminate\Support\Facades\Crypt::decrypt($file->sale))}} تومان تخفیف</span>@endif
                                </div>
                                <div class="product-content">
                                    <h5><a href="{{route('front.file.store.show',['file'=>$file->code])}}">{{$file->name}}</a></h5>
                                    <p>@if($file->service_id != null){{$file->service->name}}@endif</p>
                                    <span class="price">{{number_format(\Illuminate\Support\Facades\Crypt::decrypt($file->price))}} تومان</span>
                                    <a href="{{route('front.file.store.show',['file'=>$file->code])}}" class="add-to-cart-btn"><i class="fas fa-download"></i> دریافت</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
                <div class="col-lg-12 col-md-12">
                    <hr>
                    <div class="woocommerce-topbar">
                        <div class="row align-items-center">
                            <div class="col-lg-8 col-md-7">
                                <div class="woocommerce-result-count">
                                    <h3 class="text-iranyekan"><i class="fas fa-star text-warning"></i> فایل های ویژه</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($specials->count() < 1)
                        @include('includes.store-nodata')
                        @else
                    <div class="row">
                        @foreach($specials as $file)
                        <div class="col-md-3">
                            <div class="single-product-box shadow">
                                <div class="product-image">
                                    <a href="{{route('front.file.store.show',['file'=>$file->code])}}">
                                        <img src="{{asset('template/img/bg/file-lock.svg')}}" alt="image">
                                    </a>
                                    @if(!empty($file->sale))<span class="sale-btn">{{number_format(\Illuminate\Support\Facades\Crypt::decrypt($file->price) - \Illuminate\Support\Facades\Crypt::decrypt($file->sale))}} تومان تخفیف</span>@endif
                                </div>
                                <div class="product-content">
                                    <h5><a href="{{route('front.file.store.show',['file'=>$file->code])}}">{{$file->name}}</a></h5>
                                    <p>@if($file->service_id != null){{$file->service->name}}@endif</p>
                                    <span class="price">@if(!empty($file->sale)){{number_format(\Illuminate\Support\Facades\Crypt::decrypt($file->sale))}} @else {{number_format(\Illuminate\Support\Facades\Crypt::decrypt($file->price))}}@endif تومان</span>
                                    <a href="{{route('front.file.store.show',['file'=>$file->code])}}" class="add-to-cart-btn"><i class="fas fa-download"></i> دریافت</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                        @endif
                </div>
            </div>
        </div>
    </section>

@endsection

@section('script')

@endsection
