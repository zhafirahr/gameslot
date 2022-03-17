@extends('layouts.app')

@section('content')
<div class="columns is-centered p-5">
  <div class="column is-10">
    <form method="POST" enctype="multipart/form-data">
      @csrf
      <h1 class="is-size-1 has-text-weight-semibold">Edit Game</h1>

      <div class="columns is-gapless">
        <div class="column is-3 is-size-4">
          Game Title
        </div>
        <div class="column is-9">
          <input type="text" class="input @error('title') is-danger @enderror" name="title" value="{{ old('title') ?? $game->title }}" required>
          @error('title')
            <p class="help is-danger">{{ $message }}</p>
          @enderror
        </div>
      </div>


      <div class="columns is-gapless">
        <div class="column is-3 is-size-4">
          Photo
        </div>
        <div class="column is-9">
          <div class="columns">
            <div class="column is-3">
              <figure class="image is-32x32">
                <x-image-round src="/images/game/{{$game->image}}" size="32" :alt="$game->title" />
              </figure>
            </div>
            <div class="column is-9">
              <input type="file" class="input @error('photo') is-danger @enderror" name="image">
              @error('photo')
                <p class="help is-danger">{{ $message }}</p>
              @enderror
            </div>
          </div>
          @error('image')
            <p class="help is-danger">{{ $message }}</p>
          @enderror
        </div>
      </div>


      <div class="columns is-gapless">
        <div class="column is-3 is-size-4">
          Game Description
        </div>
        <div class="column is-9">
          <textarea class="textarea @error('description') is-danger @enderror" name="description" required>{{ old('description') ?? $game->description }}</textarea>
          @error('description')
            <p class="help is-danger">{{ $message }}</p>
          @enderror
        </div>
      </div>

      <div class="columns is-gapless">
        <div class="column is-3 is-size-4">
          Game Price
        </div>
        <div class="column is-9">
          <input type="number" min="0" class="input @error('price') is-danger @enderror" name="price" value="{{ old('price') ?? $game->price ?? 0 }}" required>
          @error('price')
            <p class="help is-danger">{{ $message }}</p>
          @enderror
        </div>
      </div>


      <div class="columns is-gapless">
        <div class="column is-3 is-size-4">
          Game Genre
        </div>
        <div class="column is-9">
          <input type="text" class="input @error('genre') is-danger @enderror" name="genre" list="genres" value="{{ old('genre') ?? $game->genre->name }}" placeholder="Select a genre or write a new one" required>
          <datalist id="genres">
            @foreach($gameGenres as $genre)
              <option>{{ $genre->name }}</option>
            @endforeach
          </datalist>
          @error('genre')
            <p class="help is-danger">{{ $message }}</p>
          @enderror
        </div>
      </div>


      <div class="columns is-gapless">
        <div class="column is-3 is-size-4">
          PEGI Rating
        </div>
        <div class="column is-9">
          <select class="select is-fullwidth @error('pegi_rating') is-danger @enderror" name="pegi_rating" required>
            <option value="0" @if ((old('pegi_rating') ?? $game->pegi_rating) == 0) selected @endif>Everyone</option>
            <option value="3" @if ((old('pegi_rating') ?? $game->pegi_rating) == 3) selected @endif>3+ Kinder</option>
            <option value="7" @if ((old('pegi_rating') ?? $game->pegi_rating) == 7) selected @endif>7+ Kids </option>
            <option value="12" @if ((old('pegi_rating') ?? $game->pegi_rating) == 12) selected @endif>12+ Teen</option>
            <option value="16" @if ((old('pegi_rating') ?? $game->pegi_rating) == 16) selected @endif>16+ Mature</option>
            <option value="18" @if ((old('pegi_rating') ?? $game->pegi_rating) == 18) selected @endif>18+ Adult</option>
          </select>
          @error('pegi_rating')
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