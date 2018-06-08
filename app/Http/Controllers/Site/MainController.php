<?php

namespace App\Http\Controllers\Site;
use Mail;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SiteController;
use anlutro\cURL\cURL as cURL;
use App\Models\Page;
use App\Models\Product;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Product2;
use Validator;
use App\Models\Form;
use SoapBox\Formatter\Formatter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class MainController extends SiteController
{
	public function getIndex() {
		$urunler 	= Product::orderBy('ID','desc')->orderBy('ID','DESC')->paginate(8);
		$slider 	= Slider::orderBy('order','asc')->get();
		$kategori 	= Category::where('gid',0)->orderBy('ID','DESC')->paginate(12);
		$altkategoriler=Category::all();
		$firsaturunleri=Product::where('FirsatUrun',1)->orderBy('ID','DESC')->paginate(8);
		$kampanyaliurunler=Product::where('KampanyaliUrun',1)->orderBy('ID','DESC')->paginate(8);


        $sapkalar = Category::where('ID', '=', 1)->first();
        $sapkakategori = Category::getMainCategoryList($sapkalar->ID, $sapkalar->gid);
        $sapka = Product::whereIn('KategoriID', $sapkakategori)->inRandomOrder()->orWhere('KategoriID', $sapkalar->ID)->paginate(5);

        $bereler = Category::where('ID', '=', 24)->first();
        $berekategori = Category::getMainCategoryList($bereler->ID, $bereler->gid);
        $bere = Product::whereIn('KategoriID', $berekategori)->inRandomOrder()->orWhere('KategoriID', $bereler->ID)->paginate(5);

        $eldivenler = Category::where('ID', '=', 28)->first();
        $eldivenkategori = Category::getMainCategoryList($eldivenler->ID, $eldivenler->gid);
        $eldiven = Product::whereIn('KategoriID', $eldivenkategori)->inRandomOrder()->orWhere('KategoriID', $eldivenler->ID)->paginate(5);

        $atkilar = Category::where('ID', '=', 33)->first();
        $atkikategori = Category::getMainCategoryList($atkilar->ID, $atkilar->gid);
        $atki = Product::whereIn('KategoriID', $atkikategori)->inRandomOrder()->orWhere('KategoriID', $atkilar->ID)->paginate(5);

        $tshirhtler = Category::where('ID', '=', 33)->first();
        $tshirhtkategori = Category::getMainCategoryList($tshirhtler->ID, $tshirhtler->gid);
        $tshirt = Product::whereIn('KategoriID', $tshirhtkategori)->inRandomOrder()->orWhere('KategoriID', $tshirhtler->ID)->paginate(5);


        $yelekler = Category::where('ID', '=', 47)->first();
        $yelekkategori = Category::getMainCategoryList($yelekler->ID, $yelekler->gid);
        $yelek = Product::whereIn('KategoriID', $yelekkategori)->inRandomOrder()->orWhere('KategoriID', $yelekler->ID)->paginate(5);

        $satisdanismanlari=Page::where('gid',1)->orderBy('sira','asc')->get();


        $getTitle=ayar('title');
        $getDescription=ayar('description');
        $getKeyword=ayar('keywords');
		return view(theme('home'), compact('slider','urunler','kategori','firsaturunleri',
            'kampanyaliurunler','altkategoriler','getTitle','getDescription','getKeyword','sapka','bere','eldiven','atki',
            'tshirt','yelek','satisdanismanlari'));
	}

	public function sid()
	{
		$email = Input::get("email");
		$password = Input::get("password");
		$attempt = Auth::attempt(array('email' => $email, 'password' => $password));
		if ($attempt)
		{
			$sid = Auth::user()->id;
			return ['sid' => Crypt::encrypt($sid)];
		}
		return ['sid' => -1];
	}

    public function teklifIste()
    {

        $validator = Validator::make(Input::all(), ['adsoyad' => 'required']);
        $validator_message = $validator->messages()->first();
        if ($validator->fails())
        {
            return redirect()->back()->withMessage($validator_message);
        }
        $add = new Form;
        $add->adsoyad = Input::get('adsoyad');
        $add->telefon = Input::get('telefon');
        $add->mail = Input::get('mail');
        $add->aciklama = Input::get('mesaj');
        $add->type = Input::get('type');
        $add->created_at =\Carbon\Carbon::now()->toDateTimeString();

        $type=Input::get('type');

        $adsoyad    = Input::get('adsoyad');
        $telefon    = Input::get('telefon');
        $mail       = Input::get('mail');
        $aciklama   = Input::get('mesaj');
        $tarih      = \Carbon\Carbon::now()->toDateTimeString();
        $data = array(
            'adsoyad'   =>$adsoyad,
            'telefon'   =>$telefon,
            'aciklama'  =>$aciklama,
            'mail'      =>$mail,
            'tarih'     =>$tarih,
        );
        if($type==1){
            Mail::send('emails.teklif', $data, function($message){
                $message->to('destek@zirvetekstil.net', 'Teklif Maili')->subject('Teklif Maili');
            });
        }else{
            Mail::send('emails.teklif', $data, function($message){
                $message->to('destek@zirvetekstil.net', 'Mail Siparişi')->subject('Mail Siparişi');
            });
        }

        if ($add->save())
        {
            return redirect()->back()->with('success','Teklifiniz Gönderildi. En Kısa Zamanda Tarafınıza Geri Dönüş Yapılacaktr.');
        } else
        {
            return redirect()->back()->with('faild','Teklifiniz Gönderilemedi. Lütfen Tekrardan Deneyiniz.');
        }
    }
    public function getStatusHttp($url) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HEADER, true);    // we want headers
        curl_setopt($ch, CURLOPT_NOBODY, true);    // we don't need body
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_TIMEOUT,10);
        $output = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        return $httpcode;
    }

    public function productInfo()
    {

        $curl = new cURL;
        $products = $curl->get('https://zirvesapka.com/narrcollection.xml');
        $products = $products->body;
        $formatter = Formatter::make($products, Formatter::XML);
        $products = $formatter->toArray();
        $products = $products['Urun'];

        //dd($formatter);
        $protoProduct = Array();

        $k = 0;
        foreach ($products as $product) {

            $dbProduct = Product::where('UrunKodu', '=', $product['Barkod'])->first();
            if (empty($dbProduct)) {
                $dbProduct = New Product();
            }

            $dbProduct->Baslik = $product['UrunAdi'];
            $dbProduct->refurl = str_slug($product['UrunAdi']);
            $dbProduct->Stok = $product['StokAdedi'];
            $dbProduct->UrunKodu = $product['Barkod'];
            $dbProduct->LFiyat = $product['ListeFiyat'];
            $dbProduct->IndirimliFiyati = $product['OzelFiyat'];
            $dbProduct->Icerik =  $product['UrunAciklamasi'];
            $dbProduct->KategoriID =  93;
            $image = file_get_contents($product['Image'], false, stream_context_create(array('http' => array('ignore_errors' => true))));
            try
            {
                $image = Image::make($image);
                $fileName = str_slug($dbProduct->Baslik) . "-" . str_random(6) . ".jpg";
                $dbProduct->Resim = $fileName;
                $dbProduct->OldImage = $fileName;
                $image->save('upload/images/' . $fileName);
            } catch (\Exception $e)
            {

            }



            $dbProduct->save();
            $k++;
        }
    }



}