@extends('layouts.app')

@section('content')
<div class="is-flex-grow-1 is-flex is-flex-direction-column is-justify-content-center is-align-items-center">
    <x-brand size="1"></x-brand>
    <h1 class="p-3 has-text-weight-semibold is-size-3">Sign in into your account</h1>
    {{-- Card --}}
    <div class="card" style="width: 400px">
        <div class="card-content">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="field">
                    <label for="email" class="label">{{ __('E-Mail Address') }}</label>
                    <div class="control">
                        <input id="email" type="email" class="input @error('email') is-danger @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="is-size-7" role="alert">
                            <strong class="has-text-danger">{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="field">
                    <label for="password" class="label">{{ __('Password') }}</label>
                    <div class="control">
                        <input id="password" type="password" class="input @error('password') is-danger @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                        <span class="is-size-7" role="alert">
                            <strong class="has-text-danger">{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <label class="checkbox">
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <button type="submit" class="button block is-link is-fullwidth">
                            {{ __('Sign in') }}
                        </button>
                    </div>
                </div>
                <div class="field">
                    <div class="control">
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

@endsection
