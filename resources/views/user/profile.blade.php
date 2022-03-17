@extends('layouts.app')

@section('content')

<div class="columns is-centered p-5">
  <div class="column is-10">
    <form name="update-detail" method="POST" enctype="multipart/form-data">
      @csrf
      {{-- update-detail hidden input --}}
      <input type="hidden" name="update-detail" value="">
      <h1 class="is-size-1 has-text-weight-semibold">Profile</h1>

      <div class="columns is-gapless">
        <div class="column is-3 is-size-4">
          Name
        </div>
        <div class="column is-9">
          <input type="text" class="input" name="name" value="{{ $user->name }}">
        </div>
      </div>

      <div class="columns is-gapless">
        <div class="column is-3 is-size-4">
          Photo
        </div>
        <div class="column is-9">
          <div class="columns is-mobile">
            <div class="column">
              <figure class="image is-48x48 is-inline-block">
                <img class="is-rounded" src="/images/user/{{ $user->image }}">
              </figure>
            </div>
            <div class="column">
              <input type="file" name="image">
            </div>
          </div>
        </div>
      </div>

      <div class="columns is-gapless">
        <div class="column is-3 is-size-4">
          Email
        </div>
        <div class="column is-9">
          <input type="text" class="input" name="email" value="{{ $user->email }}">
        </div>
      </div>

      <div class="columns is-gapless">
        <div class="column is-3 is-size-4">
          Gender
        </div>
        <div class="column is-9">
          {{ $user->gender }}
        </div>
      </div>

      <div class="columns is-gapless">
        <div class="column is-3 is-size-4">
          Date of Birth
        </div>
        <div class="column is-9">
          {{ $user->dob }}
        </div>
      </div>

      {{-- Update button on the right side --}}
      <div class="columns is-gapless">
        <div class="column is-3 is-size-4">
          &nbsp;
        </div>
        <div class="column is-9 is-flex is-align-items-flex-end is-justify-content-flex-end">
          <button class="button is-link">Update</button>
        </div>
      </div>
    </form>
  </div>
</div>

<div class="columns is-centered p-5">
  <div class="column is-10">
    <form name="update-password" method="POST">
      @csrf
      {{-- update-password hidden input --}}
      <input type="hidden" name="update-password" value="">
      <h1 class="is-size-1 has-text-weight-semibold">Account</h1>

      <div class="columns is-gapless">
        <div class="column is-3 is-size-4">
          Old Password
        </div>
        <div class="column is-9">
          <input type="password" class="input  @error('old_password') is-danger @enderror" name="old_password">
          @error('old_password')
          <span class="is-size-7" role="alert">
              <strong class="has-text-danger">{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>

      <div class="columns is-gapless">
        <div class="column is-3 is-size-4">
          New Password
        </div>
        <div class="column is-9">
          <input type="password" class="input  @error('password') is-danger @enderror" name="password">
          @error('password')
          <span class="is-size-7" role="alert">
              <strong class="has-text-danger">{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>

      <div class="columns is-gapless">
        <div class="column is-3 is-size-4">
          Confirm Password
        </div>
        <div class="column is-9">
          <input type="password" class="input  @error('password_confirmation') is-danger @enderror" name="password_confirmation">
          @error('password_confirmation')
          <span class="is-size-7" role="alert">
              <strong class="has-text-danger">{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>

      {{-- Update button on the right side --}}
      <div class="columns is-gapless">
        <div class="column is-3 is-size-4">
          &nbsp;
        </div>
        <div class="column is-9 is-flex is-align-items-flex-end is-justify-content-flex-end">
          <button class="button is-link">Update</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection