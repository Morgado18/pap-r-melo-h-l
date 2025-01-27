{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 --}}

@extends('layouts.visit.mainAuth')

@section('pageTitle', 'Iniciar sessão')

@section('content')

 <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-md-6 bg-white p-5">
        <h3 class="text-center">
            <strong>
                <i>
                    Iniciar sessão
                </i>
            </strong>
        </h3>
        {{-- <h4 class="text-center">
            <strong>
                <i>
                    Agrifácil
                </i>
            </strong>
        </h4> --}}
        <style>
            #formAuth{
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
               /*  width: 100%; */
            }
        </style>
        <form action="{{ route('login') }}" method="POST" id="formAuth">
            @csrf

            <div class="row mb-3 my-3 w-100" style="display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;">
              {{--   <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Endereço Email') }}</label> --}}

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Digite seu endereço email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3  w-100"  style="display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;">

               {{--  <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Senha') }}</label> --}}

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password" placeholder="Sua senha">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3 w-100" style="display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;">
                <div class="col-md-6 mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Lembrar-me') }}
                        </label>
                    </div>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary w-100">
                        {{ __('Iniciar sessão') }}
                    </button>
                </div>
            </div>

           <a href="/">
            <span>
                <sub>
                    &copy; Agrifácil
                </sub>
            </span>
           </a>

           {{--  <div class="row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary w-0">
                        {{ __('Iniciar sessão') }}
                    </button>

                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
            </div> --}}
        </form>
      </div>
    </div>
  </div>

@endsection
