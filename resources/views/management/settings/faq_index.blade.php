@extends('layouts.management')
@section('head')
    <style>
        th,td{
            text-align: right!important;
        }
        .user-profile{
            width: 45px;
            height: 45px;
            border-radius: 50%;
            border: 1.5px solid #2C97EC;
        }
        label{
            color: black!important;
        }

    </style>
@endsection
@section('content')
    <div class="block-header">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="p-4">
                    <h3 class="page-title text-iranyekan">تنظیمات </h3>
                    <h5 class="text-iranyekan mt-3">سوالات متداول </h5>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix">
        <div class="card">
            <div class="header">
                <h2>لیست همه سوالات</h2>
                <ul class="header-dropdown m-r--5">
                    <button data-toggle="modal" data-target="#add" type="button" class="btn btn-info btn-border-radius waves-effect"><i class="fas fa-user-plus text-white"></i> سوال جدید</button>
                </ul>
                <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg " role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">افزودن سوال جدید</h5>
                            </div>
                            <form action="{{route('management_settings_faq_store')}}" method="post">
                                @csrf
                                @if(sizeof($services) < 1)
                                    <div class="modal-body">
                                        <div class="alert alert-danger">
                                            <h5>پیام سیستم :</h5>
                                            <hr>
                                            <p>شما هنوز هیچ خدمتی اضافه نکرده‌اید، ابتدا از قسمت خدمات یک خدمت اضافه کنید</p>
                                        </div>
                                    </div>
                                    @else
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="">مربوط به خدمت</label>
                                        <select name="service_id" id="" class="browser-default">
                                            @foreach($services as $service)
                                                <option value="{{$service->id}}">{{$service->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">سوال</label>
                                        <textarea name="question" id="" cols="30" rows="5">{{old('question')}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">پاسخ</label>
                                        <textarea name="answer" id="" cols="30" rows="5">{{old('answer')}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">نمایش در سایت</label>
                                        <select name="is_active" id="" class="browser-default">
                                            <option value="1">فعال</option>
                                            <option value="0">غیرفعال</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn bg-red" data-dismiss="modal">بستن</button>
                                    <button type="submit" class="btn btn-success">افزودن سوال</button>
                                </div>
                                    @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="body table-responsive">
                @if(sizeof($faqs) < 1)
                    <div class="text-center mt-4">
                        <img src="{{asset('management/images/no-data.svg')}}" width="300" alt="">
                        <h5 class="mt-2">هنوز هیچ سوالی ثبت نشده است !</h5>
                    </div>
                @else
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr class="text-iranyekan">
                            <th>خدمت</th>
                            <th>سوال</th>
                            <th>جواب</th>
                            <th>وضعیت</th>
                            <th>تاریخ ثبت</th>
                            <th>ابزار</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($faqs as $faq)
                            <tr>
                                <td>@if($faq->service_id != null) {{$faq->service->name}} @endif</td>
                                <td>{{$faq->question}}</td>
                                <td>{{$faq->answer}}</td>
                                <td>
                                    @if($faq->is_active == 1)
                                        <a href="{{route('management_settings_faq_change',['faq'=>$faq->id])}}" class="btn btn-success">فعال</a>
                                        @else
                                        <a href="{{route('management_settings_faq_change',['faq'=>$faq->id])}}" class="btn btn-danger">غیرفعال</a>
                                    @endif
                                </td>
                                <td>{{\Morilog\Jalali\Jalalian::fromDateTime($faq->created_at)->format("Y/m/d")}}</td>
                               <td>
                                   <button data-toggle="modal" data-target="#edit_{{$faq->id}}" title="ویرایش سوال" type="button" class="btn bg-primary btn-circle waves-effect waves-circle waves-float">
                                       <i class="fas fa-edit"></i>
                                   </button>
                                   <div class="modal fade" id="edit_{{$faq->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                       <div class="modal-dialog modal-lg " role="document">
                                           <div class="modal-content">
                                               <div class="modal-header">
                                                   <h5 class="modal-title" id="exampleModalCenterTitle">ویرایش سوال</h5>
                                               </div>
                                               <form action="{{route('management_settings_faq_update',['faq'=>$faq->id])}}" method="post">
                                                   @csrf
                                                   @if(sizeof($services) < 1)
                                                       <div class="modal-body">
                                                           <div class="alert alert-danger">
                                                               <h5>پیام سیستم :</h5>
                                                               <hr>
                                                               <p>شما هنوز هیچ خدمتی اضافه نکرده‌اید، ابتدا از قسمت خدمات یک خدمت اضافه کنید</p>
                                                           </div>
                                                       </div>
                                                   @else
                                                       <div class="modal-body">
                                                           <div class="form-group">
                                                               <label for="">مربوط به خدمت</label>
                                                               <select name="service_id" id="" class="browser-default">
                                                                   @foreach($services as $service)
                                                                       <option @if($service->id == $faq->service_id) selected @endif value="{{$service->id}}">{{$service->name}}</option>
                                                                   @endforeach
                                                               </select>
                                                           </div>
                                                           <div class="form-group">
                                                               <label for="">سوال</label>
                                                               <textarea name="question" id="" cols="30" rows="5">{{$faq->question}}</textarea>
                                                           </div>
                                                           <div class="form-group">
                                                               <label for="">پاسخ</label>
                                                               <textarea name="answer" id="" cols="30" rows="5">{{$faq->answer}}</textarea>
                                                           </div>
                                                           <div class="form-group">
                                                               <label for="">نمایش در سایت</label>
                                                               <select name="is_active" id="" class="browser-default">
                                                                   <option @if($faq->is_active == 1) selected @endif value="1">فعال</option>
                                                                   <option @if($faq->is_active == 0) selected @endif  value="0">غیرفعال</option>
                                                               </select>
                                                           </div>
                                                       </div>
                                                       <div class="modal-footer">
                                                           <button type="button" class="btn bg-red" data-dismiss="modal">بستن</button>
                                                           <button type="submit" class="btn btn-success">ویراش سوال</button>
                                                       </div>
                                                   @endif
                                               </form>
                                           </div>
                                       </div>
                                   </div>
                                   <button onclick="del({{$faq->id}})" title="حذف" type="button" class="btn bg-danger btn-circle waves-effect waves-circle waves-float">
                                       <i class="fas fa-trash"></i>
                                   </button>
                               </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="mt-2">
                        {{$faqs->links()}}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
@section('script')

    <script>
        function del(id) {
            swal({
                title: "هشدار",
                text: "آیا از حذف این سوال مطمئن هستید ؟",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#31ff32",
                confirmButtonText: "بله",
                cancelButtonText:"خیر",
                cancelButtonColor:"#31ff32",
                closeOnConfirm: false
            }, function () {
                window.open('/management/settings/faqs/delete/'+id,'_self');
            });

        }
    </script>
@endsection
