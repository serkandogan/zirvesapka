@extends('template.'.$siteTheme.'.layout.master')
@section('content')
<form action="{{URL::current()}}">
<div class="columns-container">
    <div class="container" id="columns">
        <div class="row">
            <!-- Left colunm -->
            <div class="column col-xs-12 col-sm-3" id="left_column">
                <div class="block left-module">
                    <p class="title_block">Ürünler</p>
                    <div class="block_content">
                        <ul class="blog-list-sidebar clearfix">
                            @foreach($urunler as $item)
                                <li>
                                    <div class="post-thumb">
                                        <a href="{!! url($item->refurl.'-u-'.$item->ID.'.html') !!}">
                                            <img src="{!! url(image($item->Resim)) !!}" alt="{!! $item->Baslik !!}" title="{!! $item->Baslik !!}">
                                        </a>
                                    </div>
                                    <div class="post-info">
                                        <h5 class="entry_title"><a href="{!! url($item->refurl.'-u-'.$item->ID.'.html') !!}">{!! $item->Baslik !!}</a></h5>
                                        <b style="color: #03A9F4;">{!! $item->IndirimliFiyati !!} TL</b>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
            <div class="center_column col-xs-12 col-sm-9" id="center_column">
                <h2 class="page-heading" style="height: 53px;">
                    <span class="page-heading-title2">
                        <img style="width: 185px;position: absolute;" src="{!! url(image('carvocaltv.png')) !!}">
                    </span>
                </h2>
                <ul class="blog-posts">
                    @foreach($blog as $item)
                        <li class="post-item col-md-6" style="height: 314px;">
                            <article class="entry">
                                <div class="row" style="margin-right: 5px;">
                                    <div class="entry-thumb image-hover2" style="width: 300px;">
                                        {!! $item->embed !!}
                                    </div>
                                    <div class="entry-ci">
                                        <h3 class="entry-title"><a href="{!! url('video/'.$item->refurl) !!}">{!! $item->name !!}</a></h3>
                                        <div class="entry-meta-data">
                                            <span class="author">
                                            <i class="fa fa-user"></i>
                                            Yazar: {!! $item->author !!}</span>
                                            <span class="date"><i class="fa fa-calendar"></i> {!! $item->created_at !!}</span>
                                        </div>
                                    </div>

                                </div>
                            </article>
                        </li>
                    @endforeach
                    {!! $blog->render() !!}
                </ul>

            </div>
        </div>
    </div>
</div>
</form>
@endsection
@section('css')
    <style type="text/css">
        iframe{
            width: 355px;
            height: 200px;
        }
    </style>
@endsection