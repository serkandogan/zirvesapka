@extends("template.".$siteTheme.".layout.master")
@section("content")
	<?php

	set_time_limit(0);

	date_default_timezone_set('Europe/Istanbul');

	function sendRequest($site_name,$send_xml,$header_type=array('Content-Type: text/xml'))
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$site_name);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,$send_xml);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HTTPHEADER,$header_type);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 120);

		$result = curl_exec($ch);

		return $result;
	}

	$_POST['kullanici']="8506677056";
	$_POST['sifre']="j3942r";
	$_POST['baslik']="KURSISTEM";
	$_POST['metin']="derinete yeni sipariş geldi.";
	$_POST['alicilar']="05333801754";
	$_POST['karaliste']="kendi";
	$_POST['tarih']= date('Y-m-d H:i:s');

	if (isset($_POST['kullanici']))
	{
		$xml = '<SMS>'.
				'<oturum>'.
				'<kullanici>'.$_POST['kullanici'].'</kullanici>'.
				'<sifre>'.$_POST['sifre'].'</sifre>'.
				'</oturum>'.
				'<baslik>'.$_POST['baslik'].'</baslik>'.
				'<mesaj>'.
				'<metin>'.$_POST['metin'].'</metin>'.
				'<alici>'.$_POST['alicilar'].'</alici>'.
				'</mesaj>'.
				'<karaliste>'.$_POST['karaliste'].'</karaliste>'.
				'<tarih>'.$_POST['tarih'].'</tarih>'.
				'<izin_link>true</izin_link>'.
				'<izin_telefon>true</izin_telefon>'.
				'</SMS>';

		$sonuc	= sendRequest('http://www.dakiksms.com/api/xml_ozel_api_ileri.php', $xml);

		if (substr($sonuc, 0, 2) == 'OK')
		{
			list($ok, $mesaj_id) = explode('|', $sonuc);
			echo 'Mesaj gönderildi. Rapor için ' . $mesaj_id . ' kodunu kullanabilirsiniz.';
		}
		elseif (substr($sonuc, 0, 3) == 'ERR')
		{
			list($err, $mesaj) = explode('|', $sonuc);
			echo 'Hata (' . $err . ') oluştu. ' . $mesaj;
		}
		else
		{
			echo 'Bilinmeyen bir hata oluştu. ' . $sonuc;
		}
	}

	?>
@endsection