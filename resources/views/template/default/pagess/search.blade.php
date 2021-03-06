@extends('template.'.$siteTheme.'.layout.master')
@section('content')
<div class="columns-container">
    <div class="container" id="columns" style="background:#fff;padding:10px;">
        <div class="row">
            <div class="column col-xs-12 col-sm-3" id="left_column">
                <div class="block left-module">
                   <img style="width:193px;height:331px;" src="{!! themeUrl('endustriyel-mutfak-ekipmanlari/endustriyel-mutfak-aksesuarlari-banner.gif') !!}" alt="adv">
                </div>
                <div class="block left-module">
                    <p class="title_block">Kategoriler</p>
                    <div id='cssmenu'>
                        <ul>
                            {!! $getCategory !!}
                        </ul>
                    </div>
                </div>
            </div>
            <div class="center_column col-xs-12 col-sm-9" id="center_column">
                <div class="cat-short-desc">
                    <div class="desc-text text-left">
                        <p>
                        </p>
                    </div>
                    <div class="cat-short-desc-products">
                        <ul class="row">
                            
                        </ul>
                    </div>
                </div>
                <div id="view-product-list" class="view-product-list">
                    <h2 class="page-heading">
                        <span class="page-heading-title"><b>{!! $keyword !!}</b> ile ilgili arama sonuçları</span>
                    </h2>
                    <ul class="product-list">
                        @if(count($productlists)>1) 
                            @foreach($productlists as $item)
                                @include(theme('category.loop'))
                            @endforeach
                        @endif 
                    </ul>
                   
                </div>
                <div style="width:700px;">
                    {{ $productlists->render() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('css')
   <style type="text/css">
        #cssmenu {
            width: 263px;
            overflow-y: scroll;
            overflow-x: hidden;
            height: 352px;
        }
   </style>
@endsection
@section('js')
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){

    $('#cssmenu > ul > li ul').each(function(index, element){
      var count = $(element).find('li').length;
      var content = '<span class="cnt">' + count + '</span>';
      $(element).closest('li').children('a').append(content);
    });
    $('#cssmenu ul ul li:odd').addClass('odd');
    $('#cssmenu ul ul li:even').addClass('even');
    $('#cssmenu > ul > li > a').click(function() {

      var checkElement = $(this).next();

      $('#cssmenu li').removeClass('active');
      $(this).closest('li').addClass('active'); 

      if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
        $(this).closest('li').removeClass('active');
        checkElement.slideUp('normal');
      }
      if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
        $('#cssmenu ul ul:visible').slideUp('normal');
        checkElement.slideDown('normal');
      }

      if($(this).closest('li').find('ul').children().length == 0) {
        return true;
      } else {
        return false; 
      }

    });

    });
</script>
@endsection