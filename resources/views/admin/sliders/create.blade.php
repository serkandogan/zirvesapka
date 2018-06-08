@extends('admin.layouts.layout-admin')

@section('content')

    @include('admin._partials.breadcrumb', ['category' => 'Slider', 'page' => 'Slider Ekle'])

           {!! Form::open(['action'=>'Admin\SliderController@getCreate', 'files'=>true, 'method'=>'POST']) !!}
            <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption"> Slider Resim Ekleme
                        </div>
                        
                    </div>
                    <div class="portlet-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                {!! Form::label('imagefile','Dosya Seçiniz') !!}
                                {!! Form::file('imagefile', null, ['class'=>'form-control']) !!}
                            </div>
                            <div class="actions btn-set">
                                <button class="btn green"><i class="fa fa-check"></i> Resmi Ekle</button>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                {!! Form::label('filename','Dosya Adı') !!}
                                {!! Form::text('filename',  ['class'=>'form-control','placeholder'=>'Dosya Başlığını Giriniz']) !!}
                            </div>
                        </div>
                    </div>
                    </div>
                </div>


        {!! Form::close() !!}  

     








        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption"> Slider Resimleri
                </div>
            </div>

            <div class="portlet-body">
           
            </div>
        </div>



        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Resmi Düzenle ya da Değiştir</h4>
              </div>
              <div class="modal-body">
                  




              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                <button type="button" class="btn btn-primary">Kaydet</button>
              </div>
            </div>
          </div>
        </div>

@endsection