<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>پلاس عمران-ورود کاربران</title>
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
            <form action="{{route('login')}}" method="post" class="login100-form validate-form">
                @csrf
                <div class="login100-form-logo">
                    <div class="image">
                        <img src="{{asset('management/images/admin-user.svg')}}" alt="User">
                    </div>
                </div>
                <span class="login100-form-title p-b-34 p-t-27 text-iranyekan mb-5">ورود مدیران</span>

                <div class="wrap-input100 validate-input text-right" data-validate="وارد کردن آدرس ایمیل الزامی است">
                    <input  class="input100" type="email" name="email">
                    <span class="focus-input100"></span>
                    <span class="label-input100 text-iranyekan">آدرس ایمیل</span>
                </div>
                <div class="wrap-input100 validate-input text-right" data-validate="وارد کردن گذرواژه الزامی است">
                    <input class="input100" type="password" name="password">
                    <span class="focus-input100"></span>
                    <span class="label-input100 text-iranyekan">گذرواژه</span>
                </div>
                <div class="container-login100-form-btn p-t-30">
                    <button class="login100-form-btn text-iranyekan">
                        ورود به حساب
                    </button>
                </div>
                <div class="mt-3 ">
                    @include('includes.errors')
                </div>

                <div class="w-full p-t-15 p-b-15 text-center">
                    <div>
                        <a href="#" class="txt1 text-iranyekan">
                            گذرواژه خود را فراموش کردید ؟
                        </a>
                    </div>
                </div>

            </form>
            <div class="login100-more">
                <img src="{{asset('management/images/admin-login.svg')}}" alt="">
            </div>
        </div>
    </div>
</div>

<script src="{{asset('management/js/app.min.js')}}"></script>
<script src="{{asset('management/js/pages/examples/pages.js')}}"></script>
</body>
</html>
