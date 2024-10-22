@extends('layouts.app')
@section('content')
    <h3>Update book information</h3>
    <form action="/books/{{ $book->id }}" method="post">
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
        <button type="submit" class="btn btn-warning">Update</button>
        <a href="{{ url('/books') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
