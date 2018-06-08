    <div class="page-header-inner">
        <div class="page-logo">
            <a href="{{ url('admin/dashboard') }}">
            <img src="{{ url('kursistem-logo.png') }}" alt="logo" class="logo-default"/>
            </a>
            <div class="menu-toggler sidebar-toggler hide">
            </div>
        </div>
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
              
                <li><a href="{!! url('/') !!}"><i class="fa fa-rocket"></i> Siteye Git</a></li>
                <li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <span class="username username-hide-on-mobile">
                    {{ Auth::user()->name }} </span>
                    <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        <li>
                            <a href="{{ url('logout') }}">
                            <i class="icon-key"></i> Yönetimden Çıkış Yap </a>
                        </li>
                    </ul>
                </li>
               
            </ul>
        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->