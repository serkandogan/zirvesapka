@extends('template.'.$siteTheme.'.layout.master')
@section('content')
    <div class="columns-container">
        <div class="container" id="columns">
            <div class="row">
                <div class="center_column col-xs-12 col-sm-12" id="center_column">
                    <h2 class="page-heading">
                        <span class="page-heading-title2">KAPIDA ÖDEME YAPILACAK ÜRÜN</span>
                    </h2>
                    {!! Form::open(['action'=>'Site\ProductController@postKapidaOdeme', 'files'=>true,'method'=>'POST']) !!}
                        <table class="table table-bordered table-responsive cart_summary">
                            <tbody>
                            <tr>
                                <td class="cart_product">
                                    <a href="{!! url($product->refurl.'-u-'.$product->ID.'.html') !!}">
                                        <img src="{!! url(image($product->Resim)) !!}" alt="{!! $product->Baslik !!}" title="{!! $product->Baslik !!}"></a>
                                </td>
                                <td class="cart_description">
                                    <p class="product-name"><a href="{!! url($product->refurl.'-u-'.$product->ID.'.html') !!}">{!! $product->Baslik !!}</a></p>
                                </td>
                                <?php
                                $fiyat=$product->IndirimliFiyati+50;
                                $kdvsiztutar="1,18";

                                $kdvsiz=($fiyat)/1.18;
                                $kapidaodeme=($fiyat)/1.10;
                                $havale=($fiyat)/1.18;
                                ?>
                                <td class="price" style="text-align: center;font-weight: bold;"><span><?php echo number_format(round($fiyat), 2, ',', '.'); ?> TL</span></td>
                                <input type="text" value="{!! $product->ID !!}" name="product_id" style="display: none;"/>
                            </tr>

                            </tbody>
                        </table>
                        <div class="col-md-12">
                            <h2 class="page-heading">
                                <span class="page-heading-title2">KAPIDA ÖDEME FORMU</span>
                            </h2>
                            <div class="box-border">
                                <ul>
                                    <li class="row">
                                        <div class="col-sm-12">
                                            <label for="first_name" class="required">Adınız Soyadınız</label>
                                            <input type="text" class="input form-control" name="name" id="first_name">
                                        </div>
                                    </li>
                                    <li class="row">
                                        <div class="col-sm-12">
                                            <label for="first_name" class="required">Kargo Seçiniz</label>
                                            <select class="form-control" name="cargo" id="">
                                                <option value="0">Kargo Seçiniz...</option>
                                                <option value="1">Yurtiçi Kargo</option>
                                                <option value="2">Aras Kargo</option>
                                                <option value="3">PTT Kargo</option>
                                            </select>
                                        </div>
                                    </li>
                                    <li class="row">
                                        <div class="col-xs-12">
                                            <label for="address" class="required">Telefon Numarası</label>
                                            <input type="text" class="input form-control" name="phone" id="address">
                                        </div>
                                    </li>
                                    <li class="row">
                                        <div class="col-xs-12">
                                            <label for="address" class="required">Adres Bilgileri</label>
                                            <textarea name="adress" class="form-control"></textarea>
                                        </div>
                                    </li>
                                    <li class="row">
                                        <div class="col-sm-12">
                                            <label for="company_name">Mail Adresi</label>
                                            <input type="text" name="mail" class="input form-control" id="company_name">
                                        </div>
                                    </li>

                                </ul>
                                <br />
                                <button type="submit" class="btn btn-danger" style="width: 100%;">KAPIDA ÖDEME İSTEĞİNİ GÖNDER</button>
                            </div>

                        </div>
                    {!! Form::close() !!}


                </div>
            </div>
        </div>
    </div>
@endsection