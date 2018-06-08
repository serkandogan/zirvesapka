@extends('admin.layouts.layout-admin')

@section('content')
    @include('admin._partials.customizer')
    @include('admin._partials.breadcrumb', ['category' => 'Yönetim Paneli', 'page' => '/'])
    @include('admin._partials.stats')
    @include('admin._partials.widgets')
@endsection

@section('css')
 	<link href="{{ asset('assets/global/plugins/jqvmap/jqvmap/jqvmap.css') }}" rel="stylesheet" type="text/css"/>
 	<link href="{{ asset('assets/global/plugins/fullcalendar/fullcalendar.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('js')
	<script src="{{ asset('assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js') }}" type="text/javascript"></script>
    <script>
        jQuery(document).ready(function() {
           Index.initDashboardDaterange();
           Index.initJQVMAP();
           Index.initCalendar();
           Index.initCharts();
           Index.initChat();
           Index.initMiniCharts();
           Tasks.initDashboardWidget();
           // nestable
        });
        </script>
@endsection