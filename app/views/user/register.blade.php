@extends('master')

@section('header')
    <link
        type="text/css"
        rel="stylesheet"
        href="{{ asset("css/register.css") }}"
    />
@stop

@section('content')

<div class="row row-centered" id = "loginwrapper">
    <div class="col-md-2"></div>
    <div class="col-md-8 col-centered">
        <div class="well centered">
            <legend>Đăng kí</legend>
            {{Form::open(array('url' => 'register'))}}
            <div class="form-group">
                {{Form::label('username','Tên đăng nhập :')}}
                {{ Form::text('username','',array('class'=>'form-control','placeholder'=>'Enter Username'))}}
                 @if ($errors->has('username')) <p class="help-block">{{ $errors->first('username') }}</p> @endif
            </div>
            <div class="form-group">
                {{Form::label('password','Mật khẩu :')}}
                {{ Form::text('password','',array('class'=>'form-control','placeholder'=>'Enter Password'))}}
                @if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
            </div>
            <div class="form-group">
                {{Form::label('cpassword','Nhập lại mật khẩu:')}}
                {{ Form::text('cpassword','',array('class'=>'form-control','placeholder'=>'Enter Password Again'))}}
                @if ($errors->has('cpassword')) <p class="help-block">{{ $errors->first('cpassword') }}</p> @endif
            </div>
            <div class="form-group">
                {{Form::label('fullname','Tên đầy đủ :')}}
                {{ Form::text('fullname','',array('class'=>'form-control','placeholder'=>'Enter Fullname'))}}
                @if ($errors->has('fullname')) <p class="help-block">{{ $errors->first('fullname') }}</p> @endif
            </div>
            <div class="form-group">
                {{Form::label('email','Email:')}}
                {{ Form::text('email','',array('class'=>'form-control','placeholder'=>'Enter Email'))}}
                @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
            </div>
            {{Form::submit('Đăng kí',array('class'=>'btn btn-success'))}}
            <a href="/" class = "btn btn-primary">Hủy</a>
            {{Form::close()}}
        </div>
    </div>
</div>

@stop