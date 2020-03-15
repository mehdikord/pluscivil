<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Province;
use Illuminate\Http\Request;

class GetController extends Controller
{
    public function cities(Province $province)
    {
        return response()->json($province->cities()->get(),200);
    }
}
