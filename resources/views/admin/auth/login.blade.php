@extends('layouts.auth')
@section('content')
<form class="login-form" action="{{ route('admin.login') }}" method="post">
    @csrf
    <h3 class="form-title">تسجيل الدخول على حسابك</h3>
    <div class="alert alert-danger display-hide">
        <button class="close" data-close="alert"></button>
        <span>
            أدخل البريد الإلكتروني وكلمة المرور. </span>
    </div>
    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">البريد الالكتروني</label>
        <div class="input-icon">
            <i class="fa fa-user"></i>
            <input class="form-control placeholder-no-fix" type="text" autocomplete="off" autofocus
                placeholder="البريد الالكتروني" name="email" value="{{ old('email') }}" />
        </div>
    </div>
    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">كلمة المرور</label>
        <div class="input-icon">
            <i class="fa fa-lock"></i>
            <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="كلمة المرور"
                name="password" />
        </div>
    </div>
    <div class="form-actions">
        <label class="checkbox">
            <input type="checkbox" name="remember" value="1" /> تذكرني </label>
        <button type="submit" class="btn blue pull-right">
            تسجيل الدخول <i class="m-icon-swapright m-icon-white"></i>
        </button>
    </div>
    <div class="login-options">
        <h4>أو سجل بإستخدام</h4>
        <ul class="social-icons">
            <li>
                <a class="facebook" data-original-title="facebook" href="javascript:;"></a>
            </li>
            <li>
                <a class="twitter" data-original-title="Twitter" href="javascript:;"></a>
            </li>
        </ul>
    </div>
    <div class="forget-password">
        <h4>نسيت كلمة السر؟</h4>
        <p>
            لا تقلق, اضغط <a href="javascript:;" id="forget-password">
                هنا </a>
            لإستعادة كلمة المرور.
        </p>
    </div>
</form>
<form class="forget-form" action="index.html" method="post">
    <h3>نسيت كلمة المرور؟</h3>
    <p>
        أدخل بريدك الإلكتروني في الأسفل لتستعيد كلمة المرور.
    </p>
    <div class="form-group">
        <div class="input-icon">
            <i class="fa fa-envelope"></i>
            <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email"
                name="email" />
        </div>
    </div>
    <div class="form-actions">
        <button type="button" id="back-btn" class="btn">
            <i class="m-icon-swapleft"></i> رجوع </button>
        <button type="submit" class="btn blue pull-right">
            إرسال <i class="m-icon-swapright m-icon-white"></i>
        </button>
    </div>
</form>
<!-- END FORGOT PASSWORD FORM -->
@endsection
@push('script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if (session()->has('error'))
<script>
    swal({
        icon: 'error',
        title: '{{ session('error') }}',
        timer: 2500,
        button: false,
    });
</script>
@endif

@endpush