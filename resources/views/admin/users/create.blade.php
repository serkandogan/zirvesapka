@extends('admin.layouts.layout-admin')

@section('content')


    @include('admin._partials.breadcrumb', ['category' => 'Ürünler', 'page' => 'Ürün Ekle'])
    
    
                                <div class="portlet light">
                                    <div class="portlet-title tabbable-line">
                                        <div class="caption caption-md">
                                            <i class="icon-globe theme-font hide"></i>
                                            <span class="caption-subject font-blue-madison bold uppercase">Sisteme Yeni Kullanıcı Ekle</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="tab-content">
                                            <!-- PERSONAL INFO TAB -->
                                            <div class="tab-pane active" id="tab_1_1">
                                                {!! Form::open(['action'=>'Admin\UsersController@getCreate', 'files'=>true, 'method'=>'POST']) !!}
                                                    <div class="form-group">
                                                        <label class="control-label">Kullanıcı Adı</label>
                                                        <input type="text" name="name" placeholder="Kullanıcı Adınız" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Mail Adresi</label>
                                                        <input name="email" type="text" placeholder="Mail Adresiniz" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Şifre</label>
                                                        <input name="password" type="password" placeholder="Şireniz" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Rolü</label>
                                                       <select name="roleType" class="form-control">
                                                            <option value="10">Admin</option>
                                                            <option value="1">Üye</option>
                                                       </select>
                                                    </div>

                                                    <div class="margiv-top-10">
                                                        <button type="submit" class="btn green-haze">
                                                        Kullanıcıyı Ekle</button> 
                                                    </div>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>


@endsection


@section('js')   
    <script>
        jQuery(document).ready(function() {       
           // initiate layout and plugins
           Metronic.init(); // init metronic core components
            Layout.init(); // init current layout
            QuickSidebar.init(); // init quick sidebar
            Demo.init(); // init demo features
           ComponentsFormTools.init();
        });   
    </script>
@endsection