<?php

namespace App\Http\Controllers\Lawyer;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Category;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $applications = Application::where('status', 0)->latest()->get();
        $categories = Category::all();
        return view('lawyer.index', [
            'applications' => $applications,
            'categories' => $categories,
        ]);
    }
}
