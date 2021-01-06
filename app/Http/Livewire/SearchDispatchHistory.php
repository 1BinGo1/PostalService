<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SearchDispatchHistory extends Component
{
    public $search_dispatch_history = '';
    public $dispatch;

    public function render()
    {
        $dispatch_history = $this->dispatch->history()
            ->where('status','like', '%' . $this->search_dispatch_history . '%')
            ->orWhere('city_dispatch','like', '%' . $this->search_dispatch_history . '%')
            ->orWhere('city_destination','like', '%' . $this->search_dispatch_history . '%')
            ->paginate(3);
        return view('livewire.search-dispatch-history', compact('dispatch_history'));
    }

}
