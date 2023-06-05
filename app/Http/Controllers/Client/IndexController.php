<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $applications = Application::where('client_id', auth()->user()->id)->latest()->get();

        return view('client.index',[
            'applications' => $applications,
        ]);
    }
}
