<div class="row">
    @if (session()->has('success'))
    <div class="col-md-12">
        <div class="alert alert-success">
            <button class="close" data-close="alert"></button>
            {{ session('success') }}
        </div>
    </div>
    @endif
    @if($show_full_problem_message)
    @includeIf('livewire.employeesProblems.problem')
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
                                <th>العنوان</th>
                                <th>المرسل</th>
                                <th>الحالة</th>
                                <th style="width: 165px">الاعدادات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($problems as $problem)
                            <tr class="odd gradeX">
                                <td style="width: 280px">{{ $problem->title }}</td>
                                <td>{{ $problem->admin->name }}</td>
                                <td style="width: 80px">{{ $problem->getStatus() }}</td>
                                <td>
                                    <button wire:click.prevent="read({{ $problem->id }})" class="btn btn-sm yellow">
                                        قراءة <i class="fa fa-edit"></i>
                                    </button>
                                    {{-- <button wire:click.prevent="destroy({{ $problem->id }})" class="btn btn-sm red">
                                        حذف <i class="fa fa-trash"></i>
                                    </button> --}}
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
                <div class="row">
                    <div class="col-md-5 col-sm-5">
                        <div class="dataTables_info" id="sample_1_info" role="status" aria-live="polite"> يظهر
                            {{$problems->firstItem()}} الى {{ $problems->lastItem() }} عناصر من أصل
                            {{ $problems->total() }}
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-7">
                        <div class="dataTables_paginate paging_bootstrap_full_number">
                            {{ $problems->links('livewire.pagination') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>