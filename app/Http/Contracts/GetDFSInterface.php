<?php

namespace App\Http\Contracts;

use Illuminate\Http\Request;

interface GetDFSInterface
{
    public function getDFS(Request $request);
}
