<?php

namespace App\Livewire\POS;

use Livewire\Component;
use App\Models\Customer;
use App\Models\POS\Sale;
use App\Models\Main\Product;

class Sales extends Component
{
    public $cart = [];
    public $product_id;
    public $customer_id;
    public $quantity;
    public $amount;
    public $unit;

    public function render()
    {
        $customers = Customer::all();
        $products = Product::all();

        return view('livewire.p-o-s.sales',
        [
           'customers' => $customers,
           'products' => $products
        ]);
    }

      public function addInCart()
    {
        $validated = $this->validate(
            [
                'customer_id'=> 'nullable',
                'product_id'=> 'required',
                'amount'=> 'required',
            ]
        );
        $this->cart[] = [
            'product_id' => $this->product_id,
            'product_name' => product::find($this->product_id)->product_name,
            'total_products' => $this->quantity,
            'amount' => $this->amount,
            'unit' => $this->unit,
        ];
    }

}
