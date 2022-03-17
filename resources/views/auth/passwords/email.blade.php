@extends('layouts.app')



@section('content')
<div class="is-flex-grow-1 is-flex is-flex-direction-column is-justify-content-center is-align-items-center">
    <x-brand size="1"></x-brand>
    <h1 class="p-3 has-text-weight-semibold is-size-3">Reset Password</h1>
    {{-- Card --}}
    <div class="card" style="width: 400px">
        <div class="card-content">
            @if (session('status'))
                <div class="is-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="{{ route('password.email') }}">
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
                    <div class="control">
                        <button type="submit" class="button block is-link is-fullwidth">
                            {{ __('Send Password Reset Link') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection