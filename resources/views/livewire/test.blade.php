<div>
    This is
    @role('manager','admin')
    Manager
    @elserole('employee','admin')
    Employee
    @endrole
    @hasanyrole('manager|employee|super-admin' ,'admin')
    <li class="">
        <a href="javascript:;">
            <i class="icon-user"></i>
            <span class="title">موظف</span>
            <span class="selected"></span>
        </a>
    </li>
    @endhasanyrole

    {{-- {{ dd(auth('admin')->user()->hasRole('employee')) }} --}}
    {{-- @hasanyrole('manager')
    manager
    @endhasanyrole --}}
</div>