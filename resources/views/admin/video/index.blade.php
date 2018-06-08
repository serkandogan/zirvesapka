  <style> 
        .page-container-bg-solid .page-content{
            background: #fff;
        }
    </style>
@extends('admin.layouts.layout-admin')
@section('content')
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
                <i class="fa fa-play"></i> Video Listesi

        </div>
        <div style="float:right;">
            <a href="{!! url('admin/video/create') !!}" class="btn btn-default"> <i class="fa fa-plus-circle"></i> Yeni Video Ekle </a>
        </div>
    </div>
    <span class="portlet-body">
        <span class="table-scrollable">
            <table class="table table-hover table-light">
                <thead>
                <tr>
                    <th> <b>ID</b> </th>
                    <th width="15%"> <b>Resim</b> </th>
                    <th width="15%"> <b>Başlık</b> </th>
                    <th width="15%"> <b>Ekleyen Kişi</b> </th>
                    <th> <b>Eklenen Tarih</b> </th>
                    <th> <b>Meta Düzenleme</b> </th>
                    <th> <b>Sil</b> </th>
                    <th> <b>Düzenle</b> </th>
                    <th> <b>Git</b> </th>
                </tr>
                </thead>
                <tbody>
                @forelse($videos AS $video)
                    <tr>
                        <td>
                            {{ $video->id }}
                        </td>
                        <td>
                            <img src="{!! url(image($video->image)) !!}" style="width: 100px;">
                        </td>
                        <td>
                            {{ $video->name }}
                        </td>
                        <td>
                            {{ $video->author }}
                        </td>
                        <td>
                            {{ $video->created_at }}
                        </td>
                        <td>
                            <a class="label label-info" data-toggle="modal" data-target="#hizliDuzenle{!! $video->id !!}">
                                <i class="fa fa-edit"></i> meta düzenle
                            </a>

                            <div class="modal fade" id="hizliDuzenle{!! $video->id !!}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">{!! $video->name !!} Hızlı Düzenleniyor</h4>
                                        </div>
                                        <div class="modal-body">
                                            {!! Form::model($video, ['action'=>['Admin\VideoController@postUpdate2', $video->id], 'files'=>true, 'method'=>'POST']) !!}
                                            <div class="form-group">
                                                <label>Meta Title</label>
                                                <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-edit"></i>
                                            </span>
                                                    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Meta Description</label>
                                                <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-edit"></i>
                                            </span>
                                                    {!! Form::text('description', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Meta Keyword</label>
                                                <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-edit"></i>
                                            </span>
                                                    {!! Form::text('keyword', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                                </div>
                                            </div>


                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <button style="margin-top: -7px;height: 49px;width: 100%;" type="submit" class="btn green">Değişiklikleri Kaydet</button>
                                                    </div>
                                                </div>
                                            </div>
                                            {!! Form::close() !!}

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <a href="{!! action('Admin\VideoController@getDestroy', [$video->id]) !!}" onclick="return confirm('Kaydı silmek istediğinizden emin misiniz?')" title="Sil" alt="Sil">
                                <span class="label label-sm label-danger"><b>Sil</b>  </span>
                            </a>
                         </td>
                        <td>
                            <a style="color:#fff;text-decoration: none;" title="Düzenle" alt="Düzenle" href="{!! action('Admin\VideoController@getUpdate', [$video->id]) !!}" >
                                 <span class="label label-sm label-primary"><b> Düzenle</b> </span>
                            </a>
                        </td>
                        <td>
                            <a style="color:#fff;text-decoration: none;" target="_blank" title="Siteye Git" alt="Siteye Git" href="{!! url('video/'.$video->refurl) !!}" >
                                <span class="label label-sm label-danger"><b>Git</b> </span>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8">
                            Hiç Video Eklenmemiş
                        </td>
                    </tr>

                @endforelse

                </tbody>
            </table>
        </span>
    </span>
</div>

    @endsection
