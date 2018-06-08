@extends('admin.layouts.layout-admin')

@section('content')
   <div class="page-content-wrapper">
    <div class="page-content">
      <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
      <div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
              <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body">
               Widget settings form goes here
            </div>
            <div class="modal-footer">
              <button type="button" class="btn blue">Save changes</button>
              <button type="button" class="btn default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="portlet box blue">
            <div class="portlet-title">
              <div class="caption">
                <span aria-hidden="true" class="icon-settings"></span></i>Tema Yönetim Paneli Ayarları
              </div>
            </div>
            <div class="portlet-body"><br /><br />
              <div class="tabbable tabbable-tabdrop">
                <ul class="nav nav-tabs">
                  <li class="active">
                    <a href="#genel" data-toggle="tab">
                      <span aria-hidden="true" class="icon-settings"></span>
                      Genel Ayarlar
                    </a>
                  </li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="genel">
                    <div class="portlet light bordered">
                      <div class="portlet-body form">
                        {!! Form::open(['url'=>url('admin/ayarguncelle'),'class'=>'form', 'files'=>true, 'method'=>'POST']) !!}
                        <div class="form-group form-md-line-input" style="height: 214px;">
                        <div class="form-group" style="float:left;">
                          {!! Form::label('url', 'Site Logosu') !!}<br />
                          <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                              <img src="{!! url(image(\App\Models\Ayarlar::get('logo'))) !!}" alt="" /> </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                            <div>
                                                <span class="btn default btn-file">
                                                <span class="fileinput-new"> Resim Seç </span>
                                                <span class="fileinput-exists"> Resim Değiş </span>
                                                <input type="file" name="logo[]" data-oldimage=""  multiple="true"> </span>

                              <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Resim Sil </a>
                              <br /> <span class="fileinput-filename" name="old-resim"> </span>
                            </div>
                          </div>
                        </div>
                        <div class="form-group" style="float:right;">
                          {!! Form::label('url', 'Site Favicon') !!}<br />
                          <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                              <img src="{!! url(image(\App\Models\Ayarlar::get('favicon'))) !!}" alt="" /> </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                            <div>
                            <span class="btn default btn-file">
                            <span class="fileinput-new"> Resim Seç </span>
                            <span class="fileinput-exists"> Resim Değiş </span>
                            <input type="file" name="favicon[]" data-oldimage=""  multiple="true"> </span>
                              <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Resim Sil </a>
                              <br /> <span class="fileinput-filename" name="old-resim"> </span>
                            </div>
                          </div>
                        </div>
                        <div style="display: none;">
                          {!! Form::text('oldlogo', \App\Models\Ayarlar::get('oldlogo'), ['class'=>'form-control']) !!}
                          {!! Form::text('oldfavicon', \App\Models\Ayarlar::get('oldfavicon'), ['class'=>'form-control']) !!}
                        </div>
                        </div>
                            <div class="form-group form-md-line-input">
                            {!! Form::text('url', \App\Models\Ayarlar::get('url'), ['class'=>'form-control','placeholder'=>'sitenizin tam adresini giriniz örn(kursistem.com)']) !!}
                             {!! Form::label('url', 'Site URL Alanı') !!}
                            </div>
                            <div class="form-group form-md-line-input has-success">
                            {!! Form::text('title', \App\Models\Ayarlar::get('title'), ['class'=>'form-control','placeholder'=>'Meta Title Alanı']) !!}
                             {!! Form::label('title', 'Meta Title') !!}
                              <label for="form_control_1"></label>
                            </div>
                            <div class="form-group form-md-line-input has-success">
                            {!! Form::text('description', \App\Models\Ayarlar::get('description'), ['class'=>'form-control','placeholder'=>'Meta Description Alanı']) !!}
                             {!! Form::label('description', 'Meta Description') !!}
                              <label for="form_control_1"></label>
                            </div>
                            <div class="form-group form-md-line-input has-success">
                            {!! Form::text('keyword', \App\Models\Ayarlar::get('keyword'), ['class'=>'form-control','placeholder'=>'Meta Keyword Alanı']) !!}
                             {!! Form::label('keyword', 'Meta Keyword') !!}
                              <label for="form_control_1"></label>
                            </div>
                            <div class="form-group form-md-line-input has-success">
                            {!! Form::text('copyright', \App\Models\Ayarlar::get('copyright'), ['class'=>'form-control','placeholder'=>'']) !!}
                             {!! Form::label('copyright', 'Footer Copyright Yazısı') !!}
                              <label for="form_control_1"></label>
                            </div>
                            <div class="form-group form-md-line-input has-success">
                              {!! Form::text('canonical', \App\Models\Ayarlar::get('canonical'), ['class'=>'form-control','placeholder'=>'']) !!}
                              {!! Form::label('canonical', 'Canonical Bağlantı Alanı') !!}
                              <label for="form_control_1"></label>
                            </div>
                            <div class="form-group form-md-line-input has-success">
                              {!! Form::text('googlemeta', \App\Models\Ayarlar::get('googlemeta'), ['class'=>'form-control','placeholder'=>'']) !!}
                              {!! Form::label('googlemeta', 'Google Webmaster Meta Alanı') !!}
                              <label for="form_control_1"></label>
                            </div>
                            <div class="form-group form-md-line-input has-success">
                              {!! Form::text('yandexmeta', \App\Models\Ayarlar::get('yandexmeta'), ['class'=>'form-control','placeholder'=>'']) !!}
                              {!! Form::label('yandexmeta', 'Yandex Webmaster Meta Alanı') !!}
                              <label for="form_control_1"></label>
                            </div>
                            <div class="form-group form-md-line-input has-success">
                              {!! Form::text('bingmeta', \App\Models\Ayarlar::get('bingmeta'), ['class'=>'form-control','placeholder'=>'']) !!}
                              {!! Form::label('bingmeta', 'Bing Webmaster Meta Alanı') !!}
                              <label for="form_control_1"></label>
                            </div>
                            <div class="form-group form-md-line-input has-success">
                              {!! Form::text('googleanalistik', \App\Models\Ayarlar::get('googleanalistik'), ['class'=>'form-control','placeholder'=>'']) !!}
                              {!! Form::label('googleanalistik', 'Google Analistik Alanı') !!}
                              <label for="form_control_1"></label>
                            </div>
                            <div class="form-group form-md-line-input has-success">
                              {!! Form::text('yandexanalistik', \App\Models\Ayarlar::get('yandexanalistik'), ['class'=>'form-control','placeholder'=>'']) !!}
                              {!! Form::label('yandexanalistik', 'Yandex Analistik Alanı') !!}
                              <label for="form_control_1"></label>
                            </div>
                            <div class="form-group form-md-line-input has-success">
                              {!! Form::text('binganalistik', \App\Models\Ayarlar::get('binganalistik'), ['class'=>'form-control','placeholder'=>'']) !!}
                              {!! Form::label('binganalistik', 'Bing Analistik Alanı') !!}
                              <label for="form_control_1"></label>
                            </div>
                            <div class="form-group form-md-line-input has-success">
                              {!! Form::text('phone', \App\Models\Ayarlar::get('phone'), ['class'=>'form-control','placeholder'=>'']) !!}
                              {!! Form::label('phone', 'Sabit veya Cep Telefon Numaranız') !!}
                              <label for="form_control_1"></label>
                            </div>
                            <div class="form-group form-md-line-input has-success">
                              {!! Form::text('adres', \App\Models\Ayarlar::get('adres'), ['class'=>'form-control','placeholder'=>'']) !!}
                              {!! Form::label('adres', 'Firmanızın Adresi') !!}
                              <label for="form_control_1"></label>
                            </div>
                            <div class="form-group form-md-line-input has-success">
                              {!! Form::text('mail', \App\Models\Ayarlar::get('mail'), ['class'=>'form-control','placeholder'=>'']) !!}
                              {!! Form::label('mail', 'Kurumsal veya Şahsi Mail Adresiniz') !!}
                              <label for="form_control_1"></label>
                            </div>
                            <div class="form-group form-md-line-input has-success">
                              {!! Form::text('facebook-url', \App\Models\Ayarlar::get('facebook-url'), ['class'=>'form-control','placeholder'=>'']) !!}
                              {!! Form::label('facebook-url', 'Facebook Url Adresi Alanı') !!}
                              <label for="form_control_1"></label>
                            </div>
                            <div class="form-group form-md-line-input has-success">
                              {!! Form::text('twitter-url', \App\Models\Ayarlar::get('twitter-url'), ['class'=>'form-control','placeholder'=>'']) !!}
                              {!! Form::label('twitter-url', 'Twitter Url Adresi Alanı') !!}
                              <label for="form_control_1"></label>
                            </div>
                            <div class="form-group form-md-line-input has-success">
                              {!! Form::text('googleplus-url', \App\Models\Ayarlar::get('googleplus-url'), ['class'=>'form-control','placeholder'=>'']) !!}
                              {!! Form::label('googleplus-url', 'Google Plus Url Adresi Alanı') !!}
                              <label for="form_control_1"></label>
                            </div>
                          </div>
                          <div class="form-actions noborder">
                            <button type="submit" class="btn blue">Güncellemeleri Kaydet</button>
                          </div>
                        {!! Form::close() !!}
                      </div>  
                    </div>
                  </div>
                  
                </div>
              </div>
              <p>
                 &nbsp;
              </p>
              <p>
                 &nbsp;
              </p>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>




@endsection

@section('css')
  <link href="{{ asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .page-content-wrapper .page-content {
            margin-left: 110px;
            margin-top: 0px;
            min-height: 600px;
            padding: 25px 20px 10px 20px;
        }
    </style>
@endsection

@section('js')
  <script src="{{ asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}" type="text/javascript"></script>
@endsection