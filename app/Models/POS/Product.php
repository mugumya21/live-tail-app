<?php

namespace App\Models\POS;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     public $fillable = ['product_name' , 'product_code', 'product_image'];

        //   $table->string('product_name');
        //     $table->integer('category_id');
        //     $table->integer('supplier_id');
        //     $table->string('product_code')->nullable();
        //     $table->string('product_image')->nullable();
        //     $table->integer('product_store')->nullable();
        //     $table->date('buying_date')->nullable();
        //     $table->string('expire_date')->nullable();
        //     $table->integer('buying_price')->nullable();
        //     $table->integer('selling_price')->nullable();




}
