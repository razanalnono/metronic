<?php

namespace App\Repositories;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class CartModelRepository implements CartRepository
{




    public function get()
    {
        return Cart::with(['product', 'option', 'option.variation'])->where('cookie_id', $this->getCookieId())->get();
    }


    public function add(Product $product, $quantity = 1, $variationValue)
    {
        if ($quantity === null) {
            $quantity = 1;
        }
        $item = Cart::where('variation_value', $variationValue)
            ->where('cookie_id', $this->getCookieId())
            ->first();

        if (!$item) {
            $item = Cart::create([
                'id' => Str::uuid(),
                'cookie_id' => $this->getCookieId(),
                'user_id' => Auth::id(),
                'product_id' => $product->id,
                'quantity' => $quantity,
                'variation_value' => $variationValue,
            ]);
        } else {
            $item->increment('quantity', $quantity);
        }
    }


    public function update($id, $quantity, $variationValue)
    {
        Cart::where('id', '=', $id)
            ->update([
                'quantity' => $quantity,
                //  'variation_value' => $variationValue,

            ]);
    }


    public function delete($id)
    {
        Cart::where('id', $id)
            ->where('cookie_id', $this->getCookieId())
            ->delete();
    }


    public function empty()
    {
        Cart::where('cookie_id', $this->getCookieId())->destroy();
    }

    public function total()
    {
        return Cart::where('cookie_id', $this->getCookieId())
            ->join('variations', 'variations.id', 'carts.variation_value')
            ->selectRaw('SUM(variations.price * carts.quantity) as total')
            ->value('total');
    }



    protected function getCookieId()
    {
        $cookieId = Cookie::get('cart_id');
        if (!$cookieId) {
            $cookieId = Str::uuid();
            Cookie::queue('cart_id', $cookieId, 30 * 24);
        }
        return $cookieId;
    }
}