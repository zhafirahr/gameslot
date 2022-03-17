@extends('layouts.app')

@section('content')
<div class="columns is-centered p-5">
  <div class="column is-10">
    {{-- A card with full width, rounded corners and background image inline CSS style --}}
    <div style="display:flex; flex-direction:column; width: 100%; height: 100%; background-image: url('/images/game/{{$game->image}}'); background-size: cover; background-position: center; background-repeat: no-repeat; border-radius: 10px; padding: 5rem 1.5rem 5rem 1.5rem">
      <h1 class="title is-1 has-text-white is-align-self-center p-5">
        {{ $game->title }}
      </h1>
      <div class="columns p-5" style="border-radius: 10px; background-color: rgba(145, 145, 145, 0.45)">
        <div class="column">
          <button class="button is-small is-success is-light has-text-success-dark has-text-weight-semibold is-4">
            {{ $game->genre->name }}
          </button>
          <div class="content is-6 py-3">
            <p class="has-text-white">
              {{ $game->description }}
            </p>
          </div>
        </div>
        <div class="column">
        </div>
        <div class="column is-narrow is-flex is-flex-direction-column is-justify-content-center is-align-items-center">
          <div class="columns">
            <div class="column">
              <figure class="image is-96x96">
                <img src="/images/pegi/{{ $game->pegi_rating }}.jpg" alt="PEGI rating: {{ $game->pegi_rating }}">
              </figure>
            </div>
            <div class="column is-flex is-flex-direction-column is-justify-content-center is-align-items-center">
              <span class="is-size-2 has-text-weight-bold has-text-white">
                @if ($game->price == 0)
                  Free
                @else
                  ${{ $game->price }}
                @endif
              </span>
            </div>
          </div>
          <div class="p-2">
            <a href="{{ route('games.add_to_cart', ['id'=>$game->id])}}" class="button is-info has-text-white has-text-weight-semibold is-4">
              <span class="icon">
                <i class="fas fa-shopping-cart"></i>
              </span>
              <span>Add to Cart</span>
            </a>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection