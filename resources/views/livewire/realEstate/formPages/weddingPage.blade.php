<div style="height: 380px">
    <div class="row">
        <div class="col-md-3">
            <div class="form-body ">
                <div class="form-group form-md-line-input 
                                @error('space_in_square_meters') has-error @enderror">
                    <input type="text" class="form-control" id="form_control_1"
                        wire:model.defer="space_in_square_meters" autocomplete="off">
                    <label for="form_control_1" @error('space_in_square_meters') style="color: #F3565D" @enderror>
                        المساحة بالمتر المربع
                    </label>
                    @error('space_in_square_meters')
                    <span id="space_in_square_meters-error" class="help-block help-block-error"
                        style="color: #F3565D">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-body ">
                <div class="form-group form-md-line-input 
                                @error('length_in_meter') has-error @enderror">
                    <input type="text" class="form-control" id="form_control_1" wire:model.defer="length_in_meter"
                        autocomplete="off">
                    <label for="form_control_1" @error('length_in_meter') style="color: #F3565D" @enderror>
                        الطول بالمتر
                    </label>
                    @error('length_in_meter')
                    <span id="length_in_meter-error" class="help-block help-block-error"
                        style="color: #F3565D">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-body ">
                <div class="form-group form-md-line-input 
                                @error('width_in_meter') has-error @enderror">
                    <input type="text" class="form-control" id="form_control_1" wire:model.defer="width_in_meter"
                        autocomplete="off">
                    <label for="form_control_1" @error('width_in_meter') style="color: #F3565D" @enderror>
                        العرض بالمتر
                    </label>
                    @error('width_in_meter')
                    <span id="width_in_meter-error" class="help-block help-block-error"
                        style="color: #F3565D">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-body">
                <div class="form-group form-md-line-input 
                                @error('number_of_people') has-error @enderror">
                    <input type="text" class="form-control" id="form_control_1" wire:model.defer="number_of_people">
                    <label for="form_control_1" @error('number_of_people') style="color: #F3565D" @enderror>
                        السعة الاستيعابية(عدد الأفراد)
                    </label>
                    @error('number_of_people')
                    <span id="number_of_people-error" class="help-block help-block-error"
                        style="color: #F3565D">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</div>