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