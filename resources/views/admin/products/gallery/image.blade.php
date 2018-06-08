@extends('admin.layouts.layout-admin')

@section('content')

    @include('admin._partials.breadcrumb', ['category' => 'Ürün Galerisi', 'page' => 'Ürün Galerisi'])

        {!! Form::open(['action'=>'Admin\GalleryController@postCreate', 'files'=>true, 'method'=>'POST']) !!}
        {!! Form::hidden('urunID', $product->ID) !!}
            <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption"> Ürün Resim Ekleme
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
                        		{!! Form::text('filename', $product->Baslik, ['class'=>'form-control','placeholder'=>'Dosya Başlığını Giriniz']) !!}
                        	</div>
                    	</div>
                    </div>
                    </div>
                </div>


        {!! Form::close() !!}  

     








        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption"> Ürün Resimleri
                </div>
            </div>

            <div class="portlet-body">
            {{--*/ $urunID = $product->ID; /*--}}
            @if(count($gallery)>0)
                <div class="row">
					@foreach($gallery as $item)
					<div class="col-sm-4 col-md-3">
						<a href="#" class="thumbnail"> 
							<img src="{!! galleryImg('images/'.$item->adi) !!}" alt="">
							<span class="caption">
				                 <a style="color:#fff;" class="btn btn-danger" href="{!! action('Admin\GalleryController@getDelete', [$item->id, $urunID]) !!}" onclick="return confirm('Kaydı silmek istediğinizden emin misiniz?')" title="Sil"><i class="fa fa-trash"></i> Resmi Sil</a>
							</span>
						</a>
					</div>
					@endforeach
            	</div>
            @else
            	<div class="alert alert-info"><b>Bilgilendirme!</b> Kayıtlı ürün resimi bulunamadı.</div>
            @endif
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
@section('js')
<script>
    jQuery(document).ready(function() {       
       // initiate layout and plugins
           Metronic.init(); // init metronic core components
Layout.init(); // init current layout
QuickSidebar.init(); // init quick sidebar
Demo.init(); // init demo features
           ComponentsFormTools.init();
        });   
    </script>
<!-- BEGIN GOOGLE RECAPTCHA -->
<script type="text/javascript">
        var RecaptchaOptions = {
           theme : 'custom',
           custom_theme_widget: 'recaptcha_widget'
        };
    </script>
@endsection