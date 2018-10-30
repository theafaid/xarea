@extends('layouts.app')
@section('title')
تسجيل الدخول | {{!empty(setting()->sitename) ? setting()->sitename : "شقتى"}}
@endsection

@section('content')
<div class="register-area" style="background-color: rgb(249, 249, 249);">
            <div class="container">

                <div class="col-md-8 col-sm-offset-2">
                    <div class="box-for overflow">                         
                        <div class="col-md-12 col-xs-12 login-blocks">
                            <h2>{{trans('user.login')}}</h2> <br>
                            <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{trans('user.email')}}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{trans('user.password')}}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{trans('user.remember_me')}}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{trans('user.login')}}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{trans('user.forget_password')}}
                                </a>
                            </div>
                        </div>
                    </form>
                            <br>
                            
                            <h2>Social login :  </h2> 
                            
                            <p>
                            <a class="login-social" href="#"><i class="fa fa-facebook"></i>&nbsp;{{trans('user.facebook')}}</a> 
                            <a class="login-social" href="#"><i class="fa fa-google-plus"></i>&nbsp;{{trans('user.gmail')}}</a> 
                            <a class="login-social" href="#"><i class="fa fa-twitter"></i>&nbsp;{{trans('user.twitter')}}</a>  
                            </p> 
                        </div>
                        
                    </div>
                </div>

            </div>
        </div> 
@endsection