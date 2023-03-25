@extends('index')
@section('content')

    @include('components.headers')
    <br>
    <br>
    @foreach($result as $key => $val)
        вершина -  {{$val[0]}}
        сосед - {{$val[1]}}
        вес - {{$val[2]}}

        <br>
        <br>
    @endforeach

@endsection
