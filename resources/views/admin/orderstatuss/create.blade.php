@extends('admin.layouts.layout-admin')

@section('content')

    @include('admin._partials.breadcrumb', ['category' => 'Sipariş Durumu', 'page' => 'Sipariş Durumu Ekle'])

            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-12">
                    <form class="form-horizontal form-row-seperated" action="{{ url('admin/orderstatuss') }}" method="POST">
                         {!! csrf_field() !!}
                        <div class="portlet">
                            <div class="portlet-title">
                                <div class="caption">
                                </div>
                                <div class="actions btn-set">
                                    <button class="btn green"><i class="fa fa-check"></i> Sipariş Durumunu Kaydet</button>
                            </div>
                            <div class="portlet-body">
                                <div class="tabbable">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#tab_general" data-toggle="tab">
                                            Sipariş Durumu Ekle </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content no-space">
                                        <div class="tab-pane active" id="tab_general">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Sipariş Durumunun Başlığı:
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" name="Baslik" placeholder="">
                                                    </div>

                                                    @if ($errors->has('Baslik'))
                                                        <div class="alert alert-danger display-hide" style="display: block;">
                                                            <button class="close" data-close="alert"></button>
                                                            <span>
                                                            {{ $errors->first('Baslik') }}</span>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                                                
                                                
                    </form>
                </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>
    </div>

    <script type="text/javascript" src="{{ asset('assets/global/plugins/ckeditor/ckeditor.js') }}"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
<script>
        jQuery(document).ready(function() {       
           // initiate layout and plugins
           Metronic.init(); // init metronic core components
Layout.init(); // init current layout
QuickSidebar.init(); // init quick sidebar
Demo.init(); // init demo features
           ComponentsFormTools.init();
        });   
    </script>
<!-- BEGIN GOOGLE RECAPTCHA -->
<script type="text/javascript">
        var RecaptchaOptions = {
           theme : 'custom',
           custom_theme_widget: 'recaptcha_widget'
        };
    </script>
@endsection