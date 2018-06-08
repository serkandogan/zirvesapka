@extends('template.'.$siteTheme.'.layout.master')
@section('content')
    <main class="site-main">

        <div class="columns container">
            <div class="row">
                <div class="col-md-12">
                    <div class=" toolbar-products toolbar-top">
                        <h1 class="cate-title">{!! $record->Baslik !!}</h1>
                    </div>
                    <div class="products  products-grid">
                        <ol class="product-items row">
                            @foreach($categoryResults as $item)
                                @if($item->Resim==null)

                                @else
                                    @include(theme('category.loop'))
                                @endif
                            @endforeach
                        </ol>
                    </div>
                    <div class=" toolbar-products toolbar-bottom">
                        <ul class="pagination">
                            {!! $categoryResults->render() !!}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection