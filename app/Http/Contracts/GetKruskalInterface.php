<?php

namespace App\Http\Contracts;

use Illuminate\Http\Request;

interface GetKruskalInterface
{
    public function getKruskal(Request $request);
}
