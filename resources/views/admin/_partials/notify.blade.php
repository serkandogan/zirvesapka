@if(Session::has('added'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <i class="fa fa-check"></i> Ekleme işlemi başarıyla gerçekleşti.
    </div>
@endif
@if(Session::has('noadded'))
    <div class="alert alert-error alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <i class="fa fa-remove"></i> Ekleme işlemi gerçekleştirilemedi.
        {!! Session::get('message') !!}
    </div>
@endif

@if(Session::has('updated'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <i class="fa fa-check"></i> Güncelleme işlemi başarıyla gerçekleşti.
    </div>
@endif

@if(Session::has('deleted'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <i class="fa fa-check"></i> Silme işlemi başarıyla gerçekleşti.
    </div>
@endif

@if(Session::has('flushed'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <i class="fa fa-check"></i> Önbellek başarıyla temizlendi.
    </div>
@endif

@if(Session::has('fileuploadno'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <i class="fa fa-remove"></i> Resim yükleme işlemi gerçekleştirilemedi
        {!! Session::has('messages') !!}
    </div>
@endif
@if(Session::has('fileupload'))
    <div class="alert alert-{!! Session::has('type') !!} alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <i class="fa fa-remove"></i> Resim yükleme işlemi başarıyla gerçekleştirildi
    </div>
@endif

@if(Session::has('resetSent'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <i class="fa fa-check"></i> Şifre sıfırlama bağlantısı gönderildi, lütfen e-posta hesabınızı kontrol ediniz.
    </div>
@endif

@if(Session::has('passwordChanged'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <i class="fa fa-check"></i> Şifre sıfırlama işleminiz başarıyla gerçekleşti ve sisteme girişiniz yapıldı. Tekrar hoş geldiniz.
    </div>
@endif
