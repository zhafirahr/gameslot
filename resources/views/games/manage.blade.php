@extends('layouts.app')

@section('content')

{{-- Button on the right side that says Create with plus icon from font awesome --}}

<div class="columns is-centered p-5">
  <div class="column is-10 is-flex is-flex-direction-column">
    <a href="{{ route('manage.game.create') }}" class="button is-link is-align-self-flex-end">
        <i class="fas fa-plus"></i>&nbsp; Add game
    </a>
  </div>
</div>

<div class="columns is-centered px-5">
  <div class="column is-10">
    <table class="table is-fullwidth">
      <thead>
        <tr>
          <th colspan="2">Game Title</th>
          <th class="is-narrow">PEGI Rating</th>
          <th class="is-narrow">Game Genre</th>
          <th class="is-narrow">Game Price</th>
          <th class="is-narrow"><!-- Utilities --></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($games as $item)
        <tr>
          <td class="is-narrow">
            <figure class="image is-32x32">
              <x-image-round src="/images/game/{{$item->image}}" size="32" :alt="$item->title" />
            </figure>
          </td>
          <td>
            <a href="{{ route('games.show', ['id'=>$item->id]) }}">
              {{ $item->title }}
            </a>
          </td>
          <td>
            {{ $item->pegi_rating }}+
            {{-- Switch --}}
            @switch($item->pegi_rating)
              @case(0)
                {{ "Everyone" }}
                @break
              @case(3)
                {{ "Kinder" }}
                @break
              @case(7)
                {{ "Kids" }}
                @break
              @case(12)
                {{ "Teen" }}
                @break
              @case(16)
                {{ "Mature" }}
                @break
              @case(18)
                {{ "Adult" }}
                @break
              @default
                {{ "Not Rated" }}
            @endswitch
          </td>
          <td>
            <button class="button is-small is-success is-light has-text-success-dark has-text-weight-semibold is-4">
              {{ $item->genre->name }}
            </button>
          </td>
          <td>
            @if ($item->price == 0)
              Free
            @else
              {{ $item->price }}
            @endif
          </td>
          <td class="is-narrow">
          {{-- Edit and delete button --}}
            <a class="button is-info" href="{{ route('manage.game.edit', ['id'=>$item->id]) }}">
              <span class="icon">
                <i class="fas fa-edit"></i>
              </span>
              <span>Edit</span>
            </a>
            {{-- A link that is like a button, prevent default and send form request to delete the data --}}
            <a class="button is-danger" href="{{ route('manage.game.delete', ['id'=>$item->id]) }}" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">
              <span class="icon">
                <i class="fas fa-trash"></i>
              </span>
              <span>Delete</span>
            </a>
            {{-- Form that is hidden and is sent to the route to delete the data --}}
            <form id="delete-form" action="{{ route('manage.game.delete', ['id'=>$item->id]) }}" method="POST" style="display: none;">
              @csrf
              @method('DELETE')
            </form>
          </td>
        </tr>
        @endforeach
    </table>
  </div>
</div>

@endsection