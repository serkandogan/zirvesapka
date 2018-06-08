@if(!Auth::guest())
    <div class="page-sidebar-wrapper">
        <div class="page-sidebar navbar-collapse collapse">
            <ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
             
                <li class="sidebar-toggler-wrapper">
                    <div class="sidebar-toggler">
                    </div>
                </li>
                <li class="sidebar-search-wrapper">
                    <form class="sidebar-search " action="extra_search.html" method="POST">
                        <a href="javascript:;" class="remove">
                        <i class="icon-close"></i>
                        </a>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                            <a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
                            </span>
                        </div>
                    </form>
                </li>
                <li class="start active open">
                    <a href="{{ url('admin/dashboard') }}">
                    <i class="icon-home"></i>
                    <span class="title">Yönetim Ana Sayfa</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                    </a>
                </li>
               <li class="heading">
                    <h3 class="uppercase">Ürün Yönetimi</h3>
                </li>
                <li {!! getPerm('product', 'list', Auth::User()->id) !!}>
                    <a href="javascript:;">
                    <i class="icon-basket"></i>
                    <span class="title">Ürünler</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="{{ url('admin/products') }}">
                            <i class="icon-home"></i>
                            Listesi</a>
                        </li>
                        <li>
                            <a href="{{ url('admin/products/create') }}">
                            <i class="icon-basket"></i>
                            Ekle</a>
                        </li>
                    </ul>
                </li>
                <li {!! getPerm('blogs', 'list', Auth::User()->id) !!}>
                    <a href="javascript:;">
                    <i class="fa fa-list"></i>
                    <span class="title">Blog</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="{{ url('admin/blogs') }}">
                            <i class="icon-home"></i>
                            Listesi</a>
                        </li>
                        <li>
                            <a href="{{ url('admin/blogs/create') }}">
                            <i class="icon-basket"></i>
                            Ekle</a>
                        </li>
                    </ul>
                </li>
                <li {!! getPerm('blogs', 'list', Auth::User()->id) !!}>
                    <a href="javascript:;">
                    <i class="fa fa-play"></i>
                    <span class="title">Video</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="{{ url('admin/video') }}">
                            <i class="icon-home"></i>
                            Listesi</a>
                        </li>
                        <li>
                            <a href="{{ url('admin/video/create') }}">
                            <i class="icon-basket"></i>
                            Ekle</a>
                        </li>
                    </ul>
                </li>
                <li {!! getPerm('blogs', 'list', Auth::User()->id) !!}>
                    <a href="{!! url('admin/popup') !!}">
                    <i class="fa fa-play"></i>
                    <span class="title">Popup</span>
                    <span class="arrow "></span>
                    </a>
                </li>
                <li {!! getPerm('pagess', 'list', Auth::User()->id) !!}>
                    <a href="javascript:;">
                    <i class="icon-basket"></i>
                    <span class="title">Sayfalar</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="{{ url('admin/pagess') }}">
                            <i class="icon-home"></i>
                            Listesi</a>
                        </li>
                        <li>
                            <a href="{{ url('admin/pagess/create') }}">
                            <i class="icon-basket"></i>
                            Ekle</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                    <i class="icon-tag"></i>
                    <span class="title">Kategoriler</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="{{ url('admin/categories') }}">
                            <i class="icon-home"></i>
                            Listesi</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                    <i class="icon-grid"></i>
                    <span class="title">Markalar</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="{{ url('admin/brands') }}">
                            <i class="icon-home"></i>
                            Listesi</a>
                        </li>
                        <li>
                            <a href="{{ url('admin/brands/create') }}">
                            <i class="icon-basket"></i>
                            Ekle</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                    <i class="icon-equalizer"></i>
                    <span class="title">Gruplar</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="{{ url('admin/groups') }}">
                            <i class="icon-home"></i>
                            Listesi</a>
                        </li>
                        <li>
                            <a href="{{ url('admin/groups/create') }}">
                            <i class="icon-basket"></i>
                            Ekle</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                    <i class="icon-energy"></i>
                    <span class="title">Tedarikciler</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="{{ url('admin/suppliers') }}">
                            <i class="icon-home"></i>
                            Listesi</a>
                        </li>
                        <li>
                            <a href="{{ url('admin/suppliers/create') }}">
                            <i class="icon-basket"></i>
                            Ekle</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                    <i class="icon-energy"></i>
                    <span class="title">Ürün Özellikleri</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="{{ url('admin/productfeatures') }}">
                            <i class="icon-home"></i>
                            Listesi</a>
                        </li>
                        <li>
                            <a href="{{ url('admin/productfeatures/create') }}">
                            <i class="icon-basket"></i>
                            Ekle</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;">
                    <i class="icon-energy"></i>
                    <span class="title">Ürün Özellikleri Değeri</span>
                    <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="{{ url('admin/productfeaturelists') }}">
                            <i class="icon-home"></i>
                            Listesi</a>
                        </li>
                        <li>
                            <a href="{{ url('admin/productfeaturelists/create') }}">
                            <i class="icon-basket"></i>
                            Ekle</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ url('admin/slider') }}">
                    <i class="icon-energy"></i>
                    <span class="title">Slider Yönetimi</span>
                    <span class="arrow "></span>
                    </a>
                </li>
               
                <li class="heading">
                    <h3 class="uppercase">Sipariş Yönetimi</h3>
                </li>
                <li>
                    <a href="javascript:;">
                        <i class="icon-energy"></i>
                        <span class="title">Havale Hesap Bilgileri</span>
                        <span class="arrow "></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="{{ url('admin/transfer') }}">
                                <i class="icon-home"></i>
                                Listesi</a>
                        </li>
                        <li>
                            <a href="{{ url('admin/transfer/create') }}">
                                <i class="icon-basket"></i>
                                Ekle</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{!! url('admin/transferform') !!}">
                        <i class="fa fa-list-alt"></i>
                        <span class="title">Havale Siparişleri</span>
                        <span class="badge badge-danger" style="border-radius: 29px !important;">
                             {{ count(App\Models\Transferform::where('active','=','0')->where('type','=','1')->get()) }}
                        </span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('admin/orders') }}">
                        <i class="icon-list"></i>
                        <span class="title">Siparişler</span>
                        <span class="arrow "></span>
                    </a>
                </li>
                 <li class="heading">
                    <h3 class="uppercase">Kargo Yönetimi</h3>
                </li>
               
                <li>
                    <a href="{{ url('admin/cargos') }}">
                        <i class="icon-rocket"></i>
                        <span class="title">Kargolar</span>
                        <span class="arrow "></span>
                    </a>
                </li>

                <li class="heading">
                    <h3 class="uppercase">Kullanıcı Yönetimi</h3>
                </li>
                <li>
                    <a href="{{ url('admin/users') }}">
                        <i class="icon-user-following"></i>
                        <span class="title">Kullanıcılar</span>
                        <span class="arrow "></span>
                    </a>
                </li>
                
                <li class="heading">
                    <h3 class="uppercase">Panel Ayarları</h3>
                </li>
                <li>
                    <a href="{{ url('admin/ayarlar') }}">
                        <i class="icon-user-following"></i>
                        <span class="title">Yönet</span>
                        <span class="arrow "></span>
                    </a>
                </li>
               
            </ul>
        </div>
    </div>
@endif