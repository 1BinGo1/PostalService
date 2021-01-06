<?php

namespace App\Http\Livewire;

use App\Models\Dispatch;
use Livewire\Component;

class SearchDispatch extends Component
{
    public $search_dispatch = '';
    public $user;

    public function render()
    {
        $dispatch = Dispatch::query()
            ->where('user_id', $this->user->id)
            ->where(function($query){
                $query->where('track_code', 'like', '%' . $this->search_dispatch . '%')
                    ->orWhere('status','like', '%' . $this->search_dispatch . '%')
                    ->orWhere('city_dispatch','like', '%' . $this->search_dispatch . '%')
                    ->orWhere('city_destination','like', '%' . $this->search_dispatch . '%');
            })->paginate(3);
        return view('livewire.search-dispatch', compact('dispatch') );
    }

}
