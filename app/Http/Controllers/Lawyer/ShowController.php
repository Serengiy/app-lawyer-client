<?php

namespace App\Http\Controllers\Lawyer;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ShowController extends Controller
{
    public function __invoke()
    {
        $complited_applications = Application::where('lawyer_id', auth()->user()->id)->where('status', 2)->get();
        $application = Application::where('lawyer_id', auth()->user()->id)
            ->where('status', 1)
            ->orderBy('updated_at', "DESC")
            ->get();
        return view('lawyer.show',[
            'applications' => $application,
            'complited_applications' => $complited_applications,
        ]);
    }
}
