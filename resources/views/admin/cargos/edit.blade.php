@extends('admin.layouts.layout-admin')

@section('content')

    @include('admin._partials.breadcrumb', ['category' => 'Kargo', 'page' => 'Kargo Düzenle'])
            <div class="row">
                <div class="col-md-12">
                    {!! Form::model($cargo, ['class' => 'form-horizontal', 'id' => 'cargo-update', 'files' => true, 'method' => 'PUT', 'route' => ['admin.cargos.update', $cargo->ID]]) !!}
                        
                        <div class="portlet box green">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-gift"></i>Kargo Düzenle
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
                                        <label class="control-label col-md-3">Başlığı <span class="required">
                                        * </span>
                                        </label>
                                        <div class="col-md-4">
                                             {!! Form::text('Baslik', null, ['class' => 'form-control', 'placeholder' => 'Başlık Giriniz']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Açıklaması<span class="required">
                                        * </span>
                                        </label>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                 
                                                    {!! Form::textarea('Aciklama', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Fiyat <span class="required">
                                        * </span>
                                        </label>
                                        <div class="col-md-4">
                                             {!! Form::text('Fiyat', null, ['class' => 'form-control', 'placeholder' => 'Fiyat Giriniz']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Kargo Sorgu URL'si <span class="required">
                                        * </span>
                                        </label>
                                        <div class="col-md-4">
                                             {!! Form::text('SorguURL', null, ['class' => 'form-control', 'placeholder' => 'Kargo Sorgu URL si Giriniz']) !!}
                                        </div>
                                    </div>  
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Kargo Sorgu Kullanıcı Adı <span class="required">
                                        * </span>
                                        </label>
                                        <div class="col-md-4">
                                             {!! Form::text('KullaniciAdi', null, ['class' => 'form-control', 'placeholder' => 'Kargo Sorgu Kullanıcı Adı Giriniz']) !!}
                                        </div>
                                    </div>     
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Kargo Sorgu Şifresi <span class="required">
                                        * </span>
                                        </label>
                                        <div class="col-md-4">
                                             {!! Form::text('Sifre', null, ['class' => 'form-control', 'placeholder' => 'Kargo Sorgu Şifresi Giriniz']) !!}
                                        </div>
                                    </div>    
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Kargo Servis Demo URL <span class="required">
                                        * </span>
                                        </label>
                                        <div class="col-md-4">
                                             {!! Form::text('ServisDemoURL', null, ['class' => 'form-control', 'placeholder' => 'Kargo Servis Demo URL Giriniz']) !!}
                                        </div>
                                    </div>    
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Kargo Servis URL <span class="required">
                                        * </span>
                                        </label>
                                        <div class="col-md-4">
                                             {!! Form::text('ServisURL', null, ['class' => 'form-control', 'placeholder' => 'Kargo Servis URL Giriniz']) !!}
                                        </div>
                                    </div>   
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Kargo No <span class="required">
                                        * </span>
                                        </label>
                                        <div class="col-md-4">
                                             {!! Form::text('KargoNo', null, ['class' => 'form-control', 'placeholder' => 'Kargo No Giriniz']) !!}
                                        </div>
                                    </div>     
                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn green">Kargoyı Güncelle</button>
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