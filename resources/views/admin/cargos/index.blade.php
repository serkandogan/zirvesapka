@extends('admin.layouts.layout-admin')

@section('content')

@include('admin._partials.breadcrumb', ['category' => 'Kargolar', 'page' => 'Kargoların Listesi'])
<div class="portlet box green">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-cogs"></i>Kargoların Listesi
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
     <div class="portlet-body" style="    margin-bottom: 10px;">
                                              
        <a href="{{ url('admin/products/create') }}" class="icon-btn">
        <i class="fa fa-sitemap"></i>
        <div>
             Ürün Ekle
        </div>
        </a>             
        <a href="{{ url('admin/categories') }}" class="icon-btn">
        <i class="fa fa-sitemap"></i>
        <div>
             Tüm Kategoriler
        </div>          
        <a href="{{ url('admin/categories/create') }}" class="icon-btn">
        <i class="fa fa-sitemap"></i>
        <div>
             Kategori Ekle
        </div>
        </a>           
        <a href="{{ url('admin/pagess') }}" class="icon-btn">
        <i class="fa fa-sitemap"></i>
        <div>
            Tüm Sayfalar
        </div>
        </a>         
        <a href="{{ url('admin/pagess/create') }}" class="icon-btn">
        <i class="fa fa-sitemap"></i>
        <div>
             Sayfa aEkle
        </div>
        </a>          
        <a href="{{ url('admin/brands') }}" class="icon-btn">
        <i class="fa fa-sitemap"></i>
        <div>
            Tüm Markalar
        </div>
        </a>         
        <a href="{{ url('admin/brands/create') }}" class="icon-btn">
        <i class="fa fa-sitemap"></i>
        <div>
             Marka Ekle
        </div>
        </a>         
        <a href="{{ url('admin/groups') }}" class="icon-btn">
        <i class="fa fa-sitemap"></i>
        <div>
             Tüm Gruplar
        </div>
        </a>       
        <a href="{{ url('admin/groups/create') }}" class="icon-btn">
        <i class="fa fa-sitemap"></i>
        <div>
             Grup Ekle
        </div>
        </a>
       
    </div>
    <div class="portlet-body flip-scroll">
        <table class="table table-bordered table-striped table-condensed flip-content">
        <thead class="flip-content">
        <tr>
            <th width="5%">
                 ID
            </th>
            <th width="5%">
                 Resim
            </th>
            <th width="10%">
                 Başlık
            </th>
            <th>
                 Açıklama
            </th>
            <th>
                 Fiyat
            </th>
            <th>
                 Kargo Sorgu URL'si
            </th>
            <th>
                 Kargo Sorgu Kullanıcı Adı
            </th>
            <th>
                 Kargo Sorgu Şifresi
            </th>
            <th>
                 Kargo Servis Demo URL
            </th>
            <th>
                 Kargo Servis URL
            </th>
            <th>
                 Kargo No
            </th>
            <th width="8%" class="numeric">
                 Durum
            </th>
        </tr>
        </thead>
        <tbody>
        @forelse($cargos AS $cargo)
        <tr>
            <td>
                 <a href="{{ url('admin/cargos/'.$cargo->ID) }}">{{ $cargo->ID }}</a>
            </td>
            <td>
                 <i class="fa fa-picture-o"></i>
            </td>
            <td>
                 {{ $cargo->Baslik }}
            </td>
            <td>
                 {{ $cargo->Aciklama }}
            </td>
            <td>
                 {{ $cargo->Fiyat }}
            </td>
            <td>
                 {{ $cargo->SorguURL }}
            </td>
            <td>
                 {{ $cargo->KullaniciAdi }}
            </td>
            <td>
                 {{ $cargo->Sifre }}
            </td>
            <td>
                 {{ $cargo->ServisDemoURL }}
            </td>
            <td>
                 {{ $cargo->ServisURL }}
            </td>
            <td>
                 {{ $cargo->KargoNo }}
            </td>
            <td class="numeric">
               <a href="{{ url('admin/cargos/'.$cargo->ID.'/edit') }}" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Düzenle">
                    <i class="fa fa-edit"></i>
               </a>

                <a href="{!! route('admin.cargos.destroy', $cargo->ID) !!}" data-method="DELETE" data-token="{{ csrf_token() }}" data-confirm="ürün" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Sil"><i class="fa fa-trash"></i></a>

            </td>
        </tr>
        @empty
       <tr>
            <td colspan="8">
                Hiç Ürün eklenmemiş
            </td>
        </tr>

        @endforelse

        </tbody>
        </table>
        {{ $cargos->render() }}
    </div>
</div>
@endsection