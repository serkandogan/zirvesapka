@extends('admin.layouts.layout-admin')

@section('content')

    @include('admin._partials.breadcrumb', ['category' => 'Sayfalar', 'page' => 'Sayfa Ekle'])
    <br />
    {!! Form::open(['action'=>'Admin\PagesController@getCreate', 'files'=>true, 'method'=>'POST']) !!}
    {!! csrf_field() !!}
    <div class="row">

        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="icon-settings font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase"> Sayfa Bilgileri</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <div class="form-body">
                        <div class="form-group">
                            <label>Sayfa Başlığı</label>
                            <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </span>
                                <input name="name" type="text" class="form-control" placeholder="Sayfa Başlığını Giriniz">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Sayfa Açıklaması</label>
                            <textarea name="explanation" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Sayfa Menüde Gözüksün Mü?</label>
                            <select name="menu" class="form-control">
                                <option value="0">Seçiniz</option>
                                <option value="1">Evet</option>
                                <option value="2">Hayır</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Ebeveyn Sayfa Seçiniz</label>
                            <select id="single" class="form-control select2" name="gid">
                                <option value="0">Seçiniz</option>
                                {!! $altpage !!}
                            </select>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="icon-settings font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase"> Sayfa İçeriği</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <div class="form-body">
                        <div class="form-body">
                            <div class="form-group last">
                                <textarea class="ckeditor form-control" name="content"></textarea>
                                @if ($errors->has('content'))
                                    <div class="alert alert-danger display-hide" style="display: block;">
                                        <button class="close" data-close="alert"></button>
                                            <span>
                                               {{ $pages->content }}
                                            </span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="form-group">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                    <img src="" alt="" /> </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                <div>
                                <span class="btn default btn-file">
                                <span class="fileinput-new"> Resim Seç </span>
                                <span class="fileinput-exists"> Resim Değiş </span>
                                <input type="file" name="images[]" data-oldimage=""  multiple="true"> </span>

                                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Resim Sil </a>
                                    <br /> <span class="fileinput-filename" name="old-resim"> </span>
                                </div>
                            </div>
                        </div>
                        <div style="">
                            {!! Form::text('OldImage', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-default right">Sayfayı Ekle</button>
    {!! Form::close() !!}

@endsection

@section('js')
    <script src="http://keenthemes.com/preview/metronic/theme/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
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
    <link href="http://keenthemes.com/preview/metronic/theme/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="http://keenthemes.com/preview/metronic/theme/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/plugins/bootstrap-select/bootstrap-select.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/plugins/select2/select2.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/plugins/jquery-multi-select/css/multi-select.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/plugins/jquery-tags-input/jquery.tagsinput.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/plugins/typeahead/typeahead.css') }}">

@endsection

