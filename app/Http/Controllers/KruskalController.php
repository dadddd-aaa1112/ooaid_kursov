<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KruskalController extends Controller
{
//Алгоритм поиска минимального остовного дерева (Kruskals algorithm):
    function getKruskal($graph)
    {
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
            $root1 = find($u, $vertices);
            $root2 = find($v, $vertices);
            if ($root1 != $root2) {
                $mst[] = array('u' => $u, 'v' => $v, 'w' => $w);
                $vertices[$root1] = $root2;
            }
        }
        return $mst;
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
