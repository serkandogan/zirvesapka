@extends('admin.layouts.layout-admin')

@section('content')

    @include('admin._partials.breadcrumb', ['category' => 'Slider', 'page' => 'Slider'])
     <div class="portlet-body" style="    margin-bottom: 10px;">
                                              
        <a href="{{ url('admin/products/create') }}" class="icon-btn">
        <i class="fa fa-sitemap"></i>
        <div>
             Ürün Ekle
        </div>
        </a>             
        <a href="{{ url('admin/categories') }}" class="icon-btn">
        <i class="fa fa-sitemap"></i>
        <div>
             Tüm Kategoriler
        </div>          
        <a href="{{ url('admin/categories/create') }}" class="icon-btn">
        <i class="fa fa-sitemap"></i>
        <div>
             Kategori Ekle
        </div>
        </a>           
        <a href="{{ url('admin/pagess') }}" class="icon-btn">
        <i class="fa fa-sitemap"></i>
        <div>
            Tüm Sayfalar
        </div>
        </a>         
        <a href="{{ url('admin/pagess/create') }}" class="icon-btn">
        <i class="fa fa-sitemap"></i>
        <div>
             Sayfa aEkle
        </div>
        </a>          
        <a href="{{ url('admin/brands') }}" class="icon-btn">
        <i class="fa fa-sitemap"></i>
        <div>
            Tüm Markalar
        </div>
        </a>         
        <a href="{{ url('admin/brands/create') }}" class="icon-btn">
        <i class="fa fa-sitemap"></i>
        <div>
             Marka Ekle
        </div>
        </a>         
        <a href="{{ url('admin/groups') }}" class="icon-btn">
        <i class="fa fa-sitemap"></i>
        <div>
             Tüm Gruplar
        </div>
        </a>       
        <a href="{{ url('admin/groups/create') }}" class="icon-btn">
        <i class="fa fa-sitemap"></i>
        <div>
             Grup Ekle
        </div>
        </a>
       
    </div>
    {!! Form::open(['action'=>'Admin\SliderController@postCreate', 'files'=>true, 'method'=>'POST']) !!}
            <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption"> Slider Resim Ekleme
                        </div>
                        
                    </div>
                    <div class="portlet-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                {!! Form::label('image','Dosya Seçiniz') !!}
                                {!! Form::file('image', null, ['class'=>'form-control']) !!}
                            </div>

                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                {!! Form::label('imagename','Dosya Adı') !!}
                                {!! Form::text('imagename',  null, ['class'=>'form-control','placeholder'=>'Dosya Başlığını Giriniz']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('text','Dosya Açıklaması') !!}
                                {!! Form::textarea('text',  null, ['class'=>'form-control','placeholder'=>'Dosya Açıklamasını Giriniz','style'=>'height:30px;']) !!}
                            </div>

                        </div>
                        <div class="actions btn-set">
                            <button style="margin-left:10px;width: 99%;margin-right: 10px;" class="btn btn-danger"><i class="fa fa-check"></i> Resmi Ekle</button>
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
            @if(count($records)>0)
                <div class="row">
                <div id="sortableMain">
                    
                    @foreach($records as $item)
                    <div style="margin-left: 10px;" id="{!! $item->id !!}" class="col-sm-4 col-md-3 thumbnail sortableProccess"  data-id="{!!  $item->id !!}">
                        
                            <img src="{!! galleryImg($item->image, 'slider') !!}" alt="">
                            <span class="caption">  

                                 <a style="width: 100%;margin-left: -9px;" class="btn btn-danger" href="{!! action('Admin\SliderController@getDelete', [$item->id]) !!}" onclick="return confirm('Kaydı silmek istediğinizden emin misiniz?')" title="Sil"><i class="fa fa-trash"></i> Resmi Sil</a>
                            </span>
                        
                    </div>
                    @endforeach
                </div>
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
        <div id="result" class="alert alert-info hidden"></div>


@endsection

@section('css')
    <link href="{{ asset('assets/global/plugins/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/global/plugins/jquery-minicolors/jquery.minicolors.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css') }}" rel="stylesheet" type="text/css"/>
<style>
    .sortableProccess:hover {cursor:move;}
</style>

@endsection

@section('js')
    <script src="{{ asset('assets/global/plugins/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>


    <script src="{{ asset('assets/global/plugins/jquery-minicolors/jquery.minicolors.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/bootstrap-selectsplitter/bootstrap-selectsplitter.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/jquery-minicolors/jquery.minicolors.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/autosize/autosize.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}" type="text/javascript"></script>
    <script>
        jQuery(document).ready(function() {       
           // initiate layout and plugins
            Metronic.init(); // init metronic core components
            Layout.init(); // init current layout
            QuickSidebar.init(); // init quick sidebar
            Demo.init(); // init demo features 
            
        if (!jQuery().colorpicker) {
            return;
        }
        $('.colorpicker-default').colorpicker({
            format: 'hex'
        });
        $('.colorpicker-rgba').colorpicker();


        /**
         * jQuery Sortable
         */ 
        $('#sortableMain').sortable({
             update: function(evets){
                var orderList = jQuery(this).sortable('toArray');
                console.log(orderList);
                var dataSend = {_token: "{!! csrf_token() !!}",list:orderList}; 
                jQuery.post("{!! clink('sliderOder') !!}",dataSend,function(result){

                    console.log("result:" + result); 
                    jQuery('#result').removeClass('hidden').html("İşlem başarıya gerçekleştirildi..");
                },'json');   

             }    
        });
        jQuery("#sortableMain").disableSelection();


        });   

    </script>
@endsection