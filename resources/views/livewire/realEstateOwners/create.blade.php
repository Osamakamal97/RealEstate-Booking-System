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
                <a wire:click="resetInputFields" class="remove" data-original-title="" title="">
                </a>
            </div>
        </div>
        <div class="portlet-body form">
            <form role="form" wire:submit.prevent="store">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-body ">
                            <div class="form-group form-md-line-input
                                @error('first_name') has-error @enderror">
                                <input type="text" class="form-control" id="form_control_1"
                                    placeholder="{{ __('admin.enter_first_name') }}" wire:model.defer="first_name">
                                <label for="form_control_1" @error('first_name') style="color: #F3565D"
                                    @enderror>{{ __('admin.first_name') }}</label>
                                @error('first_name')
                                <span id="first_name-error" class="help-block help-block-error"
                                    style="color: #F3565D">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-body ">
                            <div class="form-group form-md-line-input
                                @error('last_name') has-error @enderror">
                                <input type="text" class="form-control" id="form_control_1"
                                    placeholder="{{ __('admin.enter_last_name') }}" wire:model.defer="last_name">
                                <label for="form_control_1" @error('last_name') style="color: #F3565D"
                                    @enderror>{{ __('admin.last_name') }}</label>
                                @error('last_name')
                                <span id="last_name-error" class="help-block help-block-error"
                                    style="color: #F3565D">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-body ">
                            <div class="form-group form-md-line-input
                                @error('email') has-error @enderror">
                                <input type="text" class="form-control" id="form_control_1"
                                    placeholder="{{ __('admin.enter_email') }}" wire:model.defer="email">
                                <label for="form_control_1" @error('email') style="color: #F3565D"
                                    @enderror>{{ __('admin.email') }}</label>
                                @error('email')
                                <span id="email-error" class="help-block help-block-error"
                                    style="color: #F3565D">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-body ">
                            <div class="form-group form-md-line-input
                                @error('country') has-error @enderror">
                                <input type="text" class="form-control" id="form_control_1"
                                    placeholder="{{ __('admin.enter_country') }}" wire:model.defer="country">
                                <label for="form_control_1" @error('country') style="color: #F3565D"
                                    @enderror>{{ __('admin.country') }}</label>
                                @error('country')
                                <span id="country-error" class="help-block help-block-error"
                                    style="color: #F3565D">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-body ">
                            <div class="form-group form-md-line-input
                                @error('mobile_number') has-error @enderror">
                                <input type="text" class="form-control" id="form_control_1"
                                    placeholder="{{ __('admin.enter_mobile_number') }}"
                                    wire:model.defer="mobile_number">
                                <label for="form_control_1" @error('mobile_number') style="color: #F3565D"
                                    @enderror>{{ __('admin.mobile_number') }}</label>
                                @error('mobile_number')
                                <span id="mobile_number-error" class="help-block help-block-error"
                                    style="color: #F3565D">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-body ">
                            <div class="form-group form-md-line-input
                                @error('mobile_number_country_code') has-error @enderror">
                                <input type="text" class="form-control" id="form_control_1"
                                    placeholder="{{ __('admin.enter_mobile_number_country_code') }}" wire:model.defer="mobile_number_country_code">
                                <label for="form_control_1" @error('mobile_number_country_code') style="color: #F3565D"
                                    @enderror>{{ __('admin.mobile_number_country_code') }}</label>
                                @error('mobile_number_country_code')
                                <span id="mobile_number_country_code-error" class="help-block help-block-error"
                                    style="color: #F3565D">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-body ">
                            <div class="form-group form-md-line-input
                                @error('password') has-error @enderror">
                                <input type="text" class="form-control" id="form_control_1"
                                    placeholder="{{ __('admin.enter_password') }}" wire:model.defer="password">
                                <label for="form_control_1" @error('password') style="color: #F3565D"
                                    @enderror>{{ __('admin.password') }}</label>
                                @error('password')
                                <span id="password-error" class="help-block help-block-error"
                                    style="color: #F3565D">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-body">
                            <div class="form-group form-md-line-input
                                @error('password_confirmation') has-error @enderror">
                                <input type="text" class="form-control" id="form_control_1"
                                    placeholder="{{ __('admin.enter_password_confirmation') }}"
                                    wire:model.defer="password_confirmation">
                                <label for="form_control_1" @error('password_confirmation') style="color: #F3565D"
                                    @enderror>{{ __('admin.password_confirmation') }}</label>
                                @error('password_confirmation')
                                <span id="password_confirmation-error" class="help-block help-block-error"
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
