<?php

namespace App\Http\Controllers;

use App\Http\Requests\DispatchRequest;
use App\Models\Dispatch;
use Illuminate\Http\Request;

class DispatchController extends Controller
{

    public function create(){
        return view('dispatch.create');
    }

    public function store(DispatchRequest $request){
        Dispatch::query()->create($request->except('_method', '_token'));
        return redirect()
            ->route('home')
            ->with('success', 'Письмо успешно создано');
    }

    public function edit($id){
        $dispatch = Dispatch::query()->findOrFail($id);
        return view('dispatch.edit', compact('dispatch'));
    }

    public function update(DispatchRequest $request, $id){
        Dispatch::query()->where('id', $id)->update($request->except('_method', '_token'));
        return redirect()
            ->route('office.main')
            ->with('success', 'Письмо успешно обновленно');
    }

    public function destroy($id)
    {
        $dispatch = Dispatch::query()->findOrFail($id);
        $dispatch->delete();
        return redirect()->route('office.main')->with('success','Запись успешно удалена');
    }

}
