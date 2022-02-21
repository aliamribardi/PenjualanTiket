@extends('dashboard.layouts.app')

@section('content')

<div class="container p-5">
    <div class="row">
        <div class="col-md-8">
            <h2 class="text-center">Create Category</h2>
            <div class="table-responsive">
                <form action="/category" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name">
                </div>
                <button type="submit" class="btn btn-primary">Create Category</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
