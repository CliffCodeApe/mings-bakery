<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function makeOrders (Request $request) {
        $validatedData = $request->validate([
            'items' => 'required|array',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
            'address' => 'required|string|max:255',
            'type' => 'required|string',
        ]);

        $total = 0;
        foreach ($validatedData['items'] as $item) {
            $product = Product::find($item['product_id']);
            $total += $product->price * $item['quantity'];
        }

        // Create the order
        $order = Order::create([
            'user_id' => Auth::id(),
            'address' => $validatedData['address'],
            'status' => 'pending',
            'type' => $validatedData['type'],
            'total' => $total, // Provide the calculated total
        ]);

        // Add items to the order
        foreach ($validatedData['items'] as $item) {
            $product = Product::find($item['product_id']);
            $order->items()->create([
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'unit_price' => $product->price, // Store the product price at the time of order
            ]);
        }

        return response()->json([
            'status' => 201,
            'message' => 'Order created successfully',
            'order' => $order->load('items.product'), // Include items and product details in the response
        ], 201);
    }

    public function userOrders()
    {
        $orders = Order::where('user_id', Auth::id())->with('items.product')->get();

        return response()->json([
            'message' => 'User orders retrieved successfully',
            'orders' => $orders,
        ], 200);
    }

    // Get all orders (Admin)
    public function allOrders()
    {
        $orders = Order::with('users', 'items.product')->get();

        return response()->json([
            'message' => 'All orders retrieved successfully',
            'orders' => $orders,
        ], 200);
    }
}
