<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Repositories\CartRepository;
use App\Repositories\CartModelRepository;
use App\Traits\imageUpload;

class CartController extends Controller
{

    use imageUpload;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CartRepository $cart)
    {
        //
      //   $items=  $cart->get();
           // $product=Cart::whereIn('product_id')->get();
           
         return response()->view('Front.index',[
            'cart'=>$cart,
         ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CartRepository $cart)
    {
        //
        // $uuid = Str::uuid()->toString();
        

        
        $product = Product::findOrFail($request->post('product_id'));
        $quantity = $request->post('quantity');
        $variationValue = $request->post('variation_value');

        $cart->add($product, $quantity, $variationValue);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CartRepository $cart,$id)
    {
        //
     //   $product = Product::findOrFail($request->post('product_id'));
        $quantity = $request->post('quantity');
        $variationValue = $request->post('variation_value');

        $cart->update($id, $quantity, $variationValue);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CartRepository $cart,$id)
    { 
        $cart->delete($id);
    }
}