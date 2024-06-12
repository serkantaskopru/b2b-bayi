<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\ProductRepositoryInterface;

class ProductController extends Controller
{
    protected ProductRepositoryInterface $productService;

    public function __construct(ProductRepositoryInterface $productService)
    {
        $this->productService = $productService;
    }

    public function index(): \Illuminate\Http\JsonResponse
    {
        $products = $this->productService->getAllProducts();
        return response()->json($products);
    }

    public function show($id): \Illuminate\Http\JsonResponse
    {
        $product = $this->productService->getProductById($id);
        return response()->json($product);
    }

    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $product = $this->productService->createProduct($request->all());
        return response()->json($product, 201);
    }

    public function update(Request $request, $id): \Illuminate\Http\JsonResponse
    {
        $product = $this->productService->updateProduct($id, $request->all());
        return response()->json($product);
    }

    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        $this->productService->deleteProduct($id);
        return response()->json(null, 204);
    }
}
