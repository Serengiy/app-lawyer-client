<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class RandomAppController extends Controller
{
    public function __invoke()
    {
        $applications = Application::inRandomOrder()->get()->unique('client_id');
        return view('client.random_app', [
            'applications' => $applications
        ]);
    }
}
