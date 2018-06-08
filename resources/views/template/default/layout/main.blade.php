@foreach($popup as $item)
    <a href="{!! url(image($item->resim)) !!}" class="lightbox pop-up" rel="group1"></a>
@endforeach
<main class="site-main">
    <div class="block-section-top block-section-top1">
        <div class="container">
            <div class="box-section-top">
                <div class="block-nav-categori">
                    <div class="block-title">
                        <span>Kategoriler</span>
                    </div>
                    <div class="block-content">
                        <ul class="ui-categori">
                            <li class="parent">
                                <a href="{!! url('sapka-k-1.html') !!}">
                                    <span class="icon"><img src="{!! url('icon/sapka.png') !!}" alt="Şapkalar" title="Şapkalar"></span>
                                    Şapkalar
                                </a>
                                <span class="toggle-submenu"></span>
                                <div class="submenu">
                                    <ul class="categori-list">
                                        @foreach($sapkalar as $item)
                                            <li class="col-sm-2">
                                                <strong class="title" style="border: 1px solid rgba(204, 204, 204, 0.43);border-radius: 10px;height: 180px;">
                                                    <a href="{!! url($item->refurl.'-k-'.$item->ID.'.html') !!}">
                                                        @if($item->Resim==null)
                                                           <img src="{!! url('icon/gorsel.jpg') !!}">
                                                        @else
                                                            <img src="{!! url(image($item->Resim)) !!}">
                                                        @endif
                                                        <div style="font-size: 11px;text-align: center;text-transform: initial;line-height: 15px;">
                                                            {!! $item->Baslik !!}
                                                        </div>
                                                    </a>
                                                </strong>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="{!! url('darbe-emici-sapka-zirh-k-87.html') !!}">
                                    <span class="icon"><img src="{!! url('icon/darbe-emici-sapka-icon.png') !!}" style="width: 19px;" alt="Darbe Emici Şapka" title="Darbe Emici Şapka"></span>
                                    Darbe Emici Şapka
                                </a>
                            </li>
                            <li>
                                <a href="{!! url('cok-amacli-bandana-k-93.html') !!}">
                                    <span class="icon"><img src="{!! url('icon/bandana.png') !!}" style="width: 19px;" alt="Çok Amaçlı Bandana" title="Çok Amaçlı Bandana"></span>
                                    Çok Amaçlı Bandana
                                </a>
                            </li>
                            <li>
                                <a href="{!! url('tek-kullanimlik-ueruenler-k-94.html') !!}">
                                    <span class="icon"><img src="{!! url('icon/tek-kullanimlik.png') !!}" style="width: 19px;" alt="Tek Kullanımlık Ürünler" title="Tek Kullanımlık Ürünler"></span>
                                    Tek Kullanımlık Ürünler
                                </a>
                            </li>
                            <li class="parent">
                                <a href="{!! url('bere-k-24.html') !!}">
                                    <span class="icon"><img src="{!! url('icon/bere.png') !!}" alt="Bereler" title="Bereler"></span>
                                    Bereler
                                </a>
                                <span class="toggle-submenu"></span>
                                <div class="submenu" style="top:-40px">
                                    <ul class="categori-list">
                                        @foreach($bereler as $item)
                                            <li class="col-sm-2">
                                                <strong class="title" style="border: 1px solid rgba(204, 204, 204, 0.43);border-radius: 10px;height: 180px;">
                                                    <a href="{!! url($item->refurl.'-k-'.$item->ID.'.html') !!}">
                                                        @if($item->Resim==null)
                                                           <img src="{!! url('icon/gorsel.jpg') !!}">
                                                        @else
                                                            <img src="{!! url(image($item->Resim)) !!}">
                                                        @endif
                                                        <div style="font-size: 11px;text-align: center;text-transform: initial;line-height: 15px;">
                                                            {!! $item->Baslik !!}
                                                        </div>
                                                    </a>
                                                </strong>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                            <li class="parent">
                                <a href="{!! url('eldiven-k-28.html') !!}">
                                    <span class="icon"><img src="{!! url('icon/eldiven.png') !!}" alt="Eldivenler" title="Eldivenler"></span>
                                    Eldivenler
                                </a>
                                <span class="toggle-submenu"></span>
                                <div class="submenu" style="top:-75px">
                                    <ul class="categori-list">
                                        @foreach($eldivenler as $item)
                                            <li class="col-sm-2">
                                                <strong class="title" style="border: 1px solid rgba(204, 204, 204, 0.43);border-radius: 10px;height: 180px;">
                                                    <a href="{!! url($item->refurl.'-k-'.$item->ID.'.html') !!}">
                                                        @if($item->Resim==null)
                                                           <img src="{!! url('icon/gorsel.jpg') !!}">
                                                        @else
                                                            <img src="{!! url(image($item->Resim)) !!}">
                                                        @endif
                                                        <div style="font-size: 11px;text-align: center;text-transform: initial;line-height: 15px;">
                                                            {!! $item->Baslik !!}
                                                        </div>
                                                    </a>
                                                </strong>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                            <li class="parent">
                                <a href="{!! url('atki-k-33.html') !!}">
                                    <span class="icon"><img src="{!! url('icon/atki.png') !!}" alt="Atkılar" title="Atkılar"></span>
                                    Atkılar
                                </a>
                                <span class="toggle-submenu"></span>
                                <div class="submenu" style="top:-110px">
                                    <ul class="categori-list">
                                        @foreach($atkilar as $item)
                                            <li class="col-sm-2">
                                                <strong class="title" style="border: 1px solid rgba(204, 204, 204, 0.43);border-radius: 10px;height: 180px;">
                                                    <a href="{!! url($item->refurl.'-k-'.$item->ID.'.html') !!}">
                                                        @if($item->Resim==null)
                                                           <img src="{!! url('icon/gorsel.jpg') !!}">
                                                        @else
                                                            <img src="{!! url(image($item->Resim)) !!}">
                                                        @endif
                                                        <div style="font-size: 11px;text-align: center;text-transform: initial;line-height: 15px;">
                                                            {!! $item->Baslik !!}
                                                        </div>
                                                    </a>
                                                </strong>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                            <li class="parent">
                                <a href="{!! url('tshirt-k-38.html') !!}">
                                    <span class="icon"><img src="{!! url('icon/tshirt.png') !!}" alt="Tshirt" title="Tshirt"></span>
                                    Tshirt
                                </a>
                                <span class="toggle-submenu"></span>
                                <div class="submenu" style="top:-150px">
                                    <ul class="categori-list">
                                        @foreach($tshirtler as $item)
                                            <li class="col-sm-2">
                                                <strong class="title" style="border: 1px solid rgba(204, 204, 204, 0.43);border-radius: 10px;height: 180px;">
                                                    <a href="{!! url($item->refurl.'-k-'.$item->ID.'.html') !!}">
                                                        @if($item->Resim==null)
                                                           <img src="{!! url('icon/gorsel.jpg') !!}">
                                                        @else
                                                            <img src="{!! url(image($item->Resim)) !!}">
                                                        @endif
                                                        <div style="font-size: 11px;text-align: center;text-transform: initial;line-height: 15px;">
                                                            {!! $item->Baslik !!}
                                                        </div>
                                                    </a>
                                                </strong>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                            <li class="parent">
                                <a href="{!! url('yelekler-k-47.html') !!}">
                                    <span class="icon"><img src="{!! url('icon/yelek.png') !!}" alt="Yelekler" title="Yelekler"></span>
                                    Yelekler
                                </a>
                                <span class="toggle-submenu"></span>
                                <div class="submenu" style="top:-180px">
                                    <ul class="categori-list">
                                        @foreach($yelekler as $item)
                                            <li class="col-sm-2">
                                                <strong class="title" style="border: 1px solid rgba(204, 204, 204, 0.43);border-radius: 10px;height: 180px;">
                                                    <a href="{!! url($item->refurl.'-k-'.$item->ID.'.html') !!}">
                                                        @if($item->Resim==null)
                                                           <img src="{!! url('icon/gorsel.jpg') !!}">
                                                        @else
                                                            <img src="{!! url(image($item->Resim)) !!}">
                                                        @endif
                                                        <div style="font-size: 11px;text-align: center;text-transform: initial;line-height: 15px;">
                                                            {!! $item->Baslik !!}
                                                        </div>
                                                    </a>
                                                </strong>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                            <li class="parent">
                                <a href="{!! url('isci-is-elbiseleri-k-77.html') !!}">
                                    <span class="icon"><img style="width: 25px;" src="{!! url('icon/isci-elbiseleri.png') !!}" alt="İşçi İş Elbiseleri" title="İşçi İş Elbiseleri"></span>
                                    İşçi İş Elbiseleri
                                </a>
                                <span class="toggle-submenu"></span>
                                <div class="submenu" style="top:-180px">
                                    <ul class="categori-list">
                                        @foreach($isciiselbiseleri as $item)
                                            <li class="col-sm-2">
                                                <strong class="title" style="border: 1px solid rgba(204, 204, 204, 0.43);border-radius: 10px;height: 180px;">
                                                    <a href="{!! url($item->refurl.'-k-'.$item->ID.'.html') !!}">
                                                        @if($item->Resim==null)
                                                            <img src="{!! url('icon/gorsel.jpg') !!}">
                                                        @else
                                                            <img src="{!! url(image($item->Resim)) !!}">
                                                        @endif
                                                        <div style="font-size: 11px;text-align: center;text-transform: initial;line-height: 15px;">
                                                            {!! $item->Baslik !!}
                                                        </div>
                                                    </a>
                                                </strong>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="block-slide-main slide-opt-1">
                    <div class="owl-carousel dotsData"
                         data-nav="true"
                         data-dots="false"
                         data-margin="0"
                         data-items='1'
                         data-autoplayTimeout="700"
                         data-autoplay="true"
                         data-loop="true">
                        @foreach($slider as $key => $item)
                            <div class="item item{!! $key+1 !!}" style="background-image: url('{!! url('upload/slider/'.$item->image) !!}');">

                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="banner-slide">
                    <a href="{!! url('bereket-sapka-k-95.html') !!}" class="box-img"><img src="{!! url('images/sapkada-en-uygun-fiyat.jpg') !!}" alt="banner-slide"></a>
                </div>
            </div>
        </div>
    </div>
    <style>
        .altkategoriicon{
            background: #fff;
            border-radius: 101px;
            padding-left: 6px;
            padding-top: 10px;
            padding-right: 6px;
            padding-bottom: 8px;
            margin-bottom: 4px;
        }
    </style>
    <div class="clearfix" style="background-color: #eeeeee;margin-bottom: 40px; padding-top:30px;">
        <div class="block-floor-products block-floor-products-opt1 floor-products1" id="floor0-1">
            <div class="container">
                <div class="block-title ">
                    <span class="title">
                        <img class="altkategoriicon" src="{!! url('icon/sapka.png') !!}" alt="Şapkalar" title="Şapkalar">
                        Şapkalar
                    </span>
                    <div class="links dropdown">
                        <button class="dropdown-toggle"  type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </button>
                        <div class="dropdown-menu" >
                            <ul  >
                                <li role="presentation"><a href="{!! url('asker-sapkasi-k-21.html') !!}">Askeri Şapkalar</a></li>
                                <li role="presentation"><a href="{!! url('modelli-sapkalar-k-11.html') !!}">Modelli Şapkalar</a></li>
                                <li role="presentation"><a href="{!! url('fileli-sapka-k-6.html') !!}">Fileli Şapka </a></li>
                                <li role="presentation"><a href="{!! url('safari-sapkasi-k-12.html') !!}">Safari Şapkalar </a></li>
                                <li role="presentation"><a href="{!! url('fidel-castro-sapkasi-k-15.html') !!}">Fidel Castro Şapkası</a></li>
                                <li role="presentation"><a href="{!! url('klasik-kaliteli-sapka-k-8.html') !!}">Klasik Kaliteli Şapka</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="actions">
                        <a href="" class="action action-up"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
                        <a href="#floor0-2" class="action action-down"><i class="fa fa-angle-down" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="block-banner-floor">

                    <div class="col-sm-6">
                        <a href="{!! url('fileli-sapka-k-6.html') !!}" class="box-img"><img src="{!! url('images/fileli-sapkalar.jpg') !!}" alt="banner"></a>
                    </div>
                    <div class="col-sm-6">
                        <a href="{!! url('fidel-castro-sapkasi-k-15.html') !!}" class="box-img"><img src="{!! url('images/ciftci-sapkasi.jpg') !!}" alt="banner"></a>
                    </div>
                </div>
                <div class="block-content">
                    <div class="col-banner">
                        <span class="label-featured"><img src="images/icon/index1/label-featured.png" alt="label-featured"></span>
                        <a href="{!! url('bereket-sapka-k-95.html') !!}" class="box-img"><img src="{!! url('images/en-ucuz-sapka.jpg') !!}" alt="baner-floor"></a>
                    </div>
                    <div class="col-products tab-content">
                        <div class="tab-pane active in  fade " id="floor1-1" role="tabpanel">
                            <div class="owl-carousel" data-nav="true" data-dots="false" data-margin="0" data-responsive='{"0":{"items":1},"420":{"items":2},"600":{"items":3},"768":{"items":3},"992":{"items":3},"1200":{"items":4}}'>
                                @foreach($sapka as $item)
                                    <div class=" product-item  product-item-opt-1 ">
                                        <div class="product-item-info">
                                            <div class="product-item-photo">
                                                <a class="product-item-img" href="{!! url($item->refurl.'-u-'.$item->ID.'.html') !!}">
                                                    <img alt="{!! $item->Baslik !!}" title="{!! $item->Baslik !!}" src="{!! url(image($item->Resim)) !!}">
                                                </a>
                                                <button type="button" class="btn btn-cart"><span>Ürünü İncele</span></button>
                                            </div>
                                            <div class="product-item-detail" style="text-align: center;">
                                                <strong class="product-item-name">
                                                    <a href="{!! url($item->refurl.'-u-'.$item->ID.'.html') !!}" style="font-weight: bold;">
                                                        {!! $item->Baslik !!}
                                                    </a>
                                                </strong>
                                                <div class="clearfix">
                                                    <div class="product-item-price">
                                                        @if($item->IndrimliFiyati==null)

                                                        @else
                                                            <span class="price">
                                                                {!! $item->IndirimliFiyati !!} TL
                                                            </span>
                                                        @endif
                                                        @if($item->LFiyat==null)

                                                        @else
                                                            <span class="old-price">
                                                                {!! $item->LFiyat !!} TL
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="block-floor-products block-floor-products-opt1 floor-products2" id="floor0-2">
            <div class="container">
                <div class="block-title">
                    <span class="title">
                        <img class="altkategoriicon" src="{!! url('icon/bere.png') !!}" alt="Bereler" title="Bereler">
                        Bereler
                    </span>
                    <div class="links dropdown">
                        <button class="dropdown-toggle"  type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </button>
                        <div class="dropdown-menu" >
                            <ul  >
                                <li role="presentation"><a href="{!! url('triko-bere-k-25.html') !!}">Triko Bere</a></li>
                                <li role="presentation"><a href="{!! url('polar-bere-k-26.html') !!}">Polar Bere</a></li>
                                <li role="presentation"><a href="{!! url('cok-amacli-sapka-k-27.html') !!}">Çok Amaçlı Şapka</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="actions">
                        <a href="#floor0-1" class="action action-up"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
                        <a href="#floor0-3" class="action action-down"><i class="fa fa-angle-down" aria-hidden="true"></i></a>
                    </div>
                </div>

                <!-- Banner -->
                <div class="block-banner-floor">

                    <div class="col-sm-6">
                        <a href="{!! url('polar-bere-k-26.html') !!}" class="box-img"><img src="{!! url('images/atki-bere.jpg') !!}" alt="Atkı Bere" title="Atkı Bere"></a>
                    </div>
                    <div class="col-sm-6">
                        <a href="{!! url('triko-bere-k-25.html') !!}" class="box-img"><img src="{!! url('images/triko-bere.jpg') !!}" alt="Triko Bere" title="Triko Bere"></a>
                    </div>

                </div><!-- Banner -->

                <div class="block-content">

                    <div class="col-banner">
                        <span class="label-featured"><img src="images/icon/index1/label-featured.png" alt="label-featured"></span>
                        <a href="{!! url('bere-k-24.html') !!}" class="box-img"><img src="{!! url('images/promosyon-atki-bere.jpg') !!}" alt="Promosyon Atkı Bere" title="Promosyon Atkı Bere"></a>
                    </div>

                    <div class="col-products tab-content">

                        <!-- tab 1 -->
                        <div class="tab-pane active in  fade " id="floor2-1" role="tabpanel">
                            <div class="owl-carousel"
                                 data-nav="true"
                                 data-dots="false"
                                 data-margin="0"
                                 data-responsive='{
                                        "0":{"items":1},
                                        "420":{"items":2},
                                        "600":{"items":3},
                                        "768":{"items":3},
                                        "992":{"items":3},
                                        "1200":{"items":4}
                                    }'>

                                @foreach($bere as $item)
                                    <div class=" product-item  product-item-opt-1 ">
                                        <div class="product-item-info">
                                            <div class="product-item-photo">
                                                <a class="product-item-img" href="{!! url($item->refurl.'-u-'.$item->ID.'.html') !!}">
                                                    <img alt="{!! $item->Baslik !!}" title="{!! $item->Baslik !!}" src="{!! url(image($item->Resim)) !!}">
                                                </a>
                                                <button type="button" class="btn btn-cart"><span>Ürünü İncele</span></button>
                                            </div>
                                            <div class="product-item-detail" style="text-align: center;">
                                                <strong class="product-item-name">
                                                    <a href="{!! url($item->refurl.'-u-'.$item->ID.'.html') !!}" style="font-weight: bold;">
                                                        {!! $item->Baslik !!}
                                                    </a>
                                                </strong>
                                                <div class="clearfix">
                                                    <div class="product-item-price">
                                                        @if($item->IndrimliFiyati==null)

                                                        @else
                                                            <span class="price">
                                                                {!! $item->IndirimliFiyati !!} TL
                                                            </span>
                                                        @endif
                                                        @if($item->LFiyat==null)

                                                        @else
                                                            <span class="old-price">
                                                                {!! $item->LFiyat !!} TL
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
    <div class="block-hot-categories-opt1">
        <div class="container">

            <div class="block-title ">
                <span class="title">SATIŞ DANIŞMANLARIMIZ</span>
            </div>

            <div class="block-content">
                <div class="row">

                        @foreach($satisdanismanlari as $item)
                            <div class="col-md-3">
                                <div class="item">
                                    <div class="description" style="min-height: 100px;padding-left: 4px;">
                                        <img src="{!! url(image($item->images)) !!}" style="max-height: 100px;float: left;width: 70px;">
                                        <div class="title" style="float: left;text-align: center;margin-left: 10px;margin-top: 8px;height: 0px;">
                                            <span>{!! $item->name !!}</span>
                                        </div>
                                    </div>
                                    <ul style="font-size: 12px;margin-left: 91px;margin-top: -70px;border-top: 1px dotted #a5a1a1;padding-top: 6px;">
                                        {!! $item->content !!}
                                    </ul>
                                </div>
                            </div>
                        @endforeach


                </div>
            </div>

        </div>
    </div>
</main>