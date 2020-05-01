<div class="col-md-3">
    <div class="card">
        <div class="card-header">
            <div class="text-center mt-4 mb-3">
                <img class="profile-image" src="@if(!empty(auth()->user()->profile)) {{asset(auth()->user()->profile)}} @else {{asset('management/images/admin-user.svg')}} @endif" alt="">
                <h5 class="mt-3 text-iranyekan">{{auth()->user()->name}}</h5>
            </div>
        </div>
        <div class="card-body p-0">
            <ul class="list-group p-0 text-right text-iranyekan">
                <a href="{{route('front.profile.dashboard')}}">
                    <li class="list-group-item @if(\Illuminate\Support\Facades\Request::is('profile/dashboard')) active @endif ">
                        <i class="fas fa-tachometer-alt"></i> داشبورد
                    </li>
                </a>
                <a href="{{route('front.profile.files')}}">
                    <li class="list-group-item @if(\Illuminate\Support\Facades\Request::is('profile/files')) active @endif ">فایل ها</li>
                </a>
                <a href="">
                    <li class="list-group-item @if(\Illuminate\Support\Facades\Request::is('profile/orders')) active @endif ">سفارشات</li>
                </a>
                <a href="">
                    <li class="list-group-item @if(\Illuminate\Support\Facades\Request::is('profile/pays')) active @endif ">پرداخت ها</li>
                </a>
                <a href="">
                    <li class="list-group-item @if(\Illuminate\Support\Facades\Request::is('profile/invoices')) active @endif ">فاکتورها</li>
                </a>
                <a href="">
                    <li class="list-group-item @if(\Illuminate\Support\Facades\Request::is('profile/edit')) active @endif ">ویرایش اطلاعات</li>
                </a>
            </ul>
        </div>
    </div>
</div>
