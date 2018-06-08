@extends('admin.layouts.layout-basic')

<!-- Main Content -->
@section('content')

    <!-- BEGIN FORGOT PASSWORD FORM -->
    <form method="POST" action="{{ url('/password/email') }}">
        {!! csrf_field() !!}
        <h3>Forget Password ?</h3>
        <p>
             Enter your e-mail address below to reset your password.
        </p>
        @if (session('status'))
            <div class="alert alert-success display-hide" style="display: block;">
                <button class="close" data-close="alert"></button>
                    <span>{{ session('status') }}</span>
            </div>
        @endif
        <div class="form-group">
            <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email"/>
            @if ($errors->has('email'))
                <div class="alert alert-danger display-hide" style="display: block;">
                    <button class="close" data-close="alert"></button>
                    <span>
                    {{ $errors->first('email') }}</span>
                </div>
            @endif
        </div>
        <div class="form-actions">
        <a href="/login" id="back-btn" class="btn btn-default">Geri</a>
            <button type="submit" class="btn btn-success uppercase pull-right">Submit</button>
        </div>
    </form>
    <!-- END FORGOT PASSWORD FORM -->
@endsection
