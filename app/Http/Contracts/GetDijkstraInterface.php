<?php

namespace App\Http\Contracts;

use Illuminate\Http\Request;

interface GetDijkstraInterface
{
    public function getDijkstra(Request $request);
}
