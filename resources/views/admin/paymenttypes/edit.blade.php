@extends('admin.layouts.layout-admin')

@section('content')

    @include('admin._partials.breadcrumb', ['category' => 'Ödeme Türü', 'page' => 'Ödeme Türü Düzenle'])

            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-12">
                    {!! Form::model($paymenttype, ['class' => 'form-horizontal', 'id' => 'paymenttype-update', 'files' => true, 'method' => 'PUT', 'route' => ['admin.paymenttypes.update', $paymenttype->ID]]) !!}
                        
                        <div class="portlet box green">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-gift"></i>Ödeme Türü
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
                                        <label class="control-label col-md-3">Ödeme Türü Başlığı <span class="required">
                                        * </span>
                                        </label>
                                        <div class="col-md-4">
                                             {!! Form::text('Baslik', null, ['class' => 'form-control', 'placeholder' => 'Başlık Giriniz']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">İndirim <span class="required">
                                        * </span>
                                        </label>
                                        <div class="col-md-4">
                                             {!! Form::text('Indirim', null, ['class' => 'form-control', 'placeholder' => 'Başlık Giriniz']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Ekstra Fiyat <span class="required">
                                        * </span>
                                        </label>
                                        <div class="col-md-4">
                                             {!! Form::text('Fiyat', null, ['class' => 'form-control', 'placeholder' => 'Başlık Giriniz']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn green">Ödeme Türünü Güncelle</button>
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