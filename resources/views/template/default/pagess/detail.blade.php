@extends('template.'.$siteTheme.'.layout.master')
@section('content')
    <main class="site-main">
        <div class="columns container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="page-heading">
                        <span class="page-heading-title2">{!! $pages->name !!}</span>
                    </h2>
                    <div class="content-text clearfix">
                        {!! $pages->content !!}
                        @foreach($pages->image($pages->id, 0) as $item)
                            <div class="col-md-2" style="margin-bottom: 8px;">
                                <img src="{!! url(image($item->adi)) !!}" class="img-thumbnail">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection