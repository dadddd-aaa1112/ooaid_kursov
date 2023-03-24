<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DFSController extends Controller
{
    //Код алгоритма обхода в глубину для графа
    public function getDFS(Request $request)
    {
        $graph = array(
            'A' => array($request->A1, $request->A2, $request->A3),
            'B' => array($request->B1),
            'C' => array($request->C1),
            'D' => array($request->D1),
            'E' => array(),
            'F' => array(),
            'G' => array()
        );

        $stack = array($request->start); // Создаем стек и помещаем в него стартовую вершину
        $visited = array(); // Создаем массив для посещенных вершин

        while (!empty($stack)) { // Пока стек не пуст
            $vertex = array_pop($stack); // Извлекаем вершину из стека

            if (!in_array($vertex, $visited)) { // Если вершина еще не посещена
                $visited[] = $vertex; // Добавляем ее в список посещенных

                foreach ($graph[$vertex] as $neighbor) { // Обходим всех соседей текущей вершины
                    if (!in_array($neighbor, $visited)) { // Если сосед еще не посещен
                        array_push($stack, $neighbor); // Добавляем его в стек
                    }
                }
            }
        }

        return view('bfs.result', [
            'result' => $visited,     // Возвращаем список посещенных вершин
            'title' => 'Результат для Алгоритма обхода в глубину (Depth First Search)',
        ]);
    }

    public function index()
    {
        return view('dfs.index', [
            'title' => 'Алгоритм обхода в глубину (Depth First Search)'
        ]);
    }
}
