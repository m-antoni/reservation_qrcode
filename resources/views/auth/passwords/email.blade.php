@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <a href="{{ route('login') }}">
        <button class="bttn-sm bttn-dafault text-white"  data-aos="fade-down">
            <i class="fa fa-arrow-circle-left fa-2x"></i>
        </button>
    </a>      
</div>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5 pt-4">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h3 data-aos="fade-left">
                        <i class="fa fa-gear fa-spin"></i> 
                        Reset Password
                    </h3>
                </div>

                <div class="card-body my-3">
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right"> {{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                {{-- @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif --}}
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="bttn-fill bttn-md bttn-default">
                                    <i class="fa fa-send"></i> {{ __('Send Password Reset Link') }}
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
