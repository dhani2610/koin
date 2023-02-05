@extends('layouts.appalner')
@section('title','Login - Alner ')
@section('content')
{{-- Default values to ease development process --}}
@production
@php
    $__defaults = [
        'email'    => old('email'),
        'password' => '',
        'remember' => old('remember'),
    ]
@endphp
@else
@php
    $__defaults = [
        // 'email'    => \App\Models\User::firstWhere('role', 'admin')?->email,
        'email'    => \App\User::firstWhere('email', 'fulan@gmail.com')?->email,
        // 'password' => config('lumina.accounts.defaults.password'),
        'password' => 123456789,
        'remember' => true,
    ]
@endphp
@endproduction

  <!-- Login Start -->
  <section class="section-box shop-template mt-60">
    <div class="container">
      <div class="row mb-100">
        <div class="col-lg-1"></div>
        <div class="col-lg-5">
          <h3>Login</h3>
          <p class="font-md color-gray-500">Koinpack</p>
          <p class="font-smaller color-gray-500"><br>Role User Email: <br> slamet14@example.com <br>pass: <br> aabbccdd</p>

          <div class="form-register mt-30 mb-30">
            <form method="POST" action="{{ route('login') }}">
              @csrf
            <div class="form-group">
              <label class="mb-5 font-sm color-gray-700">Email*</label>
              <input class="form-control @error('email') is-invalid @enderror" type="text" placeholder="Email" name="email" value="{{ $__defaults['email'] }}" required autofocus>
              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group">
              <label class="mb-5 font-sm color-gray-700">Password *</label>
              <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="******************" value="{{ $__defaults['password'] }}" required>
              @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="color-gray-500 font-xs">
                    <input class="checkagree" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>Remember me
                  </label>
                </div>
              </div>
              <div class="col-lg-6 text-end">
                {{-- <div class="form-group"><a class="font-xs color-gray-500" href="#">Forgot your password?</a></div> --}}
              </div>
            </div>
            <div class="form-group">
              <input class="font-md-bold btn btn-buy" type="submit" value="Sign In">
            </div>
          </form>

            <div class="mt-20"><span class="font-xs color-gray-500 font-medium">Have not an account?</span><a class="font-xs color-brand-3 font-medium" href="{{ route('register') }}">Sign Up</a></div>
          </div>
        </div>
        <div class="col-lg-5"></div>
      </div>
    </div>
  </section>
  <!-- Login End -->

@endsection
