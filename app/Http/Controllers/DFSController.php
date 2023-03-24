<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DFSController extends Controller
{
    //Код алгоритма обхода в глубину для графа
    public function getDFS($graph, $start)
    {
        $visited = array();
        foreach ($graph as $node => $neighbors) {
            $visited[$node] = false;
        }

        $visited[$start] = true;
        echo $start . " ";
        foreach ($graph[$start] as $node) {
            if (!$visited[$node]) {
                getDFS($graph, $node, $visited);
            }
        }
    }

    public function index() {
        return view('dfs.index', [
        'title' => 'dfs'
        ]);
    }
}
