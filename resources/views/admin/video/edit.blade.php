@extends('admin.layouts.layout-admin')

@section('content')

    @include('admin._partials.breadcrumb', ['category' => 'Ürünler', 'page' => 'Ürün Düzenle'])

            <!-- END PAGE HEADER-->
       {!! Form::model($video, ['action'=>['Admin\VideoController@postUpdate', $video->id], 'files'=>true, 'method'=>'POST']) !!}
        <div class="row">

            <div class="col-md-6">
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
                                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Video Embed Kodu</label>
                                 {!! Form::textarea('embed', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                            </div>
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Videoyu Ekleyen Kişi</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-edit"></i>
                            </span>
                            <input name="author" type="text" value="{{ Auth::user()->name }}" class="form-control" placeholder="Videoyu Ekleyen Kişi">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="portlet light bordered" style="height: 508px;">
                    <div class="portlet-title">
                        <div class="caption font-red-sunglo">
                            <i class="icon-settings font-red-sunglo"></i>
                            <span class="caption-subject bold uppercase"> Video Ön İzlemesi</span>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        {!! $video->embed !!}
                    </div>
                </div>
            </div>

           
            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="form-group ">
                        <div class="form-group">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                    <img src="{!! url(image($video->image)) !!}" alt="" /> </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                <div>
                                <span class="btn default btn-file">
                                <span class="fileinput-new"> Resim Seç </span>
                                <span class="fileinput-exists"> Resim Değiş </span>
                                <input type="file" name="image[]" data-oldimage="{{ $video->Resim }}"  multiple="true"> </span>

                                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Resim Sil </a>
                                    <br /> <span class="fileinput-filename" name="old-resim"> </span>
                                </div>
                            </div>
                        </div>
                        <div style="">
                            {!! Form::text('oldimage', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div> 
        </div> 
 <button type="submit" class="btn btn-default right">Makaleyi Düzenle</button>
{!! Form::close() !!}
@endsection

@section('js')

    <script type="text/javascript" src="{{ asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}"></script>
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}"/>

@endsection
