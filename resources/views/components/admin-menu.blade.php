<li class="@if(\Illuminate\Support\Facades\Request::is('management/dashboard')) active @endif">
    <a href="{{route('management_dashboard')}}" class="menu-toggle">
        <i class="fas fa-desktop"></i>
        <span>داشبورد</span>
    </a>
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
