@extends('admin.layouts.layout-admin')

@section('content')

    @include('admin._partials.breadcrumb', ['category' => 'Kategori', 'page' => 'Kategoriyi Düzenle'])
            <div class="row">
                <div class="col-md-12">
                    {!! Form::model($categories, ['class' => 'form-horizontal', 'id' => 'categories-update', 'files' => true, 'method' => 'PUT', 'route' => ['admin.categories.update', $categories->ID]]) !!}
                        <div class="portlet box green">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-gift"></i>Kategori Ekle
                            </div>
                            <div class="tools">
                                <a href="javascript:;" class="collapse"></a>
                                <a href="#portlet-config" data-toggle="modal" class="config"></a>
                                <a href="javascript:;" class="reload"></a>
                                <a href="javascript:;" class="remove"></a>
                            </div>
                        </div>
                        <div class="portlet-body form">
                                <div class="form-body">
                                    <div class="alert alert-danger display-hide">
                                        <button class="close" data-close="alert"></button>
                                        You have some form errors. Please check below.
                                    </div>
                                    <div class="alert alert-success display-hide">
                                        <button class="close" data-close="alert"></button>
                                        Your form validation is successful!
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Kategori Başlığı <span class="required">
                                        * </span>
                                        </label>
                                        <div class="col-md-4">
                                             {!! Form::text('Baslik', null, ['class' => 'form-control', 'placeholder' => 'Başlık Giriniz']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Kategori Açıklaması<span class="required">
                                        * </span>
                                        </label>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                 
                                                    {!! Form::textarea('Aciklama', null, ['class' => 'form-control', 'placeholder' => '']) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3">Özel Stil Tanımlaması</label>
                                        <div class="col-md-4">
                                        <select name="style" id="style" class="form-control">
                                            <option value="main">Ana Kategori</option>
                                            <option value="open">Açılır Alt Kategori</option>
                                            <option value="list">Açılır Liste Kategori</option>
                                        </select> 
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn green">Kategori Güncelle</button>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('assets/global/plugins/ckeditor/ckeditor.js') }}"></script>
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
<!-- BEGIN GOOGLE RECAPTCHA -->
<script type="text/javascript">
        var RecaptchaOptions = {
           theme : 'custom',
           custom_theme_widget: 'recaptcha_widget'
        };
    </script>
@endsection