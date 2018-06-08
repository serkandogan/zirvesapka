@extends('admin.layouts.layout-admin')
@section('content')
    @include('admin._partials.breadcrumb', ['category' => 'Siparişler', 'page' => 'Siparişler'])
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs"></i>Havale Siparişleri
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
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th width="5%">
                            ID
                        </th>
                        <th>
                            Ad Soyad
                        </th>
                        <th>
                            Adres
                        </th>
                        <th>
                            Telefon No
                        </th>
                        <th>
                            Tarih
                        </th>
                        <th>
                            Mail
                        </th>
                        <th>
                            Kontrol Edildi / Edilmedi
                        </th>
                        <th>
                            Görüntüle
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($form AS $item)
                        <tr>
                            <td>
                                {{ $item->id }}
                            </td>
                            <td>
                                {{ $item->name }}
                            </td>
                            <td>
                                {{ $item->adress }}
                            </td>
                            <td>
                                {{ $item->phone }}
                            </td>
                            <td>
                                {{ $item->date }}
                            </td>
                            <td>
                                {{ $item->mail }}
                            </td>
                            <td>
                                @if($item->active==0)
                                    {!! Form::model($item, ['action'=>['Admin\TransferFormController@postUpdate', $item->id], 'files'=>true, 'method'=>'POST']) !!}
                                        <button type="submit" class="btn btn-danger">Havale Kontrol Edilmedi</button>
                                        <input name="active" value="1" style="display: none;" type="text"/>
                                    {!! Form::close() !!}
                                @else
                                    {!! Form::model($item, ['action'=>['Admin\TransferFormController@postUpdate2', $item->id], 'files'=>true, 'method'=>'POST']) !!}
                                    <button type="submit" class="btn btn-primary">Havale Kontrol Edildi</button>
                                    <input name="active" value="0" style="display: none;" type="text"/>
                                    {!! Form::close() !!}
                                @endif
                            </td>
                            <td>

                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target=".bs-example-modal-lg{!! $item->id !!}"><i class="fa fa-search"></i> Görüntüle </button>

                                <div class="modal fade bs-example-modal-lg{!! $item->id !!}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel"><b>{!! $item->name !!}</b> HAVALE BİLGİLERİNE BAKILIYOR</h4>
                                            </div>
                                            <div class="modal-body">
                                                    <h1 class="font-green sbold uppercase">
                                                        {!! $item->name !!}
                                                    </h1>
                                                    <ul class="list-inline">
                                                        <li>
                                                            <i class="fa fa-map-marker"></i> Adres :
                                                            @if($item->adress==null)
                                                                <div class="label label-danger">Müşteri Adres Bilgisini Girmemiş</div>
                                                            @else
                                                                {!! $item->adress !!}
                                                            @endif
                                                        </li>
                                                        <br />
                                                        <br />
                                                        <li>
                                                            <i class="fa fa-phone"></i> Telefon : {!! $item->phone !!}
                                                        </li>
                                                        <br />
                                                        <br />
                                                        <li>
                                                            <i class="fa fa-envelope-o"></i> Mail : {!! $item->mail !!}
                                                        </li>
                                                    </ul>
                                                <h3 class="font-green sbold uppercase">
                                                     Banka Bilgileri
                                                </h3>
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
                                                        @foreach($bank as $banka)
                                                            @if($banka->id==$item->bank_id)
                                                            <tr>
                                                                <th scope="row">{!! $banka->id !!}</th>
                                                                <td>{!! $banka->name !!}</td>
                                                                <td>{!! $banka->kind !!}</td>
                                                                <td>{!! $banka->account_name !!}</td>
                                                                <td>{!! $banka->branch_name !!}</td>
                                                                <td>{!! $banka->branch_code !!}</td>
                                                                <td>{!! $banka->account_number !!}</td>
                                                                <td>{!! $banka->iban !!}</td>
                                                            </tr>
                                                            @else

                                                            @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>

                                                <table class="table table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Ürün Resmi</th>
                                                        <th>Ürün Adı</th>
                                                        <th>Ürün Adedi</th>
                                                        <th>Ürün Fiyatı</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($product as $urun)
                                                        @if($urun->ID==$item->product_id)
                                                            <tr>
                                                                <th scope="row">{!! $urun->ID !!}</th>
                                                                <td><img style="width: 100px;" src="{!! url(image($urun->Resim)) !!}"></td>
                                                                <td>{!! $urun->Baslik !!}</td>
                                                                <td><div class="label label-primary">1 Adet</div></td>
                                                                <td><div class="label label-danger">{!! $urun->IndirimliFiyati !!} <i class="fa fa-try"></i></div></td>
                                                            </tr>
                                                        @else

                                                        @endif
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </td>
                            <td>
                                <a class="" style="color:#fff;" href="{!!  action('Admin\TransferFormController@getDestroy', [$item->id]) !!}" onclick="return confirm('Silmek istediğinizden emin misiniz?');">
                                    <i style="border-radius: 0px;width: 36px;margin-left: -8px;" class="btn btn-danger fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8">
                                Hiç Havale Gelmemiş
                            </td>
                        </tr>

                    @endforelse
                </tbody>
            </table>

            {{ $form->render() }}
        </div>
    </div>
@endsection
@section('css')
    <link href="{{ asset('assets/plugin/multiselect/css/multi-select.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/global/plugins/bootstrap-editable/inputs-ext/address/address.css') }}"/>
    <style type="text/css">
        #hover {
            background: #eeeeee;
            padding: 6px;
            display: block;
            position: relative;

        }

        #hover:hover {
            background: #dddddd;
            text-decoration: none;
        }

        #popup {
            opacity: 0;
            position: absolute;
            top: -95px;
            left: -400px;
            background: #fafafa;
            border: 1px solid transparent;
            border-radius: 6px;
            height: 0px;
            padding: 0 12px;
            overflow: hidden;
            -webkit-transition: all 500ms;
            transition: all 500ms;
        }


        #hover:hover #popup {
            padding: 12px 12px;
            height: auto;
            opacity: 1;
            border: 1px solid #eeeeee;
        }
    </style>


@endsection


@section('js')
    <script type="text/javascript" src="{{ asset('assets/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.js') }}"></script>
    <script src="{{ asset('assets/plugin/multiselect/js/jquery.multi-select.js') }}" type="text/javascript"></script>
    <script>
        $('#example').popover(options)
    </script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <script>
        jQuery(document).ready(function () {

            $('.orderstatus').editable({
                type: 'text',
                pk: $(this).attr('data-id'),
                url: '{!! clink('orderStatus') !!}',
                title: 'Sipariş Durumunu Giriniz',

            });
            $('.orderstatus').on('save', function (event, params) {
                var deger = params.newValue;
                var idno = $(this).attr('data-id');
                $.post('{!! clink('orderStatus') !!}',
                        {
                            '_token': "{!! csrf_token() !!}",
                            'xtype': 'OZ',
                            'newValue': deger,
                            'id': idno
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
            theme: 'custom',
            custom_theme_widget: 'recaptcha_widget'
        };
    </script>
@endsection