<?php

namespace App\Helpers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class ApiHelper
{

    public static $main_host_adress = "http://magazacidan.com";
    public static $intermediate_host_adress = "http://tacmania.com";
    public static $image_host_adress = "http://tacmania.com/upload/images/";

  
    public static function postUrunGonder($urun)
    {



        foreach (ApiHelper::$main_host_adress as $bayi)
        {

            $api_token = Cache::get('api_token'.$bayi);
            if (!isset($api_token))
            {
                ApiHelper::getToken();
                $api_token = Cache::get('api_token'.$bayi);
            }



            $data = array(
                'api_token' => $api_token,
                'Baslik' => $urun->Baslik,
                'refurl' => $urun->refurl,
                'Resim' => url(ApiHelper::$image_host_adress . $urun->Resim),
                'KategoriID' => ApiHelper::mutfakcilarKategoriId($urun->KategoriID),
                'Icerik' => $urun->Icerik,
                'Fiyat' => $urun->IndirimliFiyati,
                'Aciklama' => $urun->Aciklama,
                'FirmaUrunID' => $urun->ID,
                'UrunID' => $urun->ID,
                'Aktif' => 1,
            );



            $url = $bayi . '/api/adverts/create';
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1); //0 for a get request
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
            curl_setopt($ch, CURLOPT_TIMEOUT, 20);
            $response = json_decode(curl_exec($ch));

            if (isset($response->result) && strcmp($response->result, "Token expired") == 0)
            {
                ApiHelper::getToken();
                $api_token = Cache::get('api_token');
                $data['api_token']=$api_token;
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, 1); //0 for a get request
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
                curl_setopt($ch, CURLOPT_TIMEOUT, 20);
                $response = json_decode(curl_exec($ch));
            }

            if (isset($response->result) && $response->result == false)
            {
                $url = $bayi . '/api/adverts/create';
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, 1); //0 for a get request
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
                curl_setopt($ch, CURLOPT_TIMEOUT, 20);
                $response = json_decode(curl_exec($ch));
            }
            curl_close($ch);

        }
        return true;
    }
    public static function postUrunGuncelle($urun)
    {
        foreach (ApiHelper::$main_host_adress as $bayi)
        {
            $api_token = Cache::get('api_token'.$bayi);
            if (!isset($api_token))
            {
                ApiHelper::getToken();
                $api_token = Cache::get('api_token'.$bayi);
            }

            $galeri=[];
            $gkat=GalleryGroup::where('kid',$urun->ID)->select('id')->first();
            $kids=Gallery::whereIn('kid',$gkat)->get();

            foreach ($kids as $kid)
            {
                $galeri[]=ApiHelper::$image_host_adress. $kid->adi;
            }


            $data = array(
                'api_token' => $api_token,
                'Baslik' => $urun->Baslik,
                'refurl' => $urun->refurl,
                'Resim' => url(ApiHelper::$image_host_adress . $urun->Resim),
                'KategoriID' => ApiHelper::mutfakcilarKategoriId($urun->KategoriID),
                'Icerik' => $urun->Icerik,
                'Fiyat' => $urun->IndirimliFiyati,
                'Aciklama' => $urun->Aciklama,
                'FirmaUrunID' => $urun->ID,
                'UrunID'=>$urun->ID,
                'Aktif' => 1,
                'Galeri'=>isset($gkat)?json_encode(['galeri'=>$galeri,'kid'=>$gkat->id]):""
            );



            $url = $bayi . '/api/products/update';
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1); //0 for a get request
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
            curl_setopt($ch, CURLOPT_TIMEOUT, 20);
            $response = json_decode(curl_exec($ch));

            if (isset($response->result) && strcmp($response->result, "Token expired") == 0)
            {
                ApiHelper::getToken();
                $api_token = Cache::get('api_token');
                $data['api_token']=$api_token;
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, 1); //0 for a get request
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
                curl_setopt($ch, CURLOPT_TIMEOUT, 20);
                $response = json_decode(curl_exec($ch));
            }

            if (isset($response->result) && $response->result == false)
            {
                $url = $bayi . '/api/products/update';
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, 1); //0 for a get request
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
                curl_setopt($ch, CURLOPT_TIMEOUT, 20);
                $response = json_decode(curl_exec($ch));
            }
            curl_close($ch);

        }
        return true;
    }

    public static function postTumUrunleriGonder()
    {
        $urunler = Product::all();
        $sonuc = [];
        foreach ($urunler as $urun)
        {
            $sonuc[] = ApiHelper::postUrunGonder($urun);
        }
        return $sonuc;
    }

    public static function postUrunSil($id)
    {

        $api_token = Cache::get('api_token');
        if (!isset($api_token))
        {
            ApiHelper::getToken();
            $api_token = Cache::get('api_token');
        }


        $data = array(
            'api_token' => $api_token,
        );
        $url = ApiHelper::$main_host_adress . '/api/adverts/delete/' . $id;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1); //0 for a get request
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        $response = json_decode(curl_exec($ch));
        if (isset($response->result) && strcmp($response->result, "Token expired") == 0)
        {
            ApiHelper::getToken();
            $api_token = Cache::get('api_token');
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1); //0 for a get request
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
            curl_setopt($ch, CURLOPT_TIMEOUT, 20);
            $response = json_decode(curl_exec($ch));
        }

    }

    protected static function getToken()
    {
        $username = Auth::user();
        $data = array('email' => base64_encode($username->email), 'password' => base64_encode($username->api_password));

        foreach (ApiHelper::$main_host_adress as $host)
        {
            $url = $host . '/api/getToken';
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1); //0 for a get request
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
            curl_setopt($ch, CURLOPT_TIMEOUT, 20);
            $response = json_decode(curl_exec($ch));
            Cache::put("api_token" . $host, $response->token, 10);
        }
    }

    private static function mutfakcilarKategoriId($kategoriId)
    {
        $kategori = Category::find(['ID' => $kategoriId])->first();
        if (!isset($kategori->MutfakcilarKategoriID))
        {
            return -1;
        }
        return $kategori->MutfakcilarKategoriID;
    }

}	
