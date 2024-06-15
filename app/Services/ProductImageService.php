<?php

namespace App\Services;

use App\Interfaces\ProductImageRepositoryInterface;
use App\Models\ProductImage;

class ProductImageService implements ProductImageRepositoryInterface
{
    public function deleteProductImage($productImageId): void
    {
        ProductImage::destroy($productImageId);
    }

    public function createProductImage(array $productImageDetails)
    {
        return ProductImage::create($productImageDetails);
    }

    public function updateProductImage($productImageId, array $productImageDetails)
    {
        $productImage = ProductImage::findOrFail($productImageId);
        $productImage->update($productImageDetails);
        return $productImage;
    }
}
