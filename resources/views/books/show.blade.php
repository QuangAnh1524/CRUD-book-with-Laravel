@extends('layouts.app')

@section('content')

    <div class="container mt-3">
        <h2>DETAILS OF "{{$book->name}}"</h2>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>IMAGE</th>  <!-- Thêm cột IMAGE -->
                <th>NAME</th>
                <th>PRICE</th>
                <th>DESCRIPTION</th>
                <th>CATEGORY_ID</th>
                <th>CATEGORY NAME</th>
                <th>ACTION</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{ $book->id }}</td>
                <td>
                    @if($book->image_path)
                        <img src="{{ asset('images/'.$book->image_path) }}"
                             alt="{{ $book->name }}"
                             style="max-width: 100px; height: auto;">
                    @else
                        No Image
                    @endif
                </td>
                <td>{{ $book->name }}</td>
                <td>{{ $book->price }}</td>
                <td>{{ $book->description }}</td>
                <td>{{$book->category_id}}</td>
                <td>{{$book->category->name}}</td>
                <td>
                    <a href="{{ url('books/'.$book->id) }}" class="btn btn-outline-success" style="font-weight: bold;">View</a>
                    <a href="{{ url('books/'.$book->id.'/edit') }}" class="btn btn-outline-warning" style="font-weight: bold;">Update</a>
                    <a href="{{ url('books/'.$book->id.'/confirm-delete') }}" class="btn btn-outline-danger">Delete</a>
                </td>
            </tr>
            </tbody>
        </table>
        <a href="{{ url('/books') }}" class="btn btn-secondary">Back</a>
    </div>

@endsection
