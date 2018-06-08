@extends('admin.layouts.layout-admin')

@section('content')

    @include('admin._partials.breadcrumb', ['category' => 'Ürünler', 'page' => 'Ürün Düzenle'])
<div class="row">
{!! Form::model($product, ['action'=>['Admin\ProductsController@postUpdate', $product->ID], 'files'=>true, 'method'=>'POST']) !!}
   
<div class="col-md-6">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-red-sunglo">
                            <i class="icon-settings font-red-sunglo"></i>
                            <span class="caption-subject bold uppercase"> Ürün Bilgileri</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="form-group">
                                <label>Ürün Başlığı</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </span>
                                     {!! Form::text('Baslik', null, ['class' => 'form-control', 'placeholder' => 'Ürün Başlığını Giriniz']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Ürün Açıklaması</label>
                                {!! Form::textarea('Aciklama', null, ['class' => 'form-control', 'placeholder' => 'Ürün Açıklaması']) !!}
                            </div>
                            
                        </div>
                    </div>
                    <div class="portlet-title">
                            <div class="caption font-red-sunglo">
                                <i class="icon-settings font-red-sunglo"></i>
                                <span class="caption-subject bold uppercase"> Ürün Seçenekleri</span>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <div class="form-group">
                                <label>Ürün Kategorisi:</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </span>
                                    {!! Form::select('KategoriID', $categories, old('KategoriID'), ['class' => 'form-control', 'placeholder' => 'Kategori Seçiniz...']) !!}
                                    @if ($errors->has('KategoriID'))
                                        <div class="alert alert-danger display-hide" style="display: block;">
                                            <button class="close" data-close="alert"></button>
                                            <span>
                                            {{ $errors->first('KategoriID') }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Ürün Markası:</label>
                                <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </span>
                                    {!! Form::select('MarkaID', $brand, old('MarkaID'), ['class' => 'form-control', 'placeholder' => 'Marka Seçiniz...']) !!}
                                    @if ($errors->has('MarkaID'))
                                        <div class="alert alert-danger display-hide" style="display: block;">
                                            <button class="close" data-close="alert"></button>
                                        <span>
                                        {{ $errors->first('MarkaID') }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Ürün Tedarikçisi:</label>
                                <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-edit"></i>
                </span>
                                    {!! Form::select('TedarikciID', $tedarikci, old('TedarikciID'), ['class' => 'form-control', 'placeholder' => 'Tedarikçi Seçiniz...']) !!}
                                    @if ($errors->has('TedarikciID'))
                                        <div class="alert alert-danger display-hide" style="display: block;">
                                            <button class="close" data-close="alert"></button>
                        <span>
                        {{ $errors->first('TedarikciID') }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Ürün Grubu:</label>
                                <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </span>
                                    {!! Form::select('GrupID', $grup, old('GrupID'), ['class' => 'form-control', 'placeholder' => 'Grup Seçiniz...']) !!}
                                    @if ($errors->has('GrupID'))
                                        <div class="alert alert-danger display-hide" style="display: block;">
                                            <button class="close" data-close="alert"></button>
                                        <span>
                                        {{ $errors->first('GrupID') }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            </div>
                              <div class="portlet-title">
                            <div class="caption font-red-sunglo">
                                <i class="icon-settings font-red-sunglo"></i>
                                <span class="caption-subject bold uppercase"> Ürün Fiyat ve Kodu & Stoğu</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Ürün Kodu:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </span>
                                 {!! Form::text('UrunKodu', null, ['class' => 'form-control', 'placeholder' => 'Ürün Kodunu Giriniz...']) !!}
                                @if ($errors->has('UrunKodu'))
                                    <div class="alert alert-danger display-hide" style="display: block;">
                                        <button class="close" data-close="alert"></button>
                                        <span>
                                        {{ $errors->first('UrunKodu') }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Ürün Piyasa Fiyatı:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-turkish-lira"></i>
                                </span>
                                {!! Form::text('LFiyat', null, ['class' => 'form-control', 'placeholder' => 'Ürün Piyasa Fiyatınızı Giriniz...']) !!}
                                @if ($errors->has('LFiyat'))
                                    <div class="alert alert-danger display-hide" style="display: block;">
                                        <button class="close" data-close="alert"></button>
                                        <span>
                                        {{ $errors->first('LFiyat') }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Ürün İndirimli Fiyatı:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-turkish-lira"></i>
                                </span>
                                 {!! Form::text('IndirimliFiyati', null, ['class' => 'form-control', 'placeholder' => 'Ürün İndirimli Fiyatınızı Giriniz...']) !!}
                                @if ($errors->has('IndirimliFiyati'))
                                    <div class="alert alert-danger display-hide" style="display: block;">
                                        <button class="close" data-close="alert"></button>
                                        <span>
                                        {{ $errors->first('IndirimliFiyati') }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Ürün KDV Oranı:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-turkish-lira"></i>
                                </span>
                                {!! Form::text('Kdv', null, ['class' => 'form-control', 'placeholder' => 'Ürün Kdv Oranını Giriniz...']) !!}
                                @if ($errors->has('Kdv'))
                                    <div class="alert alert-danger display-hide" style="display: block;">
                                        <button class="close" data-close="alert"></button>
                                        <span>
                                        {{ $errors->first('Kdv') }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>

                        </div>




            </div>
            <div class="col-md-6">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-red-sunglo">
                            <i class="icon-settings font-red-sunglo"></i>
                            <span class="caption-subject bold uppercase"> Ürün İçeriği</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="form-body">
                                <div class="form-group last">
                                    {!! Form::textarea('Icerik', null, ['class' => 'form-control','id'=>'summernote_1']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="portlet-title">
                            <div class="caption font-red-sunglo">
                                <i class="icon-settings font-red-sunglo"></i>
                                <span class="caption-subject bold uppercase"> Ürün Tekli Resim</span>
                            </div>
                        </div>
                        <div class="form-group ">
                               <div class="form-group">
                                   <div class="fileinput fileinput-new" data-provides="fileinput">
                                       <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                           <img src="{!! url(image($product->Resim)) !!}" alt="" /> </div>
                                       <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                       <div>
                                                <span class="btn default btn-file">
                                                <span class="fileinput-new"> Resim Seç </span>
                                                <span class="fileinput-exists"> Resim Değiş </span>
                                                <input type="file" name="Resim[]" data-oldimage="{{ $product->Resim }}"  multiple="true"> </span>

                                           <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> ResimResim Sil </a>
                                          <br /> <span class="fileinput-filename" name="old-resim"> </span>
                                       </div>
                                   </div>
                               </div>
                               <div >
                                    {!! Form::text('OldImage', null, ['class' => 'form-control']) !!}
                               </div>
                            </div>
                        </div>
                        <div class="form-group">
                           <button type="submit" class="btn btn-danger">Ürünü Düzenle</button>
                        </div>
                    </div>  
                </div>
            </div> 
            


            </div> 


{!! Form::close() !!}
          
@endsection
@section('css')
    <link href="{{ asset('assets/plugin/multiselect/css/multi-select.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/global/plugins/bootstrap-editable/inputs-ext/address/address.css') }}"/>
<link href="{{ asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}"/>

    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/global/plugins/uniform/css/uniform.default.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/plugins/bootstrap-summernote/summernote.css') }}">
    <!-- END PAGE LEVEL STYLES -->
    <!-- BEGIN THEME STYLES -->
    <link href="{{ asset('assets/global/css/components.css') }}" id="style_components" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/global/css/plugins.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/admin/layout/css/layout.css') }}" rel="stylesheet" type="text/css"/>
    <link id="style_color" href="{{ asset('assets/admin/layout/css/themes/darkblue.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/admin/layout/css/custom.css') }}" rel="stylesheet" type="text/css"/>
@endsection


@section('js')
<script src="{{ asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('assets/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js') }}"></script>
    <script src="{{ asset('assets/plugin/multiselect/js/jquery.multi-select.js') }}" type="text/javascript"></script>
    <script>    
        $('.mySelects').multiSelect();
    </script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <script>
        jQuery(document).ready(function() {
            ComponentsEditors.init()
        });
    </script>
    <!--[if lt IE 9]>
    <script src="{{ asset('assets/global/plugins/respond.min.js') }}"></script>
    <script src="{{ asset('assets/global/plugins/excanvas.min.js') }}"></script>
    <![endif]-->
    <script src="{{ asset('assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/jquery-migrate.min.js') }}" type="text/javascript"></script>
    <!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
    <script src="{{ asset('assets/global/plugins/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/jquery.cokie.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/uniform/jquery.uniform.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js') }}"></script>
    <script src="{{ asset('assets/global/plugins/bootstrap-markdown/lib/markdown.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/bootstrap-markdown/js/bootstrap-markdown.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/bootstrap-summernote/summernote.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/scripts/metronic.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/layout/scripts/layout.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/layout/scripts/quick-sidebar.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/layout/scripts/demo.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/admin/pages/scripts/components-editors.js') }}"></script>
<!-- BEGIN GOOGLE RECAPTCHA -->
<script type="text/javascript">
        var RecaptchaOptions = {
           theme : 'custom',
           custom_theme_widget: 'recaptcha_widget'
        };
    </script>
@endsection