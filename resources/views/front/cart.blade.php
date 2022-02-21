@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col">

      <h1>Cart List</h1>

      {{-- Pesan --}}
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            {{ session('success') }}
        </div>
        @endif

      <table style="background-color: powderblue">
        <thead>
          <tr>
            <th class="col-md-4"></th>
            <th class="col-md-3">NAME</th>
            <th class="col-md-3">QUANTITY</th>
            <th class="col-md-2">PRICE</th>
            <th class="col-md-3">REMOVE</th>
          </tr>  
        </thead>
        <tbody>
          @foreach ($tikets as $tiket)
          <tr>
            <td>
              @if ($tiket->attributes->image)
                  <img src="{{ asset('storage/' . $tiket->attributes->image) }}" alt="{{ $tiket->name }}" class=" mt-3 d-block p-3" style="height: 150px; width: 286px;">
              @else  
                  <img src="http://www.google.co.in/intl/en_com/images/srpr/logo1w.png" class="card-img-top p-3" alt="{{ $tiket->name }}" style="height: 150px; width: 286px;">
              @endif
            </td>
            <td>
              {{ $tiket->name }}
            </td>
            <td>
              <form action="{{ route('Update') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $tiket->id}}" >
                <input type="number" name="quantity" value="{{ $tiket->quantity }}" 
                class="p-1"/>
                <button type="submit" class="btn-primary">update</button>
              </form>
            </td>
            <td>${{ $tiket->price }}</td>
            <td class="text-center">
              <form action="{{ route('Remove') }}" method="POST">
                  @csrf
                  <input type="hidden" value="{{ $tiket->id }}" name="id">
                  <button class="btn-danger p-2"><span data-feather="x-square"></span></button>
              </form>
            </td>
          </tr>
          @endforeach
          <tr>
            <td>Total : ${{ Cart::getTotal(); }}</td>
          </tr>
        </tbody>
        
      </table>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <form action="{{ route('Clear') }}" method="POST">
        @csrf
        <button class="btn-danger p-2 col-md-5"><span data-feather="x-square"></span> Remove All Cart</button>
      </form>
    </div>
    <div class="col-md-6">
      <form action="{{ route('cart.db') }}" method="POST">
        @csrf
        <button class="btn-danger p-2 col-md-5 float-end" style="margin-left: 48.666667%;"><span data-feather="shopping-cart"></span> Buy All</button>
      </form>
    </div>
  </div>
</div>
    
@endsection