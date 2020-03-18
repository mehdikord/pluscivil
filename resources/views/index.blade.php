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
                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است</p>
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
                @foreach($‌main_services as $main_service)
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
                        <h2 class="text-iranyekan">لورم ایپسوم متن ساختگی </h2>
                        <p>
                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد کتابهای زیادی در شصت و سه درصد گذشته حال و آینده
                        </p>

                        <a href="#" class="btn btn-primary">بیشتر بدانید</a>
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
                            <i class="flaticon-router"></i>
                        </div>

                        <h3>النطاق العريض الرئيسية</h3>

                        <p>الملكية الفكرية أبجد هوز دولور الجلوس امات، والدهون تعزيز الوراثة إيليت، سد تفعل وزارة الدفاع طويلة في والحيوية، بحيث أنفقت على العمل.</p>

                        <a href="#" class="read-more-btn">اقراء المزيد على <i class="flaticon-arrow-pointing-to-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-services-box">
                        <div class="icon">
                            <i class="flaticon-wifi-1"></i>
                        </div>

                        <h3>واي فاي المنزل</h3>

                        <p>الملكية الفكرية أبجد هوز دولور الجلوس امات، والدهون تعزيز الوراثة إيليت، سد تفعل وزارة الدفاع طويلة في والحيوية، بحيث أنفقت على العمل.</p>

                        <a href="#" class="read-more-btn">اقراء المزيد على <i class="flaticon-arrow-pointing-to-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-services-box">
                        <div class="icon">
                            <i class="flaticon-wifi-signal-tower"></i>
                        </div>

                        <h3>الفضائيات</h3>

                        <p>الملكية الفكرية أبجد هوز دولور الجلوس امات، والدهون تعزيز الوراثة إيليت، سد تفعل وزارة الدفاع طويلة في والحيوية، بحيث أنفقت على العمل.</p>

                        <a href="#" class="read-more-btn">اقراء المزيد على <i class="flaticon-arrow-pointing-to-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-services-box">
                        <div class="icon">
                            <i class="flaticon-online-shop"></i>
                        </div>

                        <h3>صندوق التلفزيون الموصول</h3>

                        <p>الملكية الفكرية أبجد هوز دولور الجلوس امات، والدهون تعزيز الوراثة إيليت، سد تفعل وزارة الدفاع طويلة في والحيوية، بحيث أنفقت على العمل.</p>

                        <a href="#" class="read-more-btn">اقراء المزيد على <i class="flaticon-arrow-pointing-to-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-services-box">
                        <div class="icon">
                            <i class="flaticon-key"></i>
                        </div>

                        <h3>اتصال المحمول</h3>

                        <p>الملكية الفكرية أبجد هوز دولور الجلوس امات، والدهون تعزيز الوراثة إيليت، سد تفعل وزارة الدفاع طويلة في والحيوية، بحيث أنفقت على العمل.</p>

                        <a href="#" class="read-more-btn">اقراء المزيد على <i class="flaticon-arrow-pointing-to-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="single-services-box">
                        <div class="icon">
                            <i class="flaticon-shield"></i>
                        </div>

                        <h3>امن المنزل</h3>

                        <p>الملكية الفكرية أبجد هوز دولور الجلوس امات، والدهون تعزيز الوراثة إيليت، سد تفعل وزارة الدفاع طويلة في والحيوية، بحيث أنفقت على العمل.</p>

                        <a href="#" class="read-more-btn">اقراء المزيد على <i class="flaticon-arrow-pointing-to-right"></i></a>
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
                            <i class="flaticon-help"></i>
                        </span>

                        <span>الأسئلة في كثير من الأحيان</span>
                    </span>
                <h2>لماذا يجب أن تختار لنا <br>خدماتنا</h2>
            </div>

            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="faq-accordion">
                        <ul class="accordion">
                            <li class="accordion-item">
                                <a class="accordion-title" href="javascript:void(0)"><i class="flaticon-add"></i>كيف أذونات العمل في جوو غلي اللعب حظة؟</a>
                                <p class="accordion-content">أبجد هوز دولور الجلوس امات، إيليت تعزيز الرصد وطال الحوار الاقتصادي الاستراتيجي والحيوية، بحيث تعبا وحزنا، وبعض الأشياء الهامة التي يجب القيام القبيل. والحيوية، بحيث تعبا وحزنا، وبعض الأمور الهامة. أبجد هوز دولور الجلوس امات، والجامعية الرئيسية إيليت.</p>
                            </li>

                            <li class="accordion-item">
                                <a class="accordion-title" href="javascript:void(0)"><i class="flaticon-add"></i> هل القفل الذكي مطلوب للتطبيقات الفورية؟</a>
                                <p class="accordion-content">أبجد هوز دولور الجلوس امات، إيليت تعزيز الرصد وطال الحوار الاقتصادي الاستراتيجي والحيوية، بحيث تعبا وحزنا، وبعض الأشياء الهامة التي يجب القيام القبيل. والحيوية، بحيث تعبا وحزنا، وبعض الأمور الهامة. أبجد هوز دولور الجلوس امات، والجامعية الرئيسية إيليت.</p>
                            </li>

                            <li class="accordion-item">
                                <a class="accordion-title" href="javascript:void(0)"><i class="flaticon-add"></i> هل يمكنني الحصول على أنشطة متعددة في ميزة واحدة؟</a>
                                <p class="accordion-content">أبجد هوز دولور الجلوس امات، إيليت تعزيز الرصد وطال الحوار الاقتصادي الاستراتيجي والحيوية، بحيث تعبا وحزنا، وبعض الأشياء الهامة التي يجب القيام القبيل. والحيوية، بحيث تعبا وحزنا، وبعض الأمور الهامة. أبجد هوز دولور الجلوس امات، والجامعية الرئيسية إيليت.</p>
                            </li>

                            <li class="accordion-item">
                                <a class="accordion-title" href="javascript:void(0)"><i class="flaticon-add"></i> هل يمكنني مشاركة الموارد بين الميزات?</a>
                                <p class="accordion-content">أبجد هوز دولور الجلوس امات، إيليت تعزيز الرصد وطال الحوار الاقتصادي الاستراتيجي والحيوية، بحيث تعبا وحزنا، وبعض الأشياء الهامة التي يجب القيام القبيل. والحيوية، بحيث تعبا وحزنا، وبعض الأمور الهامة. أبجد هوز دولور الجلوس امات، والجامعية الرئيسية إيليت.</p>
                            </li>

                            <li class="accordion-item">
                                <a class="accordion-title" href="javascript:void(0)"><i class="flaticon-add"></i> ويدعم العديد من لحظة المناسبة للتطبيقات?</a>
                                <p class="accordion-content">أبجد هوز دولور الجلوس امات، إيليت تعزيز الرصد وطال الحوار الاقتصادي الاستراتيجي والحيوية، بحيث تعبا وحزنا، وبعض الأشياء الهامة التي يجب القيام القبيل. والحيوية، بحيث تعبا وحزنا، وبعض الأمور الهامة. أبجد هوز دولور الجلوس امات، والجامعية الرئيسية إيليت.</p>
                            </li>

                            <li class="accordion-item">
                                <a class="accordion-title" href="javascript:void(0)"><i class="flaticon-add"></i> هل يمكنني مشاركة الموارد بين الميزات?</a>
                                <p class="accordion-content">أبجد هوز دولور الجلوس امات، إيليت تعزيز الرصد وطال الحوار الاقتصادي الاستراتيجي والحيوية، بحيث تعبا وحزنا، وبعض الأشياء الهامة التي يجب القيام القبيل. والحيوية، بحيث تعبا وحزنا، وبعض الأمور الهامة. أبجد هوز دولور الجلوس امات، والجامعية الرئيسية إيليت.</p>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12">
                    <div class="faq-accordion">
                        <ul class="accordion">
                            <li class="accordion-item">
                                <a class="accordion-title" href="javascript:void(0)"><i class="flaticon-add"></i> ما هي الأشياء التي سوف تقدم من قبل باهاما الإنترنت</a>
                                <p class="accordion-content">أبجد هوز دولور الجلوس امات، إيليت تعزيز الرصد وطال الحوار الاقتصادي الاستراتيجي والحيوية، بحيث تعبا وحزنا، وبعض الأشياء الهامة التي يجب القيام القبيل. والحيوية، بحيث تعبا وحزنا، وبعض الأمور الهامة. أبجد هوز دولور الجلوس امات، والجامعية الرئيسية إيليت.</p>
                            </li>

                            <li class="accordion-item">
                                <a class="accordion-title" href="javascript:void(0)"><i class="flaticon-add"></i> لماذا نحن الأفضل في هذه المجالات?</a>
                                <p class="accordion-content">أبجد هوز دولور الجلوس امات، إيليت تعزيز الرصد وطال الحوار الاقتصادي الاستراتيجي والحيوية، بحيث تعبا وحزنا، وبعض الأشياء الهامة التي يجب القيام القبيل. والحيوية، بحيث تعبا وحزنا، وبعض الأمور الهامة. أبجد هوز دولور الجلوس امات، والجامعية الرئيسية إيليت.</p>
                            </li>

                            <li class="accordion-item">
                                <a class="accordion-title" href="javascript:void(0)"><i class="flaticon-add"></i> من الأفضل أن تكون الأول في العقل من السوق؟</a>
                                <p class="accordion-content">أبجد هوز دولور الجلوس امات، إيليت تعزيز الرصد وطال الحوار الاقتصادي الاستراتيجي والحيوية، بحيث تعبا وحزنا، وبعض الأشياء الهامة التي يجب القيام القبيل. والحيوية، بحيث تعبا وحزنا، وبعض الأمور الهامة. أبجد هوز دولور الجلوس امات، والجامعية الرئيسية إيليت.</p>
                            </li>

                            <li class="accordion-item">
                                <a class="accordion-title" href="javascript:void(0)"><i class="flaticon-add"></i>تحديد المواقع هو ما تفعله لاحتمال؟</a>
                                <p class="accordion-content">أبجد هوز دولور الجلوس امات، إيليت تعزيز الرصد وطال الحوار الاقتصادي الاستراتيجي والحيوية، بحيث تعبا وحزنا، وبعض الأشياء الهامة التي يجب القيام القبيل. والحيوية، بحيث تعبا وحزنا، وبعض الأمور الهامة. أبجد هوز دولور الجلوس امات، والجامعية الرئيسية إيليت.</p>
                            </li>

                            <li class="accordion-item">
                                <a class="accordion-title" href="javascript:void(0)"><i class="flaticon-add"></i> الشخص الذي سوف يساعدك من باهاما؟</a>
                                <p class="accordion-content">أبجد هوز دولور الجلوس امات، إيليت تعزيز الرصد وطال الحوار الاقتصادي الاستراتيجي والحيوية، بحيث تعبا وحزنا، وبعض الأشياء الهامة التي يجب القيام القبيل. والحيوية، بحيث تعبا وحزنا، وبعض الأمور الهامة. أبجد هوز دولور الجلوس امات، والجامعية الرئيسية إيليت.</p>
                            </li>

                            <li class="accordion-item">
                                <a class="accordion-title" href="javascript:void(0)"><i class="flaticon-add"></i> لماذا يجب أن تختار لنا من غيرها؟</a>
                                <p class="accordion-content">أبجد هوز دولور الجلوس امات، إيليت تعزيز الرصد وطال الحوار الاقتصادي الاستراتيجي والحيوية، بحيث تعبا وحزنا، وبعض الأشياء الهامة التي يجب القيام القبيل. والحيوية، بحيث تعبا وحزنا، وبعض الأمور الهامة. أبجد هوز دولور الجلوس امات، والجامعية الرئيسية إيليت.</p>
                            </li>
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
                        <h3>اتصل بنا الآن للاتصال باهاما</h3>
                        <a href="#">+7(887) 332 43 43</a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12">
                    <div class="cta-btn">
                        <a href="#" class="btn btn-primary">تحقق التغطية في منطقتك</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End CTA Area -->

    <!-- Start Blog Area -->
    <section class="blog-area ptb-100">
        <div class="container">
            <div class="section-title">
                    <span>
                        <span class="icon">
                            <i class="flaticon-wifi-1"></i>
                        </span>

                        <span>تحديث أخبار باهاما</span>
                    </span>
                <h2>ماذا يكون تحديث التطبيق الأخبار <br>قريبا</h2>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-blog-post">
                        <a href="#" class="post-image"><img src="{{asset('template/img/blog-img1.jpg')}}" alt="blog-image"></a>

                        <div class="blog-post-content">
                            <ul>
                                <li><i class="fas fa-user-tie"></i> <a href="#">مشرف</a></li>
                                <li><i class="far fa-clock"></i> 23 يناير 2020</li>
                            </ul>
                            <h3><a href="#">لقد استخدمت شبكة الإنترنت لمدة يوم على ميزانية 50 ميغابايت</a></h3>
                            <p>أبجد هوز دولور الجلوس امات، والجامعية الرئيسية إيليت. مرضي ماسا القبيح، والحد من يبيرو غير المصنفة في الحياة.</p>

                            <a href="#" class="read-more-btn">اقراء المزيد على <i class="fas fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single-blog-post">
                        <a href="#" class="post-image"><img src="{{asset('template/img/blog-img2.jpg')}}" alt="blog-image"></a>

                        <div class="blog-post-content">
                            <ul>
                                <li><i class="fas fa-user-tie"></i> <a href="#">مشرف</a></li>
                                <li><i class="far fa-clock"></i> 25 يناير 2020</li>
                            </ul>
                            <h3><a href="#">لقد استخدمت شبكة الإنترنت لمدة يوم على ميزانية ميغابايت</a></h3>
                            <p>أبجد هوز دولور الجلوس امات، والجامعية الرئيسية إيليت. مرضي ماسا القبيح، والحد من يبيرو غير المصنفة في الحياة.</p>

                            <a href="#" class="read-more-btn">اقراء المزيد على <i class="fas fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3">
                    <div class="single-blog-post">
                        <a href="#" class="post-image"><img src="{{asset('template/img/blog-img3.jpg')}}" alt="blog-image"></a>

                        <div class="blog-post-content">
                            <ul>
                                <li><i class="fas fa-user-tie"></i> <a href="#">مشرف</a></li>
                                <li><i class="far fa-clock"></i> 27 يناير 2020</li>
                            </ul>
                            <h3><a href="#">لقد استخدمت شبكة الإنترنت لمدة يوم على ميزانية ميغابايت</a></h3>
                            <p>أبجد هوز دولور الجلوس امات، والجامعية الرئيسية إيليت. مرضي ماسا القبيح، والحد من يبيرو غير المصنفة في الحياة.</p>

                            <a href="#" class="read-more-btn">اقراء المزيد على <i class="fas fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Blog Area -->
    @endsection
