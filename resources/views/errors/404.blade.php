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
    <link rel="stylesheet" type="text/css" href="{{ asset(themeUrl('lib/bootstrap/css/bootstrap.min.css')) }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset(themeUrl('lib/font-awesome/css/font-awesome.min.css')) }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset(themeUrl('lib/select2/css/select2.min.css')) }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset(themeUrl('lib/jquery.bxslider/jquery.bxslider.css')) }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset(themeUrl('lib/owl.carousel/owl.carousel.css')) }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset(themeUrl('lib/jquery-ui/jquery-ui.css')) }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset(themeUrl('lib/fancyBox/jquery.fancybox.css')) }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset(themeUrl('css/animate.css')) }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset(themeUrl('css/reset.css')) }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset(themeUrl('css/style.css')) }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset(themeUrl('css/responsive.css')) }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset(themeUrl('css/option7.css')) }}" />
    <script src="{{ asset(themeUrl('lib/jquery/jquery-1.11.2.min.js')) }}"></script>
    @yield('css')
</head>
<body class="home option7">
@include(theme('layout.header'))
<div class="columns-container">
    <div class="container" id="columns">

        <h2 class="page-heading">
            <span class="page-heading-title2">Authentication</span>
        </h2>
        <!-- ../page heading-->
        <div class="page-content">
            <div class="row">
                <div class="col-sm-6">
                    <div class="box-authentication">
                        <h3>Create an account</h3>
                        <p>Please enter your email address to create an account.</p>
                        <label for="emmail_register">Email address</label>
                        <input id="emmail_register" type="text" class="form-control">
                        <button class="button"><i class="fa fa-user"></i> Create an account</button>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="box-authentication">
                        <h3>Already registered?</h3>
                        <label for="emmail_login">Email address</label>
                        <input id="emmail_login" type="text" class="form-control">
                        <label for="password_login">Password</label>
                        <input id="password_login" type="password" class="form-control">
                        <p class="forgot-pass"><a href="#">Forgot your password?</a></p>
                        <button class="button"><i class="fa fa-lock"></i> Sign in</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include(theme('layout.footer'))

<script src="{{ asset(themeUrl('lib/bootstrap/js/bootstrap.min.js')) }}"></script>
<script src="{{ asset(themeUrl('lib/select2/js/select2.min.js')) }}"></script>
<script src="{{ asset(themeUrl('lib/jquery.bxslider/jquery.bxslider.min.js')) }}"></script>
<script src="{{ asset(themeUrl('lib/owl.carousel/owl.carousel.min.js')) }}"></script>
<script src="{{ asset(themeUrl('lib/countdown/jquery.plugin.js')) }}"></script>
<script src="{{ asset(themeUrl('lib/countdown/jquery.countdown.js')) }}"></script>
<script src="{{ asset(themeUrl('lib/fancyBox/jquery.fancybox.js')) }}"></script>
<script src="{{ asset(themeUrl('js/jquery.actual.min.js')) }}"></script>
<script src="{{ asset(themeUrl('js/theme-script.js')) }}"></script>
<script src="{{ asset(themeUrl('js/option4.js')) }}"></script>
@yield('js')
</body>
</html>