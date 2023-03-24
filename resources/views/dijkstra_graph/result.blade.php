@extends('index')
@section('content')

    @include('components.headers')
<br>
<br>
dist
@foreach($dist as $key => $val)
{{$key}} - {{$val}}


    <br>
    <br>
@endforeach


$prev
@foreach($prev as $key => $val)
    {{$key}} - {{$val}}


    <br>
    <br>
@endforeach
@endsection
