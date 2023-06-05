<?php

namespace App\Http\Controllers\Lawyer;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(Request $request)
    {
        $request = $request->validate([
            'id' => 'required|integer',
            'lawyer_id' => 'required|string',
        ]);
        $application = Application::find($request['id']);
        $application->update([
            'status'=> 1,
            'lawyer_id' => $request['lawyer_id'],
            'updated_at' => Carbon::now(),
        ]);
        return response()->json(['message' => 'Заявление №' . $application->id . ' принято в обработку']);
    }
}
