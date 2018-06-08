@extends('admin.layouts.layout-basic')

@section('content')
    <form class="login-form" role="form" method="POST" action="{{ url('/password/reset') }}">
      {!! csrf_field() !!}
        <h3 class="form-title">Şifreni Sıfırla</h3>
        <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
            
        </div>
        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">Mail Adresi</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="email" name="email" value="{{ $email or old('email') }}"/>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <div class="alert alert-success display-hide" style="display: block;">
                            <button class="close" data-close="alert"></button>
                                <span>{{ $errors->first('email') }}</span>
                        </div>
                    </span>
                @endif

        </div>
        <span class="help-block">
                        <div class="alert alert-success display-hide" style="display: block;">
                            <button class="close" data-close="alert"></button>
                                <span>{{ $errors->first('email') }}</span>
                        </div>
                    </span>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Yeni Şifreyi Gir</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Şifre" name="password"/>
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Tekrar Şifreyi Gir</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Şifre" name="password_confirmation"/>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-success uppercase">Giriş</button>
        </div>
    </form>


@endsection
