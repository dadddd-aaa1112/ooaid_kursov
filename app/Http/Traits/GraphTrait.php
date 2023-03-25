<?php

namespace App\Http\Traits;

trait GraphTrait
{
    /***
     * Вычисляет алгоритм Прима
     * @param $graph
     * @return array
     */
    public function prim(array $graph): array
    {
        $n = count($graph); // Количество вершин в графе
        $visited = array_fill(0, $n, false); // Массив для хранения посещенных вершин
        $key = array_fill(0, $n, PHP_INT_MAX); // Массив для хранения стоимостей ребер
        $parent = array_fill(0, $n, -1); // Массив для хранения родительских вершин
        $key[0] = 0; // Устанавливаем стоимость стартовой вершины в 0

        for ($i = 0; $i < $n - 1; $i++) {
            // Находим вершину с наименьшей стоимостью, которая еще не посещена
            $minKey = PHP_INT_MAX;
            for ($j = 0; $j < $n; $j++) {
                if (!$visited[$j] && $key[$j] < $minKey) {
                    $minKey = $key[$j];
                    $u = $j;
                }
            }

            $visited[$u] = true; // Помечаем вершину как посещенную

            // Обновляем стоимости ребер для соседних вершин
            for ($v = 0; $v < $n; $v++) {
                if ($graph[$u][$v] && !$visited[$v] && $graph[$u][$v] < $key[$v]) {
                    $parent[$v] = $u;
                    $key[$v] = $graph[$u][$v];
                }
            }
        }

        $result = array();
        for ($i = 1; $i < $n; $i++) {
            $result[] = array($parent[$i], $i, $graph[$i][$parent[$i]]);
        }

        return $result;
    }

    /**
     * Вычисляе алгоритм обхода в ширину (Breadth First Search)
     * @param $request
     * @param $graph
     * @return array
     */
    public function BFS($request, $graph)
    {
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
        return $visited;
    }

    /**
     * Вычисляе алгоритма обхода в глубину (Depth First Search)
     * @param $request
     * @param $graph
     * @return array
     */
    public function DFS($request, $graph) {
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

        return $visited;
    }
}
