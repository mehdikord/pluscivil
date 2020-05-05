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
<li class="@if(\Illuminate\Support\Facades\Request::is('management/requests*')) active @endif">
    <a href="#" onClick="return false;" class="menu-toggle">
        <i class="fas fa-envelope"></i>
        <span>درخواست ها</span>
    </a>
    <ul class="ml-menu">
        <li class="@if(\Illuminate\Support\Facades\Request::is('management/requests/new')) active @endif">
            <a href="{{route('admin_requests_new')}}">درخواست های جدید</a>
        </li>
    </ul>
</li>
<li class="@if(\Illuminate\Support\Facades\Request::is('management/files*')) active @endif">
    <a href="#" onClick="return false;" class="menu-toggle">
        <i class="fas fa-store"></i>
        <span>فروشگاه فایل</span>
    </a>
    <ul class="ml-menu">
        <li class="@if(\Illuminate\Support\Facades\Request::is('management/files/create')) active @endif">
            <a href="{{route('manager_file_create')}}">افزودن فایل جدید</a>
        </li>
        <li class="@if(\Illuminate\Support\Facades\Request::is('management/admins/index')) active @endif">
            <a href="{{route('manager_file_index')}}">لیست همه فایل ها</a>
        </li>
    </ul>
</li>
<li class="@if(\Illuminate\Support\Facades\Request::is('management/settings*')) active @endif">
    <a href="#" onClick="return false;" class="menu-toggle">
        <i class="fas fa-cog"></i>
        <span>تنظیمات</span>
    </a>
    <ul class="ml-menu">
        <li class="@if(\Illuminate\Support\Facades\Request::is('management/settings/faqs*')) active @endif">
            <a href="#" onClick="return false;" class="menu-toggle">
                <span>سوالات متداول</span>
            </a>
            <ul class="ml-menu">
                <li class="@if(\Illuminate\Support\Facades\Request::is('management/settings/faqs/index')) active @endif">
                    <a href="{{route('management_settings_faq_index')}}">
                        <span>همه سوالات</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</li>
