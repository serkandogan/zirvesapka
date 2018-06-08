@extends("template.".$siteTheme.".layout.master")
@section("content")
<div class="columns-container">
    <div class="container" id="columns">
        <div class="page-content page-order">
            @if(myCart(Cart::contents(true), 'totalPrice')==0)
                <div class="col-md-12" style="border:1px dotted #ccc;border-radius: 3px;">
                    <i class="fa fa-shopping-cart bossepet" ></i>
                    <div class="bossepettext">
                        Alışveriş Sepetiniz Boş.
                    </div>
                    <div class="bossepetspot">
                        Biraz gezinmeye ne dersin?<br />
                        Sitemizde bulunan ürünler içinden sana uygun bir şeyler olduğuna eminiz.
                    </div>
                    <a style="color:#fff;" class="bossepetbuton" href="{!! url('/') !!}">Alışverişe Başla</a>
                </div>
            @else

            <div class="col-md-9">
                    <div style="font-size:26px;color: #ffae00;font-weight: bold;">Sepetim</div>
                <hr>

                    <div class="order-detail-content">
                        <table class="table table-responsive cart_summary">
                            <thead>
                            <tr>
                                <th></th>
                                <th>ÜRÜN ADI</th>
                                <th></th>
                                <th>FİYAT</th>
                                <th  class="action"><i class="fa fa-trash-o"></i></th>
                            </tr>
                            </thead>
                                <tbody>
                                @foreach (Cart::contents(true) as $key => $item)
                                    <tr>
                                        <td class="cart_product">
                                            <a href="{!! $item["url"] !!}"><img src="https://www.nehirofismobilyasi.com/{!! image($item["image"]) !!}" alt="{!! $item["name"] !!}"></a>
                                        </td>
                                        <td class="cart_description">
                                            <p class="product-name"><a href="{!! $item["url"] !!}">{!! $item["name"] !!} </a></p><br />
                                            <small class="cart_ref"><b>Ürün Kodu :</b> {!! $item["code"] !!}</small><br>
                                        </td>
                                        <td>{!! $item["quantity"] !!} Adet</td>
                                        <td class="price"><span><b>{!! number_format($item["priceNew"], 2, ',', '.') !!}</b> TL</span></td>
                                        <td class="action">
                                            <a style="color:#e94f3a;" href="{!! clink('cartRemove',$key) !!}" onclick="return confirm('Silmek istediğinizden emin misiniz?');">
                                                <i style="font-size:18px;" class="fa fa-trash-o"></i> SİL
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                        </table>
                        <div class="cart_navigation">
                            <a style="background: #ccc;" class="prev-btn btn btn-default" href="{!! url("/") !!}">Alışverişe Devam Et</a>
                            <div style="float:right;">
                                <a class="prev-btn" href="{!! clink('cartDestroy') !!}">Sepeti Boşalt</a>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="col-md-3">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th> <div style="float:right;color:#f28b00;font-size: 16px;font-weight: bold;">Sipariş Özeti</div></th>
                        </tr>
                        <tr>
                            <th scope="row"><div style="float:right;">{!! Cart::totalItems() !!} Ürün</div></th>
                        </tr>
                        <tr>
                            <th scope="row">
                                <div style="float:right;">Ödenecek Tutar</div><br />
                                <div style="    text-align: right;font-size:32px;font-weight: bold;">{!! number_format(myCart(Cart::contents(true), 'totalPrice'), 2, ',', '.') !!} TL</div>
                            </th>
                        </tr>
                        <tr>

                                <th scope="row">
                                    <a style="    background: #424a52;
    color: rgb(226, 255, 0);
    padding: 12px;
    border-radius: 4px;
    margin-left: -13px;
    width: 263px;
    padding-left: 21px;
    text-align: center;
    position: absolute;
    font-size: 21px;
    text-align: center;
    font-weight: bold;
    font-family: ubuntu;
    text-align: center;" href="{!! clink('cartBuy') !!}">Alışverişi Tamamla <i style="    font-size: 26px;
    margin-top: -3px;
    font-weight: normal;
    margin-left: 1px;
    padding-right: 20px;
    text-align: center;
    padding-left: -1px;
    margin-bottom: -5px;" class="fa fa-angle-right"></i></a>
                                </th>

                        </tr>
                        </tbody>
                </table>
            </div>
         @endif






        </div>
    </div>
</div>
@endsection
@section('css')
    <style type="text/css">
        .bg-info {
            background-color: #f7f7f7;
            padding: 12px;
            margin-bottom: 6px;
            border-left: 7px solid #f28b00;
        }
    </style>
@endsection