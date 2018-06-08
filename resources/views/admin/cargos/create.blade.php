@extends('admin.layouts.layout-admin')

@section('content')

    @include('admin._partials.breadcrumb', ['category' => 'Ürünler', 'page' => 'Ürün Ekle'])

            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-12">
                    <form class="form-horizontal form-row-seperated" action="{{ url('admin/brands') }}" method="POST">
                         {!! csrf_field() !!}
                        <div class="portlet">
                            <div class="portlet-title">
                                <div class="caption">
                                </div>
                                <div class="actions btn-set">
                                    <button class="btn green"><i class="fa fa-check"></i> Ürünü Kaydet</button>
                            </div>
                            <div class="portlet-body">
                                <div class="tabbable">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#tab_general" data-toggle="tab">
                                            Ürün Ekle </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content no-space">
                                        <div class="tab-pane active" id="tab_general">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Ürün Başlığı:
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
                                                    <label class="col-md-2 control-label">Açıklama: <span class="required">
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
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Ürün Kategorisi:</label>
                                                    <div class="col-md-10">
                                                       <select>
                                                          
                                                       </select>
                                                    </div>

                                                    @if ($errors->has('KategoriID'))
                                                        <div class="alert alert-danger display-hide" style="display: block;">
                                                            <button class="close" data-close="alert"></button>
                                                            <span>
                                                            {{ $errors->first('KategoriID') }}</span>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Ürün Markası: 
                                                    </label>
                                                    <div class="col-md-10">
                                                       <select>
                                                          
                                                       </select>
                                                    </div>

                                                    @if ($errors->has('MarkaID'))
                                                        <div class="alert alert-danger display-hide" style="display: block;">
                                                            <button class="close" data-close="alert"></button>
                                                            <span>
                                                            {{ $errors->first('MarkaID') }}</span>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Ürün Tedarikçisi:
                                                    </label>
                                                    <div class="col-md-10">
                                                      <select>
                                                          
                                                       </select>
                                                    </div>

                                                    @if ($errors->has('TedarikciID'))
                                                        <div class="alert alert-danger display-hide" style="display: block;">
                                                            <button class="close" data-close="alert"></button>
                                                            <span>
                                                            {{ $errors->first('TedarikciID') }}</span>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Ürün Grubu:
                                                    </label>
                                                    <div class="col-md-10">
                                                        <select>
                                                          
                                                       </select>
                                                    </div>

                                                    @if ($errors->has('TedarikciID'))
                                                        <div class="alert alert-danger display-hide" style="display: block;">
                                                            <button class="close" data-close="alert"></button>
                                                            <span>
                                                            {{ $errors->first('TedarikciID') }}</span>
                                                        </div>
                                                    @endif
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-2 control-label">Ürün Kodu:
                                                    </label>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" name="UrunKodu" placeholder="">
                                                    </div>

                                                    @if ($errors->has('UrunKodu'))
                                                        <div class="alert alert-danger display-hide" style="display: block;">
                                                            <button class="close" data-close="alert"></button>
                                                            <span>
                                                            {{ $errors->first('UrunKodu') }}</span>
                                                        </div>
                                                    @endif
                                                </div>

                                                 <div class="form-group">
                                                    <label class="col-md-2 control-label">Ürün Piyasa Fiyatı:
                                                    </label>
                                                    <div class="col-md-4">
                                                       <input type="text" class="form-control" name="LFiyat" placeholder="">
                                                    </div>

                                                    @if ($errors->has('LFiyat'))
                                                        <div class="alert alert-danger display-hide" style="display: block;">
                                                            <button class="close" data-close="alert"></button>
                                                            <span>
                                                            {{ $errors->first('LFiyat') }}</span>
                                                        </div>
                                                    @endif
                                                </div>

                                                 <div class="form-group">
                                                    <label class="col-md-2 control-label">Ürün İndirimli Fiyatı:
                                                    </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="IndirimliFiyati" placeholder="">
                                                    </div>

                                                    @if ($errors->has('IndirimliFiyati'))
                                                        <div class="alert alert-danger display-hide" style="display: block;">
                                                            <button class="close" data-close="alert"></button>
                                                            <span>
                                                            {{ $errors->first('IndirimliFiyati') }}</span>
                                                        </div>
                                                    @endif
                                                </div>

                                                <div class="form-body">
                                                    <div class="form-group last">
                                                     <label class="col-md-2 control-label">Ürün İçeriği: 
                                                    </label>
                                                        <div class="col-md-10">
                                                        <textarea class="ckeditor form-control" name="Icerik"> 
                                                           
                                                        </textarea>
                                                               
                                                            @if ($errors->has('Icerik'))
                                                                <div class="alert alert-danger display-hide" style="display: block;">
                                                                    <button class="close" data-close="alert"></button>
                                                                    <span>
                                                                       {{ $product->Icerik }}
                                                                    </span>
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