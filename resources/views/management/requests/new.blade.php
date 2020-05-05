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
    </style>
@endsection
@section('content')
    <div class="block-header">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="p-4">
                    <h3 class="page-title text-iranyekan">لیست درخواست ها </h3>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix">
        <div class="card">
            <div class="header">
                <h2>لیست همه درخواست های جدید</h2>
            </div>
            <div class="body table-responsive">
                @if(sizeof($requests) < 1)
                    <div class="text-center mt-4">
                        <img src="{{asset('management/images/no-data.svg')}}" width="300" alt="">
                        <h5 class="mt-2">سفارش جدید یافت نشد !</h5>
                    </div>
                @else
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr class="text-iranyekan">
                            <th>شناسه</th>
                            <th>کاربر</th>
                            <th>خدمت</th>
                            <th>موضوع سفارش</th>
                            <th>فایل</th>
                            <th>پذیرفته شده</th>
                            <th>هزینه</th>
                            <th>زمان انجام</th>
                            <th>توضیحات</th>
                            <th>ابزار</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($requests as $request)
                            <tr>
                                <td>{{$request->id}}</td>
                                <td><img class="user-profile" src="@if($request->profile != null) {{asset('$user->profile')}} @else {{asset('management/images/admin-user.svg')}} @endif" alt=""> {{$request->name}} {{$request->user->name}}</td>
                                <td>{{$request->service->name}}</td>
                                <td>{{$request->title_form}}</td>
                                <td>@if(!empty($request->file_form))
                                        <a href="" target="_blank" title="دریافت فایل" type="button" class="btn btn-success btn-circle waves-effect waves-circle waves-float">
                                            <i class="fas fa-download"></i>
                                        </a>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($request->is_accepted ==1)
                                        <span title="بله" class="btn btn-success btn-circle waves-effect waves-circle waves-float">
                                            <i class="fas fa-download"></i>
                                        </span>
                                        @else
                                        <span title="خیر" class="btn btn-danger btn-circle waves-effect waves-circle waves-float">
                                            <i class="fas fa-times"></i>
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    {{number_format($request->amount)}}
                                </td>
                                <td>{{$request->time_to_do}}</td>
                                <td>{{$request->description}}</td>
                                <td>
                                    <a title="مشاهده" class="btn btn-info btn-circle waves-effect waves-circle waves-float">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <button title="پدیرفتن" class="btn btn-success btn-circle waves-effect waves-circle waves-float">
                                            <i class="fas fa-check"></i>
                                      </button>
                                    <button title="ویرایش" class="btn btn-secondary btn-circle waves-effect waves-circle waves-float">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button title="حذف" class="btn btn-danger btn-circle waves-effect waves-circle waves-float">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>


                        @endforeach
                        </tbody>
                    </table>
                    <div class="mt-2">
                        {{$requests->links()}}
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
                text: "آیا مطمئن هستید ؟ در صورت حذف خدمت تمامی زیر مجموعه های آن نیز حذف خواهد شد.",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#31ff32",
                confirmButtonText: "بله",
                cancelButtonText:"خیر",
                cancelButtonColor:"#31ff32",
                closeOnConfirm: false
            }, function () {
                window.open('/management//delete/'+id,'_self');
            });
        }
        function del_img(id) {
            swal({
                title: "هشدار",
                text: "آیا مطمئن هستید تصویر فایل حذف شود ؟",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#31ff32",
                confirmButtonText: "بله",
                cancelButtonText:"خیر",
                cancelButtonColor:"#31ff32",
                closeOnConfirm: false
            }, function () {
                window.open('/management/files/delete/image/'+id,'_self');
            });
        }
    </script>
@endsection


