@extends('template.'.$siteTheme.'.layout.master')
@section('content')
    <main class="site-main">

        <div class="columns container">
            <!-- Block  Breadcrumb-->
            <?php
            $urunadi1parcala = str_replace("<p>", "", $record->Baslik);
            $urunadi1parcala2 = str_replace("</p>", "", $urunadi1parcala);
            $urunadi1parcala3 = str_replace("\r\n", " ", $urunadi1parcala2);

            $aciklama = str_replace("<p>", "", $record->Aciklama);
            $aciklama2 = str_replace("</p>", "", $aciklama);
            $aciklama3 = str_replace("\r\n", " ", $aciklama2);
            ?>
            <ol class="breadcrumb no-hide">
                <li><a href="{!! url('/') !!}">Ana Sayfa </a></li>
                <li class="active">{!! $urunadi1parcala3 !!}</li>
            </ol><!-- Block  Breadcrumb-->

            <div class="row">
                <div class="col-md-9  col-main">
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="product-media media-horizontal">
                                <div class="image_preview_container images-large">
                                    <img id="img_zoom"
                                         data-zoom-image="{!! url(image($record->Resim)) !!}"
                                         src="{!! url(image($record->Resim)) !!}" alt="">
                                    <button class="btn-zoom open_qv"><span>zoom</span></button>
                                </div>
                                <div class="product_preview images-small">
                                    <div class="owl-carousel thumbnails_carousel" id="thumbnails" data-nav="true"
                                         data-dots="false" data-margin="10"
                                         data-responsive='{"0":{"items":3},"480":{"items":4},"600":{"items":5},"768":{"items":3}}'>
                                        <a href="#" data-image="{!! url(image($record->Resim)) !!}"
                                           data-zoom-image="{!! url(image($record->Resim)) !!}">
                                            <img src="{!! url(image($record->Resim)) !!}"
                                                 data-large-image="{!! image($record->Resim) !!}"
                                                 alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="product-info-main">
                                <h1 class="page-title">
                                    {!! $record->Baslik !!}
                                </h1>
                                <div class="product-reviews-summary">
                                    <div class="rating-summary">
                                        <div class="rating-result" title="70%">
                                            <span style="width:70%">
                                                <span><span>70</span>% of <span>100</span></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-info-price">
                                    <div class="price-box">
                                        @if($record->IndirimliFiyati==0)

                                        @else
                                            <span class="price">
                                                {!! number_format($record->IndirimliFiyati, 2, ',', '.') !!}
                                                TL
                                            </span>
                                        @endif
                                        @if($record->LFiyat==null || $record->LFiyat==$record->IndirimliFiyati)

                                        @else
                                            <span class="old-price">
                                                {!! number_format($record->LFiyat, 2, ',', '.') !!} TL
                                            </span>
                                            <span class="label-sale">
                                                 <?php
                                                $lfiyat = $record->LFiyat;
                                                $indirimlifiyati = $record->IndirimliFiyati;
                                                if($lfiyat==null){
                                                    $indirim="";
                                                }else{
                                                    $indirim = ($lfiyat - $indirimlifiyati) / $lfiyat * 100;
                                                    echo '%'.round($indirim);
                                                }
                                                ?>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="product-code">
                                    Ürün Kodu: #{!! $record->ID !!}{!! $record->ID !!}
                                </div>
                                <div class="product-info-stock">
                                    <div class="stock available">
                                        <span class="label">Stok Durum: </span> Özel Üretim
                                    </div>
                                </div>
                                <div class="product-condition">
                                    Ürün Durum: İmalat
                                </div>
                                <div class="product-overview">
                                    <div class="overview-content">
                                        {!! $aciklama3 !!}
                                    </div>
                                </div>

                                <div class="product-add-form">
                                    <div class="product-options-wrapper">
                                        <div class="form-qty" style="margin-top: 7px;margin-bottom: -8px;">
                                            <label class="label">Adet: </label>
                                            <div class="control">
                                                <input type="text" class="form-control input-qty" value='1' id="qty1" name="qty1" maxlength="12" minlength="1">
                                                <button class="btn-number  qtyminus" data-type="minus" data-field="qty1">
                                                    <span>-</span>
                                                </button>
                                                <button class="btn-number  qtyplus" data-type="plus" data-field="qty1">
                                                    <span>+</span>
                                                </button>
                                            </div>
                                        </div>
                                        <style>
                                            .facebook{
                                                padding: 8px;
                                                line-height: 8px !important;
                                                margin-top: -28px;
                                                width: 32px;
                                                font-size: 15px;
                                                border-radius: 5px;
                                            }
                                            .whatsapp{
                                                padding: 8px;
                                                line-height: 8px !important;
                                                margin-top: -28px;
                                                width: 32px;
                                                font-size: 15px;
                                                border-radius: 5px;
                                            }
                                            .google-plus{
                                                padding: 8px;
                                                line-height: 8px !important;
                                                margin-top: -28px;
                                                width: 32px;
                                                font-size: 15px;
                                                border-radius: 5px;
                                                margin-right: 4px;
                                            }
                                            .twitter{
                                                background: #55acee;
                                                border-color: #55acee;
                                                padding: 8px;
                                                line-height: 8px !important;
                                                margin-top: -28px;
                                                width: 32px;
                                                font-size: 15px;
                                                border-radius: 5px;
                                                margin-right: 4px;
                                            }
                                        </style>
                                        <div style="float:right;margin-top: -9px;">
                                            <a class="btn btn-primary facebook" href="https://www.facebook.com/sharer/sharer.php?u={!! url($record->refurl.'-u-'.$record->ID.'.html') !!}" target="_blank">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                            <a class="btn btn-primary twitter" href="https://twitter.com/share" target="_blank" data-url="{!! url($record->refurl.'-u-'.$record->ID.'.html') !!}"  data-lang="tr" >
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                            <a class="btn btn-danger google-plus" href="https://plus.google.com/share?url={!! url($record->refurl.'-u-'.$record->ID.'.html') !!}" target="_blank">
                                                <i class="fa fa-google-plus"></i>
                                            </a>
                                            <a class="btn btn-success whatsapp" href="https://api.whatsapp.com/send?text={!! url($record->refurl.'-u-'.$record->ID.'.html') !!}&t=<?php echo $urunadi1parcala3; ?>" data-action="share/whatsapp/share" target="blank">
                                                <i class="fa fa-whatsapp"></i>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                                @if(Session::has('sepet'))
                                    <div class="btn btn-danger" style="width: 100%;font-size: 20px;font-weight: 500;font-family: ubuntu;background: #c9302c;border-color:#c9302c;">
                                        {!! Session::get('sepet') !!}
                                        <script type="text/javascript">
                                            $(function(){ $('#satinAl').modal('show'); })
                                        </script>
                                    </div>
                                @endif
                                <div class="modal fade" id="satinAl" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Üye Girişi</h4>
                                            </div>
                                            <div class="modal-body">
                                                @if(Session::has('sepet'))
                                                    <div class="btn btn-danger" style="width: 100%;font-size: 20px;font-weight: 500;font-family: ubuntu;background: #c9302c;border-color:#c9302c;">
                                                        {!! Session::get('sepet') !!}
                                                        <script type="text/javascript">
                                                            $(function(){ $('#satinAl').modal('show'); })
                                                        </script>
                                                    </div>
                                                @endif
                                                {!! Form::open(['action'=>'Site\MemberController@postLogin', 'method'=>'POST']) !!}
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <hr>
                                                <label for="E-mail Adresi" style="margin-top: 5px;font-weight: normal;margin-bottom: 4px;">E-mail Adresi</label>
                                                {!! Form::email('email', null, ['required'=>1,'class'=>'form-control']) !!}
                                                <label for="Şifre" style="margin-top: 5px;font-weight: normal;margin-bottom: 4px;">Şifre</label>
                                                {!! Form::password('password', ['required'=>1,'class'=>'form-control']) !!}
                                                <button style="margin-top: 4px;width: 100%;" class="button"><i class="fa fa-lock"></i> GİRİŞ YAP</button>
                                                {!! Form::close() !!}
                                                <br />
                                                <a href="{!!url('uye/password')!!}"><button style="width: 100%;" class="btn btn-primary btn-xl pull-left"><i class="fa fa-lock"></i> Şifremi Unuttum</button></a>
                                                <br /><br /><br />
                                                <div class="col-md-5" style="border-bottom: 1px solid #ddd;margin-top: 9px;"></div>
                                                <div class="col-md-2" style="font-weight: bold;">YA DA</div>
                                                <div class="col-md-5" style="border-bottom: 1px solid #ddd;margin-top: 9px;"></div>
                                                <br />
                                                <br />
                                                <a href="{!! url('uye/login') !!}" style="width: 100%;" class="btn btn-success">
                                                    <i class="fa fa-user"></i> ÜYE OLMAK İÇİN TIKLAYINIZ
                                                </a>
                                                <br />
                                                <br />
                                                <br />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-addto-links-second">
                                    <a href="" class="action action-print">Yazdır</a>
                                    <a href="" data-toggle="modal" data-target="#myModal" class="action action-friend">Mail Gönder</a>
                                    @if(Session::has('msgSuccess'))
                                        <br />
                                        <div class="alert alert-success">
                                            {{ Session::get('msgSuccess') }}
                                        </div>
                                    @elseif(Session::has('msgError'))
                                        <br />
                                        <div class="alert alert-danger">{{ Session::get('msgError') }}</div>
                                    @endif
                                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Arkadaşıma Gönder</h4>
                                                </div>
                                                {!! Form::open(['action'=>'Site\ProductController@mailGonder', 'method'=>'POST']) !!}
                                                <input type="hidden" value="<?php echo $urunadi1parcala3; ?>" name="urunadi">
                                                <input type="hidden" value="<?php echo $aciklama3; ?>" name="urunaciklamasi">
                                                <input type="hidden" value="{!! url($record->refurl.'-u-'.$record->ID.'.html') !!}" name="urunurl">
                                                <input type="hidden" value="{!! number_format(round($record->IndirimliFiyati), 2, ',', '.') !!} TL" name="urunfiyat">
                                                <input type="hidden" value="{!! url(image($record->Resim)) !!}" name="urunresim">
                                                <div class="modal-body">
                                                    <label for="emmail_register">Adın</label>
                                                    <input type="text" name="name" class="form-control" style="width: 100%;">
                                                    <label for="emmail_register">Arkadaşının e-posta adresi</label>
                                                    <input type="text" name="mail" class="form-control" style="width: 100%;">
                                                    <label for="text">Mesajın</label>
                                                    <textarea style="height: 130px;" type="text" name="mesaj" class="form-control">Bak carvocal.com'da ne buldum, senin de beğeneceğini düşünüyorum.
                                                        </textarea>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">GÖNDER</button>
                                                </div>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="share">

                                </div>
                                <a style="width: 100%;height: 36px;text-align: center;padding-left: 56px;" href="{!! clink('cartAdd', $record->ID) !!}" title="Sepete Ekle" class="add-to-cart btn btn-default">
                                    <span style="margin-left: -32px;">Satın Al</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="product-info-detailed ">
                        <ul class="nav nav-pills" role="tablist">
                            <li role="presentation" class="active"><a href="#description" role="tab" data-toggle="tab">Ürün
                                    Detayı </a></li>
                            <li role="presentation"><a href="#tags" role="tab" data-toggle="tab">Taksit Seçenekleri </a>
                            </li>
                            <li role="presentation"><a href="#additional" role="tab" data-toggle="tab">Ürün
                                    Yorumları</a></li>

                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="description">
                                <div class="block-title">Ürün Detayı</div>
                                <div class="block-content">
                                    {!! $record->Icerik !!}
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="tags">
                                <div class="block-title">Taksit Seçenekleri</div>
                                <div class="block-content">

                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="additional">
                                <div class="block-title">Ürün Yorumları</div>
                                <div class="block-content">
                                    {!! Form::open(['action'=>'Site\ProductController@postYorumEkle', 'method'=>'POST']) !!}
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" placeholder="Adınız Soyadınız..." required>
                                    </div>
                                    <div class="form-group">
                                        <textarea style="height: 142px;" class="form-control" name="comment" placeholder="Yorumunuzu Yazınız..." rows="7" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Güvenlik Kodu:</label>
                                        <div class="kod">{!! $sayi !!}</div>
                                        <input type="hidden" name="sayi1" value="{!! $sayi !!}"/>
                                        <input type="hidden" name="productid" value="{!! $record->ID !!}"/>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" placeholder="Aşağıdaki Güvenlik Kodunu Giriniz..." class="form-control" name="sayi2" required>
                                    </div>

                                    <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i>&nbsp; Yorumu Gönder</button>
                                    {!! Form::close()  !!}

                                    <div class="single-box">
                                        <h2 class="">Yorumlar</h2>
                                        <div class="comment-list">
                                            <ul>
                                                @foreach($yorumlar as $item)
                                                    <li>
                                                        <div class="comment-body">
                                                            <div class="comment-meta">
                                                                <span class="author">{!! $item->name !!}</span>
                                                                <span class="date">{!! $item->updated_at !!}</span>
                                                            </div>
                                                            <div class="comment">
                                                                {!! $item->comment !!}
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div><!-- Main Content -->

                <!-- Sidebar -->
                <div class=" col-md-3 col-sidebar">

                    <div class="block-sidebar block-sidebar-testimonials2">

                        <div class="block-content" style="background-color: #fafafa;">
                            <div class="owl-carousel"
                                 data-nav="false"
                                 data-dots="true"
                                 data-margin="0"
                                 data-items='1'
                                 data-autoplayTimeout="700"
                                 data-autoplay="true"
                                 data-loop="true">
                                <div class="item ">
                                    <div class="des">
                                        zirvesapka.com’dan satın aldığınız ürünler için cayma hakkınızı kullanabilirsiniz
                                    </div>
                                    <a href="" class="btn">Detaylı İncele <i
                                                aria-hidden="true" class="fa fa-angle-double-right"></i></a>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="block-sidebar block-sidebar-products">
                        <div class="block-title" style="padding: 0 6px;">
                            <strong style="text-transform: capitalize;font-size: 15px;">İlginizi Çekebilecek
                                Ürünler</strong>
                        </div>
                        <div class="block-content">
                            <div class="owl-carousel"
                                 data-nav="false"
                                 data-dots="true"
                                 data-margin="0"
                                 data-autoplayTimeout="700"
                                 data-autoplay="true"
                                 data-loop="true"
                                 data-responsive='{
                                "0":{"items":1},
                                "420":{"items":1},
                                "480":{"items":1},
                                "600":{"items":1},
                                "992":{"items":1}
                                }'>
                                <div class="item">
                                    @foreach($ilgiliurunler as $item)
                                        @if($item->Resim==null)

                                        @else
                                            <?php
                                            $urunadi1parcala = str_replace("<p>", "", $item->Baslik);
                                            $urunadi1parcala2 = str_replace("</p>", "", $urunadi1parcala);
                                            $urunadi1parcala3 = str_replace("\r\n", " ", $urunadi1parcala2);
                                            ?>
                                            <div class="product-item product-item-opt-2">
                                                <div class="product-item-info">
                                                    <div class="product-item-photo">
                                                        <a class="product-item-img"
                                                           href="{!! url($item->refurl.'-u-'.$item->ID.'.html') !!}">
                                                            <img src="{!! url(image($item->Resim)) !!}">
                                                        </a>
                                                    </div>
                                                    <div class="product-item-detail">
                                                        <strong class="product-item-name">
                                                            <a href="{!! url($item->refurl.'-u-'.$item->ID.'.html') !!}">
                                                                {!! $urunadi1parcala3 !!}
                                                            </a>
                                                        </strong>
                                                        @if($item->IndirimliFiyati==0)

                                                        @else
                                                            <div class="clearfix">
                                                                <div class="product-item-price">
                                                                    <span class="price">
                                                                        {!! number_format(round($item->IndirimliFiyati), 2, ',', '.') !!} TL
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('js')

@endsection