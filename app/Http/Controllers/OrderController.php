<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function makeOrders (Request $request) {

        $user = Auth::user();
        if ($user->is_admin === true) {
            return response()->json(['error' => 'Admins are not allowed to make orders'], 403);
        }

        // Validate the incoming request
        $validatedData = $request->validate([
            'items' => 'required|array',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
            'delivery_address' => 'required|string|max:255',
            'type' => 'required|string|in:pickup,delivery',
            'scheduled_date' => 'date|after_or_equal:today', // Optional scheduled date
        ]);

        // Calculate the total cost of the order
        $total = 0;
        foreach ($validatedData['items'] as $item) {
            $product = Product::find($item['product_id']);
            $total += $product->price * $item['quantity'];
        }

        // Create the order
        $order = Order::create([
            'user_id' => $user->id,
            'delivery_address' => $validatedData['delivery_address'],
            'status' => 'pending',
            'type' => $validatedData['type'],
            'total' => $total,
            'scheduled_date' => $validatedData['scheduled_date'], // Store the scheduled date if provided
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

        // Return a success response
        return response()->json([
            'status' => 201,
            'message' => 'Order created successfully',
            'order' => $order->load('items.product'), // Include items and product details in the response
        ], 201);

    }

    public function userOrders()
    {
        $user = Auth::user();
        if ($user->is_admin === true) {
            return response()->json(['error' => 'Admins are not allowed to see its own order'], 403);
        }

        $orders = Order::where('user_id', Auth::id())->with('items.product')->get();

        return response()->json([
            'message' => 'User orders retrieved successfully',
            'orders' => $orders,
        ], 200);
    }

    // Get all orders (Admin)
    public function allOrders()
    {
        $orders = Order::with('user', 'items.product')->get();

        return response()->json([
            'message' => 'All orders retrieved successfully',
            'orders' => $orders,
        ], 200);
    }

    public function searchOrders(Request $request)
    {
        // Validate the search query
        $validatedData = $request->validate([
            'query' => 'required|string|max:255',
        ]);

        $query = $validatedData['query'];

        // Search for orders by user name
        $orders = Order::whereHas('user', function ($q) use ($query) {
            $q->where('name', 'LIKE', "%{$query}%");
        })->with('user', 'items.product')->get();

        // Return the search results
        return response()->json([
            'status' => 200,
            'message' => 'Search results retrieved successfully',
            'data' => $orders,
        ]);
    }

    public function updateOrderStatus(Request $request, $orderId)
{
    $user = Auth::user();
    if (!$user->is_admin) {
        return response()->json(['error' => 'Only admins can update order status'], 403);
    }

    $validatedData = $request->validate([
        'status' => 'required|string',
    ]);

    $order = Order::find($orderId);
    if (!$order) {
        return response()->json(['error' => 'Order not found'], 404);
    }

    $order->status = $validatedData['status'];
    $order->save();

    return response()->json([
        'message' => 'Order status updated successfully',
    ]);
}
}
