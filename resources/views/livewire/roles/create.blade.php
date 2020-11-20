<div class="col-md-12">
    <!-- BEGIN SAMPLE FORM PORTLET-->
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption font-red-sunglo">
                <i class="icon-user font-red-sunglo"></i>
                <span class="caption-subject bold uppercase"> Line Inputs</span>
            </div>
            <div class="tools">
                <a href="" class="collapse" data-original-title="" title="">
                </a>
                <a href="" class="remove" data-original-title="" title="">
                </a>
            </div>
        </div>
        <div class="portlet-body form">
            <form role="form" wire:submit.prevent="store">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-body ">
                            <div class="form-group form-md-line-input 
                                @error('name') has-error @enderror">
                                <input type="text" class="form-control" id="form_control_1" placeholder="ادخل الاسم"
                                    wire:model.defer="name">
                                <label for="form_control_1" @error('name') style="color: #F3565D"
                                    @enderror>الاسم</label>
                                @error('name')
                                <span id="name-error" class="help-block help-block-error"
                                    style="color: #F3565D">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-body ">
                            <div class="form-group form-md-line-input 
                                @error('name') has-error @enderror">
                                <input type="text" class="form-control" id="form_control_1" placeholder="الصلاحية ... "
                                    wire:model.live="permission_search">
                                <label for="form_control_1">البحث</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div style="padding-top: 30px" class="form-group form-md-line-input form-md-floating-label">
                            <select class="form-control" id="form_control_1" wire:model="selected_permission">
                                <option value=""></option>
                                @foreach ($permissions as $permission)
                                <option value="{{ $permission }}">{{ $permission }}</option>
                                @endforeach
                            </select>
                            <label for="form_control_1">الصلاحيات</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        الصلاحيات المعطاه لهذا الدور:
                        @foreach ($role_permissions as $permission)
                        @if ($loop->last)
                        <span>{{ $permission }}.</span>
                        @else
                        <span>{{ $permission }},</span>
                        @endif
                        @endforeach
                    </div>
                </div>
                <div class="form-actions noborder">
                    <button type="submit" class="btn blue">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>