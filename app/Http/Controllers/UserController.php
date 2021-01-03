<?php

namespace App\Http\Controllers;

use App\Models\Dispatch;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('profile.index');
    }

    public function list_dispatch(){
        $dispatch = Dispatch::query()->where('user_id', auth()->user()->id)->get();
        return view('profile.list_dispatch', compact('dispatch'));
    }

    public function detail_dispatch_info($dispatch_id){
        $dispatch = Dispatch::query()->findOrFail($dispatch_id);
        return view('profile.list_dispatch_info', compact('dispatch'));
    }

}
