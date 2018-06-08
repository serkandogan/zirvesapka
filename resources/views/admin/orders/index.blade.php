@extends('admin.layouts.layout-admin')
@section('content')
@include('admin._partials.breadcrumb', ['category' => 'Siparişler', 'page' => 'Siparişler'])
<div class="portlet box green">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-cogs"></i>Siparişler
        </div>
        <div class="tools">
            <a href="javascript:;" class="collapse" data-original-title="" title="">
            </a>
            <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title="">
            </a>
            <a href="javascript:;" class="reload" data-original-title="" title="">
            </a>
            <a href="javascript:;" class="remove" data-original-title="" title="">
            </a>
        </div>
    </div>
    <div class="portlet-body flip-scroll">
        <table class="table table-bordered table-striped table-condensed flip-content">
            <thead class="flip-content">
                <tr>
                    <th width="5%">
                         ID
                    </th>
                    <th>
                         Sipariş No
                    </th>
                    <th>
                         Üye Adı
                    </th>
                    <th>
                         Durum
                    </th>
                    <th>
                         İncele
                    </th>
                </tr>
            </thead>
        <tbody>
        @forelse($orders AS $order)
            <tr>
                <td>
                     <a href="{{ url('admin/orders/'.$order->ID) }}">{{ $order->ID }}</a>
                </td>
                <td>
                     {{ $order->SiparisNo }}
                </td>
                <td>
                     {{ $order->UyeAdSoyad }}
                </td>
                <td>
                    @if($order->Odendi==1)
                        <div class="btn btn-primary">Ödeme Yapıldı</div>
                    @else
                        <div class="btn btn-danger">Ödeme Yapılmadı</div>
                    @endif

                </td>
                <td> 
                        <a href="javascript:void(0);" class="orderstatus" style="margin-right: 10px" data-type="select" 
                        data-id="{!! $order->ID !!}" 
                        data-value="{!! $order->Durum !!}" 
                        data-source="{!!  $order->orderDetailList() !!}" >
                            <label class="label label-success">
                                @if($order->getOrder($order->Durum)==null)
                                   Yeni Sipariş Geldi <b>(Tıkla Durum Belirle)</b>
                                @else
                                    {!! $order->getOrder($order->Durum) !!} <b>(Durum Değiş)</b>
                                @endif
                            </label>
                        </a>
                   
                </td>
                <td>
                    <a href="{{ url('admin/orders/show/'.$order->ID) }}" class="btn btn-primary" >Sipariş Görüntüle</a>
                </td>
               
            </tr>
        @empty
       <tr>
            <td colspan="8">
                Hiç Ürün eklenmemiş
            </td>
        </tr>

        @endforelse

        </tbody>
        </table>
        {{ $orders->render() }}
    </div>
</div>
@endsection
@section('css')
    <link href="{{ asset('assets/plugin/multiselect/css/multi-select.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/global/plugins/bootstrap-editable/inputs-ext/address/address.css') }}"/>
@endsection


@section('js') 
    <script type="text/javascript" src="{{ asset('assets/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js') }}"></script>
    <script src="{{ asset('assets/plugin/multiselect/js/jquery.multi-select.js') }}" type="text/javascript"></script>
    <script>    
        $('.mySelects').multiSelect();
    </script>
    <!-- END PAGE LEVEL SCRIPTS -->
<script>
        jQuery(document).ready(function() {       

            $('.orderstatus').editable({
                type: 'text',
                pk: $(this).attr('data-id'),
                url: '{!! clink('orderStatus') !!}',
                title: 'Sipariş Durumunu Giriniz', 
               
            });
            $('.orderstatus').on('save', function(event, params){
                var deger = params.newValue; 
                var idno = $(this).attr('data-id'); 
                $.post('{!! clink('orderStatus') !!}', 
                    {
                        '_token' : "{!! csrf_token() !!}", 
                        'xtype' : 'OZ', 
                        'newValue' : deger,   
                        'id' : idno
                    }
                );
            });
           
        });   

            /*
         $(document).ready(function(){
             $('.mainDisabled').on('change',function(event){ 
                event.preventDefault();

                var resultValue = $(this).val();
                var disabled = $(this).data('id'); 
                console.log(resultValue);
                console.log(disabled);
                if (resultValue==0) { 
                    $('.mySelects').remove();
                } else { 
                }
           }); 

         });
            */

    </script>
<!-- BEGIN GOOGLE RECAPTCHA -->
<script type="text/javascript">
        var RecaptchaOptions = {
           theme : 'custom',
           custom_theme_widget: 'recaptcha_widget'
        };
    </script>
@endsection