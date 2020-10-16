@extends('layouts.dashboard')
@section('content')
<h3 class="page-title"> المدراء والموظفين</h3>
<div class="row">
    <div class="col-md-12">
        <div class="portlet box grey-cascade">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i>جدول المدراء والموظفين
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="btn-group">
                                <a id="sample_editable_1_new" href="{{ route('admin.admins.create') }}"
                                    class="btn green">
                                    إنشاء جديد <i class="fa fa-plus"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="btn-group pull-right">
                                <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i
                                        class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="javascript:;">Print </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">Save as PDF </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">Export to Excel </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-bordered table-hover" id="sample_1">
                    <thead>
                        <tr>
                            <th class="table-checkbox">
                                <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                            </th>
                            <th>الاسم</th>
                            <th>الايميل</th>
                            <th>الدور</th>
                            <th style="width: 60px">الحالة</th>
                            <th style="width: 155px">الاعدادات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admins as $admin)
                        <tr class="odd gradeX">
                            <td>
                                <input type="checkbox" class="checkboxes" value="1" />
                            </td>
                            <td>{{ $admin->name }}</td>
                            <td>{{ $admin->email }}</td>
                            <td>{{ $admin->getRoleNames()[0] }}</td>
                            <td style="width: 60px">
                                @if($admin->active == 1)
                                <span class="label label-sm label-success">{{ $admin->getActive() }}</span>
                                @else
                                <span class="label label-sm label-danger">{{ $admin->getActive() }}</span>
                                @endif
                            </td>
                            <td style="width: 155px">
                                <a href="{{ route('admin.admins.edit', $admin->id) }}" class="btn btn-sm yellow">
                                    تعديل <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{ route('admin.admins.destroy', $admin->id) }}" class="btn btn-sm red">
                                    حذف <i class="fa fa-times"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection