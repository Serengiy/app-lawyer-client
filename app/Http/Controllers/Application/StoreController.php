<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Http\Requests\Application\StoreRequest;
use App\Models\Application;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
//        return response()->json($request->);
        $data = $request->validated();
        if(isset($data['image'])){
            $image_name = md5(Carbon::now(). '_'. $data['image']->getClientOriginalName()). '.' . $data['image']->getClientOriginalExtension();
            $data['picture_url'] = Storage::disk('public')->putFileAs('/images', $data['image'], $image_name);
        }
        unset($data['image']);
//        $data['client_id'] = auth()->user()->id;
        $application = Application::create($data);

        return response()->json([
            'app_number' => $application->id, 200
        ]);
    }
}
