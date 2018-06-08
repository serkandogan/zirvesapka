@extends('admin.layouts.layout-admin')

@section('content')

    @include('admin._partials.breadcrumb', ['category' => 'Ürünler', 'page' => 'Marka Düzenle'])

     <div class="row">
            <div class="col-md-12">
            <p></p>
            <p></p>
             <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-gift"></i>Kullanıcı Düzenle
                        </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse" data-original-title="" title="">
                            </a>
                            <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title="">
                            </a>
                            <a href="javascript:;" class="reload" data-original-title="" title="">
                            </a>
                            <a href="javascript:;" class="remove" data-original-title="" title="">
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                    

                                <div class="portlet light">
                                    <div class="portlet-title tabbable-line">
                                        <div class="caption caption-md">
                                            <i class="icon-globe theme-font hide"></i>
                                            <span class="caption-subject font-blue-madison bold uppercase">Kullanıcı Düzenle</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="tab-content">
                                            <!-- PERSONAL INFO TAB -->
                                            <div class="tab-pane active" id="tab_1_1">
                                                {!! Form::model($record, ['action'=>['Admin\UsersController@postUpdate', $record->id], 'files'=>true, 'method'=>'POST']) !!}
                                                    <div class="form-group">
                                                        <label class="control-label">Kullanıcı Adı</label>
                                                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Kullanıcı Adını Giriniz']) !!}

                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Mail Adresi</label>
                                                        {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Başlık Giriniz']) !!}

                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Şifre</label>
                                                        {!! Form::password('password', ['class'=>'form-control']) !!}
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Rolü</label>
                                                        {!! Form::select('roleType', array('1'=>'Uye', '10'=>'Admin'), null,
                                                         ['class'=>'form-control']) !!}
                                                    </div>

                                                    <div class="margiv-top-10">
                                                        <button type="submit" class="btn green-haze">
                                                        Kullanıcıyı Güncelle</button> 
                                                    </div>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
           // ComponentsFormTools.init();

            jQuery(".selectAll").change(function(){
                var data = jQuery(this).data('key');
                jQuery(".CLASS"+data).prop('checked', jQuery(this).prop("checked"));
            });
        });   
</script>
@endsection