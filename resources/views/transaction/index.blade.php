@extends('layouts.app')

@section('content')

<div class="columns is-centered px-5 my-5">
  <div class="column is-10">
    <table class="table is-fullwidth">
      <thead>
        <tr>
          <th>Transaction ID</th>
          <th>Transaction Date</th>
          <th>Total Item</th>
          <th><!-- Utilities --></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($transactions as $item)
        <tr>
          <td>{{ $item->id }}</td>
          <td>{{ $item->created_at }}</td>
          <td>
            {{ $item->items->count() }}
          </td>
          <td class="is-narrow">
          {{-- Edit and delete button --}}
            <a class="button is-link" href="{{ route('user.transaction.detail', ['id'=>$item->id]) }}">
              <span class="icon">
                <i class="fas fa-eye"></i>
              </span>
              <span>Details</span>
            </a>
          </td>
        </tr>
        @endforeach
    </table>
  </div>
</div>

@endsection