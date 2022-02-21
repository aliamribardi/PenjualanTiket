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
                <div class="col-md-6">
                <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cekouts as $cek)
                        
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $cek->total }}</td>
                        <td>
                            <a href="{{ Route('detailCekout', $cek->id) }}" class="badge bg-info"><span data-feather="eye"></span></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table></div>
            </div>
        </div>
    </div>
</div>

@endsection
