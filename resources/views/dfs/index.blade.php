@extends('index')
@section('content')

    @include('components.headers')
    <form action="{{route('dfs.post')}}" class="w-25" method="POST">
        @csrf
        <div class="mb-3">
            <label for="start" class="form-label">Старт с вершины</label>
            <input type="text" name="start" class="form-control" id="start">
        </div>

        <h5>Для вершины А</h5>
        <div class="mb-3">
            <label for="A1" class="form-label">1</label>
            <input type="text" name="A1" class="form-control" id="A1">
        </div>
        <div class="mb-3">
            <label for="A2" class="form-label">2</label>
            <input type="text" name="A2" class="form-control" id="A2">
        </div>
        <div class="mb-3">
            <label for="A3" class="form-label">3</label>
            <input type="text" name="A3" class="form-control" id="A3">
        </div>


        <h5>Для вершины B</h5>
        <div class="mb-3">
            <label for="B1" class="form-label">1</label>
            <input type="text" name="B1" class="form-control" id="B1">
        </div>

        <h5>Для вершины C</h5>
        <div class="mb-3">
            <label for="C1" class="form-label">1</label>
            <input type="text" name="C1" class="form-control" id="C1">
        </div>


        <h5>Для вершины D</h5>
        <div class="mb-3">
            <label for="D1" class="form-label">1</label>
            <input type="text" name="D1" class="form-control" id="D1">
        </div>

        <h5>Для вершины E</h5>
        <div class="mb-3">
            <label for="E1" class="form-label">1</label>
            <input type="text" name="E1" class="form-control" id="E1">
        </div>

        <h5>Для вершины F</h5>
        <div class="mb-3">
            <label for="F1" class="form-label">1</label>
            <input type="text" name="F1" class="form-control" id="F1">
        </div>

        <h5>Для вершины G</h5>
        <div class="mb-3">
            <label for="G1" class="form-label">1</label>
            <input type="text" name="G1" class="form-control" id="G1">
        </div>


        <button type="submit" class="btn btn-primary">Вычислить</button>
    </form>
@endsection


