@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN VALIDATION STATES-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i>تعديل مدير او موظف
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form action="{{ route('admin.admins.update', $admin->id) }}" class="form-horizontal" method="POST"
                    novalidate="novalidate">
                    <input type="hidden" name="id" value="{{ $admin->id }}">
                    @csrf
                    @method('PUT')
                    <div class="form-body">
                        <div class="form-group @error('name') has-error @enderror">
                            <label class="control-label col-md-3">الاسم
                                <span class="required" aria-required="true">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="name" data-required="1" class="form-control"
                                    aria-required="true" aria-describedby="name-error" value="{{ $admin->name }}">
                                @error('name')
                                <span id="name-error" class="help-block help-block-error">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group @error('email') has-error @enderror">
                            <label class="col-md-3 control-label">Email Address <span class="required"
                                    aria-required="true">
                                    * </span>
                            </label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                    <input type="email" name="email" class="form-control" placeholder="Email Address"
                                        aria-required="true" aria-describedby="email-error" value="{{ $admin->email }}">
                                </div>
                                @error('email')
                                <span id="email-error" class="help-block help-block-error">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group  @error('role') has-error @enderror">
                            <label class="control-label col-md-3">الدور  <span class="required"
                                    aria-required="true">
                                    * </span>
                            </label>
                            <div class="col-md-4">
                                <div class="radio-list" data-error-container="#form_2_membership_error">
                                    <label>
                                        <div class="radio">
                                            <input type="radio" name="role" value="1"
                                                {{ $admin->getRoleNames()[0] == 'manager' ? 'checked' : '' }}>
                                        </div>مدير
                                    </label>
                                    <label>
                                        <div class="radio">
                                            <input type="radio" name="role" value="2"
                                                {{ $admin->getRoleNames()[0] == 'employee' ? 'checked' : '' }}>
                                        </div> موظف
                                    </label>
                                </div>
                                @error('role')
                                <div id="form_2_membership_error">
                                    <span id="membership-error"
                                        class="help-block help-block-error">{{ $message }}</span></div>
                                @enderror
                            </div>
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
                                            {{ $admin->active == 1 ? 'checked' : '' }}>
                                    </div>مفعل 
                                </label>
                                <label>
                                    <div class="radio">
                                        <input type="radio" name="active" value="0"
                                            {{ $admin->active == 0 ? 'checked' : '' }}>
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
</div>
@endsection