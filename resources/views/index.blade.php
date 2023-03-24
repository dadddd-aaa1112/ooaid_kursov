<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    <title>Graph</title>
</head>
<body>
<div class="container">
    <div class="d-flex flex-row">
        <div class="d-flex flex-column pt-5 w-25">
            <a href="{{route('bfs.index')}}" type="submit" class="btn btn-info btn-lg mb-4">
                Алгоритм обхода в ширину (Breadth First Search)
            </a>
            <a href="{{route('dfs.index')}}" type="submit" class="btn btn-secondary btn-lg mb-4">
                Алгоритм обхода в глубину (Depth First Search)
            </a>
            <a href="{{route('dijkstra.index')}}" type="submit" class="btn btn-success btn-lg mb-4">
                Алгоритм Дейкстры (Алгоритм поиска кратчайшего пути
            </a>
            <a href="{{route('kruskal.index')}}" type="submit" class="btn btn-dark btn-lg mb-4">
                Результат для алгоритма поиска минимального остовного дерева (алгоритм Крускала)
            </a>
        </div>

        <div class="d-flex flex-column w-75 ps-5">
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>
