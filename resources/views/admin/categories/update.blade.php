@extends('admin.layouts.layout-admin')
@section('content')
@include('admin._partials.breadcrumb', ['category' => 'Kategori', 'page' => 'Kategoriyi Düzenle'])
{!! Form::model($categories, ['action'=>['Admin\CategoriesController@postUpdate', $categories->ID], 'files'=>true, 'method'=>'POST']) !!}
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption font-red-sunglo">
                <i class="icon-settings font-red-sunglo"></i>
                <span class="caption-subject bold uppercase"> Kategori Bilgileri</span>
            </div>
        </div>
        <div class="portlet-body form">
            <div class="form-body">
                <div class="form-group">
                    <label>Kategori Başlığı</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-edit"></i>
                        </span>
                        {!! Form::text('Baslik', null, ['class' => 'form-control', 'placeholder' => 'Kategori Başlığını Giriniz']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label>Kategori Açıklaması</label>
                    {!! Form::textarea('Aciklama', null, ['class' => 'form-control', 'placeholder' => 'Kategori Açıklaması']) !!}
                </div>
            </div>
        </div>
        <div class="portlet-title">
            <div class="caption font-red-sunglo">
                <i class="icon-settings font-red-sunglo"></i>
                <span class="caption-subject bold uppercase"> Kategori Resmi</span>
            </div>
        </div>
        <div class="form-group ">
            <div class="form-group">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                        <img src="{!! url(image($categories->Resim)) !!}" alt="" /> </div>
                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                    <div>
                    <span class="btn default btn-file">
                    <span class="fileinput-new"> Resim Seç </span>
                    <span class="fileinput-exists"> Resim Değiş </span>
                    <input type="file" name="Resim[]" data-oldimage="{{ $categories->Resim }}"  multiple="true"> </span>
                        <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Resim Sil </a>
                        <br /> <span class="fileinput-filename" name="old-resim"> </span>
                    </div>
                </div>
            </div>
            <div >
                {!! Form::text('OldImage', null, ['class' => 'form-control','type'=>'hidden']) !!}
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-danger" style="width: 100%;">Kategoriyi Güncelle</button>
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
    <link href="http://keenthemes.com/preview/metronic/theme/assets/global/plugins/jquery-multi-select/css/multi-select.css" rel="stylesheet" type="text/css" />
@endsection


@section('js')
    <script type="text/javascript" src="{{ asset('assets/global/plugins/ckeditor/ckeditor.js') }}"></script>
    <script src="http://keenthemes.com/preview/metronic/theme/assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
    <script src="http://keenthemes.com/preview/metronic/theme/assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js" type="text/javascript"></script>
    <script src="http://keenthemes.com/preview/metronic/theme/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
    <script src="http://keenthemes.com/preview/metronic/theme/assets/pages/scripts/components-multi-select.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $('#callbacks').multiSelect({
            afterSelect: function(values){
                $('#ozellik_depo').val($('#ozellik_depo').val() + values + "|");
            },
            afterDeselect: function(values){

            }
        });
    </script>
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