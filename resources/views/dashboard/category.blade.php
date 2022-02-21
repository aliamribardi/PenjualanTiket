@extends('dashboard.layouts.app')

@section('content')

<h2>List Category</h2>

<a href="/category/create" class="btn btn-primary"><span data-feather="plus"></span> Create Category</a>

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
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($categories as $category)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $category->name }}</td>
              <td>
                <a href="/category/{{ $category->id }}" class="badge bg-info"><span data-feather="eye"></span></a>
                <form action="/category/{{ $category->id }}" method="POST" class="d-inline">
                  @method('DELETE')
                  @csrf
                  <button class="badge bg-danger border-0" title="Delete" onclick="return confirm('yakin ingin menghapus {{ $category->name }}')"><span data-feather="x-square"></span></button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

@endsection
