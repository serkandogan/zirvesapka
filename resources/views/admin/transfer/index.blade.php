@extends('admin.layouts.layout-admin')

@section('content')

@include('admin._partials.breadcrumb', ['category' => 'Hesap Bilgileri', 'page' => 'Hesap Bilgileri Listesi'])
<br />
<div class="portlet box green">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-cogs"></i>Hesap Bilgileri
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
                 Banka İsmi
            </th>
            <th>
                 Hesap Türü
            </th>
            <th>
                 Hesap Adı
            </th>
            <th>
                 Şube Adı
            </th>
            <th>
                 Şube Kodu
            </th>
            <th>
                 Hesap No
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
                 {{ $page->id }}
            </td>
            <td>
                 {{ $page->name }}
            </td>
            <td>
                 {{ $page->kind }}
            </td>
            <td>
                 {{ $page->account_name }}
            </td>
            <td>
                 {{ $page->branch_name }}
            </td>
            <td>
                 {{ $page->branch_code }}
            </td>
            <td>
                 {{ $page->account_number }}
            </td>
            <td>
                   <a href="{!! action('Admin\TransferController@getDelete', [$page->id]) !!}" onclick="return confirm('Kaydı silmek istediğinizden emin misiniz?')" title="Sil">
                       <div class="btn btn-danger"><i class="fa fa-trash"></i> Sil</div>
                   </a>
                   <a style="color:#fff;text-decoration: none;" href="{!! action('Admin\TransferController@getUpdate', [$page->id]) !!}" >
                   <div class="btn btn-primary"><i class="fa fa-edit"></i> Düzenle</div></a>
            </td>
           
        </tr>
        @empty
       <tr>
            <td colspan="8">
                Hiç Hesap Bilgisi eklenmemiş
            </td>
        </tr>

        @endforelse

        </tbody>
        </table>
        {{ $pages->render() }}
    </div>
</div>
@endsection