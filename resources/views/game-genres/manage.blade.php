@extends('layouts.app')

@section('content')

<div class="columns is-centered p-5 ">
  <div class="column is-10">
    <table class="table is-fullwidth">
      <thead>
        <tr>
          <th colspan="2">Game Genre</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($gameGenres as $item)
        <tr>
          <td>
            <a href="{{ route('search', ['genre'=>$item->id]) }}">
              {{ $item->name }}
              {{-- Count number of games --}}
              <span class="tag is-light">{{ $item->games->count() }}</span>
            </a>
          </td>
          <td class="is-narrow">
            <a href="{{ route('manage.game.genre.edit', ['id'=>$item->id] ) }}">
              <button class="button is-primary">
                <span class="icon is-small">
                  <i class="fas fa-edit"></i>
                </span>
                <span>Edit</span>
              </button>
            </a>
          </td>
        </tr>
        @endforeach
    </table>
  </div>
</div>

@endsection