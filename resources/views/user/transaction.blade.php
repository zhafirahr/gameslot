@extends('layouts.app')

@section('content')

@foreach ($transactions as $transaction)

<div class="bg-white p-5 rounded-lg shadow-md max-w-screen-lg w-full my-5 flex flex-col gap-3 self-center" >
  <p class="font-semibold">
    <span>Transaction ID :</span>
    <span>{{$transaction->id}}</span>
  </p>
  <p>
    <span>Transaction date :</span>
    <span>{{$transaction->created_at}}</span>
  </p>
  <p>
    <span>Method :</span>
    <span>{{ucfirst($transaction->payment_method)}}</span>
  </p>
  <p>
    <span>Card Number :</span>
    <span>{{$transaction->card_number}}</span>
  </p>
  @if(request()->user()->admin)
  <p>
    <span>User's Name :</span>
    <span>{{$transaction->user->name}}</span>
  </p>
  @endif
  @php
  $total = 0;
  @endphp
  <div class="border rounded-xl border-gray-800">
    <table class="transaction-table">
      <thead>
        <tr>
          <th>Furniture's Name</th>
          <th>Furniture's Price</th>
          <th>Quantity</th>
          <th>Total Price</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($transaction->items as $item)
        <tr>
          <td>{{$item->name}}</td>
          <td>Rp. {{$item->price}}</td>
          <td>{{$item->quantity}}</td>
          @php
            $subtotal = $item->price * $item->quantity;
            $total += $subtotal;
          @endphp
          <td>Rp. {{$subtotal}}</td>
        </tr>
        @endforeach
      </tbody>
      <tfoot>
        <tr>
          <td colspan="3">Total</td>
          <td>Rp. {{$total}}</td>
        </tr>
      </tfoot>
    </table>
  </div>
</div>
@endforeach
@endsection
