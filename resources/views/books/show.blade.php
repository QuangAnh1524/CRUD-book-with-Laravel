@extends('layouts.app')

@section('content')

    <div class="container mt-3">
        <h2>DETAILS OF "{{$book->name}}"</h2>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
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
                    <td>{{ $book->name }}</td>
                    <td>{{ $book->price }}</td>
                    <td>{{ $book->description }}</td>
                    <td>{{$book->category_id}}</td>
                    <td>{{$book->category->name}}</td>
                    <td><a href="{{ url('books/'.$book->id) }}" class="btn btn-outline-success" style="font-weight: bold;">View</a></td>
                    <td><a href="{{ url('books/'.$book->id.'/edit') }}" class="btn btn-outline-warning" style="font-weight: bold;">Update</a></td>
                    <td><a href="{{ url('books/'.$book->id.'/confirm-delete') }}" class="btn btn-outline-danger">Delete</a></td>

                </tr>
                <a href="{{ url('/books') }}" class="btn btn-secondary">Back</a>
            </tbody>
        </table>
    </div>

@endsection
