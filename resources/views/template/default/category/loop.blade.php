<?php
$urunadi1parcala= str_replace("<p>","",$item->Baslik);
$urunadi1parcala2= str_replace("</p>","",$urunadi1parcala);
$urunadi1parcala3= str_replace("\r\n"," ",$urunadi1parcala2);
?>
<li class="col-sm-3 product-item">
    <div class="product-item-opt-1" style="height: 410px;">
        <div class="product-item-info">
            <div class="product-item-photo">
                <a href="{!! url($item->refurl.'-u-'.$item->ID.'.html') !!}" class="product-item-img">
                    <img style="max-height: 330px;" src="{!! url(image($item->Resim)) !!}">
                </a>
                @if($item->LFiyat==null || $item->LFiyat==$item->IndirimliFiyati)

                @else
                    <span class="product-item-label label-price" style="background-color: #fe0103e6;">
                         <?php
                        $lfiyat = $item->LFiyat;
                        $indirimlifiyati = $item->IndirimliFiyati;
                        if($lfiyat==null){
                            $indirim="";
                        }else{
                            $indirim = ($lfiyat - $indirimlifiyati) / $lfiyat * 100;
                            echo '%'.round($indirim);
                        }
                        ?>
                     </span>
                @endif
            </div>
            <div class="product-item-detail" style="text-align: center;">
                <strong class="product-item-name">
                    <a href="{!! url($item->refurl.'-u-'.$item->ID.'.html') !!}">
                        {!! $urunadi1parcala3 !!}
                    </a>
                </strong>
            </div>
        </div>
    </div>
</li>