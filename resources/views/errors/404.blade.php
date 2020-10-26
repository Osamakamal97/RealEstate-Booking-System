<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <title>الصفحة غير موجودة</title>
    @includeIf('admin.includes.header-meta')
</head>
<body class="page-404-3">
    <div class="page-inner">
        <img src="../../assets/admin/pages/media/pages/earth-rtl.jpg" class="img-responsive" alt="">
    </div>
    <div class="container error-404">
        <h1>404</h1>
        <h2>أوبس, هنالك مشكلة.</h2>
        <p>
            يبدو أن الصفحة التي تبحث عنها غير موجودة.
        </p>
        <p>
            @if (auth('admin')->check())
            <a href="{{ route('admin.dashboard') }}">
                العودة للرئيسة </a>
             <br>
            @else
            <a href="{{ route('welcome') }}">
                العودة للرئيسة </a>
             <br>
            @endif
            
        </p>
    </div>
</body>

</html>