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
@endsection --}}


@include('partials.styles')
@if (Session::has('sticky_error'))

<div class="register-box" id="register-form">
    <h2>Login</h2>
        <div class="container mt-1">
            <div class="row justify-content-center">
                <div class="col-md-8">
                </div>
            </div>
        </div>
        <div class="alert alert-danger">
            <p>{{ Session::get('sticky_error') }}</p>
        </div>
        <form class="register-animation-form" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="user-box">
                {{-- <input type="text" name="" required=""> --}}
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                <label>{{ __('Email Address') }}</label>
              </div>
              <div class="user-box">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                {{-- <input type="password" name="" required=""> --}}
                <label>{{ __('Password') }}</label>
              </div>
          
        <a href="#" onclick="$(this).closest('form').submit()">
            {{-- <span></span>
            <span></span>
            <span></span>
            <span></span> --}}
            Login
        </a>
    
        </form>
      </div>
    @endif


@if (!Session::get('sticky_error'))

<div class="login-box">
    <h2>Login</h2>
    
    <form class="animation-form" method="POST" action="{{ route('login') }}">
        @csrf
      <div class="user-box">
        {{-- <input type="text" name="" required=""> --}}
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        <label>{{ __('Email Address') }}</label>
      </div>
      <div class="user-box">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        {{-- <input type="password" name="" required=""> --}}
        <label>{{ __('Password') }}</label>
      </div>
      {{-- <div class="row mb-0">
        <div class="col-md-8 offset-md-4">
            <a>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                
                <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>
              </a>

            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Password?') }}
                </a>
            @endif
        </div>
    </div> --}}
    <a href="#" onclick="$(this).closest('form').submit()">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        Login
    </a>
    </form>
</div>

    {{-- animition --}}
  <div class="intro">
    <div class="intro-text">
      <h1 class="hide h-front">
        
        <span class="text">MetroNet</span>
      </h1>
      <h1 class="hide h-front">
        
        <span class="text">Bangladesh</span>
      </h1>
      <h1 class="hide h-front">
        
        <span class="text">Limited</span>
      </h1>
    </div>
  </div>
  <div class="slider"></div>
      
@endif
  
{{-- @endsection --}}


@include('partials.scripts')

<script src={{asset("assets/js/gsap.min.js")}}></script>
{{-- custom js --}}
<script src={{asset("js/login_style.js")}}></script>