<?php

namespace App\Services;

use App\Interfaces\BasketRepositoryInterface;
use App\Models\Basket;
use App\Models\BasketProduct;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Throwable;

class BasketService implements BasketRepositoryInterface
{
    public function getAuthUserBasket(){
        $user = auth()->user();
        return Basket::firstOrCreate(
            ['user_id' => $user->id],
            ['user_id' => $user->id]
        );
    }

    /**
     * @throws Throwable
     */
    public function addProductToCart(int $product_id, float|int $price, ?int $piece = 1, ?array $images = null, ?string $description = null, ?string $order_note = null): bool
    {
        $product = Product::find($product_id);
        if(empty($product))
            return false;

        DB::beginTransaction();
        try{
            $basket = $this->getAuthUserBasket();
            $basketProduct = BasketProduct::create([
                'basket_id' => $basket->id,
                'product_id' => $product_id,
                'piece' => $piece,
                'price' => $price,
                'description' => $description,
                'order_note' => $order_note,
                'images' => $images,
            ]);
            DB::commit();
            return true;
        }catch (\Exception $exception){
            DB::rollBack();
        }
        return false;
    }

    public function deleteBasketProduct($product_id): void
    {
        BasketProduct::destroy($product_id);
    }
}
