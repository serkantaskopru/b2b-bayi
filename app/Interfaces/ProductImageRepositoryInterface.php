<?php

namespace App\Interfaces;

interface ProductImageRepositoryInterface
{
    public function deleteProductImage(int $productImageId);
    public function createProductImage(array $productImageDetails);
    public function updateProductImage(int $productImageId, array $productImageDetails);
}
