<br />
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat blue-madison">
            <div class="visual">
                <i class="fa fa-comments"></i>
            </div>
            <div class="details">
                <div class="number">
                    {{ count(App\Models\Product::all()) }}
                </div>
                <div class="desc">
                    Tane Toplam Ürün Var
                </div>
            </div>
            <a class="more" href="{{url('admin/products')}}">
            ürünlere git <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat red-intense">
            <div class="visual">
                <i class="fa fa-bar-chart-o"></i>
            </div>
            <div class="details">
                <div class="number">
                     {{ count(App\Models\Order::all()) }}
                </div>
                <div class="desc">
                    Tane Toplam Sipariş Var
                </div>
            </div>
            <a class="more" href="{{url('admin/orders')}}">
           siparişlere git <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat green-haze">
            <div class="visual">
                <i class="fa fa-shopping-cart"></i>
            </div>
            <div class="details">
                <div class="number">
                     {{ count(App\Models\User::all()) }}
                </div>
                <div class="desc">
                     Tane Toplam Üye Var
                </div>
            </div>
            <a class="more" href="{{url('admin/members')}}">
            üyelere git <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat purple-plum">
            <div class="visual">
                <i class="fa fa-globe"></i>
            </div>
            <div class="details">
                <div class="number">
                     {{ App\Models\OrderDetail::sum('Fiyat') }} TL
                </div>
                <div class="desc">
                      Satış Yapılmış
                </div>
            </div>
            <a class="more" href="{{url('admin/orders')}}">
            görüntüle <i class="m-icon-swapright m-icon-white"></i>
            </a>
        </div>
    </div>
</div>
<div class="clearfix"></div>