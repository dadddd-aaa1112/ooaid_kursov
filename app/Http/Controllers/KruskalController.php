<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KruskalController extends Controller
{
//Алгоритм поиска минимального остовного дерева (Kruskals algorithm):
    function getKruskal(Request $request)
    {
        $graph = [
            'A' => ['B' => $request->AB, 'C' => $request->AC],
            'B' => ['A' => $request->BA, 'C' => $request->BC, 'D' => $request->BD],
            'C' => ['A' => $request->CA, 'B' => $request->CB, 'D' => $request->CD],
            'D' => ['B' => $request->DB, 'C' => $request->DC]
        ];

        // инициализируем список вершин и ребер
        $vertices = array();
        $edges = array();
        foreach ($graph as $node => $neighbors) {
            $vertices[$node] = $node;
            foreach ($neighbors as $neighbor => $weight) {
                $edges[] = array('u' => $node, 'v' => $neighbor, 'w' => $weight);
            }
        }
        // сортируем ребра по возрастанию веса
        usort($edges, function ($a, $b) {
            return $a['w'] - $b['w'];
        });
        // проходим по отсортированным ребрам и добавляем их в остовное дерево
        $mst = array();
        foreach ($edges as $edge) {
            $u = $edge['u'];
            $v = $edge['v'];
            $w = $edge['w'];
            // проверяем, не образует ли ребро цикл
            $root1 = $this->find($u, $vertices);
            $root2 = $this->find($v, $vertices);
            if ($root1 != $root2) {
                $mst[] = array('u' => $u, 'v' => $v, 'w' => $w);
                $vertices[$root1] = $root2;
            }
        }
      //  dd($mst);
        return view('kruskal_graph.result', [
            'result' => $mst
        ]);
    }

// функция поиска корня дерева
    function find($node, &$vertices)
    {
        while ($vertices[$node] != $node) {
            $node = $vertices[$node];
        }
        return $node;
    }

    public function index() {
        return view('kruskal_graph.index', [
            'title' => 'kruskal'
        ]);
    }
}
