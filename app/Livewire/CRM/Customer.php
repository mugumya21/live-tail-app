<?php

namespace App\Livewire\CRM;

use Livewire\Component;
use App\Models\Customer as CustomerModel;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CustomerExport;

class Customer extends Component
{
    use WithPagination;

    public $name;
    public $email;
    public $search;
    public $phone;
    public $editCustomerId;
    public $editCustomerName;



    public function render()
    {
        $customers = CustomerModel::where('name', 'like', "%{$this->search}%")->paginate(2);

        Redis::set('customers', json_encode($customers));
        Redis::set('customers_count', $customers->total());

        $customerCount = Redis::get('customers_count');

        return view('livewire.c-r-m.customer', [
            'customers' => $customers,
            'customers_count' => $customerCount
        ]);
    }

    public function edit($editid){
        $this->editCustomerId =  $editid;
        $this->editCustomerName = CustomerModel::find($editid)->name;

        // $customer->name;
        // $customer->update();



    }
    public function save(){
        $customer = CustomerModel::find($this->editCustomerId);

        $customer->update([
            'name'=>$this->editCustomerName
        ]);

        $this->reset(['editCustomerId']);

    }


    public function delete(CustomerModel $customerObj){
        $customerObj->delete();

    }

    public function export(){
        return Excel::download(new CustomerExport, 'customer.xlsx');
    }



    public function updatedSearch()
    {
        $this->resetPage();
    }


    public function addCustomer()
    {
        $validated = $this->validate([

                'name'=>'required|min:5',
                'email'=>'unique:customers',
                'phone'=>'required|unique:customers|min:5',
            ]

        );
        DB::transaction(function() use (&$validated){

            $customer = CustomerModel::create($validated);

        });

        return response()->json(['message' => 'Email sent successfully!']);
        $this->reset(['name', 'email', 'phone']);
        flash()->success('Customer created successfully');
    }






}
