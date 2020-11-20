<div class="col-md-12">
    <!-- BEGIN SAMPLE FORM PORTLET-->
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption font-green">
                <i class="fa fa-home" style="color: #26a69a"></i>
                <span class="caption-subject bold uppercase"> إنشاء عقار جديد</span>
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
                @if ($show_page_one)
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
                                <span class="help-block">إختر اسما قصيرا وفريدا ومحببا للناس ,وتجنب الإختصارات </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div style="padding-top: 30px" class="form-group form-md-line-input form-md-floating-label
                        @error('type') has-error @enderror">
                            <select class="form-control" id="type-error" wire:model="type">
                                <option value=""></option>
                                @foreach ($types as $type)
                                <option value="{{ $type }}">{{ $type }}</option>
                                @endforeach
                            </select>
                            <label for="type-error" @error('type') style="color: #F3565D" @enderror>نوع العقار</label>
                            @error('type')
                            <span id="type-error" class="help-block help-block-error"
                                style="color: #F3565D">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-body">
                            <div class="form-group form-md-line-input 
                                @error('postal_code') has-error @enderror">
                                <input type="text" class="form-control" id="form_control_1"
                                    wire:model.defer="postal_code">
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
                                <span class="help-block">الدولة - المدينة - المنطقة - الشارع - رقم العقار - علامة مميزة
                                    قريبة</span>
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
                            <div class="form-group form-md-line-input 
                                @error('price') has-error @enderror">
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
                                <label for="form_control_1" @error('days_before_cancel_book') style="color: #F3565D"
                                    @enderror> الايام قبل الغاء حجز العقار</label>
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
                                    <input type="radio" id="is_cancel_book_free" name="is_cancel_book_free"
                                        class="md-radiobtn" value="1" wire:model="is_cancel_book_free">
                                    <label for="is_cancel_book_free">
                                        <span class="inc"></span>
                                        <span class="check"></span>
                                        <span class="box"></span>
                                        نعم </label>
                                </div>
                                <div class="md-radio">
                                    <input type="radio" id="is_cancel_book_free2" name="is_cancel_book_free"
                                        class="md-radiobtn" value="0" wire:model="is_cancel_book_free">
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
                                @error('discount_percent_when_cancel_book') has-error @enderror">
                                <input type="number" class="form-control" id="form_control_1" min="10" max="50"
                                    @if($is_cancel_book_free=='1' ) disabled @endif autocomplete="off"
                                    wire:model.defer="discount_percent_when_cancel_book">
                                <label for="form_control_1" @error('discount_percent_when_cancel_book')
                                    style="color: #F3565D" @enderror>
                                    نسبة الخصم عند الغاء الحجز</label>
                                @error('discount_percent_when_cancel_book')
                                <span id="discount_percent_when_cancel_book-error" class="help-block help-block-error"
                                    style="color: #F3565D">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                @elseif($show_wedding_hall_page)
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-body ">
                            <div class="form-group form-md-line-input 
                                @error('space_in_square_meters') has-error @enderror">
                                <input type="text" class="form-control" id="form_control_1"
                                    wire:model.defer="space_in_square_meters" autocomplete="off">
                                <label for="form_control_1" @error('space_in_square_meters') style="color: #F3565D"
                                    @enderror>
                                    المساحة بالمتر المربع
                                </label>
                                @error('space_in_square_meters')
                                <span id="space_in_square_meters-error" class="help-block help-block-error"
                                    style="color: #F3565D">{{ $message }}</span>
                                @else
                                <span class="help-block">إختر اسما قصيرا وفريدا ومحببا للناس ,وتجنب الإختصارات </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-body ">
                            <div class="form-group form-md-line-input 
                                @error('length_in_meter') has-error @enderror">
                                <input type="text" class="form-control" id="form_control_1"
                                    wire:model.defer="length_in_meter" autocomplete="off">
                                <label for="form_control_1" @error('length_in_meter') style="color: #F3565D" @enderror>
                                    الطول بالمتر
                                </label>
                                @error('length_in_meter')
                                <span id="length_in_meter-error" class="help-block help-block-error"
                                    style="color: #F3565D">{{ $message }}</span>
                                @else
                                <span class="help-block">إختر اسما قصيرا وفريدا ومحببا للناس ,وتجنب الإختصارات </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-body ">
                            <div class="form-group form-md-line-input 
                                @error('width_in_meter') has-error @enderror">
                                <input type="text" class="form-control" id="form_control_1"
                                    wire:model.defer="width_in_meter" autocomplete="off">
                                <label for="form_control_1" @error('width_in_meter') style="color: #F3565D" @enderror>
                                    العرض بالمتر
                                </label>
                                @error('width_in_meter')
                                <span id="width_in_meter-error" class="help-block help-block-error"
                                    style="color: #F3565D">{{ $message }}</span>
                                @else
                                <span class="help-block">إختر اسما قصيرا وفريدا ومحببا للناس ,وتجنب الإختصارات </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-body">
                            <div class="form-group form-md-line-input 
                                @error('number_of_people') has-error @enderror">
                                <input type="text" class="form-control" id="form_control_1"
                                    wire:model.defer="number_of_people">
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
                @elseif($show_page_two)
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-body ">
                            <div class="form-group form-md-line-input 
                                @error('google_map_address') has-error @enderror">
                                <input type="text" class="form-control" id="form_control_1"
                                    wire:model.defer="google_map_address">
                                <label for="form_control_1" @error('google_map_address') style="color: #F3565D"
                                    @enderror>العنوان
                                    باستخدام خرائط قوقل</label>
                                @error('google_map_address')
                                <span id="google_map_address-error" class="help-block help-block-error"
                                    style="color: #F3565D">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-body ">
                            <div class="form-group form-md-line-input 
                                @error('photos') has-error @enderror">
                                <input type="text" class="form-control" id="form_control_1" wire:model.defer="photos">
                                <label for="form_control_1" @error('photos') style="color: #F3565D" @enderror>صور
                                    العقار</label>
                                @error('photos')
                                <span id="photos-error" class="help-block help-block-error"
                                    style="color: #F3565D">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                @elseif($show_page_three)
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-body ">
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
                        <div class="form-body ">
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
                        <div class="form-body ">
                            <div class="form-group form-md-line-input 
                                @error('single_beds_numbers') has-error @enderror">
                                <input type="number" class="form-control" id="form_control_1" min="1" max="100"
                                    wire:model.defer="single_beds_numbers" autocomplete="off">
                                <label for="form_control_1" @error('single_beds_numbers') style="color: #F3565D"
                                    @enderror> عدد الأسرة الفردية</label>
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
                        <div class="form-body ">
                            <div class="form-group form-md-line-input 
                                @error('double_beds_numbers') has-error @enderror">
                                <input type="number" class="form-control" id="form_control_1" min="1" max="10"
                                    autocomplete="off" wire:model.defer="double_beds_numbers">
                                <label for="form_control_1" @error('double_beds_numbers') style="color: #F3565D"
                                    @enderror>
                                    عدد الأسرة المزدوجة</label>
                                @error('double_beds_numbers')
                                <span id="double_beds_numbers-error" class="help-block help-block-error"
                                    style="color: #F3565D">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-body ">
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
                        <div class="form-body ">
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
                                    <input type="radio" id="smoke_allow" name="smoke_allow" class="md-radiobtn"
                                        value="1" wire:model="smoke_allow">
                                    <label for="smoke_allow">
                                        <span class="inc"></span>
                                        <span class="check"></span>
                                        <span class="box"></span>
                                        نعم </label>
                                </div>
                                <div class="md-radio">
                                    <input type="radio" id="smoke_allow2" name="smoke_allow" class="md-radiobtn"
                                        value="0" wire:model="smoke_allow">
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
                                    <input type="radio" id="party_allow" name="party_allow" class="md-radiobtn"
                                        value="1" wire:model="party_allow">
                                    <label for="party_allow">
                                        <span class="inc"></span>
                                        <span class="check"></span>
                                        <span class="box"></span>
                                        نعم </label>
                                </div>
                                <div class="md-radio">
                                    <input type="radio" id="party_allow2" name="party_allow" class="md-radiobtn"
                                        value="0" wire:model="party_allow">
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
                        <div class="form-body ">
                            <div class="form-group form-md-line-input 
                                @error('start_arrive_at') has-error @enderror">
                                <input type="text" class="form-control" id="form_control_1"
                                    wire:model.defer="start_arrive_at" autocomplete="off">
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
                        <div class="form-body ">
                            <div class="form-group form-md-line-input 
                                @error('end_arrive_at') has-error @enderror">
                                <input type="text" class="form-control" id="form_control_1"
                                    wire:model.defer="end_arrive_at" autocomplete="off">
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
                        <div class="form-body ">
                            <div class="form-group form-md-line-input 
                                @error('start_leave_at') has-error @enderror">
                                <input type="text" class="form-control" id="form_control_1"
                                    wire:model.defer="start_leave_at" autocomplete="off">
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
                        <div class="form-body ">
                            <div class="form-group form-md-line-input 
                                @error('end_leave_at') has-error @enderror">
                                <input type="text" class="form-control" id="form_control_1"
                                    wire:model.defer="end_leave_at" autocomplete="off">
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
                @elseif($show_page_four)
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group form-md-checkboxes">
                            <label>المرافق الداخلية</label>
                            <div class="md-checkbox-inline">
                                @foreach ($indoor_facilities as $facility)
                                <div class="md-checkbox">
                                    <input type="checkbox" id="{{ $facility->name }}" class="md-check"
                                        wire:model.defer="selected_indoor_facilities.{{ $facility->id }}">
                                    <label for="{{ $facility->name }}">
                                        <span></span>
                                        <span class="check"></span>
                                        <span class="box"></span> {{ $facility->name }} </label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group form-md-checkboxes">
                            <label>المرافق الخارجية</label>
                            <div class="md-checkbox-inline">
                                @foreach ($outdoor_facilities as $facility)
                                <div class="md-checkbox">
                                    <input type="checkbox" id="{{ $facility->name }}" class="md-check"
                                        wire:model.defer="selected_outdoor_facilities.{{ $facility->id }}">
                                    <label for="{{ $facility->name }}">
                                        <span></span>
                                        <span class="check"></span>
                                        <span class="box"></span> {{ $facility->name }} </label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @elseif($show_check_form_page)

                @endif
                <div class="form-actions noborder">
                    @if(!$show_page_one)
                    <button type="button" class="btn blue" wire:click.prevent="previousPage">السابق</button>
                    @endif
                    @if (!$show_check_form_page)
                    <button type="button" class="btn blue" wire:click.prevent="nextPage">التالي</button>
                    @endif
                    @if ($show_check_form_page)
                    <button type="submit" class="btn blue">Submit</button>
                    @endif
                </div>
            </form>

        </div>
    </div>
</div>