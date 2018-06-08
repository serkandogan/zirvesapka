@extends('admin.layouts.layout-basic')

@section('content')
    <form class="login-form" action="{{ url('/login') }}" method="POST">
        {!! csrf_field() !!}
        <h3 class="form-title">Yönetim Paneline Giriş</h3>
        <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
            <span>
            Enter any email and password. </span>
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Mail Adresiniz</label>
            <input class="form-control form-control-solid placeholder-no-fix" autocomplete="off" placeholder="E-mail Adresiniz" name="email" />

            @if ($errors->has('email'))
                <div class="alert alert-danger display-hide" style="display: block;">
                    <button class="close" data-close="alert"></button>
                    <span>
                    {{ $errors->first('email') }}</span>
                </div>
            @endif
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Şifreniz</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Şifreniz" name="password"/>
            @if ($errors->has('password'))
                <div class="alert alert-danger display-hide" style="display: block;">
                    <button class="close" data-close="alert"></button>
                    <span>
                    {{ $errors->first('password') }}</span>
                </div>
            @endif
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-success uppercase">Giriş</button>
            <label class="rememberme check">
            <input type="checkbox" name="remember" value="1"/>Beni Hatırla </label>
            <a href="password/reset" id="forget-password" class="forget-password">Şifremi Unuttum?</a>
        </div>
    </form>
@endsection
