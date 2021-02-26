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
            <form role="form" wire:submit.prevent="accept">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-body">
                            <div class="form-group form-md-line-input">
                                <input type="text" class="form-control" disabled id="form_control_1"
                                    value="{{ $real_estate_data->name }}">
                                <label for="form_control_1" @error('name') style="color: #F3565D" @enderror>
                                    اسم العقار
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-body ">
                            <div class="form-group form-md-line-input">
                                <input type="text" class="form-control" disabled id="form_control_1"
                                    value="{{ $real_estate_data->type }}">
                                <label for="form_control_1"> نوع العقار </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-body">
                            <div class="form-group form-md-line-input ">
                                <input type="text" class="form-control" disabled id="form_control_1"
                                    value="{{ $real_estate_data->postal_code }}">
                                <label for="form_control_1">الرمز البريدي</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group form-md-line-input ">
                            <input type="text" class="form-control" disabled id="form_control_1"
                                value="{{ $real_estate_data->address }}">
                            <label for="form_control_1">العنوان</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group form-md-line-input ">
                            <input type="text" class="form-control" disabled id="form_control_1"
                                value="{{ $real_estate_data->post_in_other_websites }}">
                            <label for="form_control_1">هل قام بعرض عقاره في موقع آخر؟</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group form-md-line-input ">
                            <input type="text" class="form-control" disabled id="form_control_1"
                                value="{{ $real_estate_data->price }}">
                            <label for="form_control_1">السعر</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group form-md-line-input ">
                            <input type="text" class="form-control" disabled id="form_control_1"
                                value="{{ $real_estate_data->days_before_cancel_book }}">
                            <label for="form_control_1">الأيام قبل إلغاء العرض</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group form-md-line-input ">
                            <input type="text" class="form-control" disabled id="form_control_1"
                                value="{{ $real_estate_data->is_cancel_book_free }}">
                            <label for="form_control_1">هل إلغاء الحجز مجاني</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group form-md-line-input ">
                            <input type="text" class="form-control" disabled id="form_control_1"
                                value="{{ $real_estate_data->discount_percent_when_cancel_book }}">
                            <label for="form_control_1">نسبة الخصم عند إلغاء الحجز.</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-md-line-input ">
                            <input type="text" class="form-control" disabled id="form_control_1"
                                value="{{ $real_estate_data->google_map_address }}">
                            <label for="form_control_1">العنوان بإستخدام خرائط قوقل.</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-md-line-input ">
                            <input type="text" class="form-control" disabled id="form_control_1"
                                value="{{ $real_estate_data->photos }}">
                            <label for="form_control_1">صور العقار</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group form-md-line-input ">
                            <input type="text" class="form-control" disabled id="form_control_1"
                                value="{{ $real_estate_details_data->bedrooms_number }}">
                            <label for="form_control_1">عدد غرف النوم</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group form-md-line-input ">
                            <input type="text" class="form-control" disabled id="form_control_1"
                                value="{{ $real_estate_details_data->beds_numbers }}">
                            <label for="form_control_1">عدد الأسِرّة</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group form-md-line-input ">
                            <input type="text" class="form-control" disabled id="form_control_1"
                                value="{{ $real_estate_details_data->single_beds_numbers }}">
                            <label for="form_control_1">عدد الأسِرّة الفردية</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group form-md-line-input ">
                            <input type="text" class="form-control" disabled id="form_control_1"
                                value="{{ $real_estate_details_data->double_beds_numbers }}">
                            <label for="form_control_1">عدد الأسِرّة المزدوجة</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group form-md-line-input ">
                            <input type="text" class="form-control" disabled id="form_control_1"
                                value="{{ $real_estate_details_data->bathroom_numbers }}">
                            <label for="form_control_1">عدد الحمامات المتوفرة</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group form-md-line-input ">
                            <input type="text" class="form-control" disabled id="form_control_1"
                                value="{{ $real_estate_data->guest_number }}">
                            <label for="form_control_1">عدد الضيوف</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group form-md-line-input ">
                            <input type="text" class="form-control" disabled id="form_control_1"
                                value="{{ $real_estate_details_data->smoke_allow == 1 ? __('admin.allow') : __('admin.not_allow') }}">
                            <label for="form_control_1">التدخين مسموح</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group form-md-line-input ">
                            <input type="text" class="form-control" disabled id="form_control_1"
                                value="{{ $real_estate_details_data->pets_allow == 1 ? __('admin.allow') : __('admin.not_allow')}}">
                            <label for="form_control_1">الحيوانات الأليفة مسموحة</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group form-md-line-input ">
                            <input type="text" class="form-control" disabled id="form_control_1"
                                value="{{ $real_estate_details_data->kids_allow == 1 ? __('admin.allow') : __('admin.not_allow')}}">
                            <label for="form_control_1">مسموح بإقامة الأطفال</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group form-md-line-input ">
                            <input type="text" class="form-control" disabled id="form_control_1"
                                value="{{ $real_estate_details_data->party_allow == 1 ? __('admin.allow') : __('admin.not_allow')}}">
                            <label for="form_control_1">مسموح بإقامة الحفلات</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group form-md-line-input ">
                            <input type="text" class="form-control" disabled id="form_control_1"
                                value="{{ $real_estate_details_data->start_arrive_at }}">
                            <label for="form_control_1">وقت تسجيل الوصول من</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group form-md-line-input ">
                            <input type="text" class="form-control" disabled id="form_control_1"
                                value="{{ $real_estate_details_data->end_arrive_at }}">
                            <label for="form_control_1">وقت تسجيل الوصول إلى</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group form-md-line-input ">
                            <input type="text" class="form-control" disabled id="form_control_1"
                                value="{{ $real_estate_details_data->start_leave_at }}">
                            <label for="form_control_1">وقت تسجيل المغادرة من</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group form-md-line-input ">
                            <input type="text" class="form-control" disabled id="form_control_1"
                                value="{{ $real_estate_details_data->end_leave_at }}">
                            <label for="form_control_1">وقت تسجيل المغادرة إلى</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group form-md-checkboxes">
                            <label>المرافق الداخلية</label>
                            <div class="md-checkbox-inline">
                                @foreach (explode(',',$real_estate_details_data->indoor_facilities) as $facility)
                                @if(!$loop->last)
                                {{ $facilities->where('id', $facility)->first()->name.', ' }}
                                @endif
                                @endforeach
                        </div>
                    </div>


                    <div class="form-group form-md-checkboxes">
                        <label>المرافق الخارجية</label>
                        <div class="md-checkbox-inline">
                            @foreach (explode(',',$real_estate_details_data->outdoor_facilities) as $facility)
                            @if(!$loop->last)
                            {{ $facilities->where('id', $facility)->first()->name.', ' }}
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
        </div>
        <div class="form-actions noborder">
            <button type="submit" class="btn blue">موافقة</button>
        </div>
        </form>

    </div>
</div>
</div>
