<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class UserList extends Component
{
    public function getUsers()
    {
        return User::all();
    }
    public function render()
    {
        $users = $this->getUsers();
        return view('livewire.user-list')->with([
            'users' => $users
        ]);
    }
}
