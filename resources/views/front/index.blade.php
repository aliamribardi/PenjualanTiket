@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <h1 class="text-center p-5">List Product</h1>

        {{-- Pesan --}}
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            {{ session('success') }}
        </div>
        @endif
        
        @foreach ($tikets as $tiket)
        <div class="col-md-4 mb-3">
            <div class="card" style="width: 18rem;">
             @if ($tiket->image)
                <img src="{{ asset('storage/' . $tiket->image) }}" alt="{{ $tiket->category->name }}" class=" mt-3 d-block" style="height: 150px; width: 286px;">
            @else  
                <img src="http://www.google.co.in/intl/en_com/images/srpr/logo1w.png" class="card-img-top" alt="{{ $tiket->category->name }}" style="height: 150px; width: 286px;">
            @endif
            <div class="card-body">
                <h5 class="card-title">{{ $tiket->name }}</h5>
                <form action="{{ route('Store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{ $tiket->id }}" name="id">
                    <input type="hidden" value="{{ $tiket->name }}" name="name">
                    <input type="hidden" value="{{ $tiket->price }}" name="price">
                    <input type="hidden" value="{{ $tiket->image ?? 'http://www.google.co.in/intl/en_com/images/srpr/logo1w.png' }}"  name="image">
                    <input type="hidden" value="1" name="quantity">
                    <button class="btn btn-primary">Cart</button>
                </form>
            </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
    
@endsection