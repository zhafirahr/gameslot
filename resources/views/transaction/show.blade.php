@extends('layouts.app')

@section('content')

<div class="columns is-centered px-5 mt-5 is-size-4">
  <div class="column is-10">
    <div class="columns">
      <div class="column">
        Transaction ID: {{ $transaction->id }}
      </div>
      <div class="column is-narrow">
        Transaction Date: {{ $transaction->created_at }}
      </div>
    </div>
  </div>
</div>

<div class="columns is-centered px-5 is-size-4">
  <div class="column is-10">
    <div class="columns">
      <div class="column">
        Customer Name: {{ $transaction->user->name }}
      </div>
    </div>
  </div>
</div>

<div class="columns is-centered px-5">
  <div class="column is-10">
    <table class="table is-fullwidth">
      <thead>
        <tr>
          <th>Game Title</th>
          <th>Game Price</th>
          <th>Quantity</th>
          <th>Subtotal</th>
          <th><!-- Utilities --></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($transaction->items as $item)
        <tr>
          <td>{{ $item->title }}</td>
          <td>${{ $item->price }}</td>
          <td>{{ $item->quantity }}</td>
          <td>${{ $item->subtotal }}</td>
        </tr>
        @endforeach
    </table>
  </div>
</div>

<div class="columns is-centered px-5 is-size-4">
  <div class="column is-10">
    <div class="columns">

      <div class="column">
      </div>
      <div class="column is-narrow">
        Total: ${{ $transaction->total }}
      </div>
    </div>
  </div>
</div>

@endsection