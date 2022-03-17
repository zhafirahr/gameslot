@extends('layouts.app')

@php
    // Get the date exactly 13 years ago
    $date = new DateTime();
    $date->modify('-13 years');
    $date = $date->format('Y-m-d');
@endphp

@section('content')
<div class="is-flex-grow-1 is-flex is-flex-direction-column is-justify-content-center is-align-items-center">
    <x-brand size="1"></x-brand>
    <h1 class="p-3 has-text-weight-semibold is-size-3">Sign up your account</h1>
    {{-- Card --}}
    <div class="card" style="width: 400px">
        <div class="card-content">
            <form method="POST">
                @csrf
                <div class="field">
                    <label for="name" class="label">{{ __('Name') }}</label>
                    <div class="control">
                        <input id="name" type="text" class="input @error('name') is-danger @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                        <span class="is-size-7" role="alert">
                            <strong class="has-text-danger">{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
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
                    <label for="gender" class="label">{{ __('Gender') }}</label>
                    <div class="columns p-1">
                        <label for="male" class="column">
                            <input type="radio" name="gender" id="male" value="male" {{ old('gender') == "male" ? 'checked' : '' }} required> Male
                        </label>
                        <label for="female" class="column">
                            <input type="radio" name="gender" id="female" value="female"  {{ old('gender') == "female" ? 'checked' : '' }} required> Female
                        </label>
                    </div>
                    @error('gender')
                    <span class="is-size-7" role="alert">
                        <strong class="has-text-danger">{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="field">
                    <label for="dob" class="label">{{ __('Date of Birth') }}</label>
                    <div class="control">
                        <input id="dob" type="date" max="{{$date}}" class="input @error('name') is-danger @enderror" name="dob" value="{{ old('dob') }}" required autocomplete="dob" autofocus>
                        @error('dob')
                        <span class="is-size-7" role="alert">
                            <strong class="has-text-danger">{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <button type="submit" class="button block is-link is-fullwidth">
                            {{ __('Sign up') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
