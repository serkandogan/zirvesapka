<header class="site-header header-opt-1 cate-show">
    <div class="header-top">
        <div class="container">
            <div class="col-md-8">
                <ul class="nav-left" >
                    <li ><span><i class="fa fa-phone" aria-hidden="true"></i> {!! ayar('phone') !!}</span></li>
                    <li ><span><i class="fa fa-envelope" aria-hidden="true"></i> {!! ayar('mail') !!}</span></li>
                </ul>
            </div>
            <div class="col-md-4" style="text-align: right;padding-right: 0px;">
                <a class="btn btn-primary" data-toggle="modal" data-target="#teklifIste" >
                    <i class="fa fa-edit"></i>
                    Teklif İste
                </a>
                <a class="btn btn-warning" data-toggle="modal" data-target="#mailGonder">
                    <i class="fa fa-envelope"></i>
                    Mail Gönder
                </a>
            </div>
            <div class="modal fade" id="teklifIste" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Zirve Şapka'dan Ürünler İçin Teklif İste</h4>
                        </div>
                        {!! Form::open(['action'=>'Site\MainController@teklifIste', 'files'=>true, 'method'=>'POST']) !!}
                        <input type="hidden" name="type" value="1">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Ad Soyad</label>
                                        <input name="adsoyad" type="text" class="form-control" placeholder="Adınız Soyadınız...">
                                    </div>
                                    <div class="form-group">
                                        <label>Telefon Numaranız</label>
                                        <input name="telefon" type="text" class="form-control" placeholder="Telefon Numaranız...">
                                    </div>
                                    <div class="form-group">
                                        <label>Mail Adresiniz</label>
                                        <input name="mail" type="email" class="form-control" placeholder="Mail Adresiniz...">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Mesajınız</label>
                                        <textarea name="mesaj" class="form-control" placeholder="Mesajınız..." style="height: 182px;"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                            <button type="submit" class="btn btn-primary">Teklif İste</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="modal fade" id="mailGonder" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Zirve Şapka'dan Ürünler İçin Mail Gönder</h4>
                        </div>
                        {!! Form::open(['action'=>'Site\MainController@teklifIste', 'files'=>true, 'method'=>'POST']) !!}
                        <input type="hidden" name="type" value="2">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Ad Soyad</label>
                                        <input name="adsoyad" type="text" class="form-control" placeholder="Adınız Soyadınız...">
                                    </div>
                                    <div class="form-group">
                                        <label>Telefon Numaranız</label>
                                        <input name="telefon" type="text" class="form-control" placeholder="Telefon Numaranız...">
                                    </div>
                                    <div class="form-group">
                                        <label>Mail Adresiniz</label>
                                        <input name="mail" type="email" class="form-control" placeholder="Mail Adresiniz...">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Mesajınız</label>
                                        <textarea name="mesaj" class="form-control" placeholder="Mesajınız..." style="height: 182px;"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                            <button type="submit" class="btn btn-primary">Mail Gönder</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-content">
        <div class="container">
            <div class="row">
                <div class="col-md-3 nav-left">
                    <strong class="logo">
                        <a href="{!! url('/') !!}"><img src="{!! url(image(ayar('logo'))) !!}" alt="{!! ayar('title') !!}" title="{!! ayar('title') !!}"></a>
                    </strong>
                </div>
                <div class="col-md-4" style="    z-index: 9999;position: relative;">
                    <div class="block-search">
                        <div class="block-title">
                            <span>Arama</span>
                        </div>
                        <div class="block-content">
                            <div class="form-search">
                                <form id="frmSearch"  name="frmSearch" method='get' action="{!! clink('search') !!}" enctype='multipart/form-data'>
                                    <div class="box-group">
                                        <input name="q" type="text" class="form-control" placeholder="Ürün Araması Yapabilisiniz...">
                                        <button class="btn btn-search" type="button"><span>search</span></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <a href="https://api.whatsapp.com/send?phone=905336386382">
                        <img style="width: 190px;margin-left: 87px;" src="{!! url('images/whatsapp.png') !!}">
                    </a>
                    <a href="tel:4444179">
                        <img style="width: 190px;float: right;" src="{!! url('images/iletisim.png') !!}">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="header-nav mid-header">
        <div class="container">
            <div class="box-header-nav">
                <span data-action="toggle-nav-cat" class="nav-toggle-menu nav-toggle-cat"><span>Kategoriler</span></span>
                <span data-action="toggle-nav" class="nav-toggle-menu"><span>Menu</span></span>
                <div class="block-nav-categori">
                    <div class="block-title">
                        <span>Kategoriler</span>
                    </div>
                    <div class="block-content">
                        <div class="clearfix"><span data-action="close-cat" class="close-cate"><span>Categories</span></span></div>
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
                <div class="block-nav-menu">
                    <div class="clearfix"><span data-action="close-nav" class="close-nav"><span>close</span></span></div>
                    <ul class="ui-menu">
                        <li><a href="{!! url('/') !!}">Ana Sayfa</a></li>
                        <li><a href="{!! url('sayfa/referanslar') !!}">Referanslar</a></li>
                        <li><a href="{!! url('blog') !!}">Blog</a></li>
                        <li><a href="{!! url('sayfa/iletisim') !!}">İletişim</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>