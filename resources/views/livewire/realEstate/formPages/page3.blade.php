<div style="height: 380px">
    <div class="row">
        <div class="col-md-4">
            <div class="form-body">
                <div class="form-group form-md-line-input 
                @error('bedrooms_number') has-error @enderror">
                    <input type="number" min="1" max="10" class="form-control" id="form_control_1"
                        wire:model.defer="bedrooms_number" autocomplete="off">
                    <label for="form_control_1" @error('bedrooms_number') style="color: #F3565D" @enderror>
                        عدد غرف النوم
                    </label>
                    @error('bedrooms_number')
                    <span id="bedrooms_number-error" class="help-block help-block-error"
                        style="color: #F3565D">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-body">
                <div class="form-group form-md-line-input 
                @error('beds_numbers') has-error @enderror">
                    <input type="number" class="form-control" id="form_control_1" min="1" max="10"
                        wire:model.defer="beds_numbers" autocomplete="off">
                    <label for="form_control_1" @error('beds_numbers') style="color: #F3565D" @enderror>
                        عدد الأسِرَة</label>
                    @error('beds_numbers')
                    <span id="beds_numbers-error" class="help-block help-block-error"
                        style="color: #F3565D">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-body">
                <div class="form-group form-md-line-input 
                @error('single_beds_numbers') has-error @enderror">
                    <input type="number" class="form-control" id="form_control_1" min="1" max="100"
                        wire:model.defer="single_beds_numbers" autocomplete="off">
                    <label for="form_control_1" @error('single_beds_numbers') style="color: #F3565D" @enderror> عدد
                        الأسرة الفردية</label>
                    @error('single_beds_numbers')
                    <span id="single_beds_numbers-error" class="help-block help-block-error"
                        style="color: #F3565D">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-body">
                <div class="form-group form-md-line-input 
                @error('double_beds_numbers') has-error @enderror">
                    <input type="number" class="form-control" id="form_control_1" min="1" max="10" autocomplete="off"
                        wire:model.defer="double_beds_numbers">
                    <label for="form_control_1" @error('double_beds_numbers') style="color: #F3565D" @enderror>
                        عدد الأسرة المزدوجة</label>
                    @error('double_beds_numbers')
                    <span id="double_beds_numbers-error" class="help-block help-block-error"
                        style="color: #F3565D">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-body">
                <div class="form-group form-md-line-input 
                @error('bathroom_numbers') has-error @enderror">
                    <input type="number" min="1" max="10" class="form-control" id="form_control_1"
                        wire:model.defer="bathroom_numbers" autocomplete="off">
                    <label for="form_control_1" @error('bathroom_numbers') style="color: #F3565D" @enderror>
                        عدد الحمامات المتوفرة</label>
                    @error('bathroom_numbers')
                    <span id="bathroom_numbers-error" class="help-block help-block-error"
                        style="color: #F3565D">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-body">
                <div class="form-group form-md-line-input 
                @error('guest_number') has-error @enderror">
                    <input type="number" class="form-control" id="form_control_1" min="1" max="100"
                        wire:model.defer="guest_number" autocomplete="off">
                    <label for="form_control_1" @error('guest_number') style="color: #F3565D" @enderror>
                        عدد الضيوف اللذين يمكنهم الإقامة</label>
                    @error('guest_number')
                    <span id="guest_number-error" class="help-block help-block-error"
                        style="color: #F3565D">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div style="padding-right: 25px"
                class="form-group form-md-radios  @error('smoke_allow') has-error @enderror">
                <label>التدخين مسموح</label>
                <div class="md-radio-inline">
                    <div class="md-radio">
                        <input type="radio" id="smoke_allow" name="smoke_allow" class="md-radiobtn" value="1"
                            wire:model="smoke_allow">
                        <label for="smoke_allow">
                            <span class="inc"></span>
                            <span class="check"></span>
                            <span class="box"></span>
                            نعم </label>
                    </div>
                    <div class="md-radio">
                        <input type="radio" id="smoke_allow2" name="smoke_allow" class="md-radiobtn" value="0"
                            wire:model="smoke_allow">
                        <label for="smoke_allow2">
                            <span class="inc"></span>
                            <span class="check"></span>
                            <span class="box"></span>
                            لا </label>
                    </div>
                    @error('smoke_allow')
                    <span id="smoke_allow-error" class="help-block help-block-error"
                        style="color: #F3565D">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div style="padding-right: 25px"
                class="form-group form-md-radios  @error('pets_allow') has-error @enderror">
                <label>الحيوانات الأليفة مسموحة</label>
                <div class="md-radio-inline">
                    <div class="md-radio">
                        <input type="radio" id="pets_allow" name="pets_allow" class="md-radiobtn" value="1"
                            wire:model="pets_allow">
                        <label for="pets_allow">
                            <span class="inc"></span>
                            <span class="check"></span>
                            <span class="box"></span>
                            نعم </label>
                    </div>
                    <div class="md-radio">
                        <input type="radio" id="pets_allow2" name="pets_allow" class="md-radiobtn" value="0"
                            wire:model="pets_allow">
                        <label for="pets_allow2">
                            <span class="inc"></span>
                            <span class="check"></span>
                            <span class="box"></span>
                            لا </label>
                    </div>
                    @error('pets_allow')
                    <span id="pets_allow-error" class="help-block help-block-error"
                        style="color: #F3565D">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div style="padding-right: 25px"
                class="form-group form-md-radios  @error('kids_allow') has-error @enderror">
                <label>مسموح بأقامة الأطفال</label>
                <div class="md-radio-inline">
                    <div class="md-radio">
                        <input type="radio" id="kids_allow" name="kids_allow" class="md-radiobtn" value="1"
                            wire:model="kids_allow">
                        <label for="kids_allow">
                            <span class="inc"></span>
                            <span class="check"></span>
                            <span class="box"></span>
                            نعم </label>
                    </div>
                    <div class="md-radio">
                        <input type="radio" id="kids_allow2" name="kids_allow" class="md-radiobtn" value="0"
                            wire:model="kids_allow">
                        <label for="kids_allow2">
                            <span class="inc"></span>
                            <span class="check"></span>
                            <span class="box"></span>
                            لا </label>
                    </div>
                    @error('kids_allow')
                    <span id="kids_allow-error" class="help-block help-block-error"
                        style="color: #F3565D">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div style="padding-right: 25px"
                class="form-group form-md-radios  @error('party_allow') has-error @enderror">
                <label>مسموح بالحفلات</label>
                <div class="md-radio-inline">
                    <div class="md-radio">
                        <input type="radio" id="party_allow" name="party_allow" class="md-radiobtn" value="1"
                            wire:model="party_allow">
                        <label for="party_allow">
                            <span class="inc"></span>
                            <span class="check"></span>
                            <span class="box"></span>
                            نعم </label>
                    </div>
                    <div class="md-radio">
                        <input type="radio" id="party_allow2" name="party_allow" class="md-radiobtn" value="0"
                            wire:model="party_allow">
                        <label for="party_allow2">
                            <span class="inc"></span>
                            <span class="check"></span>
                            <span class="box"></span>
                            لا </label>
                    </div>
                    @error('party_allow')
                    <span id="party_allow-error" class="help-block help-block-error"
                        style="color: #F3565D">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="form-body">
                <div class="form-group form-md-line-input 
                @error('start_arrive_at') has-error @enderror">
                    <input type="text" class="form-control" id="form_control_1" wire:model.defer="start_arrive_at"
                        autocomplete="off">
                    <label for="form_control_1" @error('start_arrive_at') style="color: #F3565D" @enderror>
                        وقت تسجيل الوصول من الساعة</label>
                    @error('start_arrive_at')
                    <span id="start_arrive_at-error" class="help-block help-block-error"
                        style="color: #F3565D">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-body">
                <div class="form-group form-md-line-input 
                @error('end_arrive_at') has-error @enderror">
                    <input type="text" class="form-control" id="form_control_1" wire:model.defer="end_arrive_at"
                        autocomplete="off">
                    <label for="form_control_1" @error('end_arrive_at') style="color: #F3565D" @enderror>
                        وقت تسجيل الوصول إلى الساعة </label>
                    @error('end_arrive_at')
                    <span id="end_arrive_at-error" class="help-block help-block-error"
                        style="color: #F3565D">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-body">
                <div class="form-group form-md-line-input 
                @error('start_leave_at') has-error @enderror">
                    <input type="text" class="form-control" id="form_control_1" wire:model.defer="start_leave_at"
                        autocomplete="off">
                    <label for="form_control_1" @error('start_leave_at') style="color: #F3565D" @enderror>
                        وقت تسجيل المغادرة من الساعة</label>
                    @error('start_leave_at')
                    <span id="start_leave_at-error" class="help-block help-block-error"
                        style="color: #F3565D">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-body">
                <div class="form-group form-md-line-input 
                @error('end_leave_at') has-error @enderror">
                    <input type="text" class="form-control" id="form_control_1" wire:model.defer="end_leave_at"
                        autocomplete="off">
                    <label for="form_control_1" @error('end_leave_at') style="color: #F3565D" @enderror>
                        وقت تسجيل المغادرة إلى الساعة</label>
                    @error('end_leave_at')
                    <span id="end_leave_at-error" class="help-block help-block-error"
                        style="color: #F3565D">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</div>