<div class="col-md-12">
    <div class="portlet box grey-cascade">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-line-chart"></i>{{ __('admin.'.$title) }}
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
                    {{ $slot }}
                </table>
            </div>
            <div class="row">
                <x-tables.pagination :table="$table" />
            </div>
        </div>
    </div>
</div>
