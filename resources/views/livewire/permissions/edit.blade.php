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
            <form role="form" wire:submit.prevent="update">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-body ">
                            <div class="form-group form-md-line-input 
                                @error('name') has-error @enderror">
                                <input type="text" class="form-control" id="form_control_1" placeholder="ادخل الاسم"
                                    wire:model="name">
                                <label for="form_control_1" @error('name') style="color: #F3565D"
                                    @enderror>الاسم</label>
                                @error('name')
                                <span id="name-error" class="help-block help-block-error"
                                    style="color: #F3565D">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-md-checkboxes @error('manager_role') has-error @enderror">
                            <label>الادوار</label>
                            <div class="md-checkbox-inline">
                                <div class="md-checkbox">
                                    <input type="checkbox" id="checkbox6" class="md-check"
                                        {{ $manager_role ? 'checked' : '' }} wire:model="manager_role">
                                    <label for="checkbox6">
                                        <span class="inc"></span>
                                        <span class="check"></span>
                                        <span class="box"></span>
                                        المدير </label>
                                </div>
                                <div class="md-checkbox">
                                    <input type="checkbox" id="checkbox7" class="md-check"
                                        {{ $employee_role ? 'checked' : '' }} wire:model="employee_role">
                                    <label for="checkbox7">
                                        <span class="inc"></span>
                                        <span class="check"></span>
                                        <span class="box"></span>
                                        الموظف </label>
                                </div>
                            </div>
                            @error('manager_role')
                            <span id="name-error" class="help-block help-block-error"
                                style="color: #F3565D">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-actions noborder">
                    <button type="submit" class="btn blue">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>