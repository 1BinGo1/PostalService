<?php

namespace App\Http\Controllers;

use App\Http\Requests\DispatchRequest;
use App\Models\Dispatch;
use Faker\Provider\Miscellaneous;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;

class DispatchController extends Controller
{

    public function create(){
        return view('dispatch.create');
    }

    public function store(DispatchRequest $request){
        Dispatch::query()->create([
            'user_id' => auth()->user()->id,
            'track_code' => Miscellaneous::md5(),
            'status' => 'Expects',
            'city_dispatch' => $request->input('city_dispatch'),
            'city_destination' => $request->input('city_destination'),
            'price' => $request->input('price'),
        ]);
        return redirect()
            ->route('home')
            ->with('success', 'Запись успешно создана!');
    }

    public function edit(Dispatch $dispatch){
        return view('dispatch.edit', compact('dispatch'));
    }

    public function update(DispatchRequest $request, Dispatch $dispatch){
        $dispatch->update($request->except('_method', '_token'));
        return redirect()
            ->route('office.main')
            ->with('success', 'Запись успешно обновленна!');
    }

    public function destroy(Dispatch $dispatch)
    {
        $dispatch->delete();
        return redirect()->route('office.main')->with('success','Запись успешно удалена!');
    }

}
