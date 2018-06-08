@extends('admin.layouts.layout-admin')

@section('content')

@include('admin._partials.breadcrumb', ['category' => 'Sipariş Durumları', 'page' => 'Sipariş Durumlarının Listesi'])
<div class="portlet box green">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-cogs"></i>Sipariş Durumlarının Listesi
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
            <th>
                 Başlık
            </th>
            <th class="numeric">
                 Durum
            </th>
        </tr>
        </thead>
        <tbody>
        @forelse($orderstatuss AS $orderstatus)
        <tr>
            <td>
                 <a href="{{ url('admin/orderstatuss/'.$orderstatus->ID) }}">{{ $orderstatus->ID }}</a>
            </td>
            <td>
                 {{ $orderstatus->Baslik }}
            </td>
            <td class="numeric">
               <a href="{{ url('admin/orderstatuss/'.$orderstatus->ID.'/edit') }}" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Düzenle">
                    <i class="fa fa-edit"></i>
               </a>

                <a href="{!! route('admin.orderstatuss.destroy', $orderstatus->ID) !!}" data-method="DELETE" data-token="{{ csrf_token() }}" data-confirm="ürün" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Sil"><i class="fa fa-trash"></i></a>

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
        {{ $orderstatuss->render() }}
    </div>
</div>
@endsection