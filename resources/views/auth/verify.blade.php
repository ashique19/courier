@extends('public.layouts.layout')
@section('title'){{ settings('application_name') }} - {{ settings('application_slogan') }} @stop


@section('main')


<div class="column is-6-desktop is-offset-3-desktop is-12-tablet is-12-mobile">
    
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="card-header-title">{{ __('Verify Your Email Address') }}</div>
                </div>

                <div class="card-content">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
		                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
	                </form>
                </div>
            </div>
        </div>
    
</div>
@endsection
