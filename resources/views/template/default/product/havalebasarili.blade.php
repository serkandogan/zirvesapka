@extends('template.'.$siteTheme.'.layout.master')
@section('content')
    <div class="columns-container">
        <div class="container" id="columns">
            <div class="row">
                <div class="center_column col-xs-12 col-sm-12" id="center_column" style="height:400px;text-align: center;border: 1px solid #ccc;border-radius: 10px;padding-top: 80px;">
                    <i style="font-size: 35px;" class="odeme fa fa-check"></i>
                    <div class="col-md-12">
                        <div class="kapida-text">Havale Bildirim Siparişiniz Onaylandı!</div>
                    </div>
                    <div class="col-md-12" style="margin-top: 10px;">
                        <a href="{!! url('/') !!}" class="btn btn-success">
                            <i style="margin-top: 2px;" class="fa fa-check-square-o"></i> Daha Fazla Ürün Almak İçin Tıklayın
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <style type="text/css">
        .odeme{
            text-align:center;
            border:1px solid #4eae49;
            width: 100px;
            height: 100px;
            border-radius: 100px;
            padding: 30px;
            font-size: 35px;
            color:#4eae49;
        }
        .odeme{
            font-size: 35px;
        }
        .kapida-text{
            font-size: 30px;
            color: #2A2C2E;
            font-family: ubuntu;
            font-weight: bold;
        }
    </style>
@endsection