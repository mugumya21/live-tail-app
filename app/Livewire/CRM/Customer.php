<?php

namespace App\Livewire\CRM;

use Livewire\Component;
use App\Models\Customer as customerModel;

class Customer extends Component
{
    public $name = "";
    public $email = "";

    public function addCustomer()
    {
        $validated = $this->validate([

                'name'=>'required|min:5',
                'email'=>'required|unique:customers',
            ]

        );
        customerModel::create($validated);
        $this->reset(['name', 'email']);
        flash()->success('Customer created successfully');
    }
     public function render()
    {
        return view('livewire.c-r-m.customer');
    }
}
