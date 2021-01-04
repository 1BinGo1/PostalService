<?php

namespace App\Http\Livewire;

use App\Models\Dispatch;
use Livewire\Component;

class SearchDispatchAll extends Component
{
    public $search_dispatch_all = '';

    public function render()
    {
        $dispatch = Dispatch::query()
            ->where('track_code', 'like', '%' . $this->search_dispatch_all . '%')
            ->orWhere('status','like', '%' . $this->search_dispatch_all . '%')
            ->orWhere('city_dispatch','like', '%' . $this->search_dispatch_all . '%')
            ->orWhere('city_destination','like', '%' . $this->search_dispatch_all . '%')
            ->get();
        return view('livewire.search-dispatch-all', compact('dispatch') );
    }

}
