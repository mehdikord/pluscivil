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
                                <td>@if($file->service_id != null){{$file->service->name}}@endif</td>
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
                                    <button data-toggle="modal" data-target="#images_{{$file->id}}" title="تصاویر پیش نمایش" type="button" class="btn btn-warning btn-circle waves-effect waves-circle waves-float">
                                        <i class="fas fa-images"></i>
                                    </button>

                                    <div class="modal fade" id="images_{{$file->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-lg " role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">تصاویر پیش نمایش : {{$file->name}}</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <button class="btn btn-info btn-border-radius waves-effect m-b-15" type="button"
                                                            data-toggle="collapse" data-target="#collapseExample" aria-expanded="false"
                                                            aria-controls="collapseExample">
                                                        افزودن تصویر جدید
                                                    </button>
                                                    <div class="collapse" id="collapseExample">
                                                        <div class="well">
                                                            <form action="{{route('manager_file_add_image',['file'=>$file->id])}}" method="post" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <label for="">انتخاب فایل</label>
                                                                    <input class="form-control" type="file" name="image" id="">
                                                                </div>
                                                                <div class="form-group">
                                                                    <button class="btn btn-success">افزودن تصویر</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <h5 class="text-iranyekan">لیست تصاویر فایل</h5>
                                                    <div class="mt-3">
                                                        @if($file->images()->count() < 1)
                                                            <div class="text-center mt-4">
                                                                <img src="{{asset('management/images/no-data.svg')}}" width="300" alt="">
                                                                <h5 class="mt-2">هنوز هیچ تصویری ثبت نشده است !</h5>
                                                            </div>
                                                            @else
                                                            <div class="row">
                                                                @foreach($file->images as $image)
                                                                    <div class="col-md-4">
                                                                        <div class="card border">
                                                                            <div class="card-body p-0">
                                                                                <img src="{{asset(\Illuminate\Support\Facades\Storage::url($image->image))}}" width="300" alt="">
                                                                            </div>
                                                                            <div class="card-footer">
                                                                                <button onclick="del_img({{$image->id}})" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>

                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn bg-red" data-dismiss="modal">بستن</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <a href="{{route('manager_file_download',['file'=>$file->id])}}" target="_blank" title="دریافت فایل" type="button" class="btn btn-success btn-circle waves-effect waves-circle waves-float">
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

