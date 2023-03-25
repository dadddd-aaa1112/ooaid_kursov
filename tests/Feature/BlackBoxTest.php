<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Tests\TestCase;

class BlackBoxTest extends TestCase
{
    /**
     * Алгоритм обхода в ширину графа
     * @test
     */
    public function test_bfs(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->get('/bfs');
        // Проверяем, что ответ имеет статус 200 OK
        $response->assertStatus(Response::HTTP_OK)
            ->assertViewIs('bfs.index');

        $response = $this->post('/bfs', [
            'start' => 'A',
            'A1' => 'B', 'A2' => 'C',
            'B1' => 'C', 'B2' => 'D', 'B3' => 'E',
            'C1' => 'F', 'C2' => 'A',
            'D1' => 'E',
            'E1' => 'D', 'E2' => 'B',
            'F1' => 'C', 'F2' => 'A',
        ]);

        $response->assertViewIs('bfs.result');
        $response->assertViewHas('result');
        $response->assertViewHas('title');
        $response->viewData('result');


    }

    /**
     * Алгоритм обхода в глубину графа
     * @test
     */
    public function test_dfs(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->get('/dfs');
        $response->assertStatus(Response::HTTP_OK)
            ->assertViewIs('dfs.index');

        $response = $this->post('/dfs', [
            'start' => 'A',
            'A1' => 'B', 'A2' => 'C', 'A3' => 'E',
            'B1' => 'C',
            'C1' => 'F',
            'D1' => 'E',
            'E1' => null,
            'F1' => null,
            'G1' => null,
        ]);

        $response->assertViewIs('dfs.result');
        $response->assertViewHas('result');
        $response->assertViewHas('title');
        $response->viewData('result');

    }

    /**
     * Алгоритм Дейкстры
     * @test
     */
    public function test_dijkstra(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->get('/dijkstra');
        $response->assertStatus(Response::HTTP_OK)
            ->assertViewIs('dijkstra_graph.index');

        $response = $this->post('/dijkstra', [
            'source' => 'A',
            'AB' => 5, 'AC' => 1,
            'BA' => 1, 'BC' => 1, 'BD' => 3,
            'CA' => 6, 'CB' => 3, 'CD' => 4,
            'DB' => 2, 'DC' => 5,
        ]);

        $response->assertViewIs('dijkstra_graph.result');
        $response->assertViewHas('dist');
        $response->assertViewHas('title');
        $response->viewData('prev');

    }

    /**
     * Алгоритм Крускала
     * @test
     */
    public function test_kruskal(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->get('/kruskal');

        $response->assertStatus(Response::HTTP_OK)
            ->assertViewIs('kruskal_graph.index');

//         $response = $this->post('/kruskal', [
//            'A1' => 0, 'A2' => 0, 'A3' => 0, 'A4' => 0, 'A5' => 0,
//            'B1' => 0, 'B2' => 0, 'B3' => 0, 'B4' => 0, 'B5' => 0,
//            'C1' => 0, 'C2' => 0, 'C3' => 0, 'C4' => 0, 'C5' => 0,
//            'D1' => 0, 'D2' => 0, 'D3' => 0, 'D4' => 0, 'D5' => 0,
//            'E1' => 0, 'E2' => 0, 'E3' => 0, 'E4' => 0, 'E5' => 0,
//        ]);
//
//            $response->assertViewIs('kruskal_graph.result');
//        $response->assertViewHas('result');
//           $response->assertViewHas('title');
//           $response->viewData('result');

    }

    /**
     * Алгоритм Прима
     * @test
     */
    public function test_prim(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->get('/prim');
        $response->assertStatus(Response::HTTP_OK)
            ->assertViewIs('prim_graph.index');

        $response = $this->post('/prim', [
            'A1' => 0, 'A2' => 1, 'A3' => 0, 'A4' => 2, 'A5' => 0,
            'B1' => 1, 'B2' => 0, 'B3' => 3, 'B4' => 0, 'B5' => 0,
            'C1' => 0, 'C2' => 3, 'C3' => 0, 'C4' => 0, 'C5' => 4,
            'D1' => 2, 'D2' => 0, 'D3' => 0, 'D4' => 0, 'D5' => 5,
            'E1' => 0, 'E2' => 0, 'E3' => 4, 'E4' => 5, 'E5' => 0,
        ]);
        $response->assertViewIs('prim_graph.result');
        $response->assertViewHas('result');
        $response->assertViewHas('title');
        $response->viewData('result');

    }
}
