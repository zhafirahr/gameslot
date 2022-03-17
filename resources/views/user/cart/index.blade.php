@extends('layouts.app')

@section('content')

<div class="bg-white p-5 rounded-lg shadow-md max-w-screen-lg w-full my-5 self-center" >
  <h1 class="text-4xl font-thin text-center mb-5">Cart</h1>
  {{-- Error message --}}
  @if ($errors->any())
    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-5" role="alert">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  {{-- Success message --}}
  @if (session('success'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-5" role="alert">
      <p class="font-bold">Success</p>
      <p>{{ session('success') }}</p>
    </div>
  @endif
  <div class="border rounded-xl border-gray-800">
    <table class="w-full">
      <tbody>
        {{-- Loop through cart items --}}
        @foreach ($cart_items as $cart_item)
        <tr>
          <td class="p-5">
            <a href="{{ route('viewfurniture', $cart_item['id']) }}">
              <img class="rounded-lg w-64 h-64 object-cover" src="images/{{$cart_item['image']}}">
            </a>
          </td>
          <td>{{$cart_item['name']}}</td>
          <td>Rp. {{$cart_item['price']}}</td>
          <td>{{$cart_item['quantity']}}</td>
          <td>Rp. {{$cart_item['price'] * $cart_item['quantity']}}</td>
          <td>
            <div class="flex gap-5">
              <a href="{{ route('decreasequantity', $cart_item['id']) }}" class="bg-red-500 p-5 px-5 py-2 rounded-lg">-</a>
            <a href="{{ route('increasequantity', $cart_item['id'] ) }}" class="bg-green-500 p-5 px-5 py-2 rounded-lg">+</a>
            </div>
          </td>
        @endforeach
      </tbody>
    </table>
  </div>
  <h6 class="text-xl font-thin text-center my-5">Total : Rp.
    {{-- Get sum of product totals --}}
    @php
    $total = 0;
    @endphp
    @foreach ($cart_items as $cart_item)
    @php
    $total += $cart_item['price'] * $cart_item['quantity'];
    @endphp
    @endforeach
    {{$total}}
  </h6>
  <div class="flex justify-center">
    <a href="{{ route('checkout') }}" class="bg-blue-500 p-5 px-5 py-2 rounded-lg">Proceed to Checkout</a>
  </div>
</div>
@endsection
