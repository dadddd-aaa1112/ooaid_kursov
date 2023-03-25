<?php

namespace Tests\Feature;

use App\Http\Controllers\KruskalController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Tests\TestCase;

class WhiteBoxTest extends TestCase
{
    private $controllerKruscal;

    public function setUp(): void
    {
        parent::setUp();
        $this->controllerKruscal = app(KruskalController::class);
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
    }
}
