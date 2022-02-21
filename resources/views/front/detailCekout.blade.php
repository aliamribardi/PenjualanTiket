@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <h2>List Cekout</h2>

            {{-- Pesan --}}
            @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                {{ session('success') }}
            </div>
            @endif

            {{-- Tabel --}}
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name Ticket</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price Benchmark</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cekout as $cek)
                        
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $cek->name }}</td> 
                        <td>{{ $cek->quantity }}</td>
                        <td>{{ $cek->price }}</td>
                        <td>
                            @if ($cek->image)
                                <img src="{{ asset('storage/' . $cek->image) }}" alt="{{ $cek->name }}" class=" mt-3 d-block" style="height: 150px; width: 286px;">
                            @else  
                                <img src="http://www.google.co.in/intl/en_com/images/srpr/logo1w.png" class="card-img-top" alt="{{ $cek->name }}" style="height: 150px; width: 286px;">
                            @endif
                        </td>
                        
                        <td>
                            <a href="#" class="badge bg-info"><span data-feather="eye"></span></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
