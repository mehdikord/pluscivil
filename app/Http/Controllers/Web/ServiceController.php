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

    public function request_order($service)
    {
        $service = Service::where('slug',$service)->first();
        if (empty($service) || $service->is_public == 0 || $service->is_product == 0)
        {
            abort(404);
        }
        return view('front.service.request-order',compact('service'));


    }
}
