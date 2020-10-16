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
            @hasanyrole('super-admin')
            <li class="{{ request()->is('admin/admins*') ? 'open active' : '' }}">
                <a href="javascript:;">
                    <i class="icon-user"></i>
                    <span class="title">مسئولي النظام</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    <li class="{{ request()->is('admin/admins*') ? 'active' : '' }}">
                        <a href="{{ route('admin.admins.index') }}">
                            <i class="icon-bar-chart"></i>المدراء والموظفين</a>
                    </li>
                    <li>
                        <a href="index_2.html">
                            <i class="icon-bulb"></i>الصلاحيات</a>
                    </li>
                    {{-- <li>
                        <a href="index_3.html">
                            <i class="icon-graph"></i>
                            New Dashboard #2</a>
                    </li> --}}
                </ul>
            </li>
            @endhasanyrole
            <li class="heading">
                <h3 class="uppercase">Features</h3>
            </li>
            @hasanyrole('super-admin')
            <li class="">
                <a href="javascript:;">
                    <i class="icon-user"></i>
                    <span class="title">مدير</span>
                    <span class="selected"></span>
                </a>
            </li>
            @endhasanyrole
            @hasanyrole('manager|employee|super-admin')
            <li class="">
                <a href="javascript:;">
                    <i class="icon-user"></i>
                    <span class="title">موظف</span>
                    <span class="selected"></span>
                </a>
            </li>
            @endhasanyrole
            <li class="last">
                <a href="javascript:;">
                    <i class="icon-settings"></i>
                    <span class="title">Form Stuff</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="form_controls_md.html">
                            <span class="badge badge-roundless badge-danger">new</span>Material Design<br>
                            Form Controls</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>