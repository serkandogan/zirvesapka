@extends("template.".$siteTheme.".layout.master")
@section("content")
    <div class="container">
        <div class="row">
            {!! Form::open(['action'=>'Site\MyCartController@postBuy', 'method'=>'POST','id'=>"satis-form"]) !!}
                <div class="wizard">
                    <div class="tab-content">
                        <div class="tab-pane active">
                            <div class="col-md-9">
                                <div class="page-content checkout-page">

                                    <div class="wizard-inner">
                                        <div class="teslimat">
                                            <i class="fa fa-archive" style="color:#424a52;"></i> <br/>

                                            <p style="width: 199px;font-size: 15px;color: #424a52;margin-top: 14px;margin-left: -47px;">Teslimat Bilgileri</p>
                                        </div>
                                        <div class="odeme">
                                            <i class="fa fa-credit-card"></i> <br/>
                                            <p style="width: 199px;font-size: 15px;color: #ccc;margin-top: 14px;margin-left: -47px;">Ödeme Bilgileri </p>
                                        </div>
                                        <div class="connecting-line"></div>
                                        <br/><br/><br/><br/>
                                    </div>
                                        {!! Form::hidden('OdemeTuru', 1) !!}
                                        {!! Form::hidden('AdresAdSoyad', null) !!}
                                        {!! Form::hidden('AdresAdres', null) !!}
                                        {!! Form::hidden('IlID', null) !!}
                                        {!! Form::hidden('IlceID', null) !!}
                                        {!! Form::hidden('AdresTelefon1', null) !!}
                                        {!! Form::hidden('AdresCep', null) !!}
                                        {!! Form::hidden('FaturaUnvan', null) !!}
                                        {!! Form::hidden('FaturaAdres', null) !!}
                                        {!! Form::hidden('FaturaIlID', null) !!}
                                        {!! Form::hidden('FaturaIlceID', null) !!}
                                        {!! Form::hidden('FaturaTelefon1', null) !!}
                                        {!! Form::hidden('FaturaCep', null) !!}
                                        {!! Form::hidden('FaturaVergiDaire', null) !!}
                                        {!! Form::hidden('FaturaVergiNumara', null) !!}
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="page-header m-t-0" style="margin-top:0">
                                                <h3>Satın Al</h3>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Adınız Soyadınız</label>
                                                    @if(Auth::check())
                                                        <input name="UyeAdSoyad" type="text" class="form-control" value="{!!  Auth::User()->name !!}" required>
                                                    @else
                                                        <input name="UyeAdSoyad" type="text" class="form-control" placeholder="Adınız Soyadınız..." required>
                                                    @endif
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Mail Adresiniz</label>
                                                    @if(Auth::check())
                                                        <input name="Email" type="text" class="form-control" value="{!!  Auth::User()->email !!}" required>
                                                    @else
                                                        <input name="Email" type="text" class="form-control" placeholder="Mail Adresiniz..." required>
                                                    @endif

                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Telefon Numaranız</label>
                                                    @if(Auth::check())
                                                        <input name="AdresTelefon1" type="text" class="form-control" placeholder="Telefon Numaranız..." value="{!!  Auth::User()->phone !!}" required>
                                                    @else
                                                        <input name="AdresTelefon1" type="text" class="form-control" placeholder="Telefon Numaranız..." required>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                {!! Form::label('IlID', 'Teslimat Yapılacak İli Seçiniz') !!}<br />
                                                <select name="IlID" class="form-control" style="width: 100%;">
                                                    <option value="0">Teslimat Yapılacak İli Seçiniz</option>
                                                    @foreach($ilListe as $item)
                                                        <option value="{!! $item->ID !!}|{!! $item->bolge !!}">{!! $item->Baslik !!}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Adresiniz</label>
                                                @if(Auth::check())
                                                    <input class="form-control" name="AdresAdres" type="text" placeholder="Adresiniz..." required>
                                                @else
                                                    <input class="form-control" name="AdresAdres" type="text" placeholder="Adresiniz..." required>
                                                @endif
                                            </div>
                                            <style>
                                                .alert-info{
                                                    color: #bfd60f;
                                                    background-color: #424a52;
                                                    border-color: #424a52;
                                                }
                                            </style>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3" style="margin-top: 109px;">
                                <table class="table table-striped">
                                    <tbody>
                                    <tr>
                                        <th>
                                            <div style="float:right;color:#424a52;font-size: 16px;font-weight: bold;">Sipariş Özeti</div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <div style="float:right;">{!! Cart::totalItems() !!} Ürün</div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <div style="float:right;">Ödenecek Tutar</div>
                                            <br/>
                                            <div id="hesaplama-sonuc" style="    text-align: right;font-size:32px;font-weight: bold;">
                                                {!! myCart(Cart::contents(true), 'totalPrice') !!} TL
                                            </div>
                                            <div style="float:right;" id="hesaplama-sonuc3"></div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td><button style="background: #4bbde2;
    color: #ffffff;
    padding: 12px;
    border-radius: 4px;
    margin-left: 39px;
    width: 100%;" type="submit" class="button pull-right">Satın Al <i
                                                        style="font-size: 24px;margin-top: -7px;font-weight: bold;margin-left: 8px;" class="fa fa-angle-right"></i></button></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div id="hesaplama-sonuc2"></div>


                            </div>
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('css')
    <!--<link rel="stylesheet" type="text/css" href="{{ asset('template/default/css/satinal.css') }}"/>-->
    <style type="text/css">
        .glyphicon {
            position: relative;
            top: 19px;
            display: inline-block;
            font-family: 'Glyphicons Halflings';
            font-style: normal;
            font-weight: 400;
            line-height: 1;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover {
            color: #555;
            border: none;
        }

        .uyegirisi {
            margin-left: 70px;
            width: 34px;
            margin-bottom: 10px;
            height: 34px;
            border-radius: 84px;
            border: 1px solid #ccc;
        }

        .uyeol {
            width: 34px;
            border: 1px solid #ccc;
            border-radius: 102px;
            height: 34px;
            margin-left: 101px;
            margin-bottom: 10px;
        }

        .direkal {
            width: 254px;
            border: 1px solid #ccc;
            border-radius: 102px;
            height: 34px;
            margin-left: 65px;
            margin-bottom: 10px;
        }

        .tab-pane .wizard-inner .teslimat {
            width: 50px;
            height: 50px;
            border: 1px solid #ccc;
            border-radius: 1000px;
            padding: 12px;
            font-size: 20px;
            padding-left: 14px;
            margin-bottom: 37px;
            margin-left: 36px;
            float: left;
        }

        .tab-pane .wizard-inner .teslimat i {
            color: #ffa500;
        }

        .tab-pane .wizard-inner .odeme {
            width: 50px;
            height: 50px;
            border: 1px solid #ccc;
            border-radius: 1000px;
            padding: 12px;
            font-size: 20px;
            margin-bottom: 37px;
            margin-left: 36px;
            float: left;
            margin-left: 170px;
        }

        .tab-pane .wizard-inner .odeme i {
            color: #ccc;
        }

    </style>
@endsection

@section('js')
    <script src="{{ asset('template/default/lib/select2/js/select2.full.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".select2form").select2();

            $('select[name=IlID]').on('change',function(){
                var id = $(this).val();
                var myarr = id.split("|");
                var myvar = myarr[1];

                var bolge="";
                var fiyat="<?php echo myCart(Cart::contents(true), 'totalPrice'); ?>";
                var nf = new Intl.NumberFormat();
                if(myvar=='2'){
                    bolge="1.30";
                    var hesapla=parseFloat(bolge) * parseInt(fiyat);
                    document.getElementById("hesaplama-sonuc").innerHTML='<div class="sonuc">'+nf.format(hesapla) + " TL</div>";
                    document.getElementById("hesaplama-sonuc3").innerHTML='<div class="kdv">(Kdv Dahil) </div>';

                }else if(myvar=='1'){
                    bolge="1.15";
                    var hesapla=parseFloat(bolge) * parseInt(fiyat);
                    document.getElementById("hesaplama-sonuc").innerHTML='<div class="sonuc">'+nf.format(hesapla) + " TL</div>";
                    document.getElementById("hesaplama-sonuc3").innerHTML='<div class="kdv">(Kdv Dahil) </div>';
                }else{

                    var hesapla=parseInt(fiyat);
                    document.getElementById("hesaplama-sonuc").innerHTML='<div class="sonuc">'+nf.format(hesapla) + " TL</div>";

                }
            });

        });
    </script>
    <!--<script src="{{ asset('template/default/js/satinal.js') }}" type="text/javascript"></script>-->
    <script src="{{ asset('template/default/lib/select2/js/select2.full.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".select2form").select2();


            $('select[name=AdresIlID]').on('change',function(){
                var id = $(this).val();
                if (id != ''){
                    $('select[name=IlceID]').empty();
                    $('select[name=IlceID]').select2("enable", false);
                    $.get("{{url('sepet/town')}}",{id:id,_token:"{!! csrf_token() !!}"},function(response){

                        console.log("aaaa:"+response);
                        $('select[name=IlceID]').empty();
                        $.each(response.ilceler,function(i, item){
                            $("select[name=IlceID]").append('<option value="'+i+'">'+item+'</option>');
                        });
                        $('select[name=IlceID]').select2("enable", true);

                    },'json');
                }
            });
            $('select[name=IlID]').on('change',function(){
                var id = $(this).val();
                if (id != ''){
                    $('select[name=IlceID]').empty();
                    $('select[name=IlceID]').select2("enable", false);
                    $.get("{{url('sepet/town')}}",{id:id,_token:"{!! csrf_token() !!}"},function(response){

                        console.log("aaaa:"+response);
                        $('select[name=IlceID]').empty();
                        $.each(response.ilceler,function(i, item){
                            $("select[name=IlceID]").append('<option value="'+i+'">'+item+'</option>');
                        });
                        $('select[name=IlceID]').select2("enable", true);

                    },'json');
                }
            });

        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("select[name=adres_liste_sec]").change(function () {
                $("#satis-form").append("<input type='hidden' name='teslimat_adres' value='" + $("select[name=adres_liste_sec]").val() + "'>");
            });
            $("select[name=fatura_liste_sec]").change(function () {
                $("#satis-form").append("<input type='hidden' name='fatura_adres' value='" + $("select[name=fatura_liste_sec]").val() + "'>");
            });
        });
    </script>
@endsection