@extends('index')
@section('content')

@include('components.headers')
<form action="{{route('dijkstra.post')}}" class="w-25" method="POST">
    @csrf
    <div class="mb-3">
        <label for="source" class="form-label">Старт с вершины</label>
        <input type="text" name="source" class="form-control" id="source">
    </div>

    <h5>Для вершины А</h5>
    <div class="mb-3">
        <label for="АB" class="form-label">B</label>
        <input type="number" name="АB" class="form-control" id="АB">
    </div>
    <div class="mb-3">
        <label for="АC" class="form-label">C</label>
        <input type="number" name="АC" class="form-control" id="АC">
    </div>


    <h5>Для вершины B</h5>
    <div class="mb-3">
        <label for="BA" class="form-label">A</label>
        <input type="number" name="BA" class="form-control" id="BA">
    </div>
    <div class="mb-3">
        <label for="BC" class="form-label">C</label>
        <input type="number" name="BC" class="form-control" id="BC">
    </div>
    <div class="mb-3">
        <label for="BD" class="form-label">D</label>
        <input type="number" name="BD" class="form-control" id="BD">
    </div>

    <h5>Для вершины C</h5>
    <div class="mb-3">
        <label for="CA" class="form-label">A</label>
        <input type="number" name="CA" class="form-control" id="CA">
    </div>
    <div class="mb-3">
        <label for="CB" class="form-label">B</label>
        <input type="number" name="CB" class="form-control" id="CB">
    </div>
    <div class="mb-3">
        <label for="CD" class="form-label">D</label>
        <input type="number" name="CD" class="form-control" id="CD">
    </div>


    <h5>Для вершины D</h5>
    <div class="mb-3">
        <label for="DB" class="form-label">B</label>
        <input type="number" name="DB" class="form-control" id="DB">
    </div>
    <div class="mb-3">
        <label for="DC" class="form-label">C</label>
        <input type="number" name="DC" class="form-control" id="DC">
    </div>



    <button type="submit" class="btn btn-primary">Вычислить</button>
</form>
@endsection
