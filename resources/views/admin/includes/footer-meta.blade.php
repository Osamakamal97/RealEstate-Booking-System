<script src="{{ asset('assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/jquery-migrate.min.js') }}" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="{{ asset('assets/global/plugins/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}"
    type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript">
</script>
<script src="{{ asset('assets/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/jquery.cokie.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/uniform/jquery.uniform.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript">
</script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ asset('assets/global/plugins/fancybox/source/jquery.fancybox.pack.js') }}" type="text/javascript">
</script>
<script src="{{ asset('assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js') }}" type="text/javascript">
</script>
<script src="{{ asset('assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js') }}" type="text/javascript">
</script>
{{-- <script src="{{ asset('') }}assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
<script src="{{ asset('') }}assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
<script src="{{ asset('') }}assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
<script src="{{ asset('') }}assets/global/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
<script src="{{ asset('') }}assets/global/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript">
</script>
<script src="{{ asset('') }}assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"> --}}
   
</script>
<script type="text/javascript" src="{{ asset('assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }}">
</script>
<script type="text/javascript"
    src="{{ asset('assets/global/plugins/jquery-validation/js/additional-methods.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/global/plugins/select2/select2.min.js') }}"></script>
<script type="text/javascript"
    src="{{ asset('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js') }}">
</script>
<script type="text/javascript" src="{{ asset('assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js') }}">
</script>
<script type="text/javascript" src="{{ asset('assets/global/plugins/ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/global/plugins/bootstrap-markdown/js/bootstrap-markdown.js') }}">
</script>
<script type="text/javascript" src="{{ asset('assets/global/plugins/bootstrap-markdown/lib/markdown.js') }}"></script>
<!-- IMPORTANT! fullcalendar depends on jquery-ui.min.js for drag & drop support -->
{{-- <script src="{{ asset('') }}assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript">
</script> --}}
{{-- <script src="{{ asset('') }}assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js"
type="text/javascript"> --}}
</script>
{{-- <script src="{{ asset('') }}assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script> --}}
<script type="text/javascript" src="{{ asset('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js') }}">
</script>
<script type="text/javascript"
    src="{{ asset('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js') }}">
</script>
<script src="http://maps.google.com/maps/api/js?key=AIzaSyBTVuX5HqCfrJkzLVte3NnsTrrJTygbFj4" type="text/javascript">
</script>
<script src="{{ asset('assets/global/plugins/gmaps/gmaps.min.js') }}" type="text/javascript"></script>

<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ asset('assets/global/scripts/metronic.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/admin/layout/scripts/layout.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/admin/layout/scripts/quick-sidebar.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/admin/layout/scripts/demo.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/admin/pages/scripts/index.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/admin/pages/scripts/tasks.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/admin/pages/scripts/table-managed.js') }}"></script>
<script src="{{ asset('assets/admin/pages/scripts/form-validation.js') }}"></script>
<script src="{{ asset('assets/admin/pages/scripts/maps-google.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/admin/pages/scripts/inbox.js') }}" type="text/javascript"></script>

<!-- END PAGE LEVEL SCRIPTS -->
<script>
    jQuery(document).ready(function() {    
        Metronic.init(); // init metronic core componets
        Layout.init(); // init layout
        QuickSidebar.init(); // init quick sidebar
        // Demo.init(); // init demo features
        Index.init();   
        Index.initDashboardDaterange();
        Index.initJQVMAP(); // init index page's custom scripts
        Index.initCalendar(); // init index page's custom scripts
        Index.initCharts(); // init index page's custom scripts
        Index.initChat();
        Index.initMiniCharts();
        Tasks.initDashboardWidget();
        TableManaged.init();
        FormValidation.init();
        UIConfirmations.init(); // init page demo
        MapsGoogle.init();
        Inbox.init();
    });
</script>
@stack('script')
@livewireScripts
@livewireAlertScripts