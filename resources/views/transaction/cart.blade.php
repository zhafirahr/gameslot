@extends('layouts.app')

@section('content')

{{-- Button on the right side that says Create with plus icon from font awesome --}}

<div class="columns is-centered p-5">
  <div class="column is-10 is-flex is-flex-direction-column">
    <a href="{{ route('user.cart.checkout') }}" class="button is-link is-align-self-flex-end">
      {{-- Font awesome cheque icon --}}
      <i class="fas fa-shopping-cart"></i>&nbsp; Checkout
    </a>
  </div>
</div>

<div class="columns is-centered px-5">
  <div class="column is-10">
    <table class="table is-fullwidth">
      <thead>
        <tr>
          <th colspan="2">Game Title</th>
          <th class="is-narrow">Game Price</th>
          <th class="is-narrow">Quantity</th>
          <th class="is-narrow"><!-- Utilities --></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($cart as $id => $quantity)
        <tr>
          <td class="is-narrow">
            <figure class="image is-32x32">
              <x-image-round src="/images/game/{{$game[$id]->image}}" size="32" :alt="$game[$id]->title" />
            </figure>
          </td>
          <td>
            <a class="is-size-5" href="{{ route('games.show', ['id'=>$game[$id]->id]) }}">
              {{ $game[$id]->title }}
            </a>
          </td>
          <td class="is-size-5">
            @if ($game[$id]->price == 0)
              Free
            @else
              {{ $game[$id]->price }}
            @endif
          </td>
          <td>

            <form id="edit-form-{{$id}}" action="{{ route('user.cart.edit', ['id'=>$id]) }}" method="POST">
              @csrf
              @method('PUT')
              <input type="number" name="quantity" value="{{ $quantity }}" min="1" class="input">
            </form>
          </td>
          <td class="is-narrow">
          {{-- Edit and delete button --}}
            <a class="button is-info" href="{{ route('user.cart.edit', ['id'=>$id]) }}" onclick="event.preventDefault(); document.getElementById('edit-form-{{$id}}').submit();">
              <span class="icon">
                <i class="fas fa-edit"></i>
              </span>
              <span>Edit</span>
            </a>
            {{-- A link that is like a button, prevent default and send form request to delete the data --}}
            <a class="button is-danger" href="{{ route('user.cart.delete', ['id'=>$id]) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{$id}}').submit();">
              <span class="icon">
                <i class="fas fa-trash"></i>
              </span>
              <span>Delete</span>
            </a>
            {{-- Form that is hidden and is sent to the route to delete the data --}}
            <form id="delete-form-{{$id}}" action="{{ route('user.cart.delete', ['id'=>$id]) }}" method="POST" style="display: none;">
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