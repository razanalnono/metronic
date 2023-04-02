<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Stock;
use App\Models\Product;
use App\Models\OrderLog;
use App\Models\OrderCase;
use App\Models\OrderItem;
use App\Models\OrderPrice;
use App\Models\PaymentType;
use App\Events\OrderCreated;
use App\Models\OrderAddress;
use App\Models\ProductVariants;
use Illuminate\Http\Request;
use Psy\Exception\Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //exclude the orders that are accepted and cancelled which has case_id=2,6
        $orders = Order::whereNotExists(function ($query) {
            $query->select(DB::raw(1))
                ->from('order_logs')
                ->whereRaw('orders.id = order_logs.order_id')
                ->whereIn('order_logs.order_cases_id', [2, 6, 7])
                ->where('orders.created_at', '>=', now()->subHours(12));
        })->get();







        return view('orders.index', ['orders' => $orders]);
    }


    // public function store(Request $request)
    // {



    //     $order = new Order();
    //     $order->user_id = $request->input('user_id');
    //     $order->payment_method = $request->input('payment_method', 'cash');
    //     $order->status = 'pending';
    //     $order->payment_status = 'pending';
    //     $order->shipping = $request->input('shipping', 0);
    //     $order->tax = $request->input('tax', 0);
    //     $order->discount = $request->input('discount', 0);
    //     $order->total = 0; // We'll calculate the total later
    //     $order->save();


    //     // Loop through the order items and create them
    //     $total = 0;
    //     $items = $request->input('items');
    //     if (empty($items)) {
    //         return response()->json([
    //             'error' => 'Invalid request. Items must be an array.',
    //         ], 400);
    //     }
    //     foreach ($items as $itemData) {
    //         // Get the product
    //         $product = Product::find($itemData['product_id']);

    //         // Check if the quantity of the product or product variant is not zero
    //         $stockQuery = Stock::where('product_id', $product->id);
    //         if (isset($itemData['product_variants_id'])) {
    //             $stockQuery->where('product_variants_id', $itemData['product_variants_id']);
    //         }
    //         $stock = $stockQuery->first();
    //         if (!$stock || $stock->quantity <= 0) {
    //             DB::rollback();
    //             return response()->json([
    //                 'error' => 'Product or variant is out of stock.',
    //             ], 400);
    //         }
    //     $qty = 0;
    //     if ($stock->quantity < $itemData['quantity']) {
    //             DB::rollback();
    //             return response()->json([
    //                 'error' => 'Not enough quantity in stock.',
    //             ], 400);
    //         }
    //         // Create the order item
    //         $item = new OrderItem();
    //         $item->order_id = $order->id;
    //         $item->product_id = $product->id;
    //         $item->product_name = $product->name;
    //         $item->price = $product->price;
    //         $item->quantity =$qty =$itemData['quantity'];
    //         $item->product_variants_id = $itemData['product_variants_id'] ?? null;
    //         $item->save();

    //         // Update the reserved quantity of the product
    //         // $product->reserved_quantity += $itemData['quantity'];
    //         $product->save();

    //         // Add the item total to the order total
    //         $total += $item->price * $item->quantity;

    //         // event(new OrderCreated($order));
    //         $q = Stock::where('product_id', $product->id)->first(['quantity'])->quantity;
    //         $net_quantity = ((int)$q - (int)$item->quantity);


    //         // Calculate the total with shipping, tax, and discount
    //         $total += $order->shipping + $order->tax - $order->discount;
    //         $order->total = $total;

    //         $order->save();
    //         $stock = new Stock([
    //             'product_id' => $item->product_id,
    //             'quantity' => $qty,
    //             'product_variants_id' => $item->product_variants_id,
    //             'movement' => 'pull',
    //         ]);
    //         $order->stock()->save($stock);





    //         // Return the order
    //         return response()->json([
    //             'order' => $order,
    //             'product' => $product
    //         ]);
    //     }
    // }

    // public function createOrder(Request $request)
    // {
    //     $userId = $request->input('user_id');
    //     $addressData = $request->input('address');

    //     // Create the order
    //     $order = new Order();
    //     $order->user_id = $userId;
    //     $order->payment_types_id=$request->input('payment_types_id');
    //     $order->save();


    //     $items = $request->input('items');
    //     // Create order items
    //     foreach ($items as $item) {
    //         $orderItem = new OrderItem();
    //         $orderItem->order_id = $order->id;
    //         $orderItem->product_id = $item['product_id'];
    //         $orderItem->quantity = $item['quantity'];
    //         $orderItem->save();
    //     }

    //     // Create order address
    //     $address = new OrderAddress();
    //     $address->order_id = $order->id;
    //     $address->type = $addressData['type'];
    //     $address->first_name = $addressData['first_name'];
    //     $address->last_name = $addressData['last_name'];
    //     $address->email = $addressData['email'];
    //     $address->phone_number = $addressData['phone_number'];
    //     $address->street_address = $addressData['street_address'];
    //     $address->city = $addressData['city'];
    //     $address->postal_code = $addressData['postal_code'];
    //     $address->state = $addressData['state'];
    //     $address->country = $addressData['country'];
    //     $address->save();

    //     // Create order price
    //     $subtotal = 0;
    //     foreach ($items as $item) {
    //         $product = Product::find($item['product_id']);
    //         $subtotal += $product->price * $item['quantity'];
    //     }

    //     $shipment = 0; // Set shipment amount
    //     $tax = 0; // Set tax amount
    //     $discount = 0; // Set discount amount

    //     $orderPrice = new OrderPrice();
    //     $orderPrice->order_id = $order->id;
    //     $orderPrice->subtotal = $subtotal;
    //     $orderPrice->shipment = $shipment;
    //     $orderPrice->tax = $tax;
    //     $orderPrice->discount = $discount;
    //     $orderPrice->save();

    //     // Create order log
    //     $log = new OrderLog();
    //     $log->order_id = $order->id;
    //     $log->order_cases_id = 1 ;
    //     $log->save();

    //     return response()->json(['success' => true, 'order_id' => $order->id]);
    // }



    //Worked without try catch
    // public function store(Request $request)
    // {

    //     $order = new Order([
    //         'payment_types_id' => $request->payment_types_id,
    //         'user_id' => $request->user_id,
    //     ]);

    //     $order->save();

    //     $total = 0;
    //     $total = 0;
    //     // $items = $request->input('items');
    //     foreach ($request->items as $itemData) {
    //         $product = Product::findOrFail($itemData['product_id']);

    //         $stock = Stock::where('product_id', $product->id)
    //             ->where('movement', 'push')
    //             ->orderBy('created_at', 'desc')
    //             ->first();
    //         if (!$stock || $stock->availableQuantity() < $itemData['quantity']) {
    //             DB::rollback();
    //             return response()->json([
    //                 'error' => 'Not enough quantity in stock for ' . $product->name,
    //             ], 400);
    //         }

    //         $qty = $itemData['quantity'];
    //         // Create the order item
    //         $item = new OrderItem();
    //         $item->order_id = $order->id;
    //         $item->product_id = $product->id;
    //         $item->price = $product->price;
    //         $item->quantity = $qty;
    //         $item->product_variants_id = $itemData['product_variants_id'] ?? null;
    //         $item->save();

    //         // Update the stock quantity
    //         // if ($stock->quantity >= $qty) {
    //         //     $stock->quantity -= $qty;

    //         //     $stock->save();
    //         // }
    //         // Add to the total
    //         $total += $qty * $product->price;
    //     }

    //     // Update the order total
    //     $order->total = $total;
    //     $order->save();

    //     // Create the order item
    //     $item = new OrderItem();
    //     $item->order_id = $order->id;
    //     $item->product_id = $product->id;
    //     $item->price = $product->price;
    //     $item->quantity = $qty = $itemData['quantity'];
    //     $item->product_variants_id = $itemData['product_variants_id'] ?? null;
    //     $item->save();

    //     // Update the reserved quantity of the product
    //     // $product->reserved_quantity += $itemData['quantity'];
    //     $product->save();

    //     // Add the item total to the order total
    //     $total = $item->price * $item->quantity;


    //     $q = Stock::where('product_id', $product->id)->first(['quantity'])->quantity;
    //     $net_quantity = ((int)$q - (int)$item->quantity);


    //     // Calculate the total with shipping, tax, and discount
    //     $total += $order->shipping + $order->tax - $order->discount;
    //     $order->total = $total;

    //     $order->save();
    //     $stock = new Stock([
    //         'product_id' => $item->product_id,
    //         'quantity' => $qty,
    //         'product_variants_id' => $item->product_variants_id,
    //         'movement' => 'pull',
    //     ]);
    //     $order->stock()->save($stock);

    //     $shipment = 0;
    //     $discount = 0;
    //     $tax = 0;
    //     $orderPrice = new OrderPrice([
    //         'order_id' => $order->id,
    //         'shipment' => $shipment,
    //         'discount' => $discount,
    //         'subtotal' => $total,
    //         'tax' => $tax,
    //     ]);

    //     $orderPrice->save();

    //     $orderAddress = new OrderAddress([
    //         'order_id' => $order->id,
    //         'type' => $request->address['type'],
    //         'first_name' => $request->address['first_name'],
    //         'last_name' => $request->address['last_name'],
    //         'email' => $request->address['email'],
    //         'phone_number' => $request->address['phone_number'],
    //         'street_address' => $request->address['street_address'],
    //         'city' => $request->address['city'],
    //         'postal_code' => $request->address['postal_code'],
    //         'state' => $request->address['state'],
    //         'country' => $request->address['country'],
    //     ]);

    //     $orderAddress->save();

    //     $log = new OrderLog();
    //     $log->order_id = $order->id;
    //     $log->order_cases_id = 1;
    //     $log->save();

    //     return response()->json([
    //         'message' => 'Order created successfully',
    //         'order_id' => $order,
    //     ]);
    // }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $order = new Order([
                'payment_type_id' => $request->payment_type_id,
                'user_id' => $request->user_id,
            ]);

            $order->save();

            $total = 0;
            foreach ($request->items as $itemData) {
                $product = Product::findOrFail($itemData['product_id']);

                $stock = Stock::where('product_id', $product->id)
                    ->where('movement', 'push')
                    ->orderBy('created_at', 'desc')
                    ->first();

                if (!$stock || $stock->availableQuantity() < $itemData['quantity']) {
                    DB::rollback();
                    return response()->json([
                        'error' => 'Not enough quantity in stock for ' . $product->name,
                    ], 400);
                }

                $qty = $itemData['quantity'];
                $item = new OrderItem();
                $item->order_id = $order->id;
                $item->product_id = $product->id;
                $item->price = $product->price;
                $item->quantity = $qty;
                $item->product_variants_id = $itemData['product_variants_id'] ?? null;
                $item->save();

                $total += $qty * $product->price;
            }

            $order->total = $total;
            $order->save();

            foreach ($request->items as $itemData) {
                $product = Product::findOrFail($itemData['product_id']);
                $qty = $itemData['quantity'];
                $product->save();
            }

            foreach ($request->items as $itemData) {
                $product = Product::findOrFail($itemData['product_id']);
                $stock = new Stock([
                    'product_id' => $product->id,
                    'quantity' => $itemData['quantity'],
                    'product_variants_id' => $itemData['product_variants_id'] ?? null,
                    'movement' => 'pull',
                ]);
                $order->stock()->save($stock);
            }

            $shipment = 0;
            $discount = 0;
            $tax = 0;
            $orderPrice = new OrderPrice([
                'order_id' => $order->id,
                'shipment' => $shipment,
                'discount' => $discount,
                'subtotal' => $total,
                'tax' => $tax,
            ]);

            $orderPrice->save();

            $orderAddress = new OrderAddress([
                'order_id' => $order->id,
                'type' => $request->address['type'],
                'first_name' => $request->address['first_name'],
                'last_name' => $request->address['last_name'],
                'email' => $request->address['email'],
                'phone_number' => $request->address['phone_number'],
                'street_address' => $request->address['street_address'],
                'city' => $request->address['city'],
                'postal_code' => $request->address['postal_code'],
                'state' => $request->address['state'],
                'country' => $request->address['country'],
            ]);

            $orderAddress->save();

            $log = new OrderLog();
            $log->order_id = $order->id;
            $log->order_cases_id = 1;
            $log->save();

            DB::commit();

            return response()->json([
                'message' => 'Order created successfully',
                'order' => $order,
                'items'=>$item,
                'address'=>$orderAddress,
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'error' => 'An error occurred while creating the order: ' . $e->getMessage(),
            ], 500);
        }
    }

    // public function updateOrder(Request $request)
    // {
    //     try {
    //         $data = $request->validate([
    //             'orderId' => 'required|integer',
    //             'caseId' => 'required|integer',
    //             'comment' => 'string',
    //         ]);

    //         $order = Order::find($data['orderId']);
    //         if (!$order) {
    //             return response()->json(['message' => 'Order not found'], 404);
    //         }

    //         $order->case_id = $data['caseId'];
    //         $order->save();

    //         OrderLog::create([
    //             'order_id' => $order->id,
    //             'case_id' => $data['caseId'],
    //             'comment' => $data['comment'] ?? '',
    //         ]);

    //         return response()->json($order);
    //     } catch (\Exception $e) {
    //         report($e);
    //         return response()->json(['message' => 'Internal server error'], 500);
    //     }
    // }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */


    public function show($id)
    {
    


        $order = Order::findOrFail($id);
        $stock = $order->items->first();

        
        $detail_item = DB::table('orders')
            ->join('order_logs', 'order_logs.order_id', '=', 'orders.id')
            ->join('order_items', 'order_items.order_id', '=', 'orders.id')
            ->join('products', 'products.id', '=', 'order_items.product_id')
            ->select(['order_items.quantity', 'order_items.price','products.name', 'order_logs.order_cases_id', 'products.image'])
            ->where('order_items.order_id', $id)
            ->get();

        return view('orders.show', compact('stock', 'order', 'detail_item'));
    }


    public function accept(Order $order)
    {
        $newOrderLog = new OrderLog;
        $newOrderLog->order_id = $order->id;
        $newOrderLog->order_cases_id = 2;
        $newOrderLog->comment = 'Order accepted';
        $newOrderLog->save();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        OrderCase::where('id', $request->up_id)->update([
            'comment' => $request->up_comment,

        ]);

        return response()->json([
            'status' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }


    public function cancel($id)
    {
        $order = Order::with('items')->find($id);
        $totalQuantityReturned = $order->cancel();

        return response()->json([
            'message' => 'Order cancelled successfully.',
            //  'totalQuantityReturned' => $totalQuantityReturned
        ]);
    }
}