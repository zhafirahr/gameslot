@extends('layouts.app')

@section('content')
<div class="columns is-centered p-5">
  <div class="column is-10">
    <form method="POST" enctype="multipart/form-data">
      @csrf
      <h1 class="is-size-1 has-text-weight-semibold">Add Game</h1>

      <div class="columns is-gapless">
        <div class="column is-3 is-size-4">
          Game Title
        </div>
        <div class="column is-9">
          <input type="text" class="input @error('title') is-danger @enderror" name="title" value="{{ old('title') }}" required>
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
          <input type="file" class="input @error('image') is-danger @enderror" name="image" required>
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
          <textarea class="textarea @error('description') is-danger @enderror" name="description" required>{{ old('description') }}</textarea>
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
          <input type="number" min="0" class="input @error('price') is-danger @enderror" name="price" value="{{ old('price') ?? 0 }}" required>
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
          <input type="text" class="input @error('genre') is-danger @enderror" name="genre" list="genres" value="{{ old('genre') }}" placeholder="Select a genre or write a new one" required>
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
            <option value="0">Everyone</option>
            <option value="3">3+ Kinder</option>
            <option value="7">7+ Kids </option>
            <option value="12">12+ Teen</option>
            <option value="16">16+ Mature</option>
            <option value="18">18+ Adult</option>
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
          <button class="button is-link">Add</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection