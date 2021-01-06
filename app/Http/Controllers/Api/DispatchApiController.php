<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dispatch;
use Faker\Provider\Miscellaneous;
use Illuminate\Http\Request;

class DispatchApiController extends Controller
{
    public function index(){
        return response()->json(Dispatch::all(), 200);
    }

    public function indexById($id){
        return response()->json(Dispatch::query()->findOrFail($id), 200);
    }

    public function store(Request $request){
        $dispatch = Dispatch::query()->create([
            'user_id' => $request->input('user_id'),
            'track_code' => Miscellaneous::md5(),
            'status' => $request->input('status'),
            'city_dispatch' => $request->input('city_dispatch'),
            'city_destination' => $request->input('city_destination'),
            'price' => $request->input('price'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        return response()->json($dispatch, 201);
    }
}
