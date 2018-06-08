<?php 
/** 
 * loop.blade.php Sayfasının görevi; Ürün listeleme sayfalarında kullanılacak olan standart tek düzeni sağlayacak dosya. 
 * Tüm ürünler listelemerline müdahale etmemizi kolaylaşıtrmak için oluşturulmuştur..
 * 11/5/16 @KURSISTEM
*/
?>
@if(count($products)>1) 
@foreach($products as $item)
        <li>
            <div class="product-container">
                <div class="product-image">
                    <a href="{!! clink('product', $item->refurl, $item->ID) !!}">
                       
                    </a>
                </div>
                <div class="product-meta">
                    <h5 class="product-name">
                        <a href="{!! clink('product', $item->refurl, $item->ID) !!}">{!! $item->Baslik !!}</a>
                    </h5>
                    <div class="product-price">
                        <span class="price">{!! $item->LFiyat !!} TL</span>
                        <span class="price-old">{!! $item->IndirimliFiyati !!} TL</span>
                    </div>
                </div>
            <div class="add-to-cart">
                <a title="Sepete Ekle" alt="Sepete Ekle" href="{!! clink('cartAdd', $item->ID) !!}">Sepete Ekle</a>
            </div>
            </div>
        </li>
@endforeach
@endif