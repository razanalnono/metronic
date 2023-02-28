<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use App\Events\OrderCreated;
use Illuminate\Http\Request;
use App\Models\VariationValue;
use Illuminate\Support\Facades\DB;
use App\Repositories\CartRepository;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{


    public function create(CartRepository $cart)
    {

        if ($cart->get()->count() == 0) {
            return view('home');
        }

        return view('Front.checkout', [
            'cart' => $cart,

        ]);
    }





    public function store(Request $request, CartRepository $cart)
    {

        $items = $cart->get();

        try {
            DB::beginTransaction();
                $order = Order::create([
                    'user_id' => Auth::id(),
                    'payment_method' => 'Visa'
                ]);

                //  dd($cartItem);
                foreach ($items as $cartItem) {
                    if ($cartItem->product) {

                        $variationValue = VariationValue::find($cartItem->variation_value);

                        $orderItemData = [
                            'order_id' => $order->id,
                            'product_id' => $cartItem->product_id,
                            'product_name' => $cartItem->product->name,
                            'price' => $cartItem->product->price,
                            'quantity' => $cartItem->quantity,
                            'variation_value' => $variationValue->id,
                        ];
                        OrderItem::create($orderItemData);
                    }
                }


                foreach ($request->post('addr') as $type => $address) {
                    if (is_string($address)) {
                        $address = json_decode($address, true);
                    }
                    $address['type'] = $type;
                    $order->addresses()->create($address);
                }

                //reduce quanity 
                // foreach($items as $carts){
                // $carts->product->decrement('quantity', $carts->quantity);
               
                // }

            event(new OrderCreated($order));


            DB::commit();
            // $cart->empty();
        } catch (Exception $e) {
            DB::rollback();
            return $e;
        }

        return response()->view('Front.index', [
            'cart' => $cart,
        ]);

    }
}