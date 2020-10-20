<div class="row">
    @if (session()->has('success'))
    <div class="col-md-12">
        <div class="alert alert-success">
            <button class="close" data-close="alert"></button>
            {{ session('success') }}
        </div>
    </div>
    @endif
    @if($show_create)
    @includeIf('livewire.permissions.create')
    @elseif($show_edit)
    @includeIf('livewire.permissions.edit')
    @endif

    @if ($showDeleteNotification)
    @includeIf('admin.notifications.sweetalert')
    @endif

    <div class="col-md-12">
        <div class="portlet box grey-cascade">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-line-chart"></i>جدول الصلاحيات
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="btn-group">
                                <button id="sample_editable_1_new" wire:click.prevent="create()" class="btn green">
                                    إنشاء جديد <i class="fa fa-plus"></i>
                                </button>
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
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="dataTables_length" id="sample_1_length">
                            <label>
                                <select wire:model="perPage" class="form-control input-xsmall input-inline">
                                    <option value="5">5</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                    <option value="">All</option>
                                </select> صفوف</label></div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="dataTables_filter"><label>البحث:
                                <input type="search" class="form-control input-small input-inline" placeholder=""
                                    wire:model="search"></label></div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>الاسم</th>
                                <th>الادوار المتعلقة</th>
                                <th style="width: 165px">الاعدادات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $permission)
                            <tr class="odd gradeX">
                                <td>{{ $permission->name }}</td>
                                <td>
                                    @foreach ($permission->getRoleNames() as $role_name)
                                    @if ($loop->last)
                                    {{ __('admin.'.$role_name) }}
                                    @else
                                    {{ __('admin.'.$role_name) }},

                                    @endif
                                    @endforeach
                                </td>
                                <td style="width: 160px">
                                    <button wire:click.prevent="edit({{ $permission->id }})" class="btn btn-sm yellow">
                                        تعديل <i class="fa fa-edit"></i>
                                    </button>
                                    <buttin wire:click.prevent="destroy({{ $permission->id }})" class="btn btn-sm red">
                                        حذف <i class="fa fa-trash"></i>
                                    </buttin>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
                {{-- <div class="row">
                    <div class="col-md-5 col-sm-5">
                        <div class="dataTables_info" id="sample_1_info" role="status" aria-live="polite"> يظهر
                            {{$permissions->firstItem()}} الى {{ $permissions->lastItem() }} عناصر من أصل
                {{ $permissions->total() }}
            </div>
        </div>
        <div class="col-md-7 col-sm-7">
            <div class="dataTables_paginate paging_bootstrap_full_number">
                {{ $permissions->links('livewire.pagination') }}
            </div>
        </div>
    </div> --}}
</div>
</div>
</div>
</div>