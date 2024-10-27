@extends('layouts.app')
@section('content')
    <h3>Enter book information</h3>
    <form action="/books" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Name</label>
            <input type="text" class="form-control" id="formGroupExampleInput" name="name" placeholder="Name of book">
        </div>
        <label for="formGroupExampleInput" class="form-label">Price</label>
        <div class="input-group mb-3">
            <span class="input-group-text">VNĐ</span>
            <span class="input-group-text">0.00</span>
            <input type="text" class="form-control" name="price" aria-label="Dollar amount (with dot and two decimal places)">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Description</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" name="description" placeholder="Description of book">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Book Image</label>
            <input type="file" class="form-control" id="image" name="image_path" accept="image/*">
        </div>
        <div>
            <label>Choose a category: </label>
            <select name="category_id">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ url('/books') }}" class="btn btn-secondary">Back</a>
    </form>
    @if($errors->any())
        <div>
            @foreach($errors->all() as $error)
                <p class="text-danger">
                    {{$error}}
                </p>
            @endforeach
        </div>
    @endif
@endsection
