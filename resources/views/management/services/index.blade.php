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
                    <h3 class="page-title text-iranyekan">لیست خدمات </h3>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix">
        <div class="card">
            <div class="header">
                <h2>لیست همه خدمات وبسایت</h2>
                <ul class="header-dropdown m-r--5">
                    <a href="{{route('manager_service_create')}}" class="btn btn-info btn-border-radius waves-effect"><i class="fas fa-user-plus text-white"></i> مدیر جدید</a>
                </ul>
            </div>
            <div class="body table-responsive">
                @if(sizeof($services) < 1)
                    <div class="text-center mt-4">
                        <img src="{{asset('management/images/no-data.svg')}}" width="300" alt="">
                        <h5 class="mt-2">هنوز هیچ خدمتی ثبت نشده است !</h5>
                    </div>
                    @else
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr class="text-iranyekan">
                        <th>نام</th>
                        <th>وابستگی</th>
                        <th>پوند یکتا</th>
                        <th>توضیحات کوتاه</th>
                        <th>توضیحات کامل</th>
                        <th>هزینه</th>
                        <th>هزینه با تخفیف</th>
                        <th>نام های دیگر</th>
                        <th>ویژه</th>
                        <th>محصول</th>
                        <th>قابل نمایش</th>
                        <th>ابزار</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($services as $service)
                        <tr>
                            <td><img class="user-profile" src="@if($service->logo != null) {{asset($service->logo)}} @else {{asset('management/images/service-default.svg')}} @endif" alt=""> {{$service->name}}</td>
                            <td>@if($service->parent_id != null) {{$service->parent->name}} @endif</td>
                            <td>{{$service->slug}}</td>
                            <td>
                                <button data-toggle="modal" data-target="#show_short_{{$service->id}}" title="مشاهده" type="button" class="btn bg-blue btn-circle waves-effect waves-circle waves-float">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <div class="modal fade" id="show_short_{{$service->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-lg " role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">مشاهده توضیحات کوتاه</h5>
                                            </div>
                                            <div class="modal-body">
                                                 <p>{{$service->short_description}}</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn bg-red" data-dismiss="modal">بستن</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <button data-toggle="modal" data-target="#show_long_{{$service->id}}" title="مشاهده" type="button" class="btn bg-blue btn-circle waves-effect waves-circle waves-float">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <div class="modal fade" id="show_long_{{$service->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-lg " role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">مشاهده توضیحات کامل</h5>
                                            </div>
                                            <div class="modal-body">
                                                <p>{{$service->long_description}}</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn bg-red" data-dismiss="modal">بستن</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>{{$service->other_name}}</td>
                            <td>
                                @if($service->price != null)
                                    <div class="badge col-blue font-17">{{number_format(\Illuminate\Support\Facades\Crypt::decrypt($service->price))}}</div>
                                @endif
                            </td>
                            <td>
                                @if($service->sale != null)
                                    <div class="badge col-blue font-18">{{\Illuminate\Support\Facades\Crypt::decrypt($service->sale)}}</div>
                                @endif
                            </td>
                            <td>@if($service->is_special == 1) <i class="fa fa-check fa-2x text-success"></i> @else<i class="fa fa-times fa-2x text-danger"></i>  @endif</td>
                            <td>@if($service->is_product == 1) <i class="fa fa-check fa-2x text-success"></i> @else<i class="fa fa-times fa-2x text-danger"></i>  @endif</td>
                            <td>@if($service->is_public == 1) <i class="fa fa-check fa-2x text-success"></i> @else<i class="fa fa-times fa-2x text-danger"></i>  @endif</td>
                            <td>
                                <a href="{{route('manager_service_edit',['service'=>$service->id])}}" title="ویرایش" type="button" class="btn bg-blue btn-circle waves-effect waves-circle waves-float">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button title="مشاهده" type="button" class="btn bg-orange btn-circle waves-effect waves-circle waves-float">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button onclick="del({{$service->id}})" title="حذف" type="button" class="btn bg-danger btn-circle waves-effect waves-circle waves-float">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="mt-2">
                    {{$services->links()}}
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
                window.open('/management/services/delete/'+id,'_self');
            });

        }
    </script>
@endsection
