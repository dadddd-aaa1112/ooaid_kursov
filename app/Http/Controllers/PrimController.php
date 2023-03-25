<?php

namespace App\Http\Controllers;

use App\Http\Traits\GraphTrait;
use Illuminate\Http\Request;

class PrimController extends Controller
{
    use GraphTrait;

    function getPrim(Request $request) {
        $graph = array(
            array($request->A1, $request->A2, $request->A3, $request->A4, $request->A5),
            array($request->B1, $request->B2, $request->B3, $request->B4, $request->B5),
            array($request->C1, $request->C2, $request->C3, $request->C4, $request->C5),
            array($request->D1, $request->D2, $request->D3, $request->D4, $request->D5),
            array($request->E1, $request->E2, $request->E3, $request->E4, $request->E5),
        );

        $result = $this->prim($graph);

        return view('prim_graph.result', [
            'result' => $result,
            'title' => 'Результат для алгоритма поиска минимального остовного дерева (алгоритм Прима)',
        ]);
    }

    public function index()
    {
        return view('kruskal_graph.index', [
            'title' => 'Алгоритм поиска минимального остовного дерева (алгоритм Прима)'
        ]);
    }
}
