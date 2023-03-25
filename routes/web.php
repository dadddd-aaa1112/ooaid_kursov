<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/bfs', [\App\Http\Controllers\BFSController::class, 'index'])->name('bfs.index');
Route::post('/bfs', [\App\Http\Controllers\BFSController::class, 'getBFS'])->name('bfs.post');

Route::get('/dfs', [\App\Http\Controllers\DFSController::class, 'index'])->name('dfs.index');
Route::post('/dfs', [\App\Http\Controllers\DFSController::class, 'getDFS'])->name('dfs.post');

Route::get('/dijkstra', [\App\Http\Controllers\DijkstraController::class, 'index'])->name('dijkstra.index');
Route::post('/dijkstra', [\App\Http\Controllers\DijkstraController::class, 'getDijkstra'])->name('dijkstra.post');

Route::get('/kruskal', [\App\Http\Controllers\KruskalController::class, 'index'])->name('kruskal.index');
Route::post('/kruskal', [\App\Http\Controllers\KruskalController::class, 'getKruskal'])->name('kruskal.post');


Route::get('/prim', [\App\Http\Controllers\PrimController::class, 'index'])->name('prim.index');
Route::post('/prim', [\App\Http\Controllers\PrimController::class, 'getPrim'])->name('prim.post');
