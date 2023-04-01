<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Stock;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductVariants;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class StockController extends Controller
{


    public function index()
    {
        $products = Product::with('stock')->get();
        $stocks = Stock::with('product')->get();
        $variants = ProductVariants::with(['product', 'attributeValues'])->get();

        return response()->view('stock.index',compact('stocks','variants','products'));
    }


    public function showStockMovements($id)
    {
        $product = Product::findOrFail($id);
            // Product does not have variants
            $stock = $product->stock->first();
            $movements = DB::table('stocks')
            ->join('products', 'products.id', '=', 'stocks.product_id')
            ->select(['stocks.quantity', 'stocks.movement', 'products.name'])
            ->where('stocks.product_id', $id)
            ->orderBy('stocks.created_at', 'asc')
                ->get();
            return view('stock.show', compact('product', 'stock', 'movements'));
        
    }




    public function store(Request $request)
    {
        $product_id = $request->input('product_id');
        $quantity = $request->input('quantity');
        $movement = $request->input('movement');
        $product = Product::findOrFail($product_id);
        $available_quantity = $product->availableQuantity(); // get the available quantity for the product

        $stock = new Stock;
        $stock->product_id = $product_id;
        $stock->product_variants_id = null; 
        $stock->quantity = $quantity;
        $stock->movement = $movement;

        // set the reference based on the type of model that made the movement
        if (Auth::check()) {
            $stock->refernece()->associate(Auth::user());
        } elseif ($request->has('order_id')) {
            $order = Order::findOrFail($request->input('order_id'));
            $stock->refernece()->associate($order);
        } else {
            // handle error - no reference provided
        }

        if ($movement == 'pull' && $quantity > $available_quantity) {
            return response()->json(['error' => 'Requested quantity is more than available quantity.'], 400);
        }

        $stock->save();
        return response()->json(['quantity' => $quantity]);
    }




    public function updateStock(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'quantity' => 'required|integer|min:1',
            'movement' => 'required|in:push,pull',
        ]);

        // Determine the stock movement type
        $movement = $validatedData['movement'] == 'push' ? 'push' : 'pull';

        // Create the new stock movement
        $stock = new Stock();
        $stock->product_id = $product->id;
        $stock->movement = $movement;
        $stock->quantity = $validatedData['quantity'];
        $stock->refernece()->associate(Auth::user());
        $stock->save();
    }

}