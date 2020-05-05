<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('login');
        $this->middleware('not_member')->except('login');
    }

    public function new()
    {
        $data = \App\Request::query();

        $requests = $data->where('is_accepted',false)->paginate(20);

        return view('management.requests.new',compact('requests'));

    }
}
