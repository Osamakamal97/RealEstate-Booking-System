@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN VALIDATION STATES-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i>إنشاء مدير او موظف
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                {{-- id="form_sample_3" --}}
                <form action="{{ route('admin.admins.store') }}" class="form-horizontal" method="POST"
                    novalidate="novalidate">
                    @csrf
                    <div class="form-body">
                        {{-- @error(session()->has('error'))
                        <div class="alert alert-danger display-hide" style="display: block;">
                            <button class="close" data-close="alert"></button>
                            هنالك مشكلة الرجاء. النظر للأسفل لمعرفة الخطأ
                        </div>
                        @enderror
                        @if (session()->has('success'))
                        <div class="alert alert-success display-hide" style="display: none;">
                            <button class="close" data-close="alert"></button>
                            {{ session()->get('success') }}
                    </div>
                    @endif --}}
                    <div class="form-group @error('name') has-error @enderror">
                        <label class="control-label col-md-3">الاسم
                            <span class="required" aria-required="true">*</span>
                        </label>
                        <div class="col-md-4">
                            <input type="text" name="name" data-required="1" class="form-control" aria-required="true"
                                aria-describedby="name-error" value="{{ old('name') }}">
                            @error('name')
                            <span id="name-error" class="help-block help-block-error">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group @error('email') has-error @enderror">
                        <label class="col-md-3 control-label">Email Address <span class="required" aria-required="true">
                                * </span>
                        </label>
                        <div class="col-md-4">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-envelope"></i>
                                </span>
                                <input type="email" name="email" class="form-control" placeholder="Email Address"
                                    aria-required="true" aria-describedby="email-error" value="{{ old('email') }}">
                            </div>
                            @error('email')
                            <span id="email-error" class="help-block help-block-error">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group @error('password') has-error @enderror">
                        <label class="control-label col-md-3">كلمة السر
                            <span class="required" aria-required="true">*</span>
                        </label>
                        <div class="col-md-4">
                            <input type="text" name="password" data-required="1" class="form-control"
                                aria-required="true" aria-describedby="name-error">
                            @error('password')
                            <span id="name-error" class="help-block help-block-error">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group  @error('role') has-error @enderror">
                        <label class="control-label col-md-3">الدور <span class="required" aria-required="true">
                                * </span>
                        </label>
                        <div class="col-md-4">
                            <div class="radio-list" data-error-container="#form_2_membership_error">
                                <label>
                                    <div class="radio">
                                        <input type="radio" name="role" value="1">
                                    </div>مدير
                                </label>
                                <label>
                                    <div class="radio">
                                        <input type="radio" name="role" value="2">
                                    </div> موظف
                                </label>
                            </div>
                            @error('role')
                            <div id="form_2_membership_error">
                                <span id="membership-error" class="help-block help-block-error">{{ $message }}</span>
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group  @error('active') has-error @enderror">
                        <label class="control-label col-md-3">التفعيل <span class="required" aria-required="true">
                                * </span>
                        </label>
                        <div class="col-md-4">
                            <div class="radio-list" data-error-container="#form_2_membership_error">
                                <label>
                                    <div class="radio">
                                        <input type="radio" name="active" value="1"
                                            {{ old('active') == 1 ? 'checked' : '' }}>
                                    </div>مفعل
                                </label>
                                <label>
                                    <div class="radio">
                                        <input type="radio" name="active" value="0"
                                            {{ old('active') == 0 ? 'checked' : '' }}>
                                    </div> غير مفعل
                                </label>
                            </div>
                            @error('active')
                            <div id="form_2_membership_error">
                                <span id="membership-error" class="help-block help-block-error">{{ $message }}</span>
                            </div>
                            @enderror
                        </div>
                    </div>
            </div>
            <div class="form-actions">
                <div class="row">
                    <div class="col-md-offset-3 col-md-9">
                        <input type="submit" class="btn green" value="Submit">
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection