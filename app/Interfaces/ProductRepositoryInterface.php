<?php

namespace App\Interfaces;

interface ProductRepositoryInterface
{
    public function getAllProducts();
    public function getProductById($productId);
    public function deleteProduct($productId);
    public function createProduct(array $productDetails);
    public function updateProduct($productId, array $newDetails);
    public function increaseProductStock($productId, int $amount);
    public function decreaseProductStock($productId, int $amount);
}
