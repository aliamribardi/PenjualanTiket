@extends('dashboard.layouts.app')

@section('content')

<div class="container p-5">
    <div class="row">
        <div class="col-md-8">
            <h2 class="text-center">Detail Ticket</h2>
            
            <a href="/tiket" class="btn btn-primary"><span data-feather="arrow-left"></span> Back to list</a>

            <div class="table-responsive">
            <table class="table table-striped table-sm">
            <thead>
                <tr>
                <th scope="col"></th>
                <th scope="col">Name</th>
                <th scope="col">Organizer</th>
                <th scope="col">Category</th>
                <th scope="col">Location</th>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
                <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td>
                    <img src="{{ asset('storage/' . $tiket->image) }}" class="img-fluid mt-3 d-block">
                </td>
                <td>{{ $tiket->name }}</td>
                <td>{{ $tiket->organizer }}</td>
                <td>{{ $tiket->category->name }}</td>
                <td>{{ $tiket->location }}</td>
                <td>{{ $tiket->date }}</td>
                <td>{{ $tiket->time }}</td>
                <td>{{ $tiket->price }}</td>
                </tr> 
            </tbody>
            </table>
            
        </div>
    </div>
</div>

@endsection
