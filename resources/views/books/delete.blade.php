@extends('layouts.app')
@section('content')
<h3>Are you sure you want to delete "{{$book->name}}"?</h3>
<form action="{{ url('books/'.$book->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Confirm Delete</button>
    <a href="{{ url('/books') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
