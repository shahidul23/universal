
{{-- @extends('layouts.layout') --}}

{{-- @section('content') --}}
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}
@include('partials.styles')

  <div class="login-box">
    <h2>Login</h2>
    <form class="animation-form">
      <div class="user-box">
        <input type="text" name="" required="">
        <label>Username</label>
      </div>
      <div class="user-box">
        <input type="password" name="" required="">
        <label>Password</label>
      </div>
      <a href="#">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        Submit
      </a>
    </form>
  </div>

  {{-- animition --}}
  <div class="intro">
    <div class="intro-text">
      <h1 class="hide h-front">
        {{-- <span class="text">CRM</span> --}}
        <span class="text">MetroNet</span>
      </h1>
      <h1 class="hide h-front">
        {{-- <span class="text">Created by</span> --}}
        <span class="text">Bangladesh</span>
      </h1>
      <h1 class="hide h-front">
        {{-- <span class="text">MetroNet</span> --}}
        <span class="text">Limited</span>
      </h1>
    </div>
  </div>
  <div class="slider"></div>
{{-- @endsection --}}


@include('partials.scripts')
{{-- <script src={{asset("assets/js/gsap.min.js")}}></script> --}}
{{-- custom js --}}
{{-- <script src={{asset("js/style.js")}}></script> --}}
