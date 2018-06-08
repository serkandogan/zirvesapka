<footer class="site-footer footer-opt-1">

    <div class="container">
        <div class="footer-column">

            <div class="row">
                <div class="col-md-3 col-lg-3 col-xs-6 col">
                    <strong class="logo-footer">
                        <a href="{!! url('/') !!}"><img src="{!! url(image(ayar('logo'))) !!}" alt="{!! ayar('title') !!}" title="{!! ayar('title') !!}"></a>
                    </strong>

                    <table class="address">
                        <tr>
                            <td><b>Adres:  </b></td>
                            <td>{!! ayar('adres') !!}</td>
                        </tr>
                        <tr>
                            <td><b>Telefon: </b></td>
                            <td><a href="tel:{!! ayar('phone') !!}">{!! ayar('phone') !!}</a> </td>
                        </tr>
                        <tr>
                            <td><b>Whatsapp: </b></td>
                            <td><a href="https://api.whatsapp.com/send?phone=905336386382">0533 638 6382</a></td>
                        </tr>
                        <tr>
                            <td><b>Email:</b></td>
                            <td>{!! ayar('mail') !!}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-3">
                    <ul id="introduce-company" class="introduce-list">
                        <li><a href="{!! url('sayfa/hakkimizda') !!}">Hakkımızda</a></li>
                        <li><a href="{!! url('sayfa/kargo-ve-teslimat') !!}">Kargo ve Teslimat</a></li>
                        <li><a href="{!! url('sayfa/urun-iade-ve-degisim') !!}">Ürün İade ve Değişim</a></li>
                        <li><a href="{!! url('sayfa/mesafeli-satis-sozlesmesi') !!}">Mesafeli Satış Sözleşmesi</a></li>
                        <li><a href="{!! url('sayfa/iletisim') !!}">İletişim</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h3 class="title">Blog Yazıları</h3>
                    <div class="widget-body">
                        <div class="layered">
                            <div class="layered-content">
                                <ul class="blog-list-sidebar clearfix">
                                    @foreach($blogs as $item)
                                        <li>
                                            <div class="post-thumb">
                                                <a href="{!! url('blog/'.$item->refurl) !!}">
                                                    <img title="{!! $item->Baslik !!}" src="{!! url(image($item->Resim)) !!}" alt="{!! $item->Baslik !!}" style="max-height: 60px;">
                                                </a>
                                            </div>
                                            <div class="post-info">
                                                <h5 class="entry_title"><a href="{!! url('blog/'.$item->refurl) !!}">{!! $item->Baslik !!}</a></h5>
                                                <div class="post-meta">
                                                    <span class="date"><i class="fa fa-calendar"></i> {!! $item->created_at !!}</span>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3009.6632989579607!2d29.06016351568434!3d41.032621725874755!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14cac83bc1fd465b%3A0x103fba71516e2442!2zS8O8cGzDvGNlIE1haGFsbGVzaSwgTWVobWV0IEHEn2EgQ2QuIE5vOjQ4LCAzNDY3NiDDnHNrw7xkYXIvxLBzdGFuYnVs!5e0!3m2!1str!2str!4v1524031293831" width="280" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
        <div class="copyright">
            {!! ayar('copyright') !!}
        </div>
    </div>
</footer>
<a href="#" class="back-to-top">
    <i aria-hidden="true" class="fa fa-angle-up"></i>
</a>