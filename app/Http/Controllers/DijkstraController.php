<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DijkstraController extends Controller
{
//Код алгоритма Дейкстры для поиска кратчайшего пути взвешенного графа
    public function getDijkstra(Request $request)
    {
        $graph = [
            'A' => ['B' => $request->AB, 'C' => $request->AC],
            'B' => ['A' => $request->BA, 'C' => $request->BC, 'D' => $request->BD],
            'C' => ['A' => $request->CA, 'B' => $request->CB, 'D' => $request->CD],
            'D' => ['B' => $request->DB, 'C' => $request->DC]
        ];

        $dist = array(); // расстояние от источника до каждой вершины
        $visited = array(); // посещенные вершины
        $prev = array(); // предыдущие вершины на пути от источника
        foreach ($graph as $node => $neighbors) {
            $dist[$node] = INF; // инициализируем расстояние бесконечностью
            $visited[$node] = false;
            $prev[$node] = null;
        }
        $dist[$request->source] = 0; // расстояние от источника до источника равно 0
        for ($i = 0; $i < count($graph); $i++) {
            $u = $this->minDistance($dist, $visited); // выбираем вершину с минимальным расстоянием
            $visited[$u] = true;
            foreach ($graph[$u] as $v => $weight) {
                $alt = $dist[$u] + $weight; // вычисляем новое расстояние
                if ($alt < $dist[$v]) {
                    $dist[$v] = $alt;
                    $prev[$v] = $u;
                }
            }
        }

        //return array('dist' => $dist, 'prev' => $prev);

        return view('dijkstra_graph.result', [
            'dist' => $dist,
            'prev' => $prev,
            'title' => 'Результат для алгоритма Дейкстры (Алгоритм поиска кратчайшего пути)',
        ]);
    }

// функция для выбора вершины с минимальным расстоянием
    public function minDistance($dist, $visited)
    {
        $min = INF;
        $min_node = null;
        foreach ($dist as $node => $distance) {
            if (!$visited[$node] && $distance < $min) {
                $min = $distance;
                $min_node = $node;
            }
        }
        return $min_node;
    }

    public function index() {
        return view('dijkstra_graph.index', [
            'title' => 'Алгоритм Дейкстры (Алгоритм поиска кратчайшего пути )'
        ]);
    }
}
