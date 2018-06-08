<!DOCTYPE html>
    <!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
    <!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
    <!--[if !IE]><!-->
    <html lang="en" class="no-js">
    <!--<![endif]-->
    <head>
        <meta charset="utf-8"/>
        <title>@yield('title') | Kursistem Yönetim Paneli</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta content="" name="description"/>
        <meta content="" name="author"/>
        <link href="{{ asset('assets/admin/layout/css/fonts.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/global/plugins/uniform/css/uniform.default.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/admin/pages/css/login.css') }}" rel="stylesheet" type="text/css"/>

        <link href="{{ asset('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/global/plugins/fullcalendar/fullcalendar.min.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/global/plugins/jqvmap/jqvmap/jqvmap.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/admin/pages/css/tasks.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/global/css/components.css') }}" id="style_components" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/global/css/plugins.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/admin/layout/css/layout.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('assets/admin/layout/css/themes/darkblue.css') }}" rel="stylesheet" type="text/css" id="style_color"/>
        <link href="{{ asset('assets/admin/layout/css/custom.css') }}" rel="stylesheet" type="text/css"/>
        <link rel="icon" type="image/png" href="{{ asset('tuna.png') }}" />
    </head>
    <body class="login">
    <div class="menu-toggler sidebar-toggler"></div>

    <div class="logo">
        <img src="kursistem-logo.png" />
    </div>
<!-- BEGIN LOGIN -->
<div class="content">
    @yield('content')
</div>
<div class="copyright">
     Kursistem Bilişim Teknolojileri KUR v.1 CMS
</div>
<!-- END LOGIN -->
        <!--[if lt IE 9]>
        <script src="{{ asset('assets/global/plugins/respond.min.js') }}"></script>
        <script src="{{ asset('assets/global/plugins/excanvas.min.js') }}"></script>
        <![endif]-->
        <script src="{{ asset('assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/jquery-migrate.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/jquery.cokie.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/uniform/jquery.uniform.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/flot/jquery.flot.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/flot/jquery.flot.resize.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/flot/jquery.flot.categories.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/jquery.pulsate.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/bootstrap-daterangepicker/moment.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/fullcalendar/fullcalendar.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/plugins/jquery.sparkline.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/global/scripts/metronic.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/admin/layout/scripts/layout.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/admin/layout/scripts/quick-sidebar.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/admin/layout/scripts/demo.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/admin/pages/scripts/index.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/admin/pages/scripts/tasks.js') }}" type="text/javascript"></script>
        <script>
        jQuery(document).ready(function() {
           Metronic.init();
           Layout.init();
           QuickSidebar.init();
           Demo.init();
           Index.init();
           Index.initDashboardDaterange();
           Index.initJQVMAP();
           Index.initCalendar();
           Index.initCharts();
           Index.initChat();
           Index.initMiniCharts();
           Tasks.initDashboardWidget();
        });
        </script>
    </body>
</html>