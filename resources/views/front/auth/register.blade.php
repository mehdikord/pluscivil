
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>پلاس عمران-ثبت نام کاربران</title>
    <!-- Favicon-->
    <link rel="icon" href="../../assets/images/favicon.ico" type="image/x-icon">
    <!-- Plugins Core Css -->
    <link href="{{asset('management/css/app.min.css')}}" rel="stylesheet">
    <link href="{{asset('management/js/bundles/materialize-rtl/materialize-rtl.min.css')}}" rel="stylesheet">
    <!-- Custom Css -->
    <link href="{{asset('management/css/style.css')}}" rel="stylesheet" />
    <link href="{{asset('management/css/pages/extra_pages.css')}}" rel="stylesheet" />
    <link href="{{asset('template/css/font.css')}}" rel="stylesheet" />
</head>
<body>
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form action="{{route('register-send')}}" method="post" class="login100-form validate-form">
                @csrf
                <h3 class="text-iranyekan text-right">پلاس عمران</h3>
                <div class="login100-form-logo">
                    <div class="image">
                        <img src="{{asset('management/images/admin-user.svg')}}" alt="User">
                    </div>
                </div>
                <span class="login100-form-title p-b-34 p-t-27 text-iranyekan mb-5">ثبت نام در پلاس عمران</span>
                <div class="wrap-input100 validate-input text-right" data-validate="وارد کردن نام الزامی است">
                    <input value="{{old('name')}}" class="input100" type="text" name="name">
                    <span class="focus-input100"></span>
                    <span class="label-input100 text-iranyekan">نام کامل</span>
                </div>
                <div class="wrap-input100 validate-input text-right" data-validate="وارد کردن شماره موبایل الزامی است">
                    <input value="{{old('phone')}}" class="input100" type="number" name="phone" >
                    <span class="focus-input100"></span>
                    <span class="label-input100 text-iranyekan">شماره موبایل</span>
                </div>
                <div class="wrap-input100 validate-input text-right" data-validate="وارد کردن آدرس ایمیل الزامی است">
                    <input value="{{old('email')}}"  class="input100" type="email" name="email" >
                    <span class="focus-input100"></span>
                    <span class="label-input100 text-iranyekan">آدرس ایمیل</span>
                </div>
                <div class="wrap-input100 validate-input text-right" data-validate="وارد کردن گذرواژه الزامی است">
                    <input class="input100" type="password" name="password" >
                    <span class="focus-input100"></span>
                    <span class="label-input100 text-iranyekan">گذرواژه</span>
                </div>
                <div class="wrap-input100 validate-input text-right" data-validate="وارد کردن تکرار گذرواژه الزامی است">
                    <input class="input100" type="password" name="password_confirmation">
                    <span class="focus-input100"></span>
                    <span class="label-input100 text-iranyekan">تکرار گذرواژه</span>
                </div>
                <div class="container-login100-form-btn p-t-30">
                    <button class="login100-form-btn text-iranyekan">
                        ثبت نام در پلاس عمران
                    </button>
                </div>
                <div class="mt-3 ">
                    @include('includes.errors')
                </div>

                <div class="w-full p-t-15 p-b-15 text-center">
                    <div>
                        <a href="{{route('front_login')}}" class="txt1 text-iranyekan font-18">
                            قبلا ثبت نام کردید
                        </a>
                        <br>
                        <br>
                        <a class="btn btn-danger" href="{{route('index')}}">بازگشت</a>
                    </div>
                </div>

            </form>
            <div class="login100-more">
                <img class="m-t-125" src="{{asset('template/img/bg/register-bg.svg')}}" alt="">
            </div>
        </div>
    </div>
</div>

<script src="{{asset('management/js/app.min.js')}}"></script>
<script src="{{asset('management/js/pages/examples/pages.js')}}"></script>
</body>
</html>

