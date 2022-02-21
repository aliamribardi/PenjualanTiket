@extends('dashboard.layouts.app')

@section('content')

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
              <th scope="col">Date</th>
              <th scope="col">Time</th>
              <th scope="col">Price</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>nama</td>
              <td>tanggal</td>
              <td>waktu</td>
              <td>harga</td>
              <td>
                <a href="#" class="badge bg-info"><span data-feather="eye"></span></a>
                <a href="#" class="badge bg-danger"><span data-feather="x-square"></span></a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>


@endsection
