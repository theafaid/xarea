@extends('layouts.app')
@section('title')

@endsection

@section('content')
<div class="register-area" style="background-color: rgb(249, 249, 249);">
            <div class="container">

                <div class="col-md-8 col-sm-offset-2">
                    <div class="box-for overflow">                         
                        <div class="col-md-12 col-xs-12 login-blocks">
                            <h2>{{trans('user.reset_password')}}</h2> <br>
                            
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{trans('user.email')}}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{trans('user.reset_password_btn')}}
                                </button>
                            </div>
                        </div>
                    </form>
            
                        </div>
                        
                    </div>
                </div>

            </div>
        </div>   
@endsection