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
                <div class="col-md-4 ">
                    <div class="form-body ">
                        <div class="form-group form-md-line-input 
                                @error('name') has-error @enderror">
                            <input type="text" class="form-control" id="form_control_1" placeholder="ادخل الاسم"
                                wire:model.defer="name">
                            <label for="form_control_1" @error('name') style="color: #F3565D" @enderror>الاسم</label>
                            @error('name')
                            <span id="name-error" class="help-block help-block-error"
                                style="color: #F3565D">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class=" col-md-4">
                    <div class="form-body">
                        <div class="form-group form-md-line-input 
                                @error('email')  has-error @enderror">
                            <input type="text" class="form-control" id="form_control_1" wire:model.defer="email"
                                placeholder="أدخل بريدك الإلكتروني">
                            <label for="form_control_1" @error('email') style="color: #F3565D" @enderror">بريدك
                                الإلكتروني</label>
                            @error('email')
                            <span id="name-error" class="help-block help-block-error"
                                style="color: #F3565D">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class=" col-md-4">
                    <div class="form-body">
                        <div class="form-group form-md-line-input 
                                @error('password') has-error @enderror">
                            <input type="text" class="form-control" id="form_control_1" wire:model.defer="password"
                                placeholder="أدخل كلمة المرور">
                            <label for="form_control_1" @error('password') style="color: #F3565D" @enderror>كلمة
                                المرور</label>
                            @error('password')
                            <span id="name-error" class="help-block help-block-error"
                                style="color: #F3565D">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-md-radios @error('role') has-error @enderror">
                            <label>الدور</label>
                            <div class="md-radio-inline">
                                <div class="md-radio">
                                    <input type="radio" id="role" name="role" class="md-radiobtn" value="1"
                                        wire:model.defer="role">
                                    <label for="role">
                                        <span class="inc"></span>
                                        <span class="check"></span>
                                        <span class="box"></span>
                                        مدير</label>
                                </div>
                                <div class="md-radio">
                                    <input type="radio" id="role2" name="role" class="md-radiobtn" value="2"
                                        wire:model.defer="role">
                                    <label for="role2">
                                        <span class="inc"></span>
                                        <span class="check"></span>
                                        <span class="box"></span>
                                        موظف</label>
                                </div>
                                @error('role')
                                <span id="name-error" class="help-block help-block-error"
                                    style="color: #F3565D">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-md-radios  @error('active') has-error @enderror">
                            <label>الحالة</label>
                            <div class="md-radio-inline">
                                <div class="md-radio">
                                    <input type="radio" id="active" name="active" class="md-radiobtn" value="1"
                                        wire:model.defer="active">
                                    <label for="active">
                                        <span class="inc"></span>
                                        <span class="check"></span>
                                        <span class="box"></span>
                                        مفعل </label>
                                </div>
                                <div class="md-radio">
                                    <input type="radio" id="active2" name="active" class="md-radiobtn" value="0"
                                        wire:model.defer="active">
                                    <label for="active2">
                                        <span class="inc"></span>
                                        <span class="check"></span>
                                        <span class="box"></span>
                                        غير مفعل </label>
                                </div>
                                @error('active')
                                <span id="name-error" class="help-block help-block-error"
                                    style="color: #F3565D">{{ $message }}</span>
                                @enderror
                            </div>
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