@extends('layouts.app')

@section('content')
<div class="columns is-centered p-5">
  <div class="column is-10">
    <form method="POST">
      @csrf
      <h1 class="is-size-1 has-text-weight-semibold">Update Genre</h1>

      <div class="columns is-gapless">
        <div class="column is-3 is-size-4">
          Name
        </div>
        <div class="column is-9">
          <input type="text" class="input @error('name') is-danger @enderror" name="name" value="{{ old('name') ?? $gameGenre->name }}" defaultValue="{{ $gameGenre->name }}">
          @error('name')
            <p class="help is-danger">{{ $message }}</p>
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