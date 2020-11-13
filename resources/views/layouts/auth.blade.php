<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    @includeIf('admin.auth.includes.header-meta')
</head>

<body class="login">
    <div class="logo">
        <a href="index.html">
            <img src="../../assets/admin/layout/img/logo-big.png" alt="" />
        </a>
    </div>
    @if (request()->is('test'))
    <style>
        .portlet.light.bordered{
            border: none !important;
        }
        .form-wizard .steps > li > a.step{
            background: url(../img/bg-white-lock.png) repeat;
        }
        .form-wizard .steps > li > a.step > .number {
            background-color: white;
        }
        .form-wizard .steps > li > a.step{
            color: black;
        }
        .form-wizard .steps > li > a.step > .desc {
            color: white;
        }
    </style>
    <div class="content" style="width: 1100px">
        @yield('content')
    </div>
    @else
    <div class="content">
        @yield('content')
    </div>

    @endif

    <div class="copyright">
        2014 &copy; Metronic - Admin Dashboard Template.
    </div>

    @includeIf('admin.auth.includes.footer-meta')
</body>

</html>