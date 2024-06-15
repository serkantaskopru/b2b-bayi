<?php

namespace App\Interfaces;

interface ProductCategoryRepositoryInterface
{
    public function getAllProductCategories();
    public function getProductCategoryById($categoryId);
    public function deleteProductCategory($categoryId);
    public function createProductCategory(array $categoryDetails);
    public function updateProductCategory($categoryId, array $categoryDetails);
}
