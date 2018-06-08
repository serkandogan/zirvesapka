<li class="col-sx-12 col-sm-3" style="width: 300px;">
    <div class="product-container">
        <div class="left-block">
            <a href="{!! clink('product', $item->refurl, $item->ID) !!}">
                <img src="{!! url(image($item->Resim)) !!}" alt="{!! $item->Baslik !!}">
            </a>
            <div class="add-to-cart">
                <a title="Sepete Ekle" href="{!! clink('cartAdd', $item->ID) !!}">Sepete Ekle</a>
            </div>
        </div>
        <div class="right-block">
            <h5 class="product-name"><a href="{!! url($item->refurl.'-u-'.$item->ID.'.html') !!}">{!! $item->Baslik !!}</a></h5>
            <div class="content_price">
                <span class="price product-price">{!! $item->LFiyat !!} TL</span>
                <span class="price old-price">{!! $item->IndirimliFiyat !!} TL</span>
            </div>
        </div>
    </div>
</li>