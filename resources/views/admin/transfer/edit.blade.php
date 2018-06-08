@extends('admin.layouts.layout-admin')

@section('content')

    @include('admin._partials.breadcrumb', ['category' => 'Hesap Bilgileri', 'page' => 'Hesap Bilgisini Düzenle'])
    <br />
     {!! Form::model($pageupdate, ['action'=>['Admin\TransferController@postUpdate', $pageupdate->id], 'files'=>true, 'method'=>'POST']) !!}
        <div class="row">

            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-red-sunglo">
                            <i class="icon-settings font-red-sunglo"></i>
                            <span class="caption-subject bold uppercase"> Hesap Bilgileri</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <div class="form-body">
                            <div class="form-group">
                                <label>Banka İsmi</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </span>
                                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Hesap Türü</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </span>
                                    {!! Form::text('kind', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Hesap Adı</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </span>
                                    {!! Form::text('account_name', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Şube Adı</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </span>
                                    {!! Form::text('branch_name', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Şube Kodu</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </span>
                                    {!! Form::text('branch_code', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Hesap No</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </span>
                                    {!! Form::text('account_number', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label>IBAN</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </span>
                                    {!! Form::text('iban', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                </div>
                            </div>

                            
                        </div>
                    </div>
                </div>
            </div>  
        </div>
 <button type="submit" class="btn btn-default right">Hesabı Düzenle Düzenle</button>
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
            ComponentsFormTools.init();
            ComponentsDropdowns.init();
        });   
    </script>
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

