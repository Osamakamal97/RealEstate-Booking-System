<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="sidebar-toggler-wrapper">
                <div class="sidebar-toggler">
                </div>
            </li>
            <li class="sidebar-search-wrapper">
                <form class="sidebar-search " action="extra_search.html" method="POST">
                    <a href="javascript:;" class="remove">
                        <i class="icon-close"></i>
                    </a>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
                        </span>
                    </div>
                </form>
            </li>
            <li class="start tooltips {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="icon-home"></i>
                    <span class="title">الرئيسة</span>
                </a>
            </li>
            @role('super-admin')
            <li class="heading">
                <h3 class="uppercase">النظام</h3>
            </li>
            <li class="{{ request()->is('admin/admins') ? 'active' : '' }}">
                <a href="{{ route('admin.admins.index') }}">
                    <i class="icon-users"></i>
                    <span class="title">مستخدمي النظام</span>
                </a>
            </li>
            <li class="{{ request()->is('admin/permissions') ? 'active' : '' }}">
                <a href="{{ route('admin.permissions.index') }}">
                    <i class="icon-bar-chart"></i>
                    <span class="title">الصلاحيات</span>
                </a>
            </li>
            @endrole
            @role('manager')
            <li class="{{ request()->is('admin/employees') ? 'active' : '' }}">
                <a href="{{ route('admin.employees.index') }}">
                    <i class="material-icons">work</i>
                    <span class="title">الموظفين</span>
                </a>
            </li>
            @endcan

            @hasDirectPermission('view_employees')
            <li class="heading">
                <h3 class="uppercase">الزبائن</h3>
            </li>
            @endHasDirectPermission

            @can('view_users','admin')
            <li class="heading">
                <h3 class="uppercase">الزبائن</h3>
            </li>
            <li class="{{ request()->is('admin/users*')  ? 'open active' : '' }}">
                <a href="javascript:;">
                    <i class="icon-users"></i>
                    <span class="title">الزبائن</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    <li class="{{ request()->is('admin/users*') ? 'active' : '' }}">
                        <a href="{{ route('admin.users.index') }}">
                            <i class="icon-user"></i>عرض جميع الزبائن</a>
                    </li>
                </ul>
            </li>
            @endcan
            <li class="heading">
                <h3 class="uppercase">Features</h3>
            </li>
            <li class="last">
                <a href="javascript:;">
                    <i class="icon-settings"></i>
                    <span class="title">Form Stuff</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="#">
                            <span class="badge badge-roundless badge-danger">new</span>Material Design<br>
                            Form Controls</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>