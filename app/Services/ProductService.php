<?php

namespace App\Services;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;

class ProductService implements ProductRepositoryInterface
{
    public function getAllProducts(): \Illuminate\Database\Eloquent\Collection
    {
        return Product::all();
    }

    public function getProductById($productId)
    {
        return Product::findOrFail($productId);
    }

    public function deleteProduct($productId): void
    {
        Product::destroy($productId);
    }

    public function createProduct(array $productDetails)
    {
        return Product::create($productDetails);
    }

    public function updateProduct($productId, array $newDetails)
    {
        $product = Product::findOrFail($productId);
        $product->update($newDetails);
        return $product;
    }

    public function increaseProductStock($productId, int $amount): bool
    {
        $product = Product::findOrFail($productId);
        $product->stock += $amount;
        return $product->save();
    }

    public function decreaseProductStock($productId, int $amount): bool
    {
        $product = Product::findOrFail($productId);

        if ($product->stock < $amount) {
            return false;
        }

        $product->stock -= $amount;
        return $product->save();
    }
}
