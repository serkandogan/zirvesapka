@extends('admin.layouts.layout-admin')

@section('content')

    @include('admin._partials.breadcrumb', ['category' => 'Markalar', 'page' => 'Marka Ekle'])

            <div class="row">
                <div class="col-md-12">
                    <form class="form-horizontal form-row-seperated" action="{{ url('admin/brands') }}" method="POST">
                         {!! csrf_field() !!}
                        <div class="portlet">
                            <div class="portlet-title">
                                <div class="caption">
                                </div>
                                <div class="actions btn-set">
                                    <button class="btn green"><i class="fa fa-check"></i> Marka Kaydet</button>
                            </div>
                            <div class="portlet-body">
                                <div class="tabbable">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#tab_general" data-toggle="tab">
                                            Marka Ekle </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content no-space">
                                        <div class="tab-pane active" id="tab_general">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Marka Başlığı:
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
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Marka Açıklaması: <span class="required">
                                                    </span>
                                                    </label>
                                                    <div class="col-md-10">
                                                        <textarea class="form-control" name="Aciklama"></textarea>
                                                         @if ($errors->has('Aciklama'))
                                                            <div class="alert alert-danger display-hide" style="display: block;">
                                                                <button class="close" data-close="alert"></button>
                                                                <span>
                                                                {{ $errors->first('Aciklama') }}</span>
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
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('assets/global/plugins/ckeditor/ckeditor.js') }}"></script>
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