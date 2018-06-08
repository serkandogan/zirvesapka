@extends('template.'.$siteTheme.'.layout.master')
@section('content')
    <div class="columns-container">
        <div class="container" id="columns">
            <div class="row">
                <div class="center_column col-xs-12 col-sm-12" id="center_column">
                    <h2 class="page-heading">
                        <span class="page-heading-title2">HAVALE BİLGİLERİ</span>
                    </h2>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Banka Adı</th>
                                <th>Hesap Türü</th>
                                <th>Hesap Adı</th>
                                <th>Şube Adı</th>
                                <th>Şube Kodu</th>
                                <th>Hesap No</th>
                                <th>IBAN</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($havale as $item)
                                <tr>
                                    <th scope="row">{!! $item->id !!}</th>
                                    <td>{!! $item->name !!}</td>
                                    <td>{!! $item->kind !!}</td>
                                    <td>{!! $item->account_name !!}</td>
                                    <td>{!! $item->branch_name !!}</td>
                                    <td>{!! $item->branch_code !!}</td>
                                    <td>{!! $item->account_number !!}</td>
                                    <td>{!! $item->iban !!}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <h2 class="page-heading">
                        <span class="page-heading-title2">HAVALE YAPILACAK ÜRÜN</span>
                    </h2>
                    {!! Form::open(['action'=>'Site\ProductController@postHavale', 'files'=>true,'method'=>'POST']) !!}
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
                            $fiyat=$product->IndirimliFiyati;
                            $kdvsiztutar="1,18";

                            $kdvsiz=($fiyat)/1.18;
                            $kapidaodeme=($fiyat)/1.10;
                            $havale=($fiyat)/1.18;
                            ?>
                            <td class="price" style="text-align: center;font-weight: bold;"><span><?php echo number_format(round($fiyat), 2, ',', '.'); ?> TL</span></td>

                        </tr>

                        </tbody>
                    </table>
                    <div class="col-md-12">
                        <h2 class="page-heading">
                            <span class="page-heading-title2">HAVALE BİLDİRİM FORMU</span>
                        </h2>
                        <div class="box-border">
                            <ul>
                                <li class="row">
                                    <div class="col-sm-12">
                                        <label for="first_name" class="required">Adınız Soyadınız</label>
                                        <input type="text" class="input form-control" name="name" id="first_name">
                                    </div><!--/ [col] -->
                                </li><!--/ .row -->
                                <li class="row">
                                    <div class="col-sm-12">
                                        <label for="company_name">Mail Adresi</label>
                                        <input type="text" name="mail" class="input form-control" id="company_name">
                                    </div><!--/ [col] -->
                                </li><!--/ .row -->
                                <li class="row">
                                    <div class="col-xs-12">

                                        <label for="address" class="required">Telefon Numarası</label>
                                        <input type="text" class="input form-control" name="phone" id="address">

                                    </div><!--/ [col] -->
                                </li><!-- / .row -->
                                <li class="row">
                                    <div class="col-xs-12">

                                        <label for="address" class="required">Adres</label>
                                        <textarea type="text" class="input form-control" name="adress" id="address"></textarea>

                                    </div><!--/ [col] -->
                                </li><!-- / .row -->
                                <li class="row">
                                    <div class="col-xs-12">

                                        <label for="address" class="required">Banka Seçiniz</label>
                                        <select class="form-control"  name="bank_id">
                                            <option value="0">Banka Seçiniz</option>
                                            @foreach($havale2 as $item)
                                                <option value="{!! $item->id !!}">{!! $item->name !!}</option>
                                            @endforeach
                                        </select>
                                        <input type="text" class="input form-control" name="product_id" value="{!! $product->ID !!}" style="display: none;" id="address">

                                    </div><!--/ [col] -->
                                </li><!-- / .row -->
                            </ul>
                            <br />
                            <button type="submit" class="btn btn-danger" style="width: 100%;">BİLDİRİMİ GÖNDER</button>
                        </div>

                    </div>
                    {!! Form::close() !!}


                </div>
            </div>
        </div>
    </div>
@endsection