<div style="height: 380px">
    <div class="row">
        <div class="col-md-6">
            <div class="form-body ">
                <div class="form-group form-md-line-input 
                @error('name') has-error @enderror">
                    <input type="text" class="form-control" id="form_control_1" wire:model.defer="name"
                        autocomplete="off">
                    <label for="form_control_1" @error('name') style="color: #F3565D" @enderror>
                        اسم العقار
                    </label>
                    @error('name')
                    <span id="name-error" class="help-block help-block-error"
                        style="color: #F3565D">{{ $message }}</span>
                    @else
                    <span class="help-block">إختر اسما قصيرا وفريدا ومحببا للناس ,وتجنب الإختصارات
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div style="padding-top: 30px" class="form-group form-md-line-input form-md-floating-label
        @error('type') has-error @enderror">
                <select class="form-control edited" id="type-error" wire:model="type">
                    <option value=""></option>
                    @foreach ($types as $type)
                    <option value="{{ $type }}">{{ $type }}</option>
                    @endforeach
                </select>
                <label for="type-error" @error('type') style="color: #F3565D" @enderror>
                    نوع العقار</label>
                @error('type')
                <span id="type-error" class="help-block help-block-error" style="color: #F3565D">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-body">
                <div class="form-group form-md-line-input 
                @error('postal_code') has-error @enderror">
                    <input type="text" class="form-control" id="form_control_1" wire:model.defer="postal_code">
                    <label for="form_control_1" @error('postal_code') style="color: #F3565D" @enderror>الرمز
                        البريدي</label>
                    @error('postal_code')
                    <span id="postal_code-error" class="help-block help-block-error"
                        style="color: #F3565D">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
            <div class="form-body">
                <div class="form-group form-md-line-input 
                @error('address') has-error @enderror">
                    <input type="text" class="form-control" id="form_control_1" wire:model.defer="address"
                        autocomplete="off">
                    <label for="form_control_1" @error('address') style="color: #F3565D" @enderror>
                        عنوان العقار بالتفصيل</label>

                    @error('address')
                    <span id="address-error" class="help-block help-block-error"
                        style="color: #F3565D">{{ $message }}</span>
                    @else
                    <span class="help-block">
                        الدولة - المدينة - المنطقة - الشارع - رقم العقار - علامة مميزة قريبة</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div style="padding-right: 25px"
                class="form-group form-md-radios  @error('post_in_other_websites') has-error @enderror">
                <label>هل قمت بعرض عقارك في موقع آخر؟</label>
                <div class="md-radio-inline">
                    <div class="md-radio">
                        <input type="radio" id="post_in_other_websites" name="post_in_other_websites"
                            class="md-radiobtn" value="1" wire:model.defer="post_in_other_websites">
                        <label for="post_in_other_websites">
                            <span class="inc"></span>
                            <span class="check"></span>
                            <span class="box"></span>
                            نعم </label>
                    </div>
                    <div class="md-radio">
                        <input type="radio" id="post_in_other_websites2" name="post_in_other_websites"
                            class="md-radiobtn" value="0" wire:model.defer="post_in_other_websites">
                        <label for="post_in_other_websites2">
                            <span class="inc"></span>
                            <span class="check"></span>
                            <span class="box"></span>
                            لا </label>
                    </div>
                    @error('post_in_other_websites')
                    <span id="post_in_other_websites-error" class="help-block help-block-error"
                        style="color: #F3565D">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="form-body ">
                <div class="form-group form-md-line-input input-group
                @error('price') has-error @enderror">
                    <span class="input-group-addon" style="border-radius: 0;background: none;border: 0;">₪</span>
                    <input type="text" class="form-control" id="form_control_1" wire:model.defer="price">
                    <label for="form_control_1" @error('price') style="color: #F3565D" @enderror>
                        السعر الليلة الواحدة</label>
                    @error('price')
                    <span id="price-error" class="help-block help-block-error"
                        style="color: #F3565D">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-body ">
                <div class="form-group form-md-line-input 
                @error('days_before_cancel_book') has-error @enderror">
                    <input type="number" class="form-control" id="form_control_1" min="1" max="100"
                        wire:model.defer="days_before_cancel_book" autocomplete="off">
                    <label for="form_control_1" @error('days_before_cancel_book') style="color: #F3565D" @enderror>
                        الايام قبل الغاء حجز العقار</label>
                    @error('days_before_cancel_book')
                    <span id="days_before_cancel_book-error" class="help-block help-block-error"
                        style="color: #F3565D">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div style="padding-right: 25px"
                class="form-group form-md-radios  @error('is_cancel_book_free') has-error @enderror">
                <label>هل إلغاء الحجز مجاني؟</label>
                <div class="md-radio-inline">
                    <div class="md-radio">
                        <input type="radio" id="is_cancel_book_free" name="is_cancel_book_free" class="md-radiobtn"
                            value="1" wire:model="is_cancel_book_free">
                        <label for="is_cancel_book_free">
                            <span class="inc"></span>
                            <span class="check"></span>
                            <span class="box"></span>
                            نعم </label>
                    </div>
                    <div class="md-radio">
                        <input type="radio" id="is_cancel_book_free2" name="is_cancel_book_free" class="md-radiobtn"
                            value="0" wire:model="is_cancel_book_free">
                        <label for="is_cancel_book_free2">
                            <span class="inc"></span>
                            <span class="check"></span>
                            <span class="box"></span>
                            لا </label>
                    </div>
                    @error('is_cancel_book_free')
                    <span id="is_cancel_book_free-error" class="help-block help-block-error"
                        style="color: #F3565D">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-body ">
                <div class="form-group form-md-line-input 
                @error('discount_percent_when_cancel_book') has-error @enderror input-group">
                    <input type="number" class="form-control edited" id="form_control_1" min="10" max="50"
                        @if($is_cancel_book_free=='1' ) disabled @endif autocomplete="off"
                        wire:model.defer="discount_percent_when_cancel_book">
                    <span class="input-group-addon" style="border-radius: 0;background: none;border: 0;">%</span>
                    <label for="form_control_1" @error('discount_percent_when_cancel_book') style="color: #F3565D"
                        @enderror>
                        نسبة الخصم عند الغاء الحجز</label>
                    {{-- @error('discount_percent_when_cancel_book') --}}
                    <span id="discount_percent_when_cancel_book-error" class="help-block help-block-error"
                        style="color: #F3565D">message message</span>
                    {{-- @enderror --}}
                </div>
            </div>
        </div>
    </div>
</div>