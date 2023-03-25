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
use Illuminate\Http\Response;
use Tests\TestCase;

class WhiteBoxTest extends TestCase
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
        $response->assertStatus(Response::HTTP_OK);

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
        $this->assertEquals($result->title,'Результат для Алгоритм обхода в ширину (Breadth First Search)');
        $this->assertEquals($result->result, ['A', 'B', 'C', 'D', 'E', 'F']);
    }

    /**
     * Алгоритм обхода в глубину графа
     * @test
     */
    public function test_dfs(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->get('/dfs');
        $response->assertStatus(Response::HTTP_OK);

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
        $this->assertEquals($result->title,'Результат для Алгоритма обхода в глубину (Depth First Search)');
        $this->assertEquals($result->result, ['A', 'E', 'C', 'F', 'B']);
    }

    /**
     * Алгоритм Дейкстры
     * @test
     */
    public function test_dijkstra(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->get('/dijkstra');
        $response->assertStatus(Response::HTTP_OK);

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
        $this->assertEquals($result->title,
            'Результат для алгоритма Дейкстры (Алгоритм поиска кратчайшего пути)');
    }

    /**
     * Алгоритм Крускала
     * @test
     */
    public function test_kruskal(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->get('/kruskal');

        $response->assertStatus(Response::HTTP_OK);

//        $request = new Request([
//            'A1' => 0, 'A2' => 1, 'A3' => 2, 'A4' => 3, 'A5' => 4,
//            'B1' => 1, 'B2' => 0, 'B3' => 3, 'B4' => 2, 'B5' => 4,
//            'C1' => 2, 'C2' => 3, 'C3' => 0, 'C4' => 1, 'C5' => 5,
//            'D1' => 3, 'D2' => 2, 'D3' => 1, 'D4' => 0, 'D5' => 3,
//            'E1' => 4, 'E2' => 4, 'E3' => 5, 'E4' => 3, 'E5' => 0,
//        ]);
//
//        // Вызываем метод getKruskal()
//        $result = $this->controllerKruscal->getKruskal($request);
//        $this->assertEquals($result->title,
//            'Результат для алгоритма поиска минимального остовного дерева (алгоритм Крускала)');
//        $this->assertEquals(count($result->result), 4);
    }

    /**
     * Алгоритм Прима
     * @test
     */
    public function test_prim(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->get('/prim');
        $response->assertStatus(Response::HTTP_OK);

        $request = new Request([
            'A1' => 0, 'A2' => 1, 'A3' => 0, 'A4' => 2, 'A5' => 0,
            'B1' => 1, 'B2' => 0, 'B3' => 3, 'B4' => 0, 'B5' => 0,
            'C1' => 0, 'C2' => 3, 'C3' => 0, 'C4' => 0, 'C5' => 4,
            'D1' => 2, 'D2' => 0, 'D3' => 0, 'D4' => 0, 'D5' => 5,
            'E1' => 0, 'E2' => 0, 'E3' => 4, 'E4' => 5, 'E5' => 0,
        ]);


        // Вызываем метод getPrim()
        $result = $this->controllerPrim->getPrim($request);
        $this->assertEquals($result->title,
            'Результат для алгоритма поиска минимального остовного дерева (алгоритм Прима)');
        $this->assertEquals(count($result->result), 4);
    }
}
