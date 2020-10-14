<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <title>@yield('title')</title>
    @includeIf('admin.includes.header-meta')
</head>

<body class="page-header-fixed page-quick-sidebar-over-content page-sidebar-closed-hide-logo page-container-bg-solid">
    @includeIf('admin.includes.header')
    <div class="clearfix">
    </div>
    <div class="page-container">
        @includeIf('admin.includes.sidebar')
        <div class="page-content-wrapper">
            <div class="page-content">
                @yield('content')
            </div>
        </div>
    </div>
    @includeIf('admin.includes.footer')
    @includeIf('admin.includes.footer-meta')
</body>

</html>