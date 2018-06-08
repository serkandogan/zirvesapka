@extends('admin.layouts.layout-admin')

@section('content')

    @include('admin._partials.breadcrumb', ['category' => 'Ürünler', 'page' => 'Ürün Ekle'])
    <br />
        <div class="row">
        {!! Form::open(['action'=>'Admin\ProductsController@postCreate', 'files'=>true,'method'=>'POST']) !!}
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
                                    <input name="Baslik" type="text" class="form-control" placeholder="Ürün Başlığını Giriniz">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Ürün Açıklaması</label>
                                <textarea name="Aciklama" class="form-control" rows="3"></textarea>
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
                                    <select class="form-control"  name="KategoriID">
                                        <option>Kategori Seçiniz</option>
                                        {!! $categorySelect !!}
                                    </select>
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
                                    <select name="MarkaID" id="MarkaID" class="form-control">
                                        <option>Marka Seçiniz</option>
                                        {!! $brandSelect !!}
                                    </select>
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
                                    <select name="TedarikciID" id="TedarikciID" class="form-control">
                                        <option>Tedarikçi Seçiniz</option>
                                        {!! $supplierSelect !!}
                                    </select>
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
                                    <select name="GrupID" id="GrupID" class="form-control">
                                        <option>Grup Seçiniz</option>
                                        {!! $groupSelect !!}
                                    </select>
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
                                <input type="text" class="form-control" name="UrunKodu" placeholder="Ürün Kodunu Giriniz...">
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
                                <input type="text" class="form-control" name="LFiyat" placeholder="Ürün Piyasa Fiyatınızı Giriniz...">
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
                                <input type="text" class="form-control" name="IndirimliFiyati" placeholder="Ürün İndirimli Fiyatınızı Giriniz...">
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
                                <input type="text" class="form-control" name="kdv" placeholder="Ürün KDV Oranı Giriniz...">
                                @if ($errors->has('IndirimliFiyati'))
                                    <div class="alert alert-danger display-hide" style="display: block;">
                                        <button class="close" data-close="alert"></button>
                                        <span>
                                        {{ $errors->first('IndirimliFiyati') }}</span>
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
                                    <textarea class="ckeditor form-control" name="Icerik"></textarea>
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
                            <div class="form-body">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <textarea name="Icerik" id="summernote_1">
                                        </textarea>
                                    </div>
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
                                           <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                                       <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                       <div>
                                                <span class="btn default btn-file">
                                                <span class="fileinput-new"> Select image </span>
                                                <span class="fileinput-exists"> Change </span>
                                                <input type="file" name="Resim[]"  multiple="true"> </span>
                                           <span class="fileinput-filename"> </span>
                                           <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                       </div>
                                   </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                           <button type="submit" class="btn btn-danger">Ürünü Kaydet / Yayınla</button>
                        </div>
                    </div>  

        {!! Form::close() !!}
        </div>
@endsection

@section('js')
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
    <!-- END PAGE LEVEL SCRIPTS -->
    <script>
        jQuery(document).ready(function() {
            // initiate layout and plugins
            // Metronic.init(); // init metronic core components
            //  Layout.init(); // init current layout
            // QuickSidebar.init(); // init quick sidebar
            // Demo.init(); // init demo features
            ComponentsEditors.init();
        });
    </script>
    <script type="text/javascript" src="{{ asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}"></script>
@endsection

@section('css')
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

