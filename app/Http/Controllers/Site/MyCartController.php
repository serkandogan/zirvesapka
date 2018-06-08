<?php

namespace App\Http\Controllers\Site;

use Mail;
use App\Helpers\N11Helper;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SiteController;
use app\Libraries\PaytrUtil;
use App\Models\PaymentNotify;
use App\Models\Product;
use App\Models\Category;
use App\Models\City;
use App\Models\CityTown;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\ProductFeature;
use App\Models\ProductFeatureList;
use App\Models\User;
use App\Models\UserAdres;
use App\Models\Variation;
use Cart;

use Mockery\CountValidator\Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Input;
use Validator;
use Auth;
use Session;
use Illuminate\Http\Request;

class MyCartController extends SiteController
{

    public function getIndex () {
        return view(theme('mycart.index'));
    }

    public function getEkle ($id) {

        $product = Product::find($id);
        if (!$product) {
            return redirect(url('/'));
        }
        $kdv = 0;
        if (!empty($product->Kdv))
            $kdv = $product->Kdv;



        $items = array(
            'id' => $product->ID,
            'name' =>  $product->Baslik,
            'summary' =>  $product->Aciklama,
            'image' =>  url(image($product->Resim)),
            'url' =>  clink('product', $product->refurl, $product->ID, 'return'),
            'priceNew' =>  $product->IndirimliFiyati,
            'price' =>  $product->IndirimliFiyati,
            'code' =>  $product->UrunKodu,
            'kdv'	=> $kdv,
            'currency'	=> 'tl',
            'quantity' => 1,
            'renk' => ''
        );

        Cart::insert($items);


        return redirect('sepet');
    }

    public function postEkle ($id) {

        $product = Product::find($id);
        if (!$product) {
            return redirect(url('/'));
        }
        $kdv = 0;
        if (!empty($product->Kdv))
            $kdv = $product->Kdv;


        $il=Input::get('IlID');

        $deger = explode("|",$il);
        //$deger[1]


        $items = array(

            'id' => $product->ID,
            'name' =>  $product->Baslik,
            'summary' =>  $product->Aciklama,
            'image' =>  url(image($product->Resim)),
            'url' => url($product->refurl.'-u-'.$product->ID.'.html'),
            'priceNew' =>  $product->LFiyat*1.18,
            'price' =>  $product->LFiyat*1.18,
            'code' =>  $product->UrunKodu,
            'kdv'	=> $kdv,
            'currency'	=> 'tl',
            'quantity' => 1,
            'renk' =>Input::get('renk')
        );

        Cart::insert($items);
        return redirect('sepet/satinal');
    }
    public function getEkle2 ($id) {
        $product = Product::find($id);
        if (!$product) {
            return redirect(url('/'));
        }

        // Format array of required info for item to be added to basket...
        /*
         * SEPETE Ekleme işlemi
         */
        $kdv = 0;
        if (!empty($product->Kdv))
            $kdv = $product->Kdv;

        $items = array(
            'id' => $product->ID,
            'name' =>  $product->Baslik,
            'summary' =>  $product->Aciklama,
            'image' =>  $product->Resim,
            'url' =>  clink('product', $product->refurl, $product->ID, 'return'),
            'priceNew' =>  $product->IndirimliFiyati,
            'price' =>  $product->IndirimliFiyati,
            'code' =>  $product->UrunKodu,
            'kdv'	=> $kdv,
            'currency'	=> 'tl',
            'quantity' => 1
        );
        Cart::insert($items);
        return redirect()->back();
    }

    public function getSil ($id)
    {
        Cart::remove($id);
        return redirect()->back();
    }


    public function getBosalt()
    {
        Cart::destroy();
        return redirect()->back();
    }

    /**
     * Satın Alma Bölümü
     */
    public function getSatinal() {
        $adresler = array();
        $adresler[0] = 	"Lütfen Adres Seçiniz";
        foreach (UserAdres::all() as $key => $item) {
            $adresler[$item->id] = $item->AdresAdSoyad;
        }
        $ilListe=City::all();
        $ilceListe = UserAdres::iller();
        return view(theme('mycart.buy'), compact('adresler','ilListe','ilceListe'));
    }

    public function postBuy()
    {

        $bol=Input::get('IlID');
        $sonuc = explode("|", $bol);
        $ilid=$sonuc[0];
        $bolgeid=$sonuc[1];

        DB::beginTransaction();
        $urunler = Cart::contents(true);
        if (!Auth::User()) {
            $validator = Validator::make(Input::all(), ['UyeAdSoyad' => 'required']);
            $validator_message = $validator->messages()->first();
            if ($validator->fails()) {
                return redirect()->back()->withMessage($validator_message);
            }
        }


        $merchant_oid = rand(0, 9999999);
        $add = new Order;
        $add->SiparisNO = 'SIP_' . $merchant_oid;
        $add->UyeAdSoyad = Input::get('UyeAdSoyad');
        $add->Email = Input::get('Email');
        $add->AdresTelefon1 = Input::get('AdresTelefon1');
        $add->IlID = $ilid;
        $add->IlceID = Input::get('IlceID');
        $add->AdresAdres = Input::get('AdresAdres');

        $add->FaturaUnvan = Input::get('FaturaUnvan');
        $add->FaturaCep = Input::get('FaturaCep');
        $add->eposta = Input::get('eposta');
        $add->FaturaIlID = Input::get('FaturaIlID');
        $add->FaturaIlceID = Input::get('FaturaIlceID');
        $add->FaturaVergiDaire = Input::get('FaturaVergiDaire');
        $add->FaturaVergiNumara = Input::get('FaturaVergiNumara');
        $add->FaturaAdres = Input::get('FaturaAdres');
        $add->YeniSiparis = 1;
        $user_address = $add->AdresAdres;
        $user_phone = $add->AdresTelefon1;
        $adres = UserAdres::where(['ID' => $add->FaturaAdresi])->first();
        if (isset($adres)) {
            $user_address = $adres->Adres;
            $user_phone = $adres->Cep;
        } else {
            $user_address = "Adres bulunamadı.";
            $user_phone = "05000000000";
        }

        $add->save();

        $payment_amount = 0;
        $user_basket = [];
        foreach (Cart::contents() as $key => $product) {

            $orderAdd = new OrderDetail;
            $orderAdd->SiparisID = $add->ID;
            $orderAdd->Baslik = $product->name;
            $orderAdd->UrunID = $product->id;
            $orderAdd->Adet = $product->quantity;
            $orderAdd->Fiyat = $product->priceNew;
            if($bolgeid==1){
                $payment_amount += $orderAdd->Fiyat*1.15;
            }elseif($bolgeid==2){
                $payment_amount += $orderAdd->Fiyat*1.30;
            }else{
                $payment_amount += $orderAdd->Fiyat;
            }



            $user_basket[] = array($orderAdd->Baslik, $orderAdd->Fiyat, $orderAdd->Adet);
            $baskey_kayit_sonuc = $orderAdd->save();
            //N11Helper::urunGonder($product->id);
            if (!$baskey_kayit_sonuc) {
                DB::rollback();
                return redirect()->back()->withMessage("Sistemsel bir hata meydana geldi. Lütfen daha sonra tekrar deneyiniz.");
            }
        }
        $user_basket = base64_encode(json_encode($user_basket));
        $payment_amount *= 100;//api kuralı
        $mesajname = Input::get('UyeAdSoyad');
        $merchant_ok_url = 'https://zirvesapka.com/'; // bu değil, paytr sitesi üzerinde olması lazım
        $merchant_fail_url = 'https://zirvesapka.com/';
        $paytrUtil = new PaytrUtil();
        $paytrUtil->setMerchantOkUrl($merchant_ok_url);
        $paytrUtil->setMerchantFailUrl($merchant_fail_url);
        $token = $paytrUtil->sendPayment($add->Email,$payment_amount,$merchant_oid,Input::get('UyeAdSoyad'),$user_address,$user_phone,$user_basket);
        if ($token["status"] == "error") {
            Log::error("Developer_Log-ApiEnchanceError:api paytrden alınamadı.MyCartController");
            //Log::error("Data:" . json_encode($post_vals));
            Log::error("Response:" . json_encode($token['reason']));
            DB::rollback();
            return redirect()->back()->withMessage('Ödeme Başarısız Oldu. Lütfen Bilgilerinizi Kontrol Ediniz.');
        } else {
            $kayit_sonuc = $add->save();
            $token = $token["token"];
            if ($kayit_sonuc) {
                Cache::put("paytr_token", $token, 60);
                $notify_data = new  PaymentNotify;
                $notify_data->MerchantOid = $merchant_oid;
                $notify_data->PaytrToken = $token;
                $notify_data->OrderID = $add->ID;
                $notify_data->hash = $paytrUtil->getHashStr();
                $notify_data->HashCrypted = $paytrUtil->getPaytrToken();
                if (!$notify_data->save()) {
                    DB::rollback();
                    return redirect()->back()->withMessage("Sistemsel bir hata meydana geldi. Lütfen daha sonra tekrar deneyiniz.");
                }
                DB::commit();
                Cart::destroy();
                // return redirect(template('payment/pay'))->with("patr_token", $token);
                /*
                                $siparis = $add->SiparisNO;
                                $ad = $add->UyeAdSoyad;
                                $adres = $add->AdresAdres;
                                $telefon = Input::get('AdresTelefon1');
                                $email =  Input::get('Email');
                                $tarih = \Carbon\Carbon::now()->toDateTimeString();
                                $data = array(
                                    'adsoyad'=>$ad,
                                    'telefon'=>$telefon,
                                    'adres'=>$adres,
                                    'email'=>$email,
                                    'tarih'=>$tarih,
                                    'siparis'=>$siparis
                                );

                                Mail::send('emails.siparis', $data, function($message){
                                    $message->to('serkan@kursistem.com', '')->subject('YENİ BİR SİPARİŞ VAR');

                                });
                */

                return view(theme('payment.pay'))->with("paytr_token", $token);
            } else {
                DB::rollback();
                return redirect()->back()->withMessage('Ödeme Başarısız Oldu. Lütfen Bilgilerinizi Kontrol Ediniz.');
            }
        }
    }


    /**
     * Satın Alma Bölümü
     */
    public function getSuccess() {
        return view(theme('mycart.success'));
    }

    public function success(Request $request)
    {
        return redirect('/');

        $post = $_POST;
        $merchant_key = "AL4ixgRfUag7G3Qd";
        $merchant_salt = "b3nyKPiKM3sHuoC7";
        $hash = base64_encode( hash_hmac('sha256', $post['merchant_oid'].$merchant_salt.$post['status'].$post['total_amount'], $merchant_key, true) );
        if( $hash != $post['hash'] )
            die('PAYTR notification failed: bad hash');
        if( $post['status'] == 'success' ) {



            $siparis=Siparis::where('siparisno', $post['merchant_oid'])->first();
            $adsoyad = $siparis->adsoyad;
            $telefon = $siparis->telefon;
            $adet    = $siparis->adet;
            $fiyat   = $siparis->fiyat;
            $mail    = $siparis->mail;
            $tarih = \Carbon\Carbon::now()->toDateTimeString();
            $data = array(
                'adsoyad'=>$adsoyad,
                'telefon'=>$telefon,
                'adet'=>$adet,
                'fiyat'=>$fiyat,
                'mail'=>$mail,
                'tarih'=>$tarih
            );
            Mail::send('emails.teklif', $data, function($message){
                $message->to('mail@zirvesapka.com', '')->subject('YENİ BİR SATIN ALMA İŞLEMİ YAPILDI');

            });

            Siparis::where('siparisno', $post['merchant_oid'])->update(['odendi' => 1]);


        } else {


        }
        echo "OK";


    }

    /**
     * İl Kontrol
     */
    public function getTown()
    {
        $id = Input::get('id');
        $city = City::where('ID',$id)->first();
        $result = array();
        if (count($city)>0) {
            $town = CityTown::where('IlID', $city->ID)->get();
            if (count($town)>0) {
                foreach ($town as $key => $value) {
                    $result[$value->ID] = $value->Baslik;
                }
            }
        }
        return json_encode(array('ilceler'=>$result));
    }

    /*
     * Adress Bilgileri Getir
     */
    public function getAdress()
    {
        $result = UserAdres::where('id', Input::get('id'))->first();
        if (!empty(Input::get('id')) and (count($result)>0)) {
            return json_encode($result);
        }
        return FALSE;
    }

}