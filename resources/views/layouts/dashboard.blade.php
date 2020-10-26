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
    @role('employee')
    <script>
        /*
         *   this script is for manage the logout of timeout
         *   if user is inactive for 15 min
         *   he will be logout : 
         *
         * */
        var logout = 'Are you sure to logout?';
        var timeout;
        var url =  "logout"; // route path;
        document.onmousemove = function(){
                clearTimeout(timeout);
                timeout = setTimeout(function () {
                    // var confirmstatus = confirm( logout );
                    // if(confirmstatus === true) {
                        var redirect = $.ajax({
                            cache: false,
                            url: url,
                            type: "GET",
                            headers: {
                                // 'X-CSRF-TOKEN': window.project.csrfToken
                            },
                            contentType: false,
                            processData: false,
                            success: function (response) {
                                window.location.href = '/admin/logout';
                            }
                        });
                // }
                }, 1000*60*5);
            };
    </script>
    @endrole
</body>

</html>