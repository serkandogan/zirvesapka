@extends('admin.layouts.layout-admin')

@section('content')

    @include('admin._partials.breadcrumb', ['category' => 'Videolar', 'page' => 'Video Ekle'])
    <br />
    {!! Form::open(['action'=>'Admin\VideoController@getCreate', 'files'=>true, 'method'=>'POST']) !!}
                         {!! csrf_field() !!}
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-red-sunglo">
                            <i class="icon-settings font-red-sunglo"></i>
                            <span class="caption-subject bold uppercase"> Video Bilgileri</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="form-group">
                                <label>Video Başlığı</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </span>
                                    <input name="name" type="text" class="form-control" placeholder="Video Başlığı Giriniz...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Videoyu Ekleyen Kullanıcısı</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </span>
                                    <input name="author" type="text" value="{{ Auth::user()->name }}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Video Embed Kodu</label>
                                <textarea name="embed" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="portlet-title">
                            <div class="caption font-red-sunglo">
                                <i class="icon-settings font-red-sunglo"></i>
                                <span class="caption-subject bold uppercase"> Video Seçenekleri</span>
                            </div>
                        </div>
                    <div class="portlet-body form">
                        <div class="form-group">
                            <div class="form-group">
                                <label class="control-label">Videoya Resim Yükleyin</label>
                                <input id="input-1" name="image[]" type="file" class="file" multiple="true">
                            </div>
                        </div>
                    </div>
                    <div class="portlet light bordered">
                        <button type="submit" class="btn btn-danger"> Videoyu Ekle </button>
                    </div>
                </div>
            </div>  
            
            <div class="col-md-6">

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

