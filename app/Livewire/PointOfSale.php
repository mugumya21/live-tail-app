<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
class PointOfSale extends Component
{

    public $name = "";
    public $email = "";
    public $password = "";


    public function render()
    {
        $users = User::all();
        return view('livewire.point-of-sale', [
            // 'name'=>$name,
            'users'=>$users

        ]);
    }

    public function addUser()

    {
        $this->validate([
            'name'=>'required|min:5|string|max:65',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|string|max:65',
        ]);

         User::create(
            [
                'name'=>$this->name,
                'email'=>$this->email,
                'password'=>$this->password,
            ]
        );

        $this->reset(['name','email','password']);
        flash()->success('user createdddd successfully');


    }
}
