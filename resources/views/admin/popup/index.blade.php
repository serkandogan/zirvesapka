@extends('admin.layouts.layout-admin')
@section('content')
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs"></i> Popup
            </div>
            <button style="float: right;" type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Popup Ekle</button>

            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                    {!! Form::open(['action'=>'Admin\PopupController@postCreate', 'files'=>true, 'method'=>'POST']) !!}
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Popup Ekle</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Popup Başlığı</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-edit"></i>
                                    </span>
                                    <input name="ad" type="text" class="form-control" placeholder="Popup Başlığı">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Masaüstü Popup Resmi</label>
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=resim+sec" alt="" /> </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                    <div>
                                                <span class="btn default btn-file">
                                                <span class="fileinput-new"> Resim Seç </span>
                                                <span class="fileinput-exists"> Değiştir </span>
                                                <input type="file" name="resim[]"  multiple="true"> </span>
                                        <span class="fileinput-filename"> </span>
                                        <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Sil </a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Mobil Popup Resmi</label>
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=resim+sec" alt="" /> </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                    <div>
                                                <span class="btn default btn-file">
                                                <span class="fileinput-new"> Resim Seç </span>
                                                <span class="fileinput-exists"> Değiştir </span>
                                                <input type="file" name="mobil[]"  multiple="true"> </span>
                                        <span class="fileinput-filename"> </span>
                                        <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Sil </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                            <button type="submit" class="btn btn-primary">Popup Ekle</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>


        </div>
        <span class="portlet-body">
        <span class="table-scrollable">
            <table class="table table-hover table-light">
                <thead>
                <tr>
                    <th> <b>ID</b> </th>
                    <th> <b>Resim</b> </th>
                    <th width="15%"> <b>Başlık</b> </th>
                    <th> <b>Eklenen Tarih</b> </th>
                    <th> <b>Aktif/Pasif</b> </th>
                    <th> <b>Sil</b> </th>
                </tr>
                </thead>
                <tbody>
                @forelse($popup AS $item)
                    <tr>
                        <td>
                            {{ $item->id }}
                        </td>
                        <td>
                            <img style="width: 100px;" src="{!! url(image($item->resim)) !!}">
                        </td>
                        <td>
                            {{ $item->ad }}
                        </td>
                        <td>
                            {{ $item->tarih }}
                        </td>
                        <td>
                            @if($item->aktif==0)
                                {!! Form::model($item, ['action'=>['Admin\PopupController@postUpdate3', $item->id], 'files'=>true, 'method'=>'POST']) !!}
                                <button type="submit" class="btn btn-danger">
                                                <input name="aktif" value="0" style="display: none;" type="text"/>
                                                <i class="fa fa-times"></i>
                                            </button>
                                {!! Form::close() !!}
                            @else
                                {!! Form::model($item, ['action'=>['Admin\PopupController@postUpdate4', $item->id], 'files'=>true, 'method'=>'POST']) !!}
                                <button type="submit" class="btn btn-success">
                                                <input name="aktif" value="1" style="display: none;" type="text"/>
                                                <i class="fa fa-check"></i>
                                            </button>
                                {!! Form::close() !!}
                            @endif
                        </td>
                        <td>
                            <a href="{!! action('Admin\PopupController@getDestroy', [$item->id]) !!}" onclick="return confirm('Kaydı silmek istediğinizden emin misiniz?')" title="Sil" alt="Sil">
                                <span class="btn btn-danger"><b><i class="fa fa-trash"></i> Sil</b>  </span>
                            </a>
                         </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8">
                            Hiç Popup Eklenmemiş
                        </td>
                    </tr>

                @endforelse

                </tbody>
            </table>
        </span>
    </span>
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

