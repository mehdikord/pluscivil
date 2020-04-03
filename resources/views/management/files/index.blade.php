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
                    <h3 class="page-title text-iranyekan">فروشگاه فایل </h3>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix">
        <div class="card">
            <div class="header">
                <h2>لیست همه فایل ها در فروشگاه فایل</h2>
                <ul class="header-dropdown m-r--5">
                    <a href="{{route('manager_file_create')}}" class="btn btn-info btn-border-radius waves-effect"><i class="fas fa-user-plus text-white"></i> افزودن فایل جدید</a>
                </ul>
            </div>
            <div class="body table-responsive">
                @if(sizeof($files) < 1)
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
                            <th>کد فایل</th>
                            <th>قیمت</th>
                            <th>قیمت با تخفیف</th>
                            <th>وضعیت نمایش</th>
                            <th>ویژه است</th>
                            <th>پسوند</th>
                            <th>تاریخ ثبت</th>
                            <th>ابزار</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($files as $file)
                            <tr>
                                <td>{{$file->name}}</td>
                                <td>{{$file->service->name}}</td>
                                <td>{{$file->code}}</td>
                                <td>{{number_format(\Illuminate\Support\Facades\Crypt::decrypt($file->price))}}</td>
                                <td>@if($file->sale != null){{number_format(\Illuminate\Support\Facades\Crypt::decrypt($file->sale))}}@endif</td>
                                <td class="text-center">
                                    @if($file->is_active == 1)
                                        <a href="{{route('manager_file_special',['file'=>$file->id])}}" class="fas fa-check text-success"></a>
                                        @else
                                        <a href="{{route('manager_file_special',['file'=>$file->id])}}" class="fas fa-times text-danger"></a>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($file->is_special == 1)
                                        <a href="{{route('manager_file_active',['file'=>$file->id])}}" class="fas fa-check text-success"></a>
                                    @else
                                        <a href="{{route('manager_file_active',['file'=>$file->id])}}" class="fas fa-times text-danger"></a>
                                    @endif
                                </td>
                                <td>{{$file->extension}}</td>
                                <td>{{\Morilog\Jalali\Jalalian::fromDateTime($file->created_at)->format("Y/m/d-H:i:s")}}</td>
                                <td>
                                    <a  title="مشاهده" type="button" class="btn bg-blue btn-circle waves-effect waves-circle waves-float">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{route('manager_file_edit',['file'=>$file->id])}}" title="ویرایش" type="button" class="btn btn-primary btn-circle waves-effect waves-circle waves-float">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a  title="گزارش گیری" type="button" class="btn btn-danger btn-circle waves-effect waves-circle waves-float">
                                        <i class="fas fa-chart-line"></i>
                                    </a>
                                    <a  title="دریافت فایل" type="button" class="btn btn-success btn-circle waves-effect waves-circle waves-float">
                                        <i class="fas fa-download"></i>
                                    </a>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                    <div class="mt-2">
                        {{$files->links()}}
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

