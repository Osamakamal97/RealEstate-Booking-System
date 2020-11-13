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
    @includeIf('livewire.real_estate_owners.create')
    @elseif($show_edit)
    @includeIf('livewire.real_estate_owners.edit')
    @endif
    @if ($show_delete_notification)
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
                                <th>البريد الالكتروني</th>
                                <th>رقم الهاتف</th>
                                <th>الدولة</th>
                                <th>الحالة</th>
                                <th style="width: 165px">الاعدادات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($real_estate_owners as $real_estate_owner)
                            <tr class="odd gradeX">
                                <td>{{ $real_estate_owner->fullName() }}</td>
                                <td>{{ $real_estate_owner->email }}</td>
                                <td>{{ $real_estate_owner->mobile_number }}</td>
                                <td>{{ $real_estate_owner->country }}</td>
                                <td>
                                    @if($real_estate_owner->active == 1)
                                    <span class="label label-sm label-success">{{ $real_estate_owner->getActive() }}</span>
                                    @else
                                    <span class="label label-sm label-danger">{{ $real_estate_owner->getActive() }}</span>
                                    @endif
                                </td>
                                <td style="width: 235px">
                                    <button wire:click.prevent="edit({{ $real_estate_owner->id }})" class="btn btn-sm yellow">
                                        تعديل <i class="fa fa-edit"></i>
                                    </button>
                                    <button wire:click.prevent="destroy({{ $real_estate_owner->id }})" class="btn btn-sm red">
                                        حذف <i class="fa fa-trash"></i>
                                    </button>
                                    @can('block_real_estate_owner')
                                    <button wire:click.prevent="band({{ $real_estate_owner->id }})" class="btn btn-sm grey">
                                        حظر <li class="glyphicon glyphicon-ban-circle"></li>
                                    </button>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
                <div class="row">
                    <div class="col-md-5 col-sm-5">
                        <div class="dataTables_info" id="sample_1_info" role="status" aria-live="polite"> يظهر
                            {{$real_estate_owners->firstItem()}} الى {{ $real_estate_owners->lastItem() }} عناصر من أصل
                            {{ $real_estate_owners->total() }}
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-7">
                        <div class="dataTables_paginate paging_bootstrap_full_number">
                            {{ $real_estate_owners->links('livewire.pagination') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>