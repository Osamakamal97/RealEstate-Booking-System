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
    <div class="content">
        @yield('content')
    </div>
    <div class="copyright">
        2014 &copy; Metronic - Admin Dashboard Template.
    </div>

    @includeIf('admin.auth.includes.footer-meta')
</body>

</html>