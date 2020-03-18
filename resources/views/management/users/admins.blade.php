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
                    <h3 class="page-title text-iranyekan">لیست مدیران </h3>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix">
        <div class="card">
            <div class="header">
                <h2>لیست همه (مدیران - سرپرستان - مجریان )</h2>
                <ul class="header-dropdown m-r--5">
                    <button data-toggle="modal" data-target="#add" type="button" class="btn btn-info btn-border-radius waves-effect"><i class="fas fa-user-plus text-white"></i> مدیر جدید</button>
                </ul>
                <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg " role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">افزودن مدیر جدید</h5>
                            </div>
                            <form action="{{route('management_admins_store')}}" method="post">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="">نام و نام‌خانوادگی</label>
                                        <input type="text" class="form-control" name="name" value="{{old('name')}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">جنسیت</label>
                                        ‌<select name="gender_id" class="browser-default" required id="">
                                            <option value="1">آقا</option>
                                            <option value="2">خانم</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">آدرس ایمیل</label>
                                        <input value="{{old('email')}}" type="email" class="form-control" name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">شماره موبایل</label>
                                        <input value="{{old('phone')}}" type="number" class="form-control" name="phone">
                                    </div>
                                    <div class="form-group">
                                        <label for="">استان</label>
                                        ‌<select name="province_id" class="browser-default"  id="province">
                                            <option disabled selected>استان مورد نظر را انتخاب کنید</option>
                                            @foreach($provinces as $province)
                                                <option value="{{$province->id}}">{{$province->name}}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">شهر</label>
                                        ‌<select name="city_id" class="browser-default"  id="city">
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">سطح مدیریتی</label>
                                        ‌<select name="‌‌‌role_id" class="browser-default"  id="">
                                            <option value="1">مدیر کل</option>
                                            <option value="2">سرپرست</option>
                                            <option value="3">مجری</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">گذرواژه</label>
                                        <input type="password" class="form-control" name="password" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">تکرار گذرواژه</label>
                                        <input type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn bg-red" data-dismiss="modal">بستن</button>
                                    <button type="submit" class="btn btn-success">افزودن مدیر</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="body table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr class="text-iranyekan">
                        <th>نام کامل</th>
                        <th>جنسیت</th>
                        <th>ایمیل</th>
                        <th>موبایل</th>
                        <th>استان</th>
                        <th>شهر</th>
                        <th>سطح مدیریتی</th>
                        <th>ابزار</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td><img class="user-profile" src="@if($user->profile != null) {{asset('$user->profile')}} @else {{asset('management/images/admin-user.svg')}} @endif" alt=""> {{$user->name}}</td>
                                <td>@if($user->gender_id != null) {{$user->gender->name}} @else نامشخص @endif</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
                                <td>@if($user->province_id != null) {{$user->province->name}} @endif</td>
                                <td>@if($user->city_id != null) {{$user->city->name}} @endif</td>
                                <td>
                                    @if($user->role_id == 1)
                                        <div class="badge col-red">مدیر کل</div>
                                    @elseif($user->role_id == 2)
                                        <div class="badge col-cyan">سرپرست</div>
                                    @elseif($user->role_id == 3)
                                        <div class="badge col-green">مجری</div>
                                    @endif
                                </td>
                                <td>
                                    <button data-toggle="modal" data-target="#edit_{{$user->id}}" title="ویرایش مدیر" type="button" class="btn bg-blue btn-circle waves-effect waves-circle waves-float">
                                        <i class="fas fa-user-edit"></i>
                                    </button>
                                    <div class="modal fade" id="edit_{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-lg " role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">افزودن مدیر جدید</h5>
                                                </div>
                                                <form action="{{route('management_admins_update',['admin'=>$user->id])}}" method="post">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="">نام و نام‌خانوادگی</label>
                                                            <input type="text" class="form-control" name="name" value="{{$user->name}}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">جنسیت</label>
                                                            ‌<select name="gender_id" class="browser-default" required id="">
                                                                <option @if($user->gender_id == 1) selected @endif value="1">آقا</option>
                                                                <option @if($user->gender_id == 2) selected @endif value="2">خانم</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">آدرس ایمیل</label>
                                                            <input value="{{$user->email}}" type="email" class="form-control" name="email" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">شماره موبایل</label>
                                                            <input value="{{$user->phone}}" type="number" class="form-control" name="phone">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">استان</label>
                                                            ‌<select name="province_id" class="browser-default"  id="province">
                                                                <option disabled selected>استان مورد نظر را انتخاب کنید</option>
                                                                @foreach($provinces as $province)
                                                                    <option @if($user->province_id == $province->id) selected @endif value="{{$province->id}}">{{$province->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">شهر</label>
                                                            ‌<select  name="city_id" class="browser-default"  id="city">
                                                                @if($user->city_id != null)
                                                                    <option value="{{$user->city_id}}">{{$user->city->name}}</option>
                                                                @endif
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">سطح مدیریتی</label>
                                                            ‌<select name="‌‌‌role_id" class="browser-default"  id="">
                                                                <option @if($user->role_id == 1) selected @endif value="1">مدیر کل</option>
                                                                <option @if($user->role_id == 2) selected @endif value="2">سرپرست</option>
                                                                <option @if($user->role_id == 3) selected @endif value="3">مجری</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn bg-red" data-dismiss="modal">بستن</button>
                                                        <button type="submit" class="btn btn-success">ویرایش مدیر</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <button onclick="del({{$user->id}})" title="حذف مدیر" type="button" class="btn bg-danger btn-circle waves-effect waves-circle waves-float">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-2">
                    {{$users->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('#province').change(function () {
            var url = '/api/get/cities/' + $(this).val();
            console.log("url:" + url);
            $.get(url, function (data) {
                    var select = $('#city');
                    select.empty();
                    if (data.length != 0) {
                        $.each(data, function (key, value) {
                            select.append('<option value=' + value.id + '>' + value.name + '</option>');
                        });
                    } else {
                        select.append('<option value= "-1" ></option>');
                    }
                }
            );
        });
        function del(id) {
            swal({
                title: "هشدار",
                text: "آیا مطمئن هستید ؟ در صورت حذف خدمت تمامی اطلاعات مربوط به مدیر نیز حذف خواهد شد.",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#31ff32",
                confirmButtonText: "بله",
                cancelButtonText:"خیر",
                cancelButtonColor:"#31ff32",
                closeOnConfirm: false
            }, function () {
                window.open('/management/admins/delete/'+id,'_self');
            });

        }
    </script>

@endsection
