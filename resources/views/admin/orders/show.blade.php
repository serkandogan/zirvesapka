@extends('admin.layouts.layout-admin')

@section('content')

    @include('admin._partials.breadcrumb', ['category' => 'Sipariş', 'page' => 'Sipariş Detayı'])




<div class="invoice" style="margin-top: 5px;">
				<div class="row invoice-logo">
					<div class="col-xs-6 invoice-logo-space">
						<img src="{!! url(image(ayar('logo'))) !!}" class="img-responsive" alt="">
					</div>
					<div class="col-xs-6">

					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-xs-4">
						<h3>Sipariş Veren Kişinin Bilgileri:</h3>
						<ul class="list-unstyled">
							<li>
								<b>Sipariş Numarası:</b> {{ $order->SiparisNo }}
							</li>
							<li>
								<b>Adı ve Soyadı:</b>
								@if($order->user['name']==null)
									{{ $order->AdresAdSoyad }}
								@else
									{{ $order->user['name'] }}
								@endif

							</li>
							<li>
								<b>Mail Adresi:</b> {{ $order->user['email'] }}
							</li>

						</ul>
					</div>
					<div class="col-xs-4">
						<h3>Teslimat Adresi</h3>
						<ul class="list-unstyled">

							@if($order->useradres['AdresTuru']==1)
								<li>
									<b>Ad Soyad:</b> {!! $order->useradres['AdSoyad'] !!}
								</li>
								<li>
									<b>Teslimat Adresi:</b> {{ $order->useradres['Adres'] }}  <b>{!! $ilce->Baslik !!}</b> / <b>{!! $il->Baslik !!}</b>
								</li>
								<li>
									<b>Sabit Telefonu:</b> {{ $order->useradres['Sabit'] }}
								</li>
								<li>
									<b>Cep Telefonu:</b> {{ $order->useradres['Cep'] }}
								</li>
							@else
								<li>
									<b>Ad Soyad:</b> {!! $order->AdresAdSoyad !!}
								</li>
								<li>
									<b>Teslimat Adresi:</b> {{ $order->AdresAdres }} <b>{!! $ilce->Baslik !!}</b> / <b>{!! $il->Baslik !!}</b>
								</li>
								<li>
									<b>Sabit Telefonu:</b> {{ $order->AdresTelefon1 }}
								</li>
								<li>
									<b>Cep Telefonu:</b> {{ $order->AdresCep }}
								</li>
							@endif
						</ul>
					</div>
					<div class="col-xs-4 invoice-payment">
						<h3>Fatura Bilgileri:</h3>
						<ul class="list-unstyled">
							@if($order->useradres['AdresTuru']==2)
								<li>
									<b>Ad Soyad:</b> {{ $order->useradres['AdSoyad'] }}
								</li>
								<li>
									<b>Fatura Adresi:</b> {{ $order->useradres['FaturaAdres'] }} <b>{!! $ilce->Baslik !!}</b> / <b>{!! $il->Baslik !!}</b>
								</li>
								<li>
									<b>Fatura Vergi Numarası:</b> {{ $order->useradres['FaturaVergiNumara'] }}
								</li>
								<li>
									<b>Sabit Telefonu:</b> {{ $order->useradres['FaturaTelefon1'] }}
								</li>
								<li>
									<b>Cep Telefonu:</b> {{ $order->useradres['FaturaCep'] }}
								</li>
							@else
								<li>
									<b>Ad Soyad:</b> {!! $order->AdresAdSoyad !!}
								</li>
								<li>
									<b>Teslimat Adresi:</b> {{ $order->AdresAdres }} <b>{!! $ilce->Baslik !!}</b> / <b>{!! $il->Baslik !!}</b>
								</li>
								<li>
									<b>Sabit Telefonu:</b> {{ $order->AdresTelefon1 }}
								</li>
								<li>
									<b>Cep Telefonu:</b> {{ $order->AdresCep }}
								</li>
							@endif
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-9">
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th>
										 Sipariş ID
									</th>
									<th>
										 Ürün Adı
									</th>
									<th>
										 Ürün Rengi
									</th>
									<th>
										 Ürün Numarası
									</th>
									<th class="hidden-480">
										Ürün Adedi
									</th>
									<th class="hidden-480">
										 Ürün Fiyatı
									</th>
								</tr>
							</thead>
							<tbody>
							@foreach($orderdetail as $order)
								<tr>
									<td>
										{!! $order->ID !!}
									</td>
									<td>
										{!! $order->Baslik !!}
									</td>
									<td>
										{!! $order->Renk !!}
									</td>
									<td>
										{!! $order->Numara !!}
									</td>
									<td class="hidden-480">
										{!! $order->Adet  !!} Adet
									</td>
									<td class="hidden-480">
										{!! $order->Fiyat !!} <i class="fa fa-try"></i>
									</td>
								</tr>
							@endforeach

							</tbody>
						</table>
					</div>

					<div class="col-md-3">
						<ul class="list-group">
							<li class="list-group-item">
								<?php
								$galeri = \App\Models\Product::image_static($urun->ID)
								?>
								@if($galeri!==null && $urun!==null&&$urun->ID>0 )
									<img style="width: 250px;" class="img-responsive" alt="product" src="https://derinet.com.tr/upload/image/{!! $galeri!=null?$galeri->adi:"" !!}"/>
								@endif

							</li>
							<li class="list-group-item">Ürün Adı : <b>{!! $urun->Baslik !!}</b></li>
							<li class="list-group-item">Ürün Kodu : <b>{!! $urun->UrunKodu !!}</b></li>
							<li class="list-group-item">Fiyatı : <b>{!! $urun->IndirimliFiyati !!} <i class="fa fa-try"></i> </b></li>
							<li class="list-group-item">
								<a target="_blank" href="{!! url($urun->refurl.'-u-'.$urun->ID.'.html') !!}" class="btn btn-danger" style="width: 100%;">
									<i class="fa fa-send"></i>
									Ürüne Git
								</a>
							</li>
						</ul>

					</div>
				</div>
				<div class="row">
					<div class="col-xs-4">

					</div>
					<div class="col-xs-8 invoice-block">
						<ul class="list-unstyled amounts">

						</ul>
						<br>
						<a class="btn btn-lg blue hidden-print margin-bottom-5" onclick="javascript:window.print();">
						Yazdır <i class="fa fa-print"></i>
						</a>
					</div>
				</div>
			</div>










@endsection