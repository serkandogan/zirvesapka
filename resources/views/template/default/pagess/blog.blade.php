@extends('template.'.$siteTheme.'.layout.master')
@section('content')
    <main class="site-main">
        <div class="columns container">
            <ol class="breadcrumb no-hide">
                <li><a href="{!! url('/') !!}">Ana Sayfa    </a></li>
                <li><a href="{!! url('/blog') !!}">Blog    </a></li>
            </ol>
            <div class="row">
                <div class="col-md-9 col-md-push-3  col-main ">
                    <h2 class="page-heading">
                        <span class="page-heading-title2">Blog Yazıları</span>
                    </h2>
                    <ul class="blog-posts">
                        @foreach($blog as $yazi)
                            <li class="post-item">
                                <article class="entry">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <div class="entry-thumb image-hover2">
                                                <a href="{!! url('blog/'.$yazi->refurl) !!}">
                                                    <img src="{!! url(image($yazi->Resim)) !!}" alt="Blog">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="entry-ci">
                                                <h3 class="entry-title">
                                                    <a href="{!! url('blog/'.$yazi->refurl) !!}">
                                                        {!! $yazi->Baslik !!}
                                                    </a>
                                                </h3>
                                                <div class="entry-excerpt">
                                                    {!! $yazi->Aciklama !!}
                                                </div>
                                                <div class="entry-more">
                                                    <a href="{!! url('blog/'.$yazi->refurl) !!}">İncele</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </li>
                        @endforeach





                    </ul>
                    <div class="sortPagiBar clearfix">
                        <div class="bottom-pagination">
                            <nav>
                                <ul class="pagination">
                                    {!! $blog->render() !!}
                                </ul>
                            </nav>
                        </div>
                    </div>
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
                    </div>
                </div><!-- Sidebar -->
            </div>
        </div>
    </main>

@endsection