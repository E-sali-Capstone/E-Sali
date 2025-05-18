@extends('layouts.app')
@section('content')
<div class="bg-body-tertiary min-vh-100 d-flex flex-row align-items-center" style="margin-top:100px;">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <div class="card-group d-block d-md-flex row">
              <div class="card col-md-4 p-4 mb-0">
                <div class="card-body">
                  <h3>Create Account</h3>
                  <p class="text-body-secondary">Sign up to create your account and get started</p>
                        <form method="POST" action="{{ route('register') }}">
                        @csrf
                            <div class="form-outline">
                            <label for="name" class="form-label">{{ __('Name') }}</label>
                                <input id="name" type="text" class=" form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" >
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        <div class="form-outline">
                            <label for="name" class="form-label">Contact Number</label>
                                <input id="contactNumber" type="text" class=" form-control @error('contactNumber') is-invalid @enderror" name="contactNumber" value="{{ old('contactNumber') }}" >
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-outline">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                <input id="email" type="email" class=" form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required >
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-outline mb-4">
                            <label for="password" class="form-label">{{ __('Password') }}</label>

                                <input id="password" type="password" class=" form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-outline">
                            <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>

                                <input id="password-confirm" type="password" class=" form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="form-outline">
                                <button type="submit" class="btn btn-primary mt-2">
                                    {{ __('Register') }}
                                </button>
                            </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


@endsection
