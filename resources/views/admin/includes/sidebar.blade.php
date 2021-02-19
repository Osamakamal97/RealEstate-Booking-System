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
            @if (auth('admin')->check())
            <li class="start tooltips {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="icon-grid"></i>
                    <span class="title">الرئيسة</span>
                </a>
            </li>
            @elseif(auth('web')->check())
            <li class="start tooltips {{ request()->is('realEstateOwner/dashboard') ? 'active' : '' }}">
                <a href="{{ route('realEstateOwner.dashboard') }}">
                    <i class="icon-home"></i>
                    <span class="title">الرئيسة</span>
                </a>
            </li>
            @endif
            @role('super-admin')
            <li class="heading">
                <h3 class="uppercase">النظام</h3>
            </li>
            <li class="{{ request()->is('admin/admins') ? 'active' : '' }}">
                <a href="{{ route('admin.admins.index') }}">
                    <i class="icon-users"></i>
                    <span class="title">المدراء والموظفين</span>
                </a>
            </li>
            <li class="{{ request()->is('admin/roles') ? 'active' : '' }}">
                <a href="{{ route('admin.roles.index') }}">
                    <i class="icon-note"></i>
                    <span class="title">الأدوار</span>
                </a>
            </li>
            {{-- <li class="{{ request()->is('admin/permissions') ? 'active' : '' }}">
                <a href="{{ route('admin.permissions.index') }}">
                    <i class="icon-user-following"></i>
                    <span class="title">الصلاحيات</span>
                </a>
            </li> --}}
            @endrole
            @role('manager')
            <li class="{{ request()->is('admin/employees') ? 'active' : '' }}">
                <a href="{{ route('admin.employees.index') }}">
                    <i class="material-icons">work</i>
                    <span class="title">الموظفين</span>
                </a>
            </li>
            @endcan
            @can('view_users', 'super-admin')
            <li class="heading">
                <h3 class="uppercase">العقارات وأصحاب العقارات</h3>
            </li>
            <li class="{{ request()->is('admin/users*')  ? 'open active' : '' }}">
                <a href="javascript:;">
                    <i class="icon-users"></i>
                    <span class="title">أصحاب العقارات</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    <li class="{{ request()->is('admin/realEstateOwners') ? 'active' : '' }}">
                        <a href="{{ route('admin.realEstateOwners.index') }}">
                            <i class="icon-user"></i>عرض جميع أصحاب العقارات</a>
                    </li>
                    {{-- <li class="{{ request()->is('admin/realEstateOwners/notifications-response') ? 'active' : '' }}">
                        <a href="{{ route('admin.realEstateOwners.notifications.index') }}">

                            <i class="icon-user"></i>عرض جميع إشعارات أصحاب العقارات</a>
                    </li>
                    <li class="{{ request()->is('admin/realEstateOwners/notify') ? 'active' : '' }}">
                        <a href="{{ route('admin.realEstateOwners.notify.index') }}">
                            <i class="icon-user"></i>إرسال إشعارات لأصحاب العقارات</a>
                    </li> --}}
                </ul>
            </li>
            <li class="{{ request()->is('admin/real-estate/index') ? 'active' : '' }}">
                <a href="{{ route('admin.realEstates.index') }}">
                    <i class="icon-home"></i>
                    <span class="title">العقارات</span>
                </a>
            </li>
            <li class="{{ request()->is('admin/real-estate/facilities') ? 'active' : '' }}">
                <a href="{{ route('admin.realEstate.facilities') }}">
                    <i class="icon-bar-chart"></i>
                    <span class="title">مرافق العقارات</span>
                </a>
            </li>
            @endcan
            @can('view_users','admin')
            <li class="heading">
                <h3 class="uppercase">الزبائن</h3>
            </li>
            <li class="{{ request()->is('admin/users*')  ? 'open active' : '' }}">
                <a href="javascript:;">
                    <i class="fa fa-users"></i>
                    <span class="title">الزبائن</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    <li class="{{ request()->is('admin/users') ? 'active' : '' }}">
                        <a href="{{ route('admin.users.index') }}">
                            <i class="fa fa-users"></i>عرض جميع الزبائن</a>
                    </li>
                    <li class="{{ request()->is('admin/users/notifications-response') ? 'active' : '' }}">
                        <a href="{{ route('admin.users.notifications.index') }}">

                            <i class="icon-user"></i>عرض جميع إشعارات الزبائن</a>
                    </li>
                    <li class="{{ request()->is('admin/users/notify') ? 'active' : '' }}">
                        <a href="{{ route('admin.users.notify.index') }}">
                            <i class="icon-user"></i>إرسال إشعارات للزبائن</a>

                    </li>
                </ul>
            </li>
            @endcan
            @can('send_messages_to_manager','admin')
            @role('employee','admin')
            <li class="{{ request()->is('admin/employee*')  ? 'open active' : '' }}">
                <a href="javascript:;">
                    <i class="icon-users"></i>
                    <span class="title">الشكاوي والمشاكل</span>
                    <span class="selected"></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="{{ request()->is('admin/employee/problems') ? 'active' : '' }}">
                        <a href="{{ route('admin.employee.problems.send') }}">
                            <i class="icon-user"></i>إرسال شكوى لمدير</a>
                    </li>
                </ul>
            </li>
            @endrole
            @endcan
            @can('view_employee_problems','admin')
            <li class="tooltips {{ request()->is('admin/employee/problems/index') ? 'active' : '' }}">
                <a href="{{ route('admin.employee.problems.index') }}">
                    <i class="icon-user"></i>عرض جميل الشكاوي</a>
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