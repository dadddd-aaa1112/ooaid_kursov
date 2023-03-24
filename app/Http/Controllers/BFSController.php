<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BFSController extends Controller
{
//Алгоритм обхода в ширину (Breadth First Search)
    function getBFS(Request $request)
    {
        $graph = array(
            'A' => array($request->A1, $request->A2),
            'B' => array($request->B1, $request->B2, $request->B3),
            'C' => array($request->C1, $request->C2),
            'D' => array($request->D1),
            'E' => array($request->E1, $request->E2),
            'F' => array($request->F1, $request->F2)
        );

        $visited = array();
        $queue = array($request->start);

        while ($queue) {
            $vertex = array_shift($queue);
            if (!in_array($vertex, $visited)) {

                    $visited[] = $vertex;
                    $neighbors = $graph[$vertex];
                    foreach ($neighbors as $neighbor) {
                        if (!in_array($neighbor, $visited)) {
                            $queue[] = $neighbor;
                        }

                }
            }
        }


        return view('bfs.result', [
            'result' => $visited,
            'title' => 'Результат для Алгоритм обхода в ширину (Breadth First Search)',
        ]);
    }

    public function index()
    {
        return view('bfs.index', [
            'title' => 'Алгоритм обхода в ширину (Breadth First Search)'
        ]);
    }
}
