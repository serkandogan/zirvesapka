@extends('admin.layouts.layout-admin')

@section('content')

    @include('admin._partials.breadcrumb', ['category' => 'Sayfalar', 'page' => 'Sayfa Düzenle'])
    <br />
    {!! Form::model($pageupdate, ['action'=>['Admin\PagesController@postUpdate', $pageupdate->id], 'files'=>true, 'method'=>'POST']) !!}
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
                                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                            </div>
                        </div>
                        <div class="form-group" style="height: 100px;">
                            <label>Sayfa Açıklaması</label>
                            {!! Form::textarea('explanation', null, ['class' => 'form-control', 'style' => 'height:80px;']) !!}
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
                                {!! Form::textarea('content', null, ['class' => 'form-control', 'id' => 'my-editor']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group ">
                <div class="form-group">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                            <img src="{!! url(image($pageupdate->Resim)) !!}" alt="" /> </div>
                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                        <div>
                                <span class="btn default btn-file">
                                <span class="fileinput-new"> Resim Seç </span>
                                <span class="fileinput-exists"> Resim Değiş </span>
                                <input type="file" name="images[]" data-oldimage="{{ $pageupdate->images }}"  multiple="true"> </span>

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
    <button type="submit" class="btn btn-default right">Sayfayı Düzenle</button>
    {!! Form::close() !!}

@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('assets/global/plugins/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('assets/global/plugins/fancybox/source/jquery.fancybox.pack.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/jquery-file-upload/js/vendor/jquery.ui.widget.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/jquery-file-upload/js/vendor/tmpl.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/jquery-file-upload/js/vendor/load-image.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/jquery-file-upload/js/vendor/canvas-to-blob.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/jquery-file-upload/blueimp-gallery/jquery.blueimp-gallery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/jquery-file-upload/js/jquery.iframe-transport.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/jquery-file-upload/js/jquery.fileupload.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/jquery-file-upload/js/jquery.fileupload-process.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/jquery-file-upload/js/jquery.fileupload-image.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/jquery-file-upload/js/jquery.fileupload-audio.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/jquery-file-upload/js/jquery.fileupload-video.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/jquery-file-upload/js/jquery.fileupload-validate.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/jquery-file-upload/js/jquery.fileupload-ui.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/pages/scripts/form-fileupload.min.js') }}" type="text/javascript"></script>
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
    <script type="text/javascript">
        var RecaptchaOptions = {
            theme : 'custom',
            custom_theme_widget: 'recaptcha_widget'
        };
    </script>
    <script type="text/javascript">
        var csrf = '{{ csrf_token() }}';
        console.log(csrf);
        CKEDITOR.replace( 'content', {
            filebrowserUploadUrl : "{{ URL::action('Admin\PagesController@postCkeditorFotoUp', $pageupdate->name) }}?_token=" + csrf
        });
    </script>
    <script>
        CKEDITOR.replace( 'my-editor', {

            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
        });
    </script>
    <script src="{!! url('/vendor/laravel-filemanager/js/lfm.js') !!}"></script>
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
    <link href="{{ asset('assets/global/plugins/fancybox/source/jquery.fancybox.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/global/plugins/jquery-file-upload/blueimp-gallery/blueimp-gallery.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/global/plugins/jquery-file-upload/css/jquery.fileupload.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/global/plugins/jquery-file-upload/css/jquery.fileupload-ui.css') }}" rel="stylesheet" type="text/css" />


@endsection
