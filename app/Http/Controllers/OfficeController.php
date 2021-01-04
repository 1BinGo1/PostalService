<?php

namespace App\Http\Controllers;

use App\Models\Dispatch;
use App\Models\User;
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

    public function list_dispatch($user_id){
        $dispatch = Dispatch::query()->where('user_id', $user_id)->get();
        $user = User::query()->findOrFail($user_id);
        return view('office.list_dispatch', compact('dispatch', 'user'));
    }

    public function detail_dispatch_info($dispatch_id){
        $dispatch = Dispatch::query()->findOrFail($dispatch_id);
        return view('office.list_dispatch_info', compact('dispatch'));
    }


}
