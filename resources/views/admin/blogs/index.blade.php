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
            <i class="fa fa-cogs"></i>Blog Yazıları

        </div>
        <div style="float:right;">
            <a href="{!! url('admin/blogs/create') !!}" class="btn btn-default"> <i class="fa fa-plus-circle"></i> Blog Yazısı Ekle </a>
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
                    <th> <b>Meta Düzenle</b> </th>
                    <th> <b>Sil</b> </th>
                    <th> <b>Düzenle</b> </th>
                    <th> <b>Git</b> </th>
                </tr>
                </thead>
                <tbody>
                @forelse($blogs AS $blog)
                    <tr>
                        <td>
                            {{ $blog->ID }}
                        </td>
                        <td>
                            <img style="width: 100px;" src="{!! url(image($blog->Resim)) !!}">
                        </td>
                        <td>
                            {{ $blog->Baslik }}
                        </td>
                        <td>
                            {{ $blog->created_at }}
                        </td>
                        <td>
                            <a class="btn btn-info" data-toggle="modal" data-target="#hizliDuzenle{!! $blog->ID !!}">
                                <i class="fa fa-edit"></i> meta düzenle
                            </a>

                            <div class="modal fade" id="hizliDuzenle{!! $blog->ID !!}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">{!! $blog->Baslik !!} Hızlı Düzenleniyor</h4>
                                        </div>
                                        <div class="modal-body">
                                            {!! Form::model($blog, ['action'=>['Admin\BlogsController@postUpdate2', $blog->ID], 'files'=>true, 'method'=>'POST']) !!}
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
                            <a href="{!! action('Admin\BlogsController@getDestroy', [$blog->ID]) !!}" onclick="return confirm('Kaydı silmek istediğinizden emin misiniz?')" title="Sil" alt="Sil">
                                <span class="label label-sm label-danger"><b>Sil</b>  </span>
                            </a>
                         </td>
                        <td>
                            <a style="color:#fff;text-decoration: none;" title="Düzenle" alt="Düzenle" href="{!! action('Admin\BlogsController@getUpdate', [$blog->ID]) !!}" >
                                 <span class="label label-sm label-primary"><b> Düzenle</b> </span>
                            </a>
                        </td>
                        <td>
                            <a style="color:#fff;text-decoration: none;" target="_blank" title="Siteye Git" alt="Siteye Git" href="{!! url('blog/'.$blog->refurl) !!}" >
                                <span class="label label-sm label-danger"><b>Git</b> </span>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8">
                            Hiç Blog Haberleri Eklenmemiş
                        </td>
                    </tr>

                @endforelse

                </tbody>
            </table>
        </span>
    </span>
</div>

    @endsection
