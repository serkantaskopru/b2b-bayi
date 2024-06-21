<?php

namespace App\Interfaces;

interface BasketRepositoryInterface
{
    public function getAuthUserBasket();
    public function addProductToCart(int $product_id, float|int $price, ?int $piece = 1, ?array $images = null, ?string $description = null, ?string $order_note = null);
    public function deleteBasketProduct(int $product_id);
    public function clearAuthUserBasket();
}
