<?php

namespace App\Http\Controllers;

use App\Http\Contracts\GetDFSInterface;
use App\Http\Traits\GraphTrait;
use Illuminate\Http\Request;

class DFSController extends Controller implements GetDFSInterface
{
    use GraphTrait;

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

        $visited = $this->DFS($request, $graph);

        return view('dfs.result', [
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
