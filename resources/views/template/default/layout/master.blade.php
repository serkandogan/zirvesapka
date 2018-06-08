<!DOCTYPE html>
    <html lang="tr" class="no-js">
     <head>
         <title>{!! getTitle(@$getTitle) !!}</title>
         <meta name="description" content="{!! getTitle(@$getDescription) !!}"/>
         <meta name="keywords" content="{!! ayar('keyword') !!}"/>
         <link rel="canonical" href="{!! ayar('canonical') !!}"/>
         <meta name="twitter:card" content="summary_large_image" />
         <meta name="twitter:site" content="{{ ayar('url') }}" />
         <meta name="twitter:title" content="{!! getTitle(@$getTitle) !!} - Haberi Görmek İçin Tıklayınız" />
         <meta name="twitter:description" content="{!! getTitle(@$getDescription) !!}" />
         <meta name="twitter:image" content="{!! getTitle(@$getImage) !!}" />
         <meta name="author" content="Kursistem Bilişim Teknolojileri" />
         <meta name="contact_addr" content="destek@kursistem.com" />
         <meta property="og:url"                content="{!! getTitle(@$getUrl) !!}" />
         <meta property="og:type"               content="article" />
         <meta property="og:title"              content="{!! getTitle(@$getTitle) !!} - Haberi Görmek İçin Tıklayınız" />
         <meta property="og:description"        content="{!! getTitle(@$getDescription) !!}" />
         <meta property="og:image"              content="{!! getTitle(@$getImage) !!}" />
         <meta itemprop="name" content="{!! getTitle(@$getTitle) !!} - Haberi Görmek İçin Tıklayınız">
         <meta itemprop="description" content="{!! getTitle(@$getDescription) !!}">
         <meta itemprop="image" content="{!! getTitle(@$getImage) !!}">
         <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
         <meta id="Content-Language" http-equiv="Content-Language" content="tr"/>
         {!! ayar('googlemeta') !!}
         {!! ayar('yandexmeta') !!}
         {!! ayar('bingmeta') !!}
         {!! ayar('googleanalistik') !!}
         {!! ayar('yandexanalistik') !!}
         {!! ayar('binganalistik') !!}
         <link rel="icon" type="image/png" href="{!! url(image(ayar('favicon'))) !!}" />
         <meta name="x-canonical-url" content="/"/>
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <link rel="stylesheet" type="text/css" href="{!! url('css/style.css') !!}">
        @yield('css')
         <script type="text/javascript">
             var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
             (function(){
                 var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
                 s1.async=true;
                 s1.src='https://embed.tawk.to/5ad649745f7cdf4f0532ff41/default';
                 s1.charset='UTF-8';
                 s1.setAttribute('crossorigin','*');
                 s0.parentNode.insertBefore(s1,s0);
             })();
         </script>
         <link rel="stylesheet" href="{!! url('css/jquery.lightbox.css') !!}">
    </head>
     <body class="index-opt-1 catalog-product-view catalog-view_op1">
         <?php
         $iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
         $android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
         $webos = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
         $bberry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
         $ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
         if ($iphone || $android || $webos || $ipod || $bberry == true){

             $url="https://m.zirvesapka.com".$_SERVER["REQUEST_URI"];
             echo "<script>window.location='".$url."'</script>";
         }
         ?>
         <div class="wrapper">
            @include(theme('layout.header'))
                @yield('content')
            @include(theme('layout.footer'))
         </div>

         <script type="text/javascript" src="{!! url('js/jquery.min.js') !!}"></script>
         <script type="text/javascript" src="{!! url('js/jquery.sticky.js') !!}"></script>
         <script type="text/javascript" src="{!! url('js/owl.carousel.min.js') !!}"></script>
         <script type="text/javascript" src="{!! url('js/bootstrap.min.js') !!}"></script>
         <script type="text/javascript" src="{!! url('js/jquery.countdown.min.js') !!}"></script>
         <script type="text/javascript" src="{!! url('js/jquery.bxslider.min.js') !!}"></script>
         <script type="text/javascript" src="{!! url('js/jquery.actual.min.js') !!}"></script>
         <script type="text/javascript" src="{!! url('js/jquery-ui.min.js') !!}"></script>
         <script type="text/javascript" src="{!! url('js/chosen.jquery.min.js') !!}"></script>
         <script type="text/javascript" src="{!! url('js/jquery.parallax-1.1.3.js') !!}"></script>
         <script type="text/javascript" src="{!! url('js/jquery.elevateZoom.min.js') !!}"></script>
         <script src="{!! url('js/fancybox/source/jquery.fancybox.pack.js') !!}"></script>
         <script src="{!! url('js/fancybox/source/helpers/jquery.fancybox-media.js') !!}"></script>
         <script src="{!! url('js/fancybox/source/helpers/jquery.fancybox-thumbs.js') !!}"></script>
         <script src="{!! url('js/arcticmodal/jquery.arcticmodal.js') !!}"></script>
         <script type="text/javascript" src="{!! url('js/main.js') !!}"></script>
         <script type="text/javascript" src="{!! url('js/jquery.lightbox.min.js') !!}"></script>
         <script type="text/javascript">
             jQuery(document).ready(function ($) {
                 $('.lightbox').lightbox();
                 $('.pop-up').trigger("click");
             });
         </script>
		@yield('js')
    </body>
</html>