@extends('admin.layouts.layout-admin')

@section('content')

    @include('admin._partials.breadcrumb', ['category' => 'Ürünler', 'page' => 'Ürün Ekle'])
    ID: {{ $product->ID }}<br>
    Başlık: {{ $product->Baslik }}<br>
    Açıklama: {{ $product->Aciklama }}<br>
    N11 ID: {{ $product->n11id }}<br>

    <p><a href="{{ url('admin/products/'.$product->ID.'/edit') }}">{{ $product->ID }} nolu ürünü güncelle</a></p>

<a href="{!! route('admin.products.destroy', $product->ID) !!}" data-method="DELETE" data-token="{{ csrf_token() }}" data-confirm="ürün" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Sil"><i class="fa fa-trash"></i></a>

@endsection