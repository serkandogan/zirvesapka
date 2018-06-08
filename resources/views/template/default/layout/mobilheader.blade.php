<div id="header" class="header">
    <div class="top-header">
        <div class="container">
            <div class="nav-top-links">
                <a target="_blank" href="tel:">Telefon Numarası: {!! ayar('phone') !!}</a>
            </div>
            <div class="top-bar-social">
                <a target="_blank" href="{!! ayar('facebook-url') !!}"><i class="fa fa-facebook"></i></a>
                <a target="_blank" href="{!! ayar('twitter-url') !!}"><i class="fa fa-twitter"></i></a>
                <a target="_blank" href="{!! ayar('googleplus-url') !!}"><i class="fa fa-google-plus"></i></a>
            </div>
            <div id="user-info-top" class="user-info pull-right">
                @if(Auth::check())
                    <a href="{!! clink('profile') !!}">Hesabınız</a>
                    <a href="{!! clink('address') !!}">Adresler</a>
                    <a href="{!! clink('order') !!}">Siparişler</a>
                @else
                    <a class="first-item" href="{!! clink('login') !!}">Giriş Yap</a>
                    <a href="{!! clink('register') !!}">Kayıt Ol</a>
                @endif
            </div>
        </div>
    </div>
    <div id="main-header">
        <div class="container main-header">
            <div class="row">
                <div class="col-xs-12 col-sm-3 logo">
                    <a href="{!! url('/') !!}"><img alt="{!! ayar('title') !!}" title="{!! ayar('title') !!}" src="{!! asset(image(ayar('logo'))) !!}" /></a>
                </div>
                <div class="col-xs-5 col-sm-2 shopping-cart-box">
                    <a class="cart-link" href="order.html">
                        <span class="title">Alışveriş Sepetiniz</span>
                        <span class="total">{!! Cart::totalItems() !!} Adet : {!! myCart(Cart::contents(true), 'totalPrice') !!} TL</span>
                        <span class="notify notify-left">{!! Cart::totalItems() !!}</span>
                    </a>
                    <div class="cart-block">
                        <div class="cart-block-content">
                            <h5 class="cart-title">Sepetinizde {!! Cart::totalItems() !!} Adet Ürün Bulunmakta</h5>
                            <div class="cart-block-list">
                                <ul>
                                    @foreach (Cart::contents(true) as $key => $item)
                                        <li class="product-info">
                                            <div class="p-left">
                                                <a style="position: absolute;" class="btn btn-primary" href="{!! clink('cartRemove',$key) !!}" class="remove_link">X</a>
                                                <a href="{!! $item["url"] !!}">
                                                    <img class="img-responsive" src="{!! url('upload/images/'.$item["image"]) !!}">
                                                </a>
                                            </div>
                                            <div class="p-right">
                                                <p style="float:left;width: 200px;" class="p-name">{!! $item["name"] !!}</p>
                                                <p style="float:right;width: 100px;color:#fff;" class="btn btn-primary">{!! $item["priceNew"] !!} TL</p>
                                                <p style="width: 100px;color: #fff;margin-top: 39px;float: right;margin-right: -100px;" class="btn btn-success">{!! $item["quantity"] !!} Adet</p>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="toal-cart">
                                <span>Toplam</span>
                                <span class="toal-price pull-right">{!! myCart(Cart::contents(true), 'totalPrice') !!} TL</span>
                            </div>
                            <div class="cart-buttons">
                                <a style="color:#fff;width: 100%;" href="{!! url("sepet") !!}" class="btn btn-danger">Sepete Git</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>