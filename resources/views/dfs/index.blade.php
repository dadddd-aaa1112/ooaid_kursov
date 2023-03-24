@extends('index')
@section('content')

@include('components.headers')
<form action="{{route('dfs.post')}}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="graph" class="form-label">graph_arr</label>
        <input type="text" name="graph" class="form-control" id="graph">

    </div>
    <div class="mb-3">
        <label for="start" class="form-label">start</label>
        <input type="text"  name="start" class="form-control" id="start">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
