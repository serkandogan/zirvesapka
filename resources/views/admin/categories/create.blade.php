@extends('admin.layouts.layout-admin')

@section('content')

    @include('admin._partials.breadcrumb', ['category' => 'Ürünler', 'page' => 'Ürün Ekle'])

            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-12">
                    <form class="form-horizontal form-row-seperated" action="{{ url('admin/categories') }}" method="POST">
                         {!! csrf_field() !!}
                    <div class="portlet box green">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-gift"></i>Kategori Ekle
                            </div>
                            <div class="tools">
                                <a href="javascript:;" class="collapse">
                                </a>
                                <a href="#portlet-config" data-toggle="modal" class="config">
                                </a>
                                <a href="javascript:;" class="reload">
                                </a>
                                <a href="javascript:;" class="remove">
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <div action="#" id="form_sample_3" class="form-horizontal">
                                <div class="form-body">
                                    
                                    <div class="alert alert-danger display-hide">
                                        <button class="close" data-close="alert"></button>
                                        You have some form errors. Please check below.
                                    </div>
                                    <div class="alert alert-success display-hide">
                                        <button class="close" data-close="alert"></button>
                                        Your form validation is successful!
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Kategori Başlığı <span class="required">
                                        * </span>
                                        </label>
                                        <div class="col-md-4">
                                            <input type="text" name="Baslik" data-required="1" class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Kategori Açıklaması<span class="required">
                                        * </span>
                                        </label>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <textarea type="hidden" class="form-control" value="" name="Aciklama" cols="55"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Üst Kategorisini Seç<span class="required">
                                        * </span>
                                        </label>
                                        <div class="col-md-4">
                                            <select class="form-control select2me"  name="gid">
                                                <option>Kategori Seçiniz...</option>
                                                {!! $categorySelect !!}
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn green">Kategoriyi Ekle</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END FORM-->
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