@extends('admin.layouts.layout-admin')

@section('content')

@include('admin._partials.breadcrumb', ['category' => 'Ürünler', 'page' => 'Markaların Listesi'])
<div class="portlet box green">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-cogs"></i>Tüm Markaların Listesi
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
            <th>
                 Başlık
            </th>
            <th class="numeric">
                 Durum
            </th>
        </tr>
        </thead>
        <tbody>
        @forelse($groups AS $group)
        <tr>
            <td>
                 <a href="{{ url('admin/groups/'.$group->ID) }}">{{ $group->ID }}</a>
            </td>
            <td>
                 {{ $group->Baslik }}
            </td>
            <td class="numeric">
               <a href="{{ url('admin/groups/'.$group->ID.'/edit') }}" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Düzenle">
                    <i class="fa fa-edit"></i>
               </a>

                <a href="{!! route('admin.groups.destroy', $group->ID) !!}" data-method="DELETE" data-token="{{ csrf_token() }}" data-confirm="ürün" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Sil"><i class="fa fa-trash"></i></a>

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
        {{ $groups->render() }}
    </div>
</div>
@endsection