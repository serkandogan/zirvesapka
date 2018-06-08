<?php

namespace App\Http\Controllers\Site;
 
use App\Http\Controllers\Controller;
use App\Http\Controllers\SiteController;
use App\Models\Product;
use App\Models\Category; 
use App\Models\Transfer;
use App\Models\Transferform;
use App\Models\Brand;
use App\Models\Comment;
use Input;
use Validator;

class ProductController extends SiteController
{
	/*
	 * Ürün Detay Methodu
	*/
	public function getIndex ($name, $id) {

		$record = Product::where('ID',$id)->first();
		$productlists = Product::orderBy('ID','desc')->paginate(5);
		$categorylists = Category::where('gid', 0)->orderBy('ID','BannerSira')->paginate(10);
		$categories = Category::where('gid', 0)->orderBy('ID','BannerSira')->paginate(10);
		$query = Product::query();
		/*
		 * Aynı kategorideki diğer ürünleri listelemeyi sağlar
		*/
        $ilgiliurunler = $query->where('KategoriID', $record->KategoriID)->take(3)->get();

		/*
		 * Benzer Ürünleri listelemeyi sağlar.
		 */
		$likesProducts = NULL;
		if (!empty(searchCovert($record->Baslik))) {
			foreach (searchCovert($record->Baslik) as $value) {
				$query->orWhere('Baslik', 'LIKE', '%'.$value.'%');
			}
			$likesProducts = $query->distinct()->take(3)->get();
		}
		$getTitle = $record->Baslik;
		$getDescription = $record->Aciklama;
		$getImage = url(image($record->Resim));
		$getUrl = url('blog/'.$record->refurl);
        $sayi=rand(0,9999);
        $yorumlar=Comment::where('productid',$record->ID)->where('active',1)->get();
		return view(theme('product.detail'), compact('record','getTitle','getDescription','getImage',
            'getUrl','productlists','categorylists','categories','likesProducts','ilgiliurunler','sayi',
            'yorumlar'));
	}


	// havale type ı 1 olarak ayarlandı
	// kapıda ödeme type ı 2 olarak ayarlandı

	public function getHavale($id)
	{
		$product=Product::find($id);
		$havale=Transfer::all();
		$havale2=Transfer::all();
		$marka = Brand::where('parent_id',0)->OrderBy('Baslik','ASC')->get();
		$sessistemlerikategori 	= Category::where('gid','=','2')->orderBy('ID','DESC')->paginate(12);
		return view(theme('product.havale'), compact('havale','marka','product','havale2','sessistemlerikategori'));
	}

	public function postHavale()
	{
		$validator = Validator::make(Input::all(), ['name' => 'required']);
		$validator_message = $validator->messages()->first();
		if ($validator->fails())
		{
			return redirect()->back()->withMessage($validator_message);
		}
		$add = new Transferform;
		$add->name = Input::get('name');
		$add->phone = Input::get('phone');
		$add->mail = Input::get('mail');
		$add->adress = Input::get('adress');
		$add->bank_id = Input::get('bank_id');
		$add->product_id =Input::get('product_id');
		$add->date =\Carbon\Carbon::now()->toDateTimeString();
		$add->type =1;
		$add->active=0;
		if ($add->save())
		{
			return redirect('havale-odeme-basarili');
		} else
		{
			return redirect()->back()->withMessage('Telefon Eklenemedi');
		}
		return redirect()->back();
	}

	public function getKapidaOdeme($id)
	{
		$product=Product::find($id);
		$havale=Transfer::all();
		$havale2=Transfer::all();
		$marka = Brand::where('parent_id',0)->OrderBy('Baslik','ASC')->get();
		$sessistemlerikategori 	= Category::where('gid','=','2')->orderBy('ID','DESC')->paginate(12);
		return view(theme('product.kapidaodeme'), compact('havale','marka','product','havale2','sessistemlerikategori'));
	}

	public function getKapidaOdemeBasarili()
	{

		$marka = Brand::where('parent_id',0)->OrderBy('Baslik','ASC')->get();
		$sessistemlerikategori 	= Category::where('gid','=','2')->orderBy('ID','DESC')->paginate(12);
		return view(theme('product.kapidaodemebasarili'), compact('havale','marka','product','havale2','sessistemlerikategori'));
	}
	public function getHavaleOdemeBasarili()
	{

		$marka = Brand::where('parent_id',0)->OrderBy('Baslik','ASC')->get();
		$sessistemlerikategori 	= Category::where('gid','=','2')->orderBy('ID','DESC')->paginate(12);
		return view(theme('product.havalebasarili'), compact('marka','sessistemlerikategori'));
	}

	public function postKapidaOdeme(){
		$validator = Validator::make(Input::all(), ['name' => 'required']);
		$validator_message = $validator->messages()->first();
		if ($validator->fails())
		{
			return redirect()->back()->withMessage($validator_message);
		}
		$add = new Transferform;
		$add->name 			= Input::get('name');
		$add->phone 		= Input::get('phone');
		$add->mail 			= Input::get('mail');
		$add->adress 		= Input::get('adress');
		$add->product_id 	= Input::get('product_id');
		$add->cargo 		= Input::get('cargo');
		$add->active		= 0;
		$add->date =\Carbon\Carbon::now()->toDateTimeString();
		$add->type 			= 2;
		if ($add->save()){
			return redirect('kapida-odeme-basarili');
		} else{
			return redirect()->back()->withMessage('Telefon Eklenemedi');
		}
		return redirect()->back();
	}

	public function getCategory ($name, $id) {
		$record = Category::find($id);
		$category = Category::getMainCategoryList($record->ID, $record->gid);
		$products = Product::where('ID',$id)->first();
		/**
		 * en üst kategoriye ait tüm ID bulunacak.
		 * 
		 * TÜM BULUNAN TÜM ID ler ürün listeleme koşuluna tabi tutulacak.
		 * @var [type]
		 */ 
		$categoryResults = Product::where('Resim','!=',null)->whereIn('KategoriID', $category)->orWhere('KategoriID', $record->ID)->take(15)->paginate(15);
		$getTitle = $record->Baslik;
		$getDescription = $record->Aciklama;
		$getImage = url(image($record->Resim));
		$getUrl = url('blog/'.$record->refurl);
		return view(theme('category.detail'), compact('record','categoryResults','getTitle','getDescription','getImage','getUrl'));
	}

	public function getSeach()
	{
        $searchTerm = Input::get('q');
        $kategori = Input::get('kategori');
        $product = Product::select("*");

        try {
            $explode = explode(" ", $searchTerm);
            foreach ($explode as $index => $item) {
                $condition = $index == 0 ? "where" : "orWhere";
                $product->searchBaslik($item, $condition);
            }
        } catch (\Exception $exception) {
            $product->searchBaslik($searchTerm);
        }
        if($kategori==0){
            $productlists=$product->orderBy('ID','DESC')->paginate(500);
        }else{
            $productlists=$product->where('KategoriID',$kategori)->orderBy('ID','DESC')->paginate(500);
        }
        $keyword = Input::get('q');

		return view(theme('product.search'), compact('keyword','productlists','getTitle','getDescription','getImage','getUrl'));
	}

	public function getYorumEkle($id){


		return view(theme('product.detail'), compact('comment'));

	}

	public function postYorumEkle ()
	{
		$validator = Validator::make(Input::all(), ['name'=>'required']);
		$validator_message = $validator->messages()->first();
		if ($validator->fails()) {
			return redirect()->back()->withMessage($validator_message);
		}
		$add = new Comment;
		$add->name  = Input::get('name');
		$add->active  = 0;
		$add->comment  = Input::get('comment');
		$add->productid  = Input::get('productid');
		$add->created_at = \Carbon\Carbon::now()->toDateTimeString();
		$add->updated_at = \Carbon\Carbon::now()->toDateTimeString();
		$add->save();
		if ($add->save()) {
			return redirect()->back();
		}else{
			return redirect()->back()->withMessage('Yorum Eklenemedi');
		}
		return redirect()->back();
	}
    public function mailGonder(){

        $urunadi        =  Input::get('urunadi');
        $urunaciklamasi =  Input::get('urunaciklamasi');
        $urunurl        =  Input::get('urunurl');
        $urunfiyat      =  Input::get('urunfiyat');
        $urunresim      =  Input::get('urunresim');
        $ad             =  Input::get('name');
        $mail           =  Input::get('mail');
        $mesaj          =  Input::get('mesaj');
        $tarih          =  \Carbon\Carbon::now()->toDateTimeString();
        $data = array(
            'urunadi'=>$urunadi,
            'urunaciklamasi'=>$urunaciklamasi,
            'urunurl'=>$urunurl,
            'urunfiyat'=>$urunfiyat,
            'urunresim'=>$urunresim,
            'ad'=>$ad,
            'mail'=>$mail,
            'mesaj'=>$mesaj,
            'tarih'=>$tarih
        );
        Mail::send('emails.siparis', $data, function($message){
            $message
                ->to(Input::get('mail'), 'Arkadaşın Sana Zirve Şapka daki Ürünü Önerdi ' )
                ->subject('Arkadaşın Sana Zirve Şapka daki Ürünü Önerdi ');
        });
        return redirect()->back();
    }
    public function mail()
    {

    }
}