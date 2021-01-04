<?php

namespace App\Http\Livewire;

use App\Models\Dispatch;
use Livewire\Component;

class Search extends Component
{
    public $search = '';

    public function render()
    {
        $dispatch = Dispatch::query()
            ->where('track_code', 'like', '%' . $this->search . '%')
            ->orWhere('status','like', '%' . $this->search . '%')
            ->orWhere('city_dispatch','like', '%' . $this->search . '%')
            ->orWhere('city_destination','like', '%' . $this->search . '%')
            ->get();
        return view('livewire.search', compact('dispatch') );
    }


}
