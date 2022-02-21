@extends('dashboard.layouts.app')

@section('content')

<h2>List Tiket</h2>

<a href="/tiket/create" class="btn btn-primary"><span data-feather="plus"></span> Create Ticket</a>

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
              <th scope="col">Name</th>
              <th scope="col">Organizer</th>
              <th scope="col">Category</th>
              <th scope="col">Location</th>
              <th scope="col">Date</th>
              <th scope="col">Time</th>
              <th scope="col">Price</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($tikets as $tiket)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $tiket->name }}</td>
              <td>{{ $tiket->organizer }}</td>
              <td>{{ $tiket->category->name }}</td>
              <td>{{ $tiket->location }}</td>
              <td>{{ $tiket->date }}</td>
              <td>{{ $tiket->time }}</td>
              <td>{{ $tiket->price }}</td>
              <td>
                <a href="/tiket/{{ $tiket->id }}" class="badge bg-info"><span data-feather="eye"></span></a>
                <a href="/tiket/{{ $tiket->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                <form action="/tiket/{{ $tiket->id }}" method="POST" class="d-inline">
                  @method('DELETE')
                  @csrf
                  <button class="badge bg-danger border-0" title="Delete" onclick="return confirm('yakin ingin menghapus {{ $tiket->name }}')"><span data-feather="x-square"></span></button>
                </form>
              </td>
            </tr> 

            @endforeach
          </tbody>
        </table>

        {{ $tikets->links() }}

      </div>



@endsection
