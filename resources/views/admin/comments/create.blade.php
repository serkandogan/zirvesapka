@extends('admin.layouts.layout-admin')

@section('content')

    @include('admin._partials.breadcrumb', ['category' => 'Makaleler', 'page' => 'Makale Ekle'])
    <br />
    {!! Form::open(['action'=>'Admin\CommentsController@getCreate', 'files'=>true, 'method'=>'POST']) !!}
                         {!! csrf_field() !!}
        <div class="row">
            <div class="col-md-6">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-red-sunglo">
                            <i class="icon-settings font-red-sunglo"></i>
                            <span class="caption-subject bold uppercase"> Makale Bilgileri</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="form-group">
                                <label>Makale Başlığı</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </span>
                                    <input name="Baslik" type="text" class="form-control" placeholder="Makale Başlığını Giriniz">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Makale Kullanıcısı</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </span>
                                    <input name="author" type="text" value="{{ Auth::user()->name }}" class="form-control" placeholder="Makale yazarını Giriniz">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Makale Açıklaması</label>
                                <textarea name="Aciklama" class="form-control" rows="3"></textarea>
                            </div>
                            
                        </div>
                    </div>
                    <div class="portlet-title">
                            <div class="caption font-red-sunglo">
                                <i class="icon-settings font-red-sunglo"></i>
                                <span class="caption-subject bold uppercase"> Makale Seçenekleri</span>
                            </div>
                        </div>
                    <div class="portlet-body form">
                        <div class="form-group">
                            <label>Haber Kategorisi:</label>

                            <div class="form-group">
                                <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </span>
                                    <select class="form-control"  name="KategoriID">
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
                                @if ($errors->has('KategoriID'))
                                <div class="alert alert-danger display-hide" style="display: block;">
                                    <button class="close" data-close="alert"></button>
                                            <span>
                                            {{ $errors->first('KategoriID') }}</span>
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="control-label">Resim Yükleyin</label>
                                <input id="input-1" name="Resim[]" type="file" class="file" multiple="true">
                            </div>
                        </div>
                    </div>
                            <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption font-red-sunglo">
                                <i class="icon-settings font-red-sunglo"></i>
                                <span class="caption-subject bold uppercase"> Makaleyi Yayınla</span>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-danger">Makaleyi Yayınla</button>
                    </div> 
                </div>
            </div>  
            
            <div class="col-md-6">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-red-sunglo">
                            <i class="icon-settings font-red-sunglo"></i>
                            <span class="caption-subject bold uppercase"> Makale İçeriği</span>
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
                                               {{ $blog->Icerik }}
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
        {!! Form::close() !!}
@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('assets/global/plugins/ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/global/plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/global/plugins/select2/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/global/plugins/fuelux/js/spinner.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/global/plugins/jquery.input-ip-address-control-1.0.min.js') }}"></script>
    <script src="{{ asset('assets/global/plugins/bootstrap-pwstrength/pwstrength-bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/jquery-tags-input/jquery.tagsinput.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/typeahead/handlebars.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/typeahead/typeahead.bundle.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('assets/global/plugins/ckeditor/ckeditor.js') }}"></script>
    






<script>
        jQuery(document).ready(function() {       
           // initiate layout and plugins
            Metronic.init(); // init metronic core components
            Layout.init(); // init current layout
            QuickSidebar.init(); // init quick sidebar
            Demo.init(); // init demo features
            ComponentsFormTools.init();
            ComponentsDropdowns.init();
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

@section('css')

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/plugins/bootstrap-select/bootstrap-select.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/plugins/select2/select2.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/plugins/jquery-multi-select/css/multi-select.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/plugins/jquery-tags-input/jquery.tagsinput.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/plugins/typeahead/typeahead.css') }}">

@endsection

