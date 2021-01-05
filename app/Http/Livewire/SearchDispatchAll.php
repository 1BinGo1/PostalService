<?php

namespace App\Http\Livewire;

use App\Models\Dispatch;
use Livewire\Component;

class SearchDispatchAll extends Component
{
    public $search_dispatch_all = '';
    public $filter_price = 'asc';

    public function render()
    {
        $dispatch = Dispatch::query()
            ->where('track_code', 'like', '%' . $this->search_dispatch_all . '%')
            ->orWhere('status','like', '%' . $this->search_dispatch_all . '%')
            ->orWhere('city_dispatch','like', '%' . $this->search_dispatch_all . '%')
            ->orWhere('city_destination','like', '%' . $this->search_dispatch_all . '%')
            ->orderBy('price', $this->filter_price)
            ->get();
        return view('livewire.search-dispatch-all', compact('dispatch') );
    }

    public function edit_filter($value){
        if ($value === "asc"){
            $this->filter_price = "desc";
        }
        else{
            $this->filter_price = "asc";
        }
    }

}
