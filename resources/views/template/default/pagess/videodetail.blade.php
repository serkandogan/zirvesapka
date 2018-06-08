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
                <h2 class="page-heading">
                    <span class="page-heading-title2">{!! $record->name !!}</span>
                </h2>
                <article class="entry-detail">
                    <div class="content-text clearfix" style="width: 100%;">
                        <div style="width: 100%;">{!! $record->embed !!}</div>
                    </div>
                </article>

            </div>
        </div>
    </div>
</div>
</form>
@endsection
@section('css')
    <style type="text/css">
        iframe{
            width: 100%;
            height: 550px;
        }
    </style>
@endsection