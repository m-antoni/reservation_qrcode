@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <a href="{{ route('register') }}">
        <button class="bttn-stretch bttn-sm bttn-dafault"  data-aos="fade-down" data-aos-delay="1000">
            <i class="fa fa-edit"></i> Sign up 
        </button>
    </a>      
</div>   

<div class="container my-5 py-3" data-aos="fade-up">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h3 data-aos="fade-left">
                        <i class="fa fa-user-circle-o" data-aos="fade-up-right"></i> 
                        Login
                    </h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right" data-aos="fade-right" data-aos-delay="500">{{ __('e-mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" 
                                name="email" value="{{ old('email') }}" data-aos="fade-left" data-aos-delay="500" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right" data-aos="fade-right" data-aos-delay="500">{{ __('password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" 
                                name="password" data-aos="fade-left" data-aos-delay="500" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0" data-aos="zoom-out" data-aos-delay="1000">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="bttn-fill bttn-md bttn-block bttn-danger">
                                    <i class="fa fa-lock"></i> {{ __('Login') }}
                                </button>
                                
                                <a class="btn btn-link  btn-block" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
