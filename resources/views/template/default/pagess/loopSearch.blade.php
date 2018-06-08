 <li class="urunler" style="width:240px;">
    <div class="left-block">
        <a alt="" href="{!! clink('product', $item->refurl, $item->ID) !!}">
            <img style="    overflow: hidden;
    max-height: 134px;" class="img-responsive" src="{!! $item->Resim !!}" alt="{!! $item->Baslik !!}"/>
        </a>
    </div>
    <div class="right-block">
        <h5 class="product-name">
        <a href="{!! clink('product', $item->refurl, $item->ID) !!}">
            {!! $item->Baslik !!}
        </a>
        </h5>
        <div class="content_price">
            <span class="price product-price">{!! $item->LFiyat !!} TL</span>
        </div>
    </div>
    <a href="{!! clink('cartAdd', $item->ID) !!}">
        <div class="sepete-ekle2">
            Sepete Ekle
            
        </div>
    </a>
    <a href="{!! clink('product', $item->refurl, $item->ID) !!}">
        <div class="incele2">
            Ürüne Git
            <i class="fa fa-search"></i>
        </div>
    </a>
        <div class="cizgi"></div>
        <img class="urun-icon" src="{!! themeUrl('images/icon.png') !!}">
</li>   