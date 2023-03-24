<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BFSController extends Controller
{
//Алгоритм обхода в ширину (Breadth First Search)
    function getBFS($graph, $start)
    {
        $queue = array();
        $visited = array();
        array_push($queue, $start);
        $visited[$start] = true;

        while (!empty($queue)) {
            $node = array_shift($queue);
            echo $node . " ";

            foreach ($graph[$node] as $neighbor) {
                if (!$visited[$neighbor]) {
                    array_push($queue, $neighbor);
                    $visited[$neighbor] = true;
                }
            }
        }
    }

    public function index() {
        return view('bfs.index', [
            'title' => 'bfs'
        ]);
    }
}
