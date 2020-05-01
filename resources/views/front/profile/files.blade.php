@extends('layouts.front')

@section('head')
    <style>
        .text-right{
            text-align: right!important;
        }
        .profile-image{
            width: 80%;
            border-radius: 50%;
            border: 1.7px solid #f66b46;
        }
        .bg-orange{
            background-color: #ff581f !important;
        }
        th{
            font-family: IranYekan!important;
            text-align: right!important;
        }
        .circle{
            border-radius: 50%!important;
            width: 40px!important;
            height: 40px!important;
            padding: 8px 8px !important;
        }
    </style>

@endsection
@section('content')

    <!-- Start Page Title Area -->
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2 class="text-iranyekan">حساب کاربری {{auth()->user()->name}}</h2>
                <h4 class="mt-4 text-white"><i class="fa fa-envelope"></i> : {{auth()->user()->email}}</h4>
                <h4 class="mt-4 text-white"><i class="fa fa-mobile-alt"></i> : {{auth()->user()->phone}}</h4>
            </div>
        </div>
    </div>
    <section class="mt-5 mb-5">
        <div class="container">
            <div class="row">
                @include('components.profile-menu')
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header text-right">
                            <h4 class="text-iranyekan text-danger">فایل ها</h4>
                        </div>
                        <div class="card-body text-right">
                            <h5>لیست فایل های خریداری شده</h5>
                            <div class="mt-4 table-responsive">
                                @if(auth()->user()->files()->count() < 1)
                                    <div class="text-center mt-4">
                                        <img src="{{asset('management/images/stor-no-data.svg')}}" width="300" class="mt-4" alt="">
                                        <h6 class="mt-3 text-iranyekan">شما هنوز هیچ فایلی خریداری نکرده اید!</h6>
                                        <a href="{{route('front.file.store')}}" class="btn btn-danger font-17 mt-3">فروشگا فایل</a>
                                    </div>
                                    @else
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                            <th>کد فایل</th>
                                            <th>نام</th>
                                            <th>دسته‌بندی</th>
                                            <th>قیمت</th>
                                            <th>نوع</th>
                                            <th>ابزار</th>
                                        </thead>
                                        <tbody>
                                        @foreach(auth()->user()->files as $file)
                                            <tr>
                                                <td>{{$file->file->code }}</td>
                                                <td>
                                                    <a class="badge badge-success font-16" href="{{route('front.file.store.show',['file'=>$file->file->code])}}">
                                                        {{$file->file->name }}
                                                    </a>
                                                </td>
                                                <td>{{$file->file->service->name}}</td>
                                                <td>{{$file->price}}</td>
                                                <td>{{$file->file->extension}}</td>
                                                <td class="text-center">
                                                    <a href="{{route('front.profile.files.request.download',['file'=>$file->id])}}" class="btn btn btn-success circle" title="دریافت فایل"><i class="fas fa-download"></i></a>
                                                    <a href="" class="btn btn btn-info circle" title="فاکتور خرید"><i class="fas fa-file-invoice"></i></a>

                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Page Title Area -->

@endsection
@section('script')

@endsection
