@extends('dashboard.layouts.app')

@section('content')

<div class="container p-5">
    <div class="row">
        <div class="col-md-8">
            <h2 class="text-center">Edit Ticket</h2>
            <form action="/tiket/{{ $tiket->id }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $tiket->name) }}">
            </div>
            <div class="mb-3">
                <label for="organizer" class="form-label">Organizer</label>
                <input type="text" name="organizer" class="form-control" id="organizer" value="{{ old('organizer', $tiket->organizer) }}">
            </div>

            <div class="mb-3">
                <label for="organizer" class="form-label">Category</label>
                <select class="form-select" name="category_id">
                    <option value="">Select Category</option>
                   @foreach ($categories as $category)
                        @if (old('category_id', $tiket->category->id) == $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>                        
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>                        
                        @endif
                    @endforeach
                </select>
            </div>

                
            <div class="mb-3">
                <label for="location" class="form-label">Location</label>
                <input type="text" name="location" class="form-control" id="location" value="{{ old('location', $tiket->location) }}">
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="hidden" name="oldImage" value="{{ $tiket->image }}">
                <img class="img-preview img-fluid mb-3 col-sm-5">
                <input type="file" name="image" class="form-control" id="image" onchange="previewImage()">
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="text" name="date" class="form-control" id="date" value="{{ old('date', $tiket->date) }}">
            </div>
            <div class="mb-3">
                <label for="time" class="form-label">Time</label>
                <input type="text" name="time" class="form-control" id="time" value="{{ old('time', $tiket->time) }}">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" name="price" class="form-control" id="price" value="{{ old('price', $tiket->price) }}">
            </div>
            <button type="submit" class="btn btn-primary">Add Ticket</button>
            </form>
        </div>
    </div>
</div>

<script>
    function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
</script>
@endsection
