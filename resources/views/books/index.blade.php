@extends('layouts.app')

@section('content')

    <div class="container mt-3">
        <h2>BOOKS</h2>
        <a href="{{ url('books/create') }}" class="btn btn-primary">Create a new book</a>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>PRICE</th>
                <th>DESCRIPTION</th>
                <th>ACTION</th>
            </tr>
            </thead>
            <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->name }}</td>
                    <td>{{ $book->price }}</td>
                    <td>{{ $book->description }}</td>
                    <td><a href="{{ url('books/'.$book->id) }}" class="btn btn-outline-success" style="font-weight: bold;">View</a></td>
                    <td><a href="{{ url('books/'.$book->id.'/edit') }}" class="btn btn-outline-warning" style="font-weight: bold;">Update</a></td>
                    <td><a href="{{ url('books/'.$book->id.'/confirm-delete') }}" class="btn btn-outline-danger">Delete</a></td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
