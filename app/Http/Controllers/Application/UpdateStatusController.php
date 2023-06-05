<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class UpdateStatusController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = $request->validate([
            'id' => 'required|integer',
            'comment'=>'nullable'
        ]);
        $application = Application::find($data['id']);
        $application->update([
            'status' => 2,
            'comment' => $data['comment']
        ]);

        return response()->json(['message'=>'Ваше заявление №'. $data['id']. ' перемещено в архив']);
    }
}
