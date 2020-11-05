<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport" />
<meta content="" name="description" />
<meta content="" name="author" />
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('assets/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('assets/global/plugins/bootstrap/css/bootstrap-rtl.min.css') }}" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('assets/global/plugins/uniform/css/uniform.default.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet"
    type="text/css" />
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
<link href="{{ asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('assets/admin/pages/css/profile-old-rtl.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/admin/pages/css/error-rtl.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('assets/global/plugins/fullcalendar/fullcalendar.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/global/plugins/jqvmap/jqvmap/jqvmap.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css"
    href="{{ asset('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap-rtl.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/global/plugins/select2/select2.css') }}" />
<link rel="stylesheet" type="text/css"
    href="{{ asset('assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css') }}" />
<link href="{{ asset('assets/global/plugins/fancybox/source/jquery.fancybox.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/global/plugins/jquery-file-upload/blueimp-gallery/blueimp-gallery.min.css') }}"
    rel="stylesheet" />
<link href="{{ asset('assets/global/plugins/jquery-file-upload/css/jquery.fileupload.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/global/plugins/jquery-file-upload/css/jquery.fileupload-ui.css') }}" rel="stylesheet" />
<link rel="stylesheet" type="text/css"
    href="{{ asset('assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css') }}">
<link rel="stylesheet" type="text/css"
    href="{{ asset('assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}" />
<!-- END PAGE LEVEL PLUGIN STYLES -->
<!-- BEGIN PAGE STYLES -->
<link href="{{ asset('assets/admin/pages/css/tasks-rtl.css') }}" rel="stylesheet" type="text/css" />
<!-- END PAGE STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="{{ asset('assets/global/css/components-rtl.css') }}" id="style_components" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('assets/global/css/plugins-rtl.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/admin/layout/css/layout-rtl.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/admin/layout/css/themes/darkblue-rtl.css') }}" rel="stylesheet" type="text/css"
    id="style_color" />
<link href="{{ asset('assets/admin/layout/css/custom-rtl.css') }}" rel="stylesheet" type="text/css" />
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.css" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="{{ asset('assets/admin/pages/css/inbox-rtl.css') }}" rel="stylesheet" type="text/css">

@stack('style')
@livewireStyles