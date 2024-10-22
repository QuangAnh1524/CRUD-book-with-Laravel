@extends('layouts.app')

@section('content')
    <h1>This is about Page</h1>
    {{
    $x = 11
}}
    @if($x<2)
        <h3>x is greater than 2</h3>
    @elseif($x < 10)
        <h3>x is less than 10</h3>
        @else
        <h3>all condition is not match</h3>
    @endif
    {{--unless = if not--}}
    {{-- @unless(empty($name))
        <h3>Name is not empty</h3>
    @endunless
    @if(!empty($name))
        <h3>Name is not empty haha</h3>
    @endif--}}

    @empty(!$name)
        <h3>ok</h3>
    @endempty

    @switch($name)
        @case('quang anh')
        <h3>ten la quang anh</h3>
        @break
        @default
        <h3>no one selected</h3>
    @endswitch

    @for($i=0; $i < 20; $i++)
        {{$i}}
    @endfor
@endsection
