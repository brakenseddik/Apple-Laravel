<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;
use Stripe\Stripe;


class PaymentController extends Controller
{
    public function pay(Request $request){
  
        try{

            $data = $request->input('cartItems');
            $cartItems = json_decode($data, true);
            $totalAmount = 0.0;
            foreach ($cartItems as $cartItem){
                $order = new Order();
                $order->order_date = Carbon::now()->toDateString();
                $order->product_id = $cartItem['productId'];
                $order->user_id = $request->input('userId');
                $order->quantity = $cartItem['productQuantity'];
                $order->amount = ($cartItem['productPrice'] - $cartItem['productDiscount']);
                $totalAmount+= $order->amount * $order->quantity;
                $order->save();
            }

            \Stripe\Stripe::setApiKey('sk_test_51J6eiVJOLXFnm8mExPA9vWMBbvBIpkHBiu8wnERpQrXaiBeXOeniDKRl2oTrcSunehpLu8AL9EhX91ELLbjQHpu4000U6rAdO4');

            $token = \Stripe\Token::create([
                'card' => [
                    'number' => $request->input('cardNumber'),
                    'exp_month' => $request->input('expiryMonth'),
                    'exp_year' => $request->input('expiryYear'),
                    'cvc' => $request->input('cvcNumber')
                ]
            ]);

            $charge = \Stripe\Charge::create([
                'amount' => $totalAmount * 100,
                'currency' => 'usd',
                'source' => $token,
                'receipt_email' => $request->input('email'),
            ]);

            return response(['result' => true]);
        } catch (\Exception $exception){
            return response(['result' => $exception]);
        }

    }
}
