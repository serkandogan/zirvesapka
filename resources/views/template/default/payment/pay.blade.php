@extends('template.'.$siteTheme.'.layout.master')
@section("content")

    <br><br>
    <div class="container">
        <div class="row">
            <section>
                <div class="wizard">
                    <div class="tab-content">
                        <div class="tab-pane active">
                            <div class="wizard-inner">
                                <div class="teslimat">
                                    <i class="fa fa-archive"></i> <br/>
                                    <p style="width: 199px;font-size: 15px;color: #ccc;margin-top: 14px;margin-left: -47px;">Teslimat Bilgileri</p>
                                </div>
                                <div class="odeme">
                                    <i class="fa fa-credit-card"></i> <br/>
                                    <p style="width: 199px;font-size: 15px;color: #ffa500;margin-top: 14px;margin-left: -47px;">Ödeme Bilgileri</p>
                                </div>
                                <div class="connecting-line"></div>
                                <br/><br/><br/><br/>
                            </div>
                            <div style="width: 100%;margin: 0 auto;display: table;">


                                <script src="https://www.paytr.com/js/iframeResizer.min.js"></script>
                                <iframe src="https://www.paytr.com/odeme/guvenli/{!! $paytr_token !!}" id="paytriframe" frameborder="0" scrolling="no" style="width: 100%;">

                                </iframe>
                                <script>iFrameResize({}, '#paytriframe');</script>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
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
                    cursor: default;
                    background-color: orange;
                    border: none;
                    border-bottom-color: transparent;
                    height: 30px;
                    width: 22px;
                    border-radius: 144px;
                    margin: 1px;
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
                    color: #ccc;
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
                    color: #ffa500;
                }
            </style>
@endsection