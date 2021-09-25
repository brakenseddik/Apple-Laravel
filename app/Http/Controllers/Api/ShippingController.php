<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Shipping;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    public function store(Request $request){
        $shipping = new Shipping();
        $shipping->name = $request->input('name');
        $shipping->email = $request->input('email');
        $shipping->address = $request->input('address');
        if($shipping->save()){
            return response(['result' => true]);
        }
        return response(['result' => false]);

    }
}
