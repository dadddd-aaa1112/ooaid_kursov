@extends('index')
@section('content')

    @include('components.headers')
    <br>
    <br>
    <h5>Расстояние от источника до каждой вершины </h5>
    @foreach($dist as $key => $val)
        {{$key}} - {{$val}}
        <br>
        <br>
    @endforeach


    <h5>Предыдущие вершины на пути от источника</h5>
    @foreach($prev as $key => $val)
        {{$key}} - {{$val}}


        <br>
        <br>
    @endforeach
@endsection
