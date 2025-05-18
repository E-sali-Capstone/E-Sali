


@extends('layouts.app')

@section('content')
<div class="bg-body-tertiary min-vh-100 d-flex flex-row align-items-center">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <div class="card-group d-block d-md-flex row">
              <div class="card col-md-4 p-4 mb-0">
                <div class="card-body">
                  <h3>Verify your Account</h3>
                  <p class="text-body-secondary">{{ __('Before proceeding, please check your email for a verification link.') }}
                  </p>
                  @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif
                  <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        {{ __('If you did not receive the email') }}
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
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
