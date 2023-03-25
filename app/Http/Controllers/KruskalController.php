<?php

namespace App\Http\Controllers;

use App\Http\Contracts\GetKruskalInterface;
use Illuminate\Http\Request;

class KruskalController extends Controller implements GetKruskalInterface
{

//Алгоритм поиска минимального остовного дерева (Kruskals algorithm):
    function getKruskal(Request $request)
    {
        $graph = array(
            array($request->A1, $request->A2, $request->A3, $request->A4, $request->A5),
            array($request->B1, $request->B2, $request->B3, $request->B4, $request->B5),
            array($request->C1, $request->C2, $request->C3, $request->C4, $request->C5),
            array($request->D1, $request->D2, $request->D3, $request->D4, $request->D5),
            array($request->E1, $request->E2, $request->E3, $request->E4, $request->E5),
        );

        $n = count($graph); // Количество вершин в графе
        $parent = array(); // Массив для хранения родительских вершин

        // Функция для поиска родительской вершины
        function findParent($i, &$parent) {
            while ($parent[$i] != $i) {
                $i = $parent[$i];
            }
            return $i;
        }

        // Функция для объединения двух поддеревьев
        function union($i, $j, &$parent) {
            $iParent = findParent($i, $parent);
            $jParent = findParent($j, $parent);
            $parent[$iParent] = $jParent;
        }

        // Инициализируем массив родительских вершин
        for ($i = 0; $i < $n; $i++) {
            $parent[$i] = $i;
        }

        // Сортируем все ребра по возрастанию стоимости
        $edges = array();
        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $n; $j++) {
                if ($graph[$i][$j] != 0) {
                    $edges[] = array($i, $j, $graph[$i][$j]);
                }
            }
        }
        usort($edges, function($a, $b) {
            return $a[2] - $b[2];
        });

        // Добавляем ребра, исключая циклы
        $result = array();
        foreach ($edges as $edge) {
            $u = $edge[0];
            $v = $edge[1];
            $w = $edge[2];
            if (findParent($u, $parent) != findParent($v, $parent)) {
                union($u, $v, $parent);
                $result[] = array($u, $v, $w);
            }
        }

        return view('kruskal_graph.result', [
            'result' => $result,
            'title' => 'Результат для алгоритма поиска минимального остовного дерева (алгоритм Крускала)',
        ]);
    }

    public function index()
    {
        return view('kruskal_graph.index', [
            'title' => 'Алгоритм поиска минимального остовного дерева (алгоритм Крускала)'
        ]);
    }
}
