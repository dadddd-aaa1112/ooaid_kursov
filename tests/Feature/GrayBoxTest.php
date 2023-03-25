<?php

namespace Tests\Feature;

use App\Http\Controllers\BFSController;
use App\Http\Controllers\DFSController;
use App\Http\Controllers\DijkstraController;
use App\Http\Controllers\KruskalController;
use App\Http\Controllers\PrimController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Tests\TestCase;

class GrayBoxTest extends TestCase
{
    private $controllerKruscal;
    private $controllerPrim;
    private $controllerBFS;
    private $controllerDFS;
    private $controllerDijkstra;

    public function setUp(): void
    {
        parent::setUp();
        $this->controllerKruscal = app(KruskalController::class);
        $this->controllerPrim = app(PrimController::class);
        $this->controllerBFS = app(BFSController::class);
        $this->controllerDFS = app(DFSController::class);
        $this->controllerDijkstra = app(DijkstraController::class);
    }


    /**
     * Алгоритм обхода в ширину графа
     * @test
     */
    public function test_bfs(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->get('/bfs');

        // Проверяем, что ответ имеет статус 200 OK
        $response->assertStatus(200);

        // Создаем фейковый Request
        $request = new Request([
            'start' => 'A',
            'A1' => 'B', 'A2' => 'C',
            'B1' => 'C', 'B2' => 'D', 'B3' => 'E',
            'C1' => 'F', 'C2' => 'A',
            'D1' => 'E',
            'E1' => 'D', 'E2' => 'B',
            'F1' => 'C', 'F2' => 'A',
        ]);

        // Вызываем метод getBFS()
        $result = $this->controllerBFS->getBFS($request);

        // Проверяем, что возвращается view с нужными параметрами
        $this->assertEquals('bfs.result', $result->getName());
        $this->assertArrayHasKey('result', $result->getData());
        $this->assertArrayHasKey('title', $result->getData());
        $this->assertEquals('Результат для Алгоритм обхода в ширину (Breadth First Search)', $result->getData()['title']);

    }

    /**
     * Алгоритм обхода в глубину графа
     * @test
     */
    public function test_dfs(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->get('/dfs');

        $response->assertStatus(200);

        // Создаем фейковый Request
        $request = new Request([
            'start' => 'A',
            'A1' => 'B', 'A2' => 'C', 'A3' => 'E',
            'B1' => 'C',
            'C1' => 'F',
            'D1' => 'E',
            'E1' => null,
            'F1' => null,
            'G1' => null,
        ]);

        // Вызываем метод getDFS()
        $result = $this->controllerDFS->getDFS($request);

        // Проверяем, что возвращается view с нужными параметрами
        $this->assertEquals('bfs.result', $result->getName());
        $this->assertArrayHasKey('result', $result->getData());
        $this->assertArrayHasKey('title', $result->getData());
        $this->assertEquals('Результат для Алгоритма обхода в глубину (Depth First Search)', $result->getData()['title']);

    }

    /**
     * Алгоритм Дейкстры
     * @test
     */
    public function test_dijkstra(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->get('/dijkstra');
        $response->assertStatus(200);

//        $graph = [
//            'A' => ['B' => $request->AB, 'C' => $request->AC],
//            'B' => ['A' => $request->BA, 'C' => $request->BC, 'D' => $request->BD],
//            'C' => ['A' => $request->CA, 'B' => $request->CB, 'D' => $request->CD],
//            'D' => ['B' => $request->DB, 'C' => $request->DC]
//        ];

        // Создаем фейковый Request
        $request = new Request([
            'source' => 'A',
            'AB' => 5, 'AC' => 1,
            'BA' => 1, 'BC' => 1, 'BD' => 3,
            'CA' => 6, 'CB' => 3, 'CD' => 4,
            'DB' => 2, 'DC' => 5,
        ]);

        // Вызываем метод getDijkstra()
        $result = $this->controllerDijkstra->getDijkstra($request);

        // Проверяем, что возвращается view с нужными параметрами
        $this->assertEquals('dijkstra_graph.result', $result->getName());
        $this->assertArrayHasKey('dist', $result->getData());
        $this->assertArrayHasKey('prev', $result->getData());
        $this->assertArrayHasKey('title', $result->getData());
        $this->assertEquals('Результат для алгоритма Дейкстры (Алгоритм поиска кратчайшего пути)', $result->getData()['title']);

    }

    /**
     * Алгоритм Крускала
     * @test
     */
    public function test_kruskal(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->get('/kruskal');
        $response->assertStatus(200);

        // Создаем фейковый Request
        $request = new Request([
            'A1' => 0, 'A2' => 1, 'A3' => 0, 'A4' => 2, 'A5' => 0,
            'B1' => 1, 'B2' => 0, 'B3' => 3, 'B4' => 0, 'B5' => 0,
            'C1' => 0, 'C2' => 3, 'C3' => 0, 'C4' => 0, 'C5' => 4,
            'D1' => 2, 'D2' => 0, 'D3' => 0, 'D4' => 0, 'D5' => 5,
            'E1' => 0, 'E2' => 0, 'E3' => 4, 'E4' => 5, 'E5' => 0,
        ]);

        // Вызываем метод getKruskal()
        $result = $this->controllerKruscal->getKruskal($request);

        // Проверяем, что возвращается view с нужными параметрами
        $this->assertEquals('kruskal_graph.result', $result->getName());
        $this->assertArrayHasKey('result', $result->getData());
        $this->assertArrayHasKey('title', $result->getData());
        $this->assertEquals('Результат для алгоритма поиска минимального остовного дерева (алгоритм Крускала)', $result->getData()['title']);

        // Проверяем результаты
        $expectedResult = [
            [0, 1, 1],
            [0, 3, 2],
            [1, 2, 3],
            [2, 4, 4],
        ];
        $this->assertEquals($expectedResult, $result->getData()['result']);
    }

    /**
     * Алгоритм Прима
     * @test
     */
    public function test_prim(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->get('/prim');

        $response->assertStatus(200);
        // Создаем фейковый Request

        $request = new Request([
            'A1' => 0, 'A2' => 1, 'A3' => 0, 'A4' => 2, 'A5' => 0,
            'B1' => 1, 'B2' => 0, 'B3' => 3, 'B4' => 0, 'B5' => 0,
            'C1' => 0, 'C2' => 3, 'C3' => 0, 'C4' => 0, 'C5' => 4,
            'D1' => 2, 'D2' => 0, 'D3' => 0, 'D4' => 0, 'D5' => 5,
            'E1' => 0, 'E2' => 0, 'E3' => 4, 'E4' => 5, 'E5' => 0,
        ]);

        // Вызываем метод getPrim()
        $result = $this->controllerPrim->getPrim($request);

        // Проверяем, что возвращается view с нужными параметрами
        $this->assertEquals('prim_graph.result', $result->getName());
        $this->assertArrayHasKey('result', $result->getData());
        $this->assertArrayHasKey('title', $result->getData());
        $this->assertEquals('Результат для алгоритма поиска минимального остовного дерева (алгоритм Прима)', $result->getData()['title']);

    }
}
