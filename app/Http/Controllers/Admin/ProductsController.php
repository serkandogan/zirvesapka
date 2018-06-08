<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ApiHelper;
use App\Helpers\Helper;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProduct;
use App\Http\Requests\UpdateProduct;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Group;
use App\Models\Grup;
use App\Models\Product;
use App\Models\ProductFeature;
use App\Models\ProductFeatureList;
use App\Models\Supplier;
use App\Models\GalleryGroup;
use App\Models\Gallery;
use App\Models\Variation;
use Validator;
use Illuminate\Support\Facades\Request as Request;
use Input;
use Image;



class ProductsController extends AdminController
{
    public function getIndex()
    {
        $products = Product::with(['category', 'brand', 'tedarikci', 'grup'])->orderBy('ID', 'DESC')->paginate(20);
        $categorySelect = Category::categorySelect(Category::all());
        $brandSelect = Brand::brandSelect(Brand::all());
        $supplierSelect = Supplier::supplierSelect(Supplier::all());
        $groupSelect = Group::groupSelect(Group::all());
        $categories = Category::orderBy('Baslik', 'ASC')->lists('Baslik', 'ID');
        $tedarikci = Supplier::orderBy('Baslik', 'ASC')->lists('Baslik', 'ID');
        $brand = brand::orderBy('Baslik', 'ASC')->lists('Baslik', 'ID');
        $grup = grup::orderBy('Baslik', 'ASC')->lists('Baslik', 'ID');
        $productfeature = ProductFeature::orderBy('Baslik', 'ASC')->get();
        $productfeaturelist = ProductFeatureList::orderBy('Baslik', 'ASC')->get();

        return view('admin.products.index', compact(
            'products',
            'varyasyon',
            'categories',
            'categorySelect',
            'brandSelect',
            'supplierSelect',
            'groupSelect',
            'tedarikci',
            'brand',
            'grup',
            'productfeature',
            'productfeaturelist'
        ));
    }
    public function getSeach()
    {
        // Filtreleme için where değeri oluşturuyoruz
        $ad  = trim(Input::get('ad'));
        $kod = trim(Input::get('kod'));
        $k   = trim(Input::get('k'));
        $m   = trim(Input::get('m'));
        $g   = trim(Input::get('g'));
        $t   = trim(Input::get('t'));
        $f1  = trim(Input::get('f1'));
        $f2  = trim(Input::get('f2'));

        $q = new Product();
        $q->with(['category', 'brand', 'tedarikci', 'grup']);
        // Her ürüne ait sadece 1 kod olabileceği için kod ile ilgili aramalarda tek bir ürün listelenir.Bu yüzden diğer filtrelemelerin bir etkinliği olmamaktadır.
        $querySelect = new Product;
        $querySelect->with(['category', 'brand', 'tedarikci', 'grup']);

        if($kod == '') {
            $sonuc = null;
            if($ad!='') { $sonuc = $q->where('Baslik', 'LIKE', '%'.$ad.'%'); }
            if($k!='')  { $sonuc = $sonuc=='' ? $q->where('KategoriID','=',$k) : $sonuc->where('KategoriID','=',$k);}
            if($m!='')  { $sonuc = $sonuc=='' ? $q->where('MarkaID','=',$m) : $sonuc->where('MarkaID','=',$m);}
            if($g!='')  { $sonuc = $sonuc=='' ? $q->where('GrupID','=',$g) : $sonuc->where('GrupID','=',$g);}
            if($t!='')  { $sonuc = $sonuc=='' ? $q->where('TedarikciID','=',$t) : $sonuc->where('TedarikciID','=',$t);}
            if($f1!='')  { $sonuc = $sonuc=='' ? $q->where('IndirimliFiyati','=',$f1) : $sonuc->where('IndirimliFiyati','>=',$f1);}
            if($f2!='')  { $sonuc = $sonuc=='' ? $q->where('IndirimliFiyati','=',$f2) : $sonuc->where('IndirimliFiyati','<=',$f2);}
        } else {
            $sonuc = $q->where('UrunKodu','=',$kod);
        }
        $products = $sonuc->orderBy('ID','desc')->paginate(20);
        $products->appends(['ad'=>$ad,'kod'=>$kod,'k'=>$k,'g'=>$g,'m'=>$m,'t'=>$t,'f1'=>$f1,'f2'=>$f2])->links();


        //$keyword = Input::get('q');
        //$products->appends(['q'=>$keyword])->links();
        $categorySelect = Category::categorySelect(Category::all());
        $brandSelect = Brand::brandSelect(Brand::all());
        $supplierSelect = Supplier::supplierSelect(Supplier::all());
        $groupSelect = Group::groupSelect(Group::all());
        $categories = Category::orderBy('Baslik', 'ASC')->lists('Baslik', 'ID');
        $tedarikci = Supplier::orderBy('Baslik', 'ASC')->lists('Baslik', 'ID');
        $brand = brand::orderBy('Baslik', 'ASC')->lists('Baslik', 'ID');
        $grup = grup::orderBy('Baslik', 'ASC')->lists('Baslik', 'ID');
        $productfeature = ProductFeature::orderBy('Baslik', 'ASC')->get();
        $productfeaturelist = ProductFeatureList::orderBy('Baslik', 'ASC')->get();
        return view('admin.products.index', compact('keyword','products',
            'categorySelect',
            'brandSelect',
            'categories',
            'supplierSelect',
            'groupSelect',
            'tedarikci',
            'brand',
            'grup',
            'productfeature',
            'productfeaturelist'));
    }
    public function postUpdate3($id)
    {
        $validator = Validator::make(Input::all(), ['KampanyaliUrun' => 'required']);
        $validator_message = $validator->messages()->first();
        if ($validator->fails())
        {
            return redirect()->back()->withMessage($validator_message);
        }

        $add = Product::find($id);
        $add->KampanyaliUrun = 1;
        if ($add->save())
        {
            return redirect()->back();
        } else
        {
            return redirect()->back()->withMessage('Ürün Eklenemedi');
        }
    }

    public function postUpdate4($id)
    {
        $validator = Validator::make(Input::all(), ['KampanyaliUrun' => 'required']);
        $validator_message = $validator->messages()->first();
        if ($validator->fails())
        {
            return redirect()->back()->withMessage($validator_message);
        }

        $add = Product::find($id);
        $add->KampanyaliUrun = 0;
        if ($add->save())
        {
            return redirect()->back();
        } else
        {
            return redirect()->back()->withMessage('Ürün Eklenemedi');
        }
    }
    public function postUpdatet1($id)
    {
        $validator = Validator::make(Input::all(), ['FirsatUrun' => 'required']);
        $validator_message = $validator->messages()->first();
        if ($validator->fails())
        {
            return redirect()->back()->withMessage($validator_message);
        }

        $add = Product::find($id);
        $add->FirsatUrun = 1;
        if ($add->save())
        {
            return redirect()->back();
        } else
        {
            return redirect()->back()->withMessage('Ürün Eklenemedi');
        }
    }

    public function postUpdatet2($id)
    {
        $validator = Validator::make(Input::all(), ['FirsatUrun' => 'required']);
        $validator_message = $validator->messages()->first();
        if ($validator->fails())
        {
            return redirect()->back()->withMessage($validator_message);
        }

        $add = Product::find($id);
        $add->FirsatUrun = 0;
        if ($add->save())
        {
            return redirect()->back();
        } else
        {
            return redirect()->back()->withMessage('Ürün Eklenemedi');
        }
    }
    public function postUpdate5($id)
    {
        $validator = Validator::make(Input::all(), ['deri' => 'required']);
        $validator_message = $validator->messages()->first();
        if ($validator->fails())
        {
            return redirect()->back()->withMessage($validator_message);
        }
        $add = Product::find($id);
        $add->deri = 1;
        if ($add->save())
        {
            return redirect()->back();
        } else
        {
            return redirect()->back()->withMessage('Ürün Eklenemedi');
        }
    }

    public function postUpdate6($id)
    {
        $validator = Validator::make(Input::all(), ['deri' => 'required']);
        $validator_message = $validator->messages()->first();
        if ($validator->fails())
        {
            return redirect()->back()->withMessage($validator_message);
        }
        $add = Product::find($id);
        $add->deri = 0;
        if ($add->save())
        {
            return redirect()->back();
        } else
        {
            return redirect()->back()->withMessage('Ürün Eklenemedi');
        }
    }

    public function postUpdateMeta($id){
        $validator = Validator::make(Input::all(), ['title'=>'required']);
        $validator_message = $validator->messages();
        if ($validator->fails()) {
            return redirect()->back()->with('noupdated', 1)->withInput();
        }
        $pageupdate = Product::find($id);
        $pageupdate->title = Input::get('title');
        $pageupdate->description = Input::get('description');
        $pageupdate->keyword = Input::get('keyword');
        if ($pageupdate->save()) {
            return redirect()->back()->with('updated', 1);
        } else {
            return redirect()->back()->with('noupdated', 1);
        }
    }



    public function getCreate()
    {
        //ApiHelper::getToken();
        $categorySelect = Category::categorySelect(Category::all());
        $brandSelect = Brand::brandSelect(Brand::all());
        $supplierSelect = Supplier::supplierSelect(Supplier::all());
        $groupSelect = Group::groupSelect(Group::all());
        $renk=ProductFeatureList::where('OzellikID','=','1')->get();
        return view('admin.products.create', compact('categorySelect','renk', 'brandSelect', 'supplierSelect', 'groupSelect'));
    }

    public function postCreate()
    {
        $validator = Validator::make(Input::all(), ['Baslik' => 'required']);
        $validator_message = $validator->messages()->first();
        if ($validator->fails())
        {
            return redirect()->back()->withMessage($validator_message);
        }
        $filesArrray = array();
        $add = new Product;
        if (Input::hasFile('Resim'))
        {
            $files = Input::file('Resim');
            foreach ($files as $key => $file)
            {
                $ext = $file->getClientOriginalExtension();
                $fileName = str_slug(Input::get('Baslik')) . "-" . str_random(6) . "." . $ext;
                $filesArrray[] = $fileName;
                $filePath = image_path(null, 'image') . $fileName;
                $img = Image::make($file->getRealPath())->resize(800, 800)->insert(url('zirvesapkafiligran.png'))->save($filePath);
            }
        } else
        {
            $fileName = null;
        }

        $turkce = array("ş", "Ş", "ı", "(", ")", "‘", "ü", "Ü", "ö", "Ö", "ç", "Ç", " ", "/", "*", "?", "ş", "Ş", "ı", "ğ", "Ğ", "İ", "ö", "Ö", "Ç", "ç", "ü", "Ü");
        $duzgun = array("s", "s", "i", "", "", "", "u", "u", "o", "o", "c", "c", "-", "-", "-", "", "s", "s", "i", "g", "g", "i", "o", "O", "c", "c", "u", "u");

        $urunadi1=Input::get('Baslik');
        $urunadi1parcala= str_replace("<p>","",$urunadi1);
        $urunadi1parcala2= str_replace("</p>","",$urunadi1parcala);
        $urunadi1parcala3= str_replace("\r\n"," ",$urunadi1parcala2);
        $seo_uyumlu_link = str_slug(str_replace($turkce, $duzgun, $urunadi1parcala3));
        $add->refurl = $seo_uyumlu_link;

        $add->Baslik = Input::get('Baslik');
        $add->title = Input::get('Baslik');
        $add->description = Input::get('Aciklama');
        $add->Aciklama = Input::get('Aciklama');
        $add->IndirimliFiyati = Input::get('IndirimliFiyati');
        $add->LFiyat = Input::get('LFiyat');
        $add->Icerik = Input::get('Icerik');
        $add->KategoriID = Input::get('KategoriID');
        $add->MarkaID = Input::get('MarkaID');
        $add->Kdv = Input::get('Kdv');
        $add->TedarikciID = Input::get('TedarikciID');
        $add->GrupID = Input::get('GrupID');
        $add->Stok = Input::get('Stok');
        $add->UrunKodu = Input::get('UrunKodu');
        $add->Gun = Input::get('Gun');
        $add->Ay = Input::get('Ay');
        $add->OldImage = $fileName;
        $add->Resim = $fileName;
        $add->Aktif = 1;
        if ($add->save()){
            //ApiHelper::postUrunGonder($add);
            return redirect('admin/products');
        } else{
            return redirect()->back()->withMessage('Ürün Eklenemedi');
        }
    }

    public function getUrunlerigonder()
    {
        //ApiHelper::postTumUrunleriGonder();
        return redirect()->back()->withMessage("Ürünler başarılı bir şekilde eklendi");
    }

    public function getUpdate($id)
    {
        $product = Product::with(['category', 'brand'])->find($id);
        $categories = Category::orderBy('Baslik', 'ASC')->lists('Baslik', 'ID');
        $tedarikci = Supplier::orderBy('Baslik', 'ASC')->lists('Baslik', 'ID');
        $brand = brand::orderBy('Baslik', 'ASC')->lists('Baslik', 'ID');
        $grup = grup::orderBy('Baslik', 'ASC')->lists('Baslik', 'ID');
        $productfeature = ProductFeature::orderBy('Baslik', 'ASC')->get();
        $variation  = Variation::where('UrunID', $product->ID)->orderBy('ID', 'DESC')->get();
        $productfeaturelist = ProductFeatureList::orderBy('Baslik', 'ASC')->get();

        $categorySelect = Category::categorySelect(Category::all());
        $brandSelect = Brand::brandSelect(Brand::all());
        $supplierSelect = Supplier::supplierSelect(Supplier::all());
        $groupSelect = Group::groupSelect(Group::all());

        return view('admin.products.edit', compact('variation','product', 'categories', 'tedarikci', 'brand', 'grup', 'productfeature', 'productfeaturelist', 'categorySelect', 'brandSelect', 'supplierSelect', 'groupSelect'));

    }

    public function postUpdate($id)
    {

        $validator = Validator::make(Input::all(), ['Baslik' => 'required']);
        $validator_message = $validator->messages()->first();
        if ($validator->fails()){
            return redirect()->back()->withMessage($validator_message);
        }
        $filesArrray = array();
        if (Input::hasFile('Resim'))
        {
            $files = Input::file('Resim');
            foreach ($files as $key => $file)
            {
                $ext = $file->getClientOriginalExtension();
                $fileName = str_slug(Input::get('Baslik')) . "-" . str_random(6) . "." . $ext;
                $filesArrray[] = $fileName;
                $filePath = image_path(null, 'image') . $fileName;
                Image::make($file->getRealPath())->save($filePath);
            }
        } else
        {
            $fileName = null;
        }
        $add = Product::find($id);
        $add->refurl 			= str_slug(Input::get('Baslik'));
        $add->Baslik 			= Input::get('Baslik');
        $add->title 			= Input::get('Baslik');
        $add->description		= Input::get('Aciklama');
        $add->Aciklama 			= Input::get('Aciklama');
        $add->IndirimliFiyati	= Input::get('IndirimliFiyati');
        $add->LFiyat 			= Input::get('LFiyat');
        $add->Icerik 			= Input::get('Icerik');
        $add->KategoriID 		= Input::get('KategoriID');
        $add->MarkaID 			= Input::get('MarkaID');
        $add->Kdv 				= Input::get('Kdv');
        $add->TedarikciID 		= Input::get('TedarikciID');
        $add->GrupID 			= Input::get('GrupID');
        $add->Stok 				= Input::get('Stok');
        $add->UrunKodu 			= Input::get('UrunKodu');
        $add->Gun = Input::get('Gun');
        $add->Ay = Input::get('Ay');
        $add->Aktif = 1;
        if(($add->Resim = $fileName) == null){
            $add->Resim = Input::get('OldImage');
        }else{

            $add->Resim = $fileName;
            $add->OldImage = $fileName;
        }
        if (Input::get('xtype') == 'UrunKodu')
            $add->UrunKodu = Input::get('UrunKodu');
        $add->save();
        if ($add->save())
        {
            return redirect('admin/products');
        } else
        {
            return redirect()->back()->withMessage('Ürün Eklenemedi');
        }
        return redirect('admin/products/create');
    }

    public function getUpdate2($id)
    {
        $product = Product::with(['category', 'brand'])->find($id);
        $categories = Category::orderBy('Baslik', 'ASC')->lists('Baslik', 'ID');
        $tedarikci = Supplier::orderBy('Baslik', 'ASC')->lists('Baslik', 'ID');
        $brand = brand::orderBy('Baslik', 'ASC')->lists('Baslik', 'ID');
        $grup = grup::orderBy('Baslik', 'ASC')->lists('Baslik', 'ID');
        $productfeature = ProductFeature::orderBy('Baslik', 'ASC')->get();
        $productfeaturelist = ProductFeatureList::orderBy('Baslik', 'ASC')->get();
        $categorySelect = Category::categorySelect(Category::all());
        $brandSelect = Brand::brandSelect(Brand::all());
        $supplierSelect = Supplier::supplierSelect(Supplier::all());
        $groupSelect = Group::groupSelect(Group::all());
        return view('admin.products.copyproduct', compact('product', 'categories', 'tedarikci', 'brand', 'grup', 'productfeature', 'productfeaturelist', 'categorySelect', 'brandSelect', 'supplierSelect', 'groupSelect'));
    }

    public function postCreate2()
    {
        $id=Input::get('id');
        $validator = Validator::make(Input::all(), ['Baslik' => 'required']);
        $validator_message = $validator->messages()->first();
        if ($validator->fails())
        {
            return redirect()->back()->withMessage($validator_message);
        }
        $filesArrray = array();
        $add = new Product;
        if (Input::hasFile('Resim'))
        {
            $files = Input::file('Resim');
            foreach ($files as $key => $file)
            {
                $ext = $file->getClientOriginalExtension();
                $fileName = str_slug(Input::get('Baslik')) . "-" . str_random(6) . "." . $ext;
                $filesArrray[] = $fileName;
                $filePath = image_path(null, 'image') . $fileName;
                Image::make($file->getRealPath())->save($filePath);
            }
        } else
        {
            $fileName = null;
        }


        $turkce = array("ş", "Ş", "ı", "(", ")", "‘", "ü", "Ü", "ö", "Ö", "ç", "Ç", " ", "/", "*", "?", "ş", "Ş", "ı", "ğ", "Ğ", "İ", "ö", "Ö", "Ç", "ç", "ü", "Ü");
        $duzgun = array("s", "s", "i", "", "", "", "u", "u", "o", "o", "c", "c", "-", "-", "-", "", "s", "s", "i", "g", "g", "i", "o", "O", "c", "c", "u", "u");
        $urunadi1=Input::get('Baslik');
        $urunadi1parcala= str_replace("<p>","",$urunadi1);
        $urunadi1parcala2= str_replace("</p>","",$urunadi1parcala);
        $urunadi1parcala3= str_replace("\r\n"," ",$urunadi1parcala2);
        $seo_uyumlu_link = str_slug(str_replace($turkce, $duzgun, $urunadi1parcala3));
        $add->refurl = $seo_uyumlu_link;

        $add->Baslik = Input::get('Baslik');
        $add->title = Input::get('Baslik');
        $add->description = Input::get('Aciklama');
        $add->Aciklama = Input::get('Aciklama');
        $add->IndirimliFiyati = Input::get('IndirimliFiyati');
        $add->LFiyat = Input::get('LFiyat');
        $add->Icerik = Input::get('Icerik');
        $add->KategoriID = Input::get('KategoriID');
        $add->MarkaID = Input::get('MarkaID');
        $add->Kdv = Input::get('Kdv');
        $add->TedarikciID = Input::get('TedarikciID');
        $add->GrupID = Input::get('GrupID');
        $add->UrunKodu = Input::get('UrunKodu');
        $add->OldImage = $fileName;
        $add->Resim = $fileName;
        $add->Aktif = 1;
        $add->save();
        $urunID= $add->ID;



        return redirect('admin/products');

    }

    public function postUpdate2($id)
    {

        $validator = Validator::make(Input::all(), ['Baslik' => 'required']);
        $validator_message = $validator->messages()->first();
        if ($validator->fails()){
            return redirect()->back()->withMessage($validator_message);
        }
        $filesArrray = array();
        if (Input::hasFile('Resim'))
        {
            $files = Input::file('Resim');
            foreach ($files as $key => $file)
            {
                $ext = $file->getClientOriginalExtension();
                $fileName 			= str_slug(Input::get('Baslik')) . "-" . str_random(6) . "." . $ext;
                $filesArrray[] 		= $fileName;
                $filePath 			= image_path(null, 'image') . $fileName;
                Image::make($file->getRealPath())->save($filePath);
            }
        } else
        {
            $fileName = null;
        }
        $add = Product::find($id);
        $add->refurl 			= str_slug(Input::get('Baslik'));
        $add->Baslik 			= Input::get('Baslik');
        $add->title 			= Input::get('Baslik');
        $add->description		= Input::get('Aciklama');
        $add->Aciklama 			= Input::get('Aciklama');
        $add->IndirimliFiyati	= Input::get('IndirimliFiyati');
        $add->LFiyat 			= Input::get('LFiyat');
        $add->Icerik 			= Input::get('Icerik');
        $add->KategoriID 		= Input::get('KategoriID');
        $add->MarkaID 			= Input::get('MarkaID');
        $add->Kdv 				= Input::get('Kdv');
        $add->TedarikciID 		= Input::get('TedarikciID');
        $add->GrupID 			= Input::get('GrupID');
        $add->Stok 				= Input::get('Stok');
        $add->UrunKodu 			= Input::get('UrunKodu');
        $add->Gun = Input::get('Gun');
        $add->Ay = Input::get('Ay');
        $add->Aktif 			= 1;
        $add->ozellik 			= Input::get('ozellik');
        if (Input::get('xtype') == 'UrunKodu')
            $add->UrunKodu = Input::get('UrunKodu');
        $add->save();
        if ($add->save())
        {
            return redirect('admin/products');
        } else
        {
            return redirect()->back()->withMessage('Ürün Eklenemedi');
        }
        return redirect('admin/products/create');
    }



    public function getDestroy($id) {
        $product = Product::find($id);
        $product->delete();

        return redirect('admin/products')->with('deleted', 1);
    }
}