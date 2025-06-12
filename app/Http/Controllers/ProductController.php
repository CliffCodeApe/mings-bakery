<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;


class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return response()->json([
            'status' => 200,
            'message' => 'List of products',
            'data' => $product
        ]);
    }

    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        return response()->json([
            'status' => 200,
            'message' => "Details of product with ID: $id",
            'data' => $product
        ]);
    }

    public function getImage($imageName)
    {
        $imagePath = public_path('images/' . $imageName);

        if (!file_exists($imagePath)) {
            return response()->json(['message' => 'Image not found'], 404);
        }

        return response()->file($imagePath);
    }

    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validatedData->fails()) {
            return response()->json($validatedData->errors()->toJson(), 422);
        }

        $validatedData = $request->only(['name', 'description', 'price', 'category']);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $imageName = rand(100000, 999999) . '.' . $extension;
            $image->move(public_path('images'), $imageName);
            $validatedData['image_url'] = config('app.url') . '/api/products/images/' . $imageName;
        } else {
            $validatedData['image_url'] = null;
        }

        $validatedData['price'] = (int) $validatedData['price'];

        $product = Product::create($validatedData);

        return response()->json([
            'status' => 201,
            'message' => 'Product created successfully',
            'data' => $product,
        ]);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $validatedData = Validator::make($request->all(), [
            'name' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'price' => 'sometimes|integer',
            'category' => 'sometimes|string',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validatedData->fails()) {
            return response()->json($validatedData->errors()->toJson(), 422);
        }

        $validatedData = $request->only(['name', 'description', 'price', 'category']);

        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($product->image_url) {
                $oldImagePath = public_path('images/' . basename($product->image_url));
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Handle the new image upload
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $imageName = rand(100000, 999999) . '.' . $extension;
            $image->move(public_path('images'), $imageName);
            $validatedData['image_url'] = config('app.url') . '/api/products/images/' . $imageName;
        } else {
            $validatedData['image_url'] = $product->image_url;
        }

        if (isset($validatedData['price'])) {
            $validatedData['price'] = (int) $validatedData['price'];
        }

        $product->update($validatedData);

        return response()->json([
            'status' => 200,
            'message' => "Product $product->name updated successfully",
            'data' => $product,
        ]);
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $image = public_path('images/' . basename($product->image_url));
        if ($product->image_url && file_exists($image)) {
            unlink($image);
        }

        $product->delete();
        return response()->json([
            'status' => 200,
            'message' => "Product with ID: $id deleted successfully"
        ]);
    }

    public function search (Request $request) {
        // Validate the search query
        $validatedData = $request->validate([
            'query' => 'sometimes|string|max:255',
            'category' => 'sometimes|string|max:255',
        ]);

        $productsQuery = Product::query();

        if (!empty($validatedData['query'])) {
            $productsQuery->where(function ($query) use ($validatedData) {
                $query->where('name', 'LIKE', "%{$validatedData['query']}%");
            });
        }

        // Apply the category filter if provided
        if (!empty($validatedData['category'])) {
            $productsQuery->where('category', $validatedData['category']);
        }

        // Execute the query and get the results
        $products = $productsQuery->get();

        // Return the search results
        return response()->json([
            'status' => 200,
            'message' => 'Search results retrieved successfully',
            'data' => $products,
        ]);
    }
}
