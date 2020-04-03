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
                                    <select>
                                        <option disabled selected>انتخاب دسته بندی</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        @foreach($files as $file)
                        <div class="col-md-3">
                            <div class="single-product-box shadow">
                                <div class="product-image">
                                    <a href="#">
                                        <img src="{{asset('template/img/bg/file-lock.svg')}}" alt="image">
                                    </a>
                                    <span class="sale-btn"></span>
                                </div>
                                <div class="product-content">
                                    <h5><a href="#">{{$file->name}}</a></h5>
                                    <p>{{$file->service->name}}</p>
                                    <span class="price">{{number_format(\Illuminate\Support\Facades\Crypt::decrypt($file->price))}} تومان</span>
                                    <a href="#" class="add-to-cart-btn"><i class="fas fa-download"></i> دریافت</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('script')

@endsection
