<li class="@if(\Illuminate\Support\Facades\Request::is('management/dashboard')) active @endif">
    <a href="{{route('management_dashboard')}}" class="menu-toggle">
        <i class="fas fa-desktop"></i>
        <span>داشبورد</span>
    </a>
</li>
<li class="@if(\Illuminate\Support\Facades\Request::is('management/services*')) active @endif">
    <a href="#" onClick="return false;" class="menu-toggle">
        <i class="fas fa-box-open"></i>
        <span>خدمات</span>
    </a>
    <ul class="ml-menu">
        <li class="@if(\Illuminate\Support\Facades\Request::is('management/services/index')) active @endif">
            <a href="{{route('manager_service_index')}}">لیست همه خدمات</a>
        </li>
        <li class="@if(\Illuminate\Support\Facades\Request::is('management/services/create')) active @endif">
            <a href="{{route('manager_service_create')}}">افزودن خدمت جدید</a>
        </li>
    </ul>
</li>
<li class="@if(\Illuminate\Support\Facades\Request::is('management/admins*')) active @endif">
    <a href="#" onClick="return false;" class="menu-toggle">
        <i class="fas fa-user-tie"></i>
        <span>مدیران</span>
    </a>
    <ul class="ml-menu">
        <li class="@if(\Illuminate\Support\Facades\Request::is('management/admins/index')) active @endif">
            <a href="{{route('management_admins_index')}}">لیست همه مدیران</a>
        </li>
    </ul>
</li>

