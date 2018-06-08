<?php


Route::get('/admin', ['middleware' => 'auth', 'uses' => 'Admin\AdminmainController@dashboard']);
Route::get('login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@showLoginForm']);
Route::post('login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@login']);
Route::get('logout', ['as' => 'auth.logout', 'uses' => 'Auth\AuthController@logout']);



Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::pattern('id', '[0-9]+');
Route::pattern('name', '[a-z0-9-]+');
Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'namespace' => 'Admin'], function ()
{
    Route::get('/', 'AdminmainController@dashboard');
    Route::get('/dashboard', 'AdminmainController@dashboard');
    Route::get('/ayarlar', 'AdminmainController@ayarlar');
    Route::post('/ayarguncelle', 'AdminmainController@ayarguncelle');
    Route::get('categories/newsave', 'CategoriesController@newsave');
    Route::controller('category', 'CategoryController');
    Route::controller('variations', 'VariationsController');
    Route::get('product/copyproduct/{id}', 'ProductsController@getUpdate2');
    Route::controller('products', 'ProductsController');
    Route::controller('categories', 'CategoriesController');
    Route::resource('brands', 'BrandsController');
    Route::resource('groups', 'GroupsController');
    Route::resource('suppliers', 'SuppliersController');
    Route::resource('productfeatures', 'ProductFeaturesController');
    Route::resource('productfeaturelists', 'ProductFeatureListsController');
    //Route::resource('orders', 'OrdersController');
    Route::controller('orders', 'OrdersController');
    Route::resource('paymenttypes', 'PaymentTypesController');
    Route::resource('orderstatuss', 'OrderStatussController');
    Route::resource('returnstatuss', 'ReturnStatussController');
    Route::resource('cargos', 'CargosController');
    Route::resource('members', 'MembersController');
    Route::controller('users', 'UsersController');
    Route::controller('gallery', 'GalleryController');
    Route::controller('gallery2', 'GalleryController2');
    Route::controller('slider', 'SliderController');
    Route::controller('pagess', 'PagesController');
    Route::controller('comment', 'CommentsController');
    Route::controller('transfer', 'TransferController');
    Route::controller('transferform', 'TransferFormController');
    Route::controller('blogs', 'BlogsController');
    Route::controller('video', 'VideoController');
    Route::controller('popup', 'PopupController');
});

Route::group(['prefix' => '/', 'namespace' => 'Site'], function ()
{
    view()->share(['siteTheme' => themeName(),
        'getCategory' => App\Models\Category::getCategoryArray(App\Models\Category::orderBy('Sira','ASC')->get()),
        'blogs' => App\Models\Blog::orderBy('ID','DESC')->paginate(2),
        'sapkalar' => App\Models\Category::where('gid',1)->get(),
        'bereler' => App\Models\Category::where('gid',24)->get(),
        'eldivenler' => App\Models\Category::where('gid',28)->get(),
        'atkilar' => App\Models\Category::where('gid',33)->get(),
        'tshirtler' => App\Models\Category::where('gid',38)->get(),
        'yelekler' => App\Models\Category::where('gid',47)->get(),
        'saatler' => App\Models\Category::where('gid',59)->get(),
        'anahtarliklar' => App\Models\Category::where('gid',67)->get(),
        'kalemler' => App\Models\Category::where('gid',53)->get(),
        'isciiselbiseleri' => App\Models\Category::where('gid',77)->get(),
        'isguvenligi' => App\Models\Category::where('gid',85)->get(),
        'popup' => App\Models\Popup::where('aktif',1)->get()
    ]);

    Route::get('/', 'MainController@getIndex');
    Route::get('/xmlcek', 'MainController@productInfo');
    Route::post('/teklif-iste', 'MainController@teklifIste');
    Route::get('/{name}-u-{id}.html', 'ProductController@getIndex');
    Route::get('sayfa/{name}', 'PagesController@getIndex');
    Route::get('/{name}-k-{id}.html', 'ProductController@getCategory');
    Route::get('/populer-urunler.html', 'ProductController@getPopular');
    Route::get('arama', 'ProductController@getSeach');
    Route::controller('uye', 'MemberController');
    Route::controller('hesap', 'MemberAccountController');
    Route::controller('sepet', 'MyCartController');
    Route::post('comment', 'ProductController@postYorumEkle');
    Route::get('/havale/{id}', 'ProductController@getHavale');
    Route::post('/havale', 'ProductController@postHavale');
    Route::get('/havale-odeme-basarili', 'ProductController@getHavaleOdemeBasarili');
    Route::post('/kapida-odeme', 'ProductController@postKapidaOdeme');
    Route::get('/kapida-odeme-basarili', 'ProductController@getKapidaOdemeBasarili');
    Route::get('/mail-gonder', 'ProductController@mail');
    Route::post('/mail-gonder', 'ProductController@mailGonder');
    Route::get('blog', 'PagesController@getBlogList');
    Route::get('blog/{name}', 'PagesController@getBlog');

    Route::get('video', 'PagesController@getVideoList');
    Route::get('video/{name}', 'PagesController@getVideo');

    Route::post('sid', 'MainController@sid');
    Route::get('sitemap', function ()
    {
        $sitemap = \Illuminate\Support\Facades\App::make("sitemap");
        if (!$sitemap->isCached())
        {
            $sitemap->add(\Illuminate\Support\Facades\URL::to('/'), '2012-08-25T20:10:00+02:00', '1.0', 'daily');
            $sitemap->add(\Illuminate\Support\Facades\URL::to('page'), '2012-08-26T12:30:00+02:00', '0.9', 'monthly');
            $products = \App\Models\Product::orderBy('ID', 'desc')->get();
            foreach ($products as $product)
            {
                $sitemap->add(\Illuminate\Support\Facades\URL::to($product->refurl.'-u-'.$product->ID.'.html'), date('y-m-d'), 1, 'daily');
            }
        }
        return $sitemap->render('xml');
    });

});


