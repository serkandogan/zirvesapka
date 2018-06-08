@extends('template.'.$siteTheme.'.layout.master')
@section('content')

<div class="columns-container">
    <div class="container" id="columns">
        <div class="page-content">
            <div class="row">
            @include(theme('member.sidebar'))
                <div class="center_column col-xs-12 col-sm-9" id="center_column">
                    <div class="bs-example" data-example-id="simple-table">
                        <table class="table">
                            <thead> 
                                <tr> 
                                    <th>Sipariş No</th> 
                                    <th>Ürün Resmi</th> 
                                    <th>Ürün Adı</th> 
                                    <th>Ürün Stok Adedi</th> 
                                    <th>Ürün Fiyatı</th> 
                                </tr> 
                                </thead> 
                                <tbody> 
                                @foreach (Cart::contents(true) as $key => $item) 
                                    <tr> 
                                        <th scope="row"><a href="{!! $item["url"] !!}">{!! $item["id"] !!} </a></th> 
                                        <td><a href="{!! $item["url"] !!}"><img src="{!! $item["image"] !!}" alt="Product"></a></td> 
                                        <td><a href="{!! $item["url"] !!}">{!! $item["name"] !!} </a> TL</td> 
                                        <td>{!! $item["quantity"] !!} Adet</td> 
                                        <td><span>{!! $item["price"] !!}</span></td> 
                                    </tr>

                                @endforeach
                            </tbody> 
                            <tfoot>
                                <tr>
                                    <td colspan="2" rowspan="2"></td>
                                    <td colspan="2">Toplam Fiyat (KDVsiz)</td>
                                    <td colspan="2">{!! myCart(Cart::contents(true), 'totalPrice') !!} TL</td>
                                </tr>
                                <tr>
                                    <td colspan="2"><strong>Toplam Fiyat (KDV Dahil)</strong></td>
                                    <td colspan="2"><strong>{!! myCart(Cart::contents(true), 'totalPrice') !!} TL</strong></td>
                                </tr>
                            </tfoot>  
                        </table>
                        <div class="cart_navigation">
                            <a class="btn btn-default prev-btn" href="{!! url("/") !!}">Alışverişe Devam Et</a>
                            <a class="btn btn-default prev-btn" href="{!! clink('cartDestroy') !!}">Sepeti Boşalt</a>
                            <a class="btn btn-default next-btn" href="#">Satın Al</a>
                        </div>
                    </div>
    
                </div>

            </div>
        </div>
    </div>
</div>
@endsection