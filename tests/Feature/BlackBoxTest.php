<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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
//           $result = $response->viewData('result');
//            $this->assertEquals([], $result);
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
    }
}
