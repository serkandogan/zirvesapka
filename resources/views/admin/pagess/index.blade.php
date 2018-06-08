@extends('admin.layouts.layout-admin')

@section('content')

    @include('admin._partials.breadcrumb', ['category' => 'Sayfalar', 'page' => 'Sayfaların Listesi'])
    <br />
    <a href="{!! url('admin/pagess/create') !!}" class="btn btn-danger"><i class="fa fa-plus"></i> Yeni Sayfa Ekle</a>
    <a class="btn btn-success" href="javascript:history.back(-1)"> <i class="fa fa-undo"></i> Geri Dön</a>

    <div style="float:right;">
        <div class="label label-danger fa fa-trash"></div> Sayfayı Sil
        <div class="label label-primary fa fa-edit"></div> Sayfayı Düzenle
        <div class="label label-warning fa fa-rocket"></div> Sayfayı Sitede Gör
    </div>
    <br />
    <br />

    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs"></i>Genel İçerik
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
            <table class="table table-responsive table-striped table-condensed flip-content">
                <thead class="flip-content">
                <tr>
                    <th width="5%">
                        ID
                    </th>
                    <th>
                        İçerik Adı
                    </th>
                    <th>
                        Alt Sayfa
                    </th>
                    <th>
                        Meta Düzenle
                    </th>
                    <th>
                        İşlem
                    </th>
                </tr>
                </thead>
                <tbody>
                @forelse($pages AS $page)
                    <tr>
                        <td>
                            <a href="{{ url('admin/pagess/index/'.$page->id) }}">{{ $page->id }}</a>
                        </td>
                        <td>
                            {{ $page->name }}
                        </td>
                        <td>
                            <a href="{!! url('admin/pagess/index/'.$page->id) !!}"><i class="fa fa-list-alt"></i>  {{ count(App\Models\Page::where('gid','=',$page->id)->get()) }}</a>
                        </td>
                        <td>
                            <a class="label label-info" data-toggle="modal" data-target="#hizliDuzenle{!! $page->id !!}">
                                <i class="fa fa-edit"></i> meta düzenle
                            </a>

                            <div class="modal fade" id="hizliDuzenle{!! $page->id !!}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">{!! $page->name !!} Hızlı Düzenleniyor</h4>
                                        </div>
                                        <div class="modal-body">
                                            {!! Form::model($page, ['action'=>['Admin\PagesController@postUpdate2', $page->id], 'files'=>true, 'method'=>'POST']) !!}
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
                            <a href="{!! action('Admin\PagesController@getDelete', [$page->id]) !!}" onclick="return confirm('Kaydı silmek istediğinizden emin misiniz?')" title="Sil">
                                <i class="label label-danger fa fa-trash"></i>
                            </a>
                            <a style="color:#fff;text-decoration: none;" href="{!! action('Admin\PagesController@getUpdate', [$page->id]) !!}" >
                                <i class="label label-primary fa fa-edit"></i>
                            </a>
                            <a target="_blank" class="" href="{!! url('sayfa/'.$page->url) !!}">
                                <i class="label label-warning fa fa-rocket"></i>
                            </a>
                            <a  style="color:#fff;" title="Galeri" alt="Galeri" href="{!! url('admin/gallery2/image/'.$page->id) !!}">
                                <i class="label label-success fa fa-picture-o"></i>
                            </a>
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="8">
                            Hiç İçerik eklenmemiş
                        </td>
                    </tr>

                @endforelse

                </tbody>
            </table>
            {{ $pages->render() }}
        </div>
    </div>
@endsection
@section('css')
    <script src="https://use.fontawesome.com/a32e5347ea.js"></script>
@endsection