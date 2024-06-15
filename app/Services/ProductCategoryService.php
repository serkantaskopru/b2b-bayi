<?php

namespace App\Services;

use App\Interfaces\ProductCategoryRepositoryInterface;
use App\Models\ProductCategory;

class ProductCategoryService implements ProductCategoryRepositoryInterface
{
    public function getAllProductCategories(): \Illuminate\Database\Eloquent\Collection
    {
        return ProductCategory::all();
    }

    public function getProductCategoryById($categoryId)
    {
        return ProductCategory::findOrFail($categoryId);
    }

    public function deleteProductCategory($categoryId): void
    {
        ProductCategory::destroy($categoryId);
    }

    public function createProductCategory(array $categoryDetails)
    {
        return ProductCategory::create($categoryDetails);
    }

    public function updateProductCategory($categoryId, array $categoryDetails)
    {
        $category = ProductCategory::findOrFail($categoryId);
        $category->update($categoryDetails);
        return $category;
    }
}
