<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DFSController extends Controller
{
    //Код алгоритма обхода в глубину для графа
    public function getDFS(Request $request)
    {
        dd($request);
        $visited = array();
        foreach ($request->graph as $node => $neighbors) {
            $visited[$node] = false;
        }

        $visited[$request->start] = true;

        $result = array();
        array_push($result, $request->start);
        //echo $start . " ";
        foreach ($request->graph[$request->start] as $node) {
            if (!$visited[$node]) {
                getDFS($request->graph, $node, $visited);
            }
        }
        return redirect()->route('', [
           'result' => $result
        ]) ;
    }

    public function index() {
        return view('dfs.index', [
        'title' => 'dfs'
        ]);
    }
}
