<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Mail\UserMail;
use Illuminate\Support\Facades\Mail;

class Customer extends Model
{
    public $fillable = ['name' , 'email', 'phone'];


    protected static function boot()
    {
        parent::boot();

        static::created(function($customer){
            $customer->email ? Mail::to($customer->email)->send(new UserMail($customer)) : "";
        });


    }
}


