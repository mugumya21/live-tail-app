<?php

namespace App\Livewire\CRM;

use Livewire\Component;
use App\Models\Customer as CustomerModel;
use Livewire\WithPagination;

class Customer extends Component
{
    use WithPagination;
    public $name;
    public $email;
    public $search;
    public $phone;

    public function addCustomer()
    {
        $validated = $this->validate([

                'name'=>'required|min:5',
                'email'=>'unique:customers',
                'phone'=>'required|unique:customers|min:5',
            ]

        );
        CustomerModel::create($validated);
        $this->reset(['name', 'email', 'phone']);
        flash()->success('Customer created successfully');
    }



     public function render()
    {   $customers = CustomerModel::where('name','LIke', "%{$this->search}%")->paginate(2);
        return view('livewire.c-r-m.customer', [
            'customers'=> $customers

        ]);
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }


}
