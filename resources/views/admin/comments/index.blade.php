  <style> 
        .page-container-bg-solid .page-content{
            background: #fff;
        }
    </style>
@extends('admin.layouts.layout-admin')
@section('content')
       <div class="portlet box green">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-cogs"></i>Yorumlar
        </div>
        <div class="tools">
            <a href="javascript:;" class="collapse" data-original-title="" title="">
            </a>
            <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title="">
            </a>
            <a href="javascript:;" class="reload" data-original-title="" title="">
            </a>
            <a href="javascript:;" class="remove" data-original-title="" title="">
            </a>
        </div>
    </div>

    <div class="portlet-body flip-scroll">
        <table class="table table-bordered table-striped table-condensed flip-content">
        <thead class="flip-content">
        <tr>
            <th width="5%">
                 ID
            </th>
            <th width="7%">
                 Ad Soyad
            </th>
            <th style="width: 400px;">
                 Yorum İçeriği
            </th>
            <th>
                 Okundu / Okunmadı
            </th>
            <th>
                 Eklenen Tarih
            </th>
            <th>
                 İşlem
            </th>
        </tr>
        </thead>
        <tbody>
        @forelse($comments AS $comment)
        <tr>
            <td>
                 {{ $comment->id }}
            </td>
            <td>
                 {{ $comment->name }}
            </td>
            <td style="width: 400px;">
                 {{ $comment->comment }}
            </td>
            <td >
                @if($comment->active==1)
                    <div class="btn btn-success">Okundu</div>
                @else
                    <div class="btn btn-danger">Okunmadı</div>
                @endif
            </td>
            <td>
                 {{ $comment->created_at }}
            </td>
            <td>
                   <a href="{!! action('Admin\CommentsController@getDestroy', [$comment->id]) !!}" onclick="return confirm('Kaydı silmek istediğinizden emin misiniz?')" title="Sil">
                       <div class="btn btn-danger"><i class="fa fa-trash"></i> Yorumu Sil</div>
                   </a>
                   <a style="color:#fff;text-decoration: none;" href="{!! action('Admin\CommentsController@getUpdate', [$comment->id]) !!}" >
                   <div class="btn btn-primary"><i class="fa fa-edit"></i> Yorumu Düzenle</div></a>
            </td>
           
        </tr>
        @empty
       <tr>
            <td colspan="8">
                Hiç Yorum eklenmemiş
            </td>
        </tr>

        @endforelse

        </tbody>
        </table>

    </div>
</div>
       
    @endsection
