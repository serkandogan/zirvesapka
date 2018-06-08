@extends('template.'.$siteTheme.'.layout.master')
@section('content')
<div class="columns-container">
    <div class="container" id="columns">
       
        <div class="page-content">
        @if(Session::has('message'))
			{!! Session::get('message') !!}
        @endif
            <div class="row">
                <div class="col-sm-6">
                    <div class="box-authentication">
                    {!! Form::open(['action'=>'Site\MemberController@postRegister', 'method'=>'POST']) !!}
                    {{ csrf_field() }}
                        <h3>Yeni Üye Ol</h3>
                        <hr>
                        
                        {!! Form::label('name', 'Ad Soyad') !!}
                        {!! Form::text('name', null, ['required'=>1,'class'=>'form-control']) !!}  
                        {!! Form::label('email', 'E-Mail Adresi') !!}
                        {!! Form::email('email', null, ['required'=>1,'class'=>'form-control']) !!}   
                        {!! Form::label('password', 'Şifre') !!}
                        {!! Form::password('password', ['required'=>1,'class'=>'form-control']) !!}   
                        {!! Form::label('confirm_password', 'Şifre Tekrar') !!}
                        {!! Form::password('confirm_password', ['required'=>1,'class'=>'form-control']) !!}    
                        
                        <button class="button"><i class="fa fa-lock"></i> Üye Ol</button>
                    {!! Form::close() !!}
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="box-authentication">
                    {!! Form::open(['action'=>'Site\MemberController@postLogin', 'method'=>'POST']) !!}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <h3>Üye Girişi</h3>
                        <hr>
                        {!! Form::label('email', 'E-Mail Adresi') !!}
                        {!! Form::email('email', null, ['required'=>1,'class'=>'form-control']) !!}   
                        {!! Form::label('password', 'Şifre') !!}
                        {!! Form::password('password', ['required'=>1,'class'=>'form-control']) !!}  
                        <button class="button"><i class="fa fa-lock"></i>Giriş Yap</button>
                    {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection