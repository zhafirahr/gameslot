@extends('layouts.app')

@section('content')
<div class="is-flex-grow-1 is-flex is-flex-direction-column is-justify-content-center is-align-items-center">
    <x-brand></x-brand>
    <h1 class="p-3 has-text-weight-semibold is-size-3">Confirm Password</h1>
    <h1 class="p-1 is-size-6">Please confirm your password before continuing.</h1>
    {{-- Card --}}
    <div class="card" style="width: 400px">
        <div class="card-content">
            @if (session('status'))
                <div class="is-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf
                <div class="field">
                    <label for="password" class="label">{{ __('Password') }}</label>
                    <div class="control">
                        <input id="password" type="password" class="input @error('password') is-danger @enderror" name="password" required autocomplete="current-password" autofocus>
                        @error('password')
                        <span class="is-size-7" role="alert">
                            <strong class="has-text-danger">{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <button type="submit" class="button block is-link is-fullwidth">
                            {{ __('Confirm Password') }}
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