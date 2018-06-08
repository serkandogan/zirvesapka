@extends("template.".$siteTheme.".layout.master")
@section("content")

<div class="columns-container">
    <div class="container" id="columns">
        <div class="page-content">
        
        @if(count($adresler)>0)
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Başlık</th>
                    <th>Adres</th>
                    <th>Cep</th>
                    <th>İşlem</th>
                </tr>
            </thead>
            <tbody>
            @foreach($adresler as $item) 
                <tr>
                    <td>{!! $item->id !!}</td>
                    <td>{!! $item->AdresAdSoyad !!}</td>
                    <td>{!! $item->AdresAdres !!}</td>
                    <td>{!! $item->AdresCep !!}</td>
                    <td>
                         <a href="{!! clink('AdressDelete',$item->id) !!}" onclick="return confirm('Silmek istediğinizden emin misiniz?');">Sil</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @else 
        Adres yok !
        @endif
         <a class="btn btn-default" href="{!! clink('addressadd') !!}">Adres Ekle</a>
        </div>
    </div>
</div>
@endsection