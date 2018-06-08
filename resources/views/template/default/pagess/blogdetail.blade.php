@extends('template.'.$siteTheme.'.layout.master')
@section('content')
    <main class="site-main">
        <div class="columns container">
            <ol class="breadcrumb no-hide">
                <li><a href="#">Ana Sayfa    </a></li>
                <li><a href="#">Blog    </a></li>
                <li class="active">{!! $record->Baslik !!}</li>
            </ol>
            <div class="row">
                <div class="col-md-9 col-md-push-3  col-main ">
                    <h1 class="page-heading">
                        <span class="page-heading-title2">
                            {!! $record->Baslik !!}
                        </span>
                    </h1>
                    <article class="entry-detail">
                        <div class="entry-photo" style="width: 400px;float:left;margin-right: 5px;margin-bottom: 5px;">
                            <img src="{!! url(image($record->Resim)) !!}" alt="Blog">
                        </div>
                        <div class="content-text clearfix">
                            {!! $record->Icerik !!}
                        </div>
                    </article>
                </div><!-- Main Content -->

                <!-- Sidebar -->
                <div class=" col-md-3 col-md-pull-9   col-sidebar">
                    <div class="block-sidebar block-PopularPosts">
                        <div class="block-title">
                            <strong>Ürünler</strong>
                        </div>
                        <div class="block-content">
                            <ul class="blog-list-sidebar clearfix">
                                @foreach($urunler as $item)
                                    @if($item->Resim==null)

                                    @else
                                        <li>
                                            <div class="post-thumb">
                                                <a href="{!! url($item->refurl.'-u-'.$item->ID.'.html') !!}">
                                                    <img alt="{!! $item->Baslik !!}" src="{!! url(image($item->Resim)) !!}">
                                                </a>
                                            </div>
                                            <div class="post-info">
                                                <h5 class="entry_title"><a href="{!! url($item->refurl.'-u-'.$item->ID.'.html') !!}">{!! $item->Baslik !!}</a></h5>
                                            </div>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div><!-- Block  Popular Posts-->
                </div><!-- Sidebar -->
            </div>
        </div>
    </main>
@endsection