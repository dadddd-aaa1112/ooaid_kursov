@extends('index')
@section('content')

    @include('components.headers')
    <form action="{{route('prim.post')}}" class="w-25" method="POST">
        @csrf
        <h5>Для вершины А</h5>
        <div class="mb-3">
            <label for="A1" class="form-label">1</label>
            <input type="number" name="A1" class="form-control" id="A1">
        </div>
        <div class="mb-3">
            <label for="A2" class="form-label">2</label>
            <input type="number" name="A2" class="form-control" id="A2">
        </div>
        <div class="mb-3">
            <label for="A3" class="form-label">3</label>
            <input type="number" name="A3" class="form-control" id="A3">
        </div>
        <div class="mb-3">
            <label for="A4" class="form-label">4</label>
            <input type="number" name="A4" class="form-control" id="A4">
        </div>
        <div class="mb-3">
            <label for="A5" class="form-label">5</label>
            <input type="number" name="A5" class="form-control" id="A5">
        </div>


        <h5>Для вершины B</h5>
        <div class="mb-3">
            <label for="B1" class="form-label">1</label>
            <input type="number" name="B1" class="form-control" id="B1">
        </div>
        <div class="mb-3">
            <label for="B2" class="form-label">2</label>
            <input type="number" name="B2" class="form-control" id="B2">
        </div>
        <div class="mb-3">
            <label for="B3" class="form-label">3</label>
            <input type="number" name="B3" class="form-control" id="B3">
        </div>
        <div class="mb-3">
            <label for="B4" class="form-label">4</label>
            <input type="number" name="B4" class="form-control" id="B4">
        </div>
        <div class="mb-3">
            <label for="B5" class="form-label">5</label>
            <input type="number" name="B5" class="form-control" id="B5">
        </div>

        <h5>Для вершины C</h5>
        <div class="mb-3">
            <label for="C1" class="form-label">1</label>
            <input type="number" name="C1" class="form-control" id="C1">
        </div>
        <div class="mb-3">
            <label for="C2" class="form-label">2</label>
            <input type="number" name="C2" class="form-control" id="C2">
        </div>
        <div class="mb-3">
            <label for="C3" class="form-label">3</label>
            <input type="number" name="C3" class="form-control" id="C3">
        </div>
        <div class="mb-3">
            <label for="C4" class="form-label">4</label>
            <input type="number" name="C4" class="form-control" id="C4">
        </div>
        <div class="mb-3">
            <label for="C5" class="form-label">5</label>
            <input type="number" name="C5" class="form-control" id="C5">
        </div>


        <h5>Для вершины D</h5>
        <div class="mb-3">
            <label for="D1" class="form-label">1</label>
            <input type="number" name="D1" class="form-control" id="D1">
        </div>
        <div class="mb-3">
            <label for="D2" class="form-label">2</label>
            <input type="number" name="D2" class="form-control" id="D2">
        </div>
        <div class="mb-3">
            <label for="D3" class="form-label">3</label>
            <input type="number" name="D3" class="form-control" id="D3">
        </div>
        <div class="mb-3">
            <label for="D4" class="form-label">4</label>
            <input type="number" name="D4" class="form-control" id="D4">
        </div>
        <div class="mb-3">
            <label for="D5" class="form-label">5</label>
            <input type="number" name="D5" class="form-control" id="D5">
        </div>


        <button type="submit" class="btn btn-primary">Вычислить</button>
    </form>
@endsection
