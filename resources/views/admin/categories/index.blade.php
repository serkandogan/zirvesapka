@extends('admin/layouts.layout-admin')
@section('title')
    Kategori Yönetimi
@endsection
@section('content')
    @include('admin._partials.breadcrumb', ['category' => 'Kategoriler', 'page' => 'Kategori Listesi'])
    <br />
    <div class="row">
        <div class="col-md-6">
            <div class="portlet light portlet-fit portlet-form bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class=" icon-layers font-green"></i>
                        <span class="caption-subject font-green sbold uppercase">Kategori Ekle</span>
                    </div>
                    <div class="actions">

                    </div>
                </div>
                <div class="portlet-body">
                    {!! Form::open(['action'=>'Admin\CategoriesController@postCreate', 'files'=>true,'method'=>'POST']) !!}
                    {!! csrf_field() !!}
                    <div action="#" id="form_sample_3" class="form-horizontal">
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label col-md-3">Kategori Başlığı <span class="required">
                                    * </span>
                                </label>
                                <div class="col-md-9">
                                    <input type="text" name="Baslik" data-required="1" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Kategori Açıklaması<span class="required">
                                    * </span>
                                </label>
                                <div class="col-md-9">
                                    <textarea type="hidden" class="form-control" value="" name="Aciklama" cols="55"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">Üst Kategorisini Seç<span class="required">
                                    * </span>
                                </label>
                                <div class="col-md-9">
                                    <select class="form-control select2me"  name="gid">
                                        <option>Kategori Seçiniz...</option>
                                        {!! $categorySelect !!}
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3">Kategori Resmi<span class="required">
                                    * </span>
                                </label>
                                <div class="col-md-9">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=resim+yükle" alt="" /> </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                        <div>
                                                <span class="btn default btn-file">
                                                     <span class="fileinput-new"> <i class="fa fa-picture-o"></i> Resim Seç </span>
                                                     <span class="fileinput-exists"> <i class="fa fa-edit"></i> Değiş </span>
                                                    <input type="file" name="Resim[]" multiple="true">
                                                </span>
                                            <div class="col-md-12">
                                                <span style="border: 1px solid #ccc;padding: 10px;margin-left: -15px;margin-top: 10px;width: 100%;" class="fileinput-filename"> </span>
                                            </div>
                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput">
                                                <i class="fa fa-trash-o"></i> Sil
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button style="width: 100%;" type="submit" class="btn btn-danger">Kategoriyi Ekle</button>
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="portlet light portlet-fit portlet-form bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class=" icon-layers font-red"></i>
                        <span class="caption-subject font-red sbold uppercase">Kategoriler</span>
                    </div>
                    <div class="actions">
                        <i class="btn btn-primary fa fa-edit" ></i> Kategoriyi Sil
                        <i class="btn btn-danger fa fa-trash-o" ></i> Kategoriyi Sil
                        <a href="javascript:void(0);" class="categorySave btn btn-default"><i class="fa fa-check"></i> İşlemi Kaydet</a>

                    </div>
                </div>
                <div class="portlet-body">

                    <div class="dd" id="nestable_list_3">
                        {!! $categoryData !!}
                    </div>
                    <a style="width: 100%;" href="javascript:void(0);" class="categorySave btn btn-danger"><i class="fa fa-check"></i> İşlemi Kaydet</a>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('css')
    <link href="{{ asset('assets/global/plugins/jquery-nestable/jquery.nestable.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/plugins/jquery-multi-select/css/multi-select.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}"/>
    <style type="text/css">
        .btn-xs-m {margin: 5px;}
    </style>
@endsection

@section('js')
    <script src="{{ asset('assets/plugin/nestable/1.0/js/jquery.nestable.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}"></script>
    <script type="text/javascript">
        $(function(){
            $('.dd').nestable();
            $('.dd-handle a').on('mousedown', function(event){ event.stopPropagation() });
            $('.categorySave').on('click', function(event){
                event.preventDefault();
                var token = "{!! csrf_token() !!}";
                var changeData =  window.JSON.stringify($('.dd').nestable('serialize'));
                var url = "{!! clink('categorySave') !!}?_token="+token+"&data="+changeData;

                $.getJSON(url, function(data){
                    console.log(data);
                });
                // jquery ajax dersleri
            });
        });
    </script>
@endsection
