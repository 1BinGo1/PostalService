<?php

namespace App\Http\Controllers;

use App\Models\Dispatch;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $dispatch = Dispatch::query()->where('user_id', auth()->user()->id)->get();
        return view('office.index', compact('dispatch'));
    }

    public function list_dispatch(){
        $dispatch = Dispatch::query()->where('user_id', auth()->user()->id)->get();
        return view('office.list_dispatch', compact('dispatch'));
    }

    public function detail_dispatch_info($dispatch_id){
        $dispatch = Dispatch::query()->findOrFail($dispatch_id);
        return view('office.list_dispatch_info', compact('dispatch'));
    }


}
