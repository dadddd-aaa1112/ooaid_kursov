@extends('index')
@section('content')

    @include('components.headers')
    <br>
    <br>
    @foreach($result as $val)
        {{$val}}

    @endforeach

@endsection

