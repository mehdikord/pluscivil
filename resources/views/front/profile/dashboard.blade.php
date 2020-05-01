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
                            <h4 class="text-iranyekan text-danger">داشبورد</h4>
                        </div>
                        <div class="card-body text-right">
                            <h5>اطلاعات کاربری</h5>
                            <div class="mt-4 row">
                               <div class="col-md-6 mt-3">
                                   <h6><i class="fa fa-user"></i> نام : {{auth()->user()->name}}</h6>
                               </div>
                                <div class="col-md-6 mt-3">
                                    <h6><i class="fa fa-envelope"></i> ایمیل : {{auth()->user()->email}}</h6>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <h6><i class="fa fa-mobile-alt"></i> موبایل : {{auth()->user()->phone}}</h6>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <h6><i class="fa fa-venus-mars"></i> جنسیت : @if(!empty(auth()->user()->gender_id)){{auth()->user()->gender->name}} @else نامشخص @endif</h6>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <h6><i class="fa fa-city"></i> استان : @if(!empty(auth()->user()->province_id)){{auth()->user()->province->name}} @endif</h6>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <h6><i class="fa fa-city"></i> شهر : @if(!empty(auth()->user()->city_id)){{auth()->user()->city->name}} @endif</h6>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <h6><i class="fa fa-user-edit"></i> بیوگرافی : </h6>
                                    <p class="mt-2">{{auth()->user()->bio}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="mt-4">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card bg-success">
                                            <div class="card-body">
                                                <div class="float-left">
                                                    <i class="fa fa-file fa-3x text-white"></i>
                                                </div>
                                                <div class="pull-right">
                                                    <h5 class="text-iranyekan text-white">فایل ها</h5>
                                                    <h4 class="text-white">{{auth()->user()->files()->count()}}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card bg-orange">
                                            <div class="card-body">
                                                <div class="float-left">
                                                    <i class="fa fa-building fa-3x text-white"></i>
                                                </div>
                                                <div class="pull-right">
                                                    <h5 class="text-iranyekan text-white">پروژه ها</h5>
                                                    <h4 class="text-white">0</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card bg-dark">
                                            <div class="card-body">
                                                <div class="float-left">
                                                    <i class="fa fa-building fa-3x text-white"></i>
                                                </div>
                                                <div class="pull-right">
                                                    <h5 class="text-iranyekan text-white">فاکتور ها</h5>
                                                    <h4 class="text-white">0</h4>
                                                </div>
                                            </div>
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
    <!-- End Page Title Area -->

@endsection
@section('script')

@endsection
