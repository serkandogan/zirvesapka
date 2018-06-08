<style>
    .page-container-bg-solid .page-content {
        background: #fff;
    }
</style>
@extends('admin.layouts.layout-admin')
@section('content')


    <div class="row">
        <div class="portlet light bordered" style="    height: 262px;">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-settings font-green-sharp"></i>
                    <span class="caption-subject font-green-sharp bold uppercase">ÜRÜN FİLİTRELE</span>
                </div>
                <div class="actions">

                </div>
            </div>
            <div class="portlet-body">
                <div class="col-md-12">
                    {!! Form::open(['action'=>'Admin\ProductsController@getSeach', 'files'=>true,'method'=>'GET']) !!}
                    <div class="col-md-3">
                        <label for="">Ürün Adı</label>
                        <input type="text" name="ad" id="q" class="form-control" autocomplete="on" placeholder="Ürün Adı" value="{{Input::get('ad')}}"/>
                    </div>
                    <div class="col-md-3">
                        <label for="">Ürün Kodu</label>
                        <input type="text" name="kod" class="form-control" autocomplete="on" placeholder="Ürün Kodu" value="{{Input::get('kod')}}"/>
                    </div>
                    <div class="col-md-3">
                        <label for="">Ürün Kategorisi</label>
                        <select name="k" class="form-control">
                            <option value="">Kategori Seçin</option>
                            {!! $categorySelect !!}
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="">Ürün Markası</label>
                        <select name="m" class="form-control">
                            <option value="">Marka Seçin</option>
                            {!! $brandSelect !!}
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="">Ürün Grubu</label>
                        <select name="g" class="form-control">
                            <option value="">Grup Seçin</option>
                            {!! $groupSelect !!}
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="">Ürün Tedarikçisi</label>
                        <select name="t" class="form-control">
                            <option value="">Tedarikçi Seçin</option>
                            {!! $supplierSelect !!}
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="">Maliyet Fiyatı</label>
                        <input type="text" name="f1" class="form-control" autocomplete="on" placeholder="Maliyet Fiyatı" value="{{Input::get('f1')}}"/>
                    </div>
                    <div class="col-md-3">
                        <label for="">İndirimli Fiyatı</label>
                        <input type="text" name="f2" class="form-control" autocomplete="on" placeholder="İndirimli Fiyatı" value="{{Input::get('f2')}}"/>
                    </div>


                    <div class="col-md-12"><button style="width: 100%;margin-top:10px;" type="submit" value="ARA" class="btn btn-primary">FİLİTRELE</button></div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase"> Ürünler</span>
                    </div>
                    <div class="actions">
                        <a class=""><i class="btn btn-primary fa fa-edit"></i> Ürünü Düzenle</a>
                        <a class=""><i class="btn btn-danger fa fa-trash-o"></i> Ürünü Sil</a>
                        <a class=""><i class="btn btn-success fa fa-rocket"></i> Ürüne Git</a>
                        <a class=""><i class="btn btn-danger fa fa-picture-o"></i> Ürün Galerisi</a>
                        <a class=""><i class="btn btn-success fa fa-magnet"></i> Ürüne Git</a>
                    </div>
                </div>
                <div class="portlet-body">
                    <a href="{!! url('admin/products/create') !!}" class="btn btn-default" style="float:right;"><i class="fa fa-plus-circle"></i> Yeni Ürün Ekle</a>
                    <br />
                    <hr />

                    <table class="table table-hover table-light" style="border-top:1px solid #ccc;margin-top: 10px;">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th> Resim</th>
                            <th width="18%"> Başlık</th>
                            <th> Kategori</th>
                            <th> Ürün Kodu</th>
                            <th> Maliyet</th>
                            <th> İndirimli Fiyatı</th>
                            <th> Kampanyalı Ürün</th>
                            <th> Fırsat Ürünü</th>
                            <th>Meta Düzenle</th>
                            <th> Yönetim</th>
                            <th> Hızlı Yönetim</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($products AS $product)
                            <tr>
                                <td>{{ $product->ID }}</td>
                                <td>
                                    <img style="width: 70px;" src="{!! url(image($product->Resim)) !!}"/>
                                </td>
                                <td>{{ $product->Baslik }}</td>
                                <td>{{ $product->category['Baslik'] }}</td>
                                <td>{{ $product->UrunKodu }}</td>
                                <td>{{ $product->LFiyat }} <i class="fa fa-try"></i></td>
                                <td>{{ $product->IndirimliFiyati }} <i class="fa fa-try"></i></td>
                                <td>
                                    <div class="col-md-9">
                                        @if($product->KampanyaliUrun==0)
                                            {!! Form::model($product, ['action'=>['Admin\ProductsController@postUpdate3', $product->ID], 'files'=>true, 'method'=>'POST']) !!}
                                            <button type="submit" class="btn btn-danger">
                                                <input name="KampanyaliUrun" value="0" style="display: none;" type="text"/>
                                                <i class="fa fa-times"></i>
                                            </button>
                                            {!! Form::close() !!}
                                        @else
                                            {!! Form::model($product, ['action'=>['Admin\ProductsController@postUpdate4', $product->ID], 'files'=>true, 'method'=>'POST']) !!}
                                            <button type="submit" class="btn btn-success">
                                                <input name="KampanyaliUrun" value="1" style="display: none;" type="text"/>
                                                <i class="fa fa-check"></i>
                                            </button>
                                            {!! Form::close() !!}
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <div class="col-md-9">
                                        @if($product->FirsatUrun==0)
                                            {!! Form::model($product, ['action'=>['Admin\ProductsController@postUpdatet1', $product->ID], 'files'=>true, 'method'=>'POST']) !!}
                                            <button type="submit" class="btn btn-danger">
                                                <input name="FirsatUrun" value="0" style="display: none;" type="text"/>
                                                <i class="fa fa-times"></i>
                                            </button>
                                            {!! Form::close() !!}
                                        @else
                                            {!! Form::model($product, ['action'=>['Admin\ProductsController@postUpdatet2', $product->ID], 'files'=>true, 'method'=>'POST']) !!}
                                            <button type="submit" class="btn btn-success">
                                                <input name="FirsatUrun" value="1" style="display: none;" type="text"/>
                                                <i class="fa fa-check"></i>
                                            </button>
                                            {!! Form::close() !!}
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <a class="btn btn-info" data-toggle="modal" data-target="#hizliDuzenle{!! $product->ID !!}">
                                        <i class="fa fa-edit"></i> meta düzenle
                                    </a>

                                    <div class="modal fade" id="hizliDuzenle{!! $product->ID !!}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">{!! $product->Baslik !!} Hızlı Düzenleniyor</h4>
                                                </div>
                                                <div class="modal-body">
                                                    {!! Form::model($product, ['action'=>['Admin\ProductsController@postUpdateMeta', $product->ID], 'files'=>true, 'method'=>'POST']) !!}
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
                                    <a style="padding: 5px;" href="{!! action('Admin\ProductsController@getUpdate', [$product->ID]) !!}" class="" type="button" data-toggle="tooltip" title="Düzenle">
                                        <span style="margin-top:5px;" class="label label-sm label-primary">düzenle</span>
                                    </a>
                                    <a class="" style="color:#fff;" href="{!!  action('Admin\ProductsController@getDestroy', [$product->ID]) !!}"
                                       onclick="return confirm('Silmek istediğinizden emin misiniz?');"><span style="margin-top:5px;" class="label label-sm label-danger">sil</span></a>
                                    <a class="" style="padding: 5px;" target="_blank" href="{!! url($product->refurl.'-u-'.$product->ID.'.html') !!}"><span style="margin-top:5px;"
                                                                                                                                                            class="label label-sm label-success">git</span></a>
                                    <a class="btn btn-success" style="color:#fff;" href="{!! url('admin/product/copyproduct/'.$product->ID) !!}">
                                        <i class="fa fa-files-o"></i>
                                    </a>
                                </td>
                                <td>
                                    <a class="" data-toggle="modal" data-target="#hizliDuzenle{!! $product->ID !!}"><span style="margin-top:5px;"
                                                                                                                          class="label label-sm label-success">hizli düzenle</span> </a>
                                    <div class="modal fade" id="hizliDuzenle{!! $product->ID !!}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">{!! $product->Baslik !!} Hızlı Düzenleniyor</h4>
                                                </div>
                                                <div class="modal-body">
                                                    {!! Form::model($product, ['action'=>['Admin\ProductsController@postUpdate2', $product->ID], 'files'=>true, 'method'=>'POST']) !!}
                                                    <div class="form-group">
                                                        <label>Ürün Başlığı</label>
                                                        <div class="input-group">
                                                                            <span class="input-group-addon">
                                                                                <i class="fa fa-edit"></i>
                                                                            </span>
                                                            {!! Form::text('Baslik', null, ['class' => 'form-control', 'placeholder' => 'Ürün Başlığını Giriniz']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Ürün Kategorisi:</label>
                                                        <div class="input-group">
                                                                            <span class="input-group-addon">
                                                                                <i class="fa fa-edit"></i>
                                                                            </span>
                                                            {!! Form::select('KategoriID', $categories, old('KategoriID'), ['class' => 'form-control', 'placeholder' => 'Kategori Seçiniz...']) !!}
                                                            @if ($errors->has('KategoriID'))
                                                                <div class="alert alert-danger display-hide" style="display: block;">
                                                                    <button class="close" data-close="alert"></button>
                                                                    <span>{{ $errors->first('KategoriID') }}</span>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Ürün Markası:</label>
                                                        <div class="input-group">
                                                                            <span class="input-group-addon">
                                                                                <i class="fa fa-edit"></i>
                                                                            </span>
                                                            {!! Form::select('MarkaID', $brand, old('MarkaID'), ['class' => 'form-control', 'placeholder' => 'Marka Seçiniz...']) !!}
                                                            @if ($errors->has('MarkaID'))
                                                                <div class="alert alert-danger display-hide" style="display: block;">
                                                                    <button class="close" data-close="alert"></button>
                                                                    <span>{{ $errors->first('MarkaID') }}</span>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Ürün Tedarikçisi:</label>
                                                        <div class="input-group">
                                                                            <span class="input-group-addon">
                                                                                <i class="fa fa-edit"></i>
                                                                            </span>
                                                            {!! Form::select('TedarikciID', $tedarikci, old('TedarikciID'), ['class' => 'form-control', 'placeholder' => 'Tedarikçi Seçiniz...']) !!}
                                                            @if ($errors->has('TedarikciID'))
                                                                <div class="alert alert-danger display-hide" style="display: block;">
                                                                    <button class="close" data-close="alert"></button>
                                                                    <span>{{ $errors->first('TedarikciID') }}</span>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Ürün Grubu:</label>
                                                        <div class="input-group">
                                                                            <span class="input-group-addon">
                                                                                <i class="fa fa-edit"></i>
                                                                            </span>
                                                            {!! Form::select('GrupID', $grup, old('GrupID'), ['class' => 'form-control', 'placeholder' => 'Grup Seçiniz...']) !!}
                                                            @if ($errors->has('GrupID'))
                                                                <div class="alert alert-danger display-hide" style="display: block;">
                                                                    <button class="close" data-close="alert"></button>
                                                                    <span>{{ $errors->first('GrupID') }}</span>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Ürün Kodu:</label>
                                                        <div class="input-group">
                                                                            <span class="input-group-addon">
                                                                                <i class="fa fa-edit"></i>
                                                                            </span>
                                                            {!! Form::text('UrunKodu', null, ['class' => 'form-control', 'placeholder' => 'Ürün Kodunu Giriniz...']) !!}
                                                            @if ($errors->has('UrunKodu'))
                                                                <div class="alert alert-danger display-hide" style="display: block;">
                                                                    <button class="close" data-close="alert"></button>
                                                                    <span>{{ $errors->first('UrunKodu') }}</span>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Ürün Piyasa Fiyatı:</label>
                                                        <div class="input-group">
                                                                            <span class="input-group-addon">
                                                                                <i class="fa fa-turkish-lira"></i>
                                                                            </span>
                                                            {!! Form::text('LFiyat', null, ['class' => 'form-control', 'placeholder' => 'Ürün Piyasa Fiyatınızı Giriniz...']) !!}
                                                            @if ($errors->has('LFiyat'))
                                                                <div class="alert alert-danger display-hide" style="display: block;">
                                                                    <button class="close" data-close="alert"></button>
                                                                    <span>{{ $errors->first('LFiyat') }}</span>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Ürün İndirimli Fiyatı:</label>
                                                        <div class="input-group">
                                                                            <span class="input-group-addon">
                                                                                <i class="fa fa-turkish-lira"></i>
                                                                            </span>
                                                            {!! Form::text('IndirimliFiyati', null, ['class' => 'form-control', 'placeholder' => 'Ürün İndirimli Fiyatınızı Giriniz...']) !!}
                                                            @if ($errors->has('IndirimliFiyati'))
                                                                <div class="alert alert-danger display-hide" style="display: block;">
                                                                    <button class="close" data-close="alert"></button>
                                                                    <span>{{ $errors->first('IndirimliFiyati') }}</span>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <label>Haftanın Fırsatı</label>
                                                    <hr/>
                                                    <div class="form-group">
                                                        <label>Gün:</label>
                                                        {!! Form::text('Gun', null, ['class' => 'form-control', 'placeholder' => 'Haftanın Ürününün Gün Alanını Giriniz...']) !!}
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Ay:</label>
                                                        {!! Form::text('Ay', null, ['class' => 'form-control', 'placeholder' => 'Haftanın Ürününün Ay Alanını Giriniz...']) !!}
                                                    </div>
                                                    <b>Ürün İçerik Alanı</b>
                                                    <hr/>
                                                    <div class="form-group">
                                                        {!! Form::textarea('ozellik', null, ['class' => 'ckeditor form-control']) !!}
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
                                    <a class="" style="color:#fff;" href="{!! url('admin/gallery/image/'.$product->ID) !!}">
                                        <span style="margin-top:5px;" class="label label-sm label-danger">galeri</span>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="12">
                                    Hiç Ürün eklenmemiş
                                </td>
                            </tr>
                        @endforelse

                        </tbody>
                    </table>
                    {!! $products->render() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{ asset('assets/global/scripts/datatable.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="{{ asset('assets/global/scripts/app.min.js') }}" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('assets/pages/scripts/table-datatables-managed.min.js') }}" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <script type="text/javascript" src="{{ asset('assets/global/plugins/ckeditor/ckeditor.js') }}"></script>
@endsection
@section('css')

    <link href="{{ asset('assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css"/>
    <style type="text/css">
        .dataTables_filter {
            display: none;
        }

        .dataTables_paginate {
            display: none;
        }
    </style>
@endsection