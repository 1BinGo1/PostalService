<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class SearchUser extends Component
{
    public $search_user = '';

    public function render()
    {
        $users = User::query()
            ->where('first_name', 'like', '%' . $this->search_user . '%')
            ->orWhere('last_name','like', '%' . $this->search_user . '%')
            ->orWhere('email','like', '%' . $this->search_user . '%')
            ->paginate(3);
        return view('livewire.search-user', compact('users'));
    }

}
