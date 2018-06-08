@extends('admin.layouts.layout-admin')

@section('content')

    @include('admin._partials.breadcrumb', ['category' => 'Ürün Galerisi', 'page' => 'Ürün Galerisi'])


            <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption"> {!! $product->name !!} Sayfasına Galeri Resim Ekleme
                        </div>
                        
                    </div>
                    <div class="portlet-body">
                        <div class="row">
                            <div class="col-md-12">
                                {!! Form::open(['action'=>'Admin\GalleryController2@postCreate', 'method'=>'POST', 'id'=>'fileupload', 'enctype'=>'multipart/form-data']) !!}
                                {!! Form::hidden('urunID', $product->id) !!}
                                    <div class="form-group">
                                        {!! Form::label('filename','Dosya Adı') !!}
                                        {!! Form::text('filename', $product->name, ['class'=>'form-control','placeholder'=>'Dosya Başlığını Giriniz']) !!}
                                    </div>
                                    <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                                    <div class="row fileupload-buttonbar">
                                        <div class="col-md-12">
                                            <span class="btn green fileinput-button">
                                                <i class="fa fa-plus"></i>
                                                <span>Resim Seç... </span>
                                                <input type="file" name="imagefile[]" multiple>
                                            </span>
                                            <button type="submit" class="btn blue start">
                                                <i class="fa fa-upload"></i>
                                                <span> Yüklemeyi Başlat </span>
                                            </button>
                                            <button type="reset" class="btn warning cancel">
                                                <i class="fa fa-close"></i>
                                                <span> Yüklemeyi İptal Et </span>
                                            </button>
                                            <span class="fileupload-process"> </span>
                                        </div>
                                        <!-- The global progress information -->
                                        <div class="col-lg-5 fileupload-progress fade">
                                            <!-- The global progress bar -->
                                            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                                <div class="progress-bar progress-bar-success" style="width:0%;"> </div>
                                            </div>
                                            <!-- The extended global progress information -->
                                            <div class="progress-extended"> &nbsp; </div>
                                        </div>
                                    </div>
                                    <!-- The table listing the files available for upload/download -->
                                    <table role="presentation" class="table table-striped clearfix">
                                        <tbody class="files"> </tbody>
                                    </table>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>




     








        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption"> {!! $product->name !!} Sayfası Galeri Resimleri
                </div>
            </div>

            <div class="portlet-body">
            @if(count($gallery)>0)
                <div class="row">
					@foreach($gallery as $item)
                        <div class="col-sm-4 col-md-3" style="height: 350px;">
                            <a href="#" class="thumbnail" >
                                <img style="max-height: 200px;" src="{!! galleryImg('images/'.$item->adi) !!}" alt="">
                                <span class="caption">
                                     <a style="color:#fff;width: 100%;" class="btn btn-danger" href="{!! action('Admin\GalleryController2@getDelete', [$item->id,$product->id]) !!}" onclick="return confirm('Kaydı silmek istediğinizden emin misiniz?')" title="Sil"><i class="fa fa-trash"></i> Resmi Sil</a>
                                </span>
                            </a>
                        </div>
					@endforeach
            	</div>
            @else
            	<div class="alert alert-info"><b>Bilgilendirme!</b> Kayıtlı ürün resimi bulunamadı.</div>
            @endif
           	</div>
        </div>





        <script id="template-upload" type="text/x-tmpl"> {% for (var i=0, file; file=o.files[i]; i++) { %}
                            <tr class="template-upload fade">
                                <td>
                                    <span class="preview"></span>
                                </td>
                                <td>
                                    <p class="name">{%=file.name%}</p>
                                    <strong class="error text-danger label label-danger"></strong>
                                </td>
                                <td>
                                    <p class="size">Yükleniyor...</p>
                                    <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                        <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                                    </div>
                                </td>
                                <td> {% if (!i && !o.options.autoUpload) { %}
                                    <button class="btn blue start" disabled>
                                        <i class="fa fa-upload"></i>
                                        <span>Yükle</span>
                                    </button> {% } %} {% if (!i) { %}
                                    <button class="btn red cancel">
                                        <i class="fa fa-ban"></i>
                                        <span>Sil</span>
                                    </button> {% } %} </td>
                            </tr> {% } %} </script>
        <!-- The template to display files available for download -->
        <script id="template-download" type="text/x-tmpl"> {% for (var i=0, file; file=o.files[i]; i++) { %}
                            <tr class="template-download fade">
                                <td>
                                    <span class="preview"> {% if (file.thumbnailUrl) { %}
                                        <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery>
                                            <img src="{%=file.thumbnailUrl%}">
                                        </a> {% } %} </span>
                                </td>
                                <td>
                                    <p class="name"> {% if (file.url) { %}
                                        <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl? 'data-gallery': ''%}>{%=file.name%}</a> {% } else { %}
                                        <span>{%=file.name%}</span> {% } %} </p> {% if (file.error) { %}
                                    <div>
                                        <span class="label label-success">Yüklendi</span> Resimleriniz Yüklendi. Bulunduğunuz Sayfayı Yenileyin</div> {% } %} </td>
                                <td>
                                    <span class="size">{%=o.formatFileSize(file.size)%}</span>
                                </td>
                                <td> {% if (file.deleteUrl) { %}
                                    <button class="btn red delete btn-sm" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}" {% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}' {% } %}>
                                        <i class="fa fa-trash-o"></i>
                                        <span>Sil</span>
                                    </button>
                                    <input type="checkbox" name="delete" value="1" class="toggle"> {% } else { %}
                                    <button class="btn yellow cancel btn-sm">
                                        <i class="fa fa-ban"></i>
                                        <span>İptal Et</span>
                                    </button> {% } %} </td>
                            </tr> {% } %} </script>
@endsection
@section('js')
    <script type="text/javascript">

    </script>
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

@endsection

@section('css')
    <link href="{{ asset('assets/global/plugins/fancybox/source/jquery.fancybox.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/global/plugins/jquery-file-upload/blueimp-gallery/blueimp-gallery.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/global/plugins/jquery-file-upload/css/jquery.fileupload.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/global/plugins/jquery-file-upload/css/jquery.fileupload-ui.css') }}" rel="stylesheet" type="text/css" />

@endsection