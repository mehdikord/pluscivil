<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function show($service)
    {
        $service = Service::where('slug',$service)->first();
        if (empty($service) || $service->is_public == 0)
        {
            abort(404);
        }

        return view('front.service.show',compact('service'));
    }
}
