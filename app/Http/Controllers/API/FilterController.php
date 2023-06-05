<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Filters\ApplicationFilter;
use App\Http\Requests\API\FilterRequest;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class FilterController extends Controller
{
    public function __invoke(FilterRequest $request)
    {

        $applications = Application::where('client_id', 1)->latest()->get();
        $filter = app()->make(ApplicationFilter::class, ['queryParams'=>array_filter($request->validated())]);
        $applications=Application::filter($filter)->orderBy('created_at', 'DESC')->get();

        if ($applications->count() > 0){
            return View::make("components.application-filter")
                ->with("applications", $applications)
                ->render();
        }else{
            return view('components.no-data');
        }
    }
}
