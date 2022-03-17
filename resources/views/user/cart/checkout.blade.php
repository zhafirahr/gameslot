@extends('layouts.app')

@section('content')

<div class="bg-white p-5 rounded-lg shadow-md max-w-screen-lg w-full my-5 flex flex-col self-center" >
  <h1 class="text-4xl font-thin text-center mb-5">Checkout</h1>

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
          <td>{{$cart_item['price']}}</td>
          <td>{{$cart_item['quantity']}}</td>
          <td>{{$cart_item['price'] * $cart_item['quantity']}}</td>
        @endforeach
      </tbody>
    </table>
  </div>
  <h6 class="text-xl font-thin text-center my-5">Total :
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
  {{-- Form with payment method and card number fields --}}
  <form action="{{route('checkout')}}" class="max-w-md self-center text-center flex flex-col gap-5" method="POST">
    @csrf
    <div class="flex flex-row align-middle items-center  gap-5">
        <label class="text-lg font-semibold" for="name">Payment method</label>

        <label>
            <input type="radio" name="payment_method" value="debit" {{ old('payment_method') == "debit" ? 'checked' : '' }} required /> Debit
        </label>
        <label>
            <input type="radio" name="payment_method" value="credit" {{ old('payment_method') == "credit" ? 'checked' : '' }} required /> Credit
        </label>

    </div>
    <div class="flex flex-col gap-5">
        <div class="flex-gap-5">
          <label class="text-lg font-semibold whitespace-nowrap" for="card_number">Card Number</label>
          <input class="w-full p-2 border border-gray-100 rounded-md @error('card_number') border-red-500 @enderror" type="text" name="card_number" id="card_number" value="{{ old('card_number') }}" required />
        </div>
        @error('card_number')
        <span class="text-red-500" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <button type="submit" class="bg-blue-500 p-5 px-5 py-2 rounded-lg">Checkout</button>
  </form>
</div>
@endsection
