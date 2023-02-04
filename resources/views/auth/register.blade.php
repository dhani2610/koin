@extends('layouts.appalner')
@section('title','Sign Up - Alner ')
@section('content')
<section class="section-box shop-template mt-60">
    <div class="container">
      <div class="row mb-100">
        <div class="col-lg-1"></div>
        <div class="col-lg-5">
          <h3>Create an account</h3>
          <p class="font-md color-gray-500">Access to all features. No credit card required.</p>
          <div class="form-register mt-30 mb-30">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                  <label for="name" class="mb-5 font-sm color-gray-700">{{ __('Name') }} *</label>
                  <input id="name" class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" placeholder="Full Name">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="email" class="mb-5 font-sm color-gray-700">{{ __('E-Mail Address') }} *</label>
                  <input id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required type="email" placeholder="Email">
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="phone" class="mb-5 font-sm color-gray-700">Phone *</label>
                  <input id="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required type="text" placeholder="Phone">
                  @error('phone')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                
                {{-- <div class="form-group">
                  <label class="mb-5 font-sm color-gray-700">Username *</label>
                  <input class="form-control" type="text" placeholder="stevenjob">
                </div> --}}
                <div class="form-group">
                  <label for="password" class="mb-5 font-sm color-gray-700">{{ __('Password') }} *</label>
                  <input class="form-control @error('password') is-invalid @enderror" id="password" type="password" name="password" required placeholder="******************">
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="password-confirm" class="mb-5 font-sm color-gray-700" >{{ __('Confirm Password') }} *</label>
                  <input  id="password-confirm" class="form-control"  name="password_confirmation" required type="password" placeholder="******************">
                </div>
                <div class="form-group">
                  <label>Address</label>
                  <textarea name="address" rows="5" class="form-control d-block w-100 h-100" required>{{ old('address') }}</textarea>
                </div>
                <div class="form-group">
                  <label>
                    <input class="checkagree" type="checkbox" required>By clicking Register button, you agree our terms and policy,
                  </label>
                </div>
                <div class="form-group">
                  <input class="font-md-bold btn btn-buy" type="submit" value="Sign Up">
                </div>
                <div class="mt-20"><span class="font-xs color-gray-500 font-medium">Already have an account?</span><a class="font-xs color-brand-3 font-medium" href="{{ route('login') }}"> Sign In</a></div>
            </form>
          </div>
        </div>
        
      </div>
    </div>
  </section>
@endsection
