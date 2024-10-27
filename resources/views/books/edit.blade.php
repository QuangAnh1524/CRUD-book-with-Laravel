@extends('layouts.app')
@section('content')
    <h3>Update book information</h3>
    <form action="/books/{{ $book->id }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Name</label>
            <input type="text" class="form-control" id="formGroupExampleInput"
                   value="{{$book->name}}"
                   name="name" placeholder="Name of book">
        </div>
        <label for="formGroupExampleInput" class="form-label">Price</label>
        <div class="input-group mb-3">
            <span class="input-group-text">VNĐ</span>
            <span class="input-group-text">0.00</span>
            <input type="text" class="form-control" name="price"
                   value="{{$book->price}}"
                   aria-label="Dollar amount (with dot and two decimal places)">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Description</label>
            <input type="text" class="form-control" id="formGroupExampleInput2"
                   value="{{$book->description}}"
                   name="description" placeholder="Description of book">
        </div>

        <!-- Thêm phần hiển thị ảnh hiện tại -->
        <div class="mb-3">
            <label class="form-label">Current Image</label>
            @if($book->image_path)
                <div>
                    <img src="{{ asset('images/'.$book->image_path) }}"
                         alt="Current image"
                         style="max-width: 200px; height: auto;">
                </div>
            @else
                <p>No image uploaded</p>
            @endif
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Update Book Image</label>
            <input type="file" class="form-control" id="image"
                   name="image_path" accept="image/*">
        </div>

        <button type="submit" class="btn btn-warning">Update</button>
        <a href="{{ url('/books') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
