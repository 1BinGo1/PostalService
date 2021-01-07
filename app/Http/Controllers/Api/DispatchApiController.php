<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dispatch;
use App\Models\User;
use Faker\Provider\Miscellaneous;
use Illuminate\Http\Request;

class DispatchApiController extends Controller
{

    public function index(){
        return response()->json(Dispatch::all(), 200);
    }

    public function indexById(Dispatch $dispatch){
        return response()->json($dispatch, 200);
    }

    public function store(Request $request){
        $user = User::query()->where('api_key', $request->input('api_key'))->first();
        if (is_null($user)){
            return response()->json(['error' => true, 'User not found!'], 404);
        }
        $dispatch = Dispatch::query()->create([
            'user_id' => $user->id,
            'track_code' => Miscellaneous::md5(),
            'status' => 'expects',
            'city_dispatch' => $request->input('city_dispatch'),
            'city_destination' => $request->input('city_destination'),
            'price' => $request->input('price'),
        ]);
        return response()->json($dispatch, 201);
    }

    public function update(Request $request, Dispatch $dispatch){
        $user = User::query()->where('api_key', $request->input('api_key'))->firstOrFail();
        if (is_null($user)){
            return response()->json(['error' => true, 'User not found!'], 404);
        }
        if ($dispatch->user_id != $user->id){
            return response()->json(['error' => true, 'You may not delete this record!'], 404);
        }
        $dispatch->update([
            'city_dispatch' => $request->input('city_dispatch'),
            'city_destination' => $request->input('city_destination'),
        ]);
        return response()->json($dispatch, 200);
    }

    public function destroy(Request $request, Dispatch $dispatch){
        $user = User::query()->where('api_key', $request->input('api_key'))->firstOrFail();
        if (is_null($user)){
            return response()->json(['error' => true, 'User not found!'], 404);
        }
        if ($dispatch->user_id != $user->id){
            return response()->json(['error' => true, 'You may not delete this record!'], 404);
        }
        $dispatch->delete();
        return response()->json(['Record was remove!'], 204);
    }

}
