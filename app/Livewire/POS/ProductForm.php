<?php

namespace App\Livewire\POS;
use App\Models\POS\Product;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CustomerExport;
use Livewire\Component;


class ProductForm extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $product_name;
    public $product_code;
    public $product_image;
    public $search;
    public $editProductId;
    public $editProductName;



    public function render()
    {
        $products = Product::where('product_name', 'like', "%{$this->search}%")->paginate(2);

        Redis::set('products', json_encode($products));
        Redis::set('products_count', $products->total());

        $productsCount = Redis::get('products_count');

                    return view('livewire.p-o-s.product-form',[

            'products' => $products,
            'products_count' => $productsCount
        ]);
    }

    public function edit($editid){
        $this->editPoductId =  $editid;
        $this->editPoductName = Product::find($editid)->product_name;


    }
    public function save(){
        $customer = Product::find($this->editPoductId);

        $customer->update([
            'product_name'=>$this->editPoductName
        ]);

        $this->reset(['editPoductId']);

    }


    public function delete(Product $productObj){
        $productObj->delete();

    }

    public function export(){
        return Excel::download(new CustomerExport, 'customer.xlsx');
    }



    public function updatedSearch()
    {
        $this->resetPage();
    }


    public function addProduct()
    {
        $validated = $this->validate([

                'product_name'=>'required|min:5|string',
                'product_code'=>'unique:products|numeric',
                'product_image'=>'required|max:200|image',
            ]

        );
        DB::transaction(function() use (&$validated){

            $product = Product::create($validated);

        });

        $this->reset(['product_name', 'product_code', 'product_image']);
        flash()->success('Product created successfully');
    }






}
