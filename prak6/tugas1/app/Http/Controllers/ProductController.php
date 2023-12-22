<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;
use Exception;

class ProductController extends Controller
{
    public function getAllProducts()
    {
        try {
            $products = Product::all();
            $formattedProducts = ProductResource::collection($products);

            return response()->json([
                'status' => 'success',
                'message' => 'All available products listed',
                'data' => $formattedProducts
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to retrieve products',
                'error' => $e->getMessage()
            ], 400);
        }
    }

    public function getProductByID($id)
    {
        try {
            $product = Product::findOrFail($id);
            $formattedProduct = new ProductResource($product);

            return response()->json([
                'status' => 'success',
                'message' => 'Product details retrieved successfully',
                'data' => $formattedProduct
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to retrieve product details',
                'error' => $e->getMessage()
            ], 400);
        }
    }

    public function createNewProduct(ProductRequest $request)
    {
        $validatedRequest = $request->validated();

        try {
            $createdProduct = Product::create($validatedRequest);
            $formattedProduct = new ProductResource($createdProduct);

            return response()->json([
                'status' => 'success',
                'message' => 'New product created successfully',
                'data' => $formattedProduct
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to create new product',
                'error' => $e->getMessage()
            ], 400);
        }
    }

    public function updateProductDetails(ProductRequest $request, $id)
    {
        $validatedRequest = $request->validated();

        try {
            $product = Product::findOrFail($id);
            $product->update($validatedRequest);
            $formattedProduct = new ProductResource($product);

            return response()->json([
                'status' => 'success',
                'message' => 'Product details updated successfully',
                'data' => $formattedProduct
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to update product details',
                'error' => $e->getMessage()
            ], 400);
        }
    }

    public function removeProduct($id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->delete();
            $formattedProduct = new ProductResource($product);

            return response()->json([
                'status' => 'success',
                'message' => 'Product removed successfully',
                'data' => $formattedProduct
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to remove product',
                'error' => $e->getMessage()
            ], 400);
        }
    }
}
