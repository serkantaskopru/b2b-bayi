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
    public function addProductToCart(int $product_id, float|int $price, ?int $piece = 1, ?array $images = null, ?string $description = null, ?string $order_note = null): array
    {
        $product = Product::find($product_id);
        if(empty($product)){
            return [
                'code' => 120001,
                'message' => __('Sepete eklemek istediğiniz ürün bulunamadı.'),
                'status' => 500
            ];
        }

        if($piece > $product->stock){
            return [
                'code' => 120002,
                'message' => __('Sepetinize eklediğiniz ['. $product->name . ' / '. $product->model . '] ürününün stoğu almak istediğiniz adet kadar mevcut değil.'),
                'status' => 500
            ];
        }
        if($piece == 0){
            return [
                'code' => 120003,
                'message' => __('Sepete ürün eklemek için adet sayısı en az 1 olmalıdır.'),
                'status' => 500
            ];
        }

        DB::beginTransaction();
        try{
            $basket = $this->getAuthUserBasket();
            BasketProduct::create([
                'basket_id' => $basket->id,
                'product_id' => $product_id,
                'piece' => $piece,
                'price' => $price,
                'description' => $description,
                'order_note' => $order_note,
                'images' => $images,
            ]);
            DB::commit();
            return [
                'code' => 88,
                'message' => __('Ürün sepete eklendi.'),
                'status' => 200
            ];
        }catch (\Exception $exception){
            DB::rollBack();
            return [
                'code' => 120009,
                'message' => __('Ürün sepete eklenirken bir hata oluştu.'),
                'status' => 500
            ];
        }
    }

    public function deleteBasketProduct($product_id): void
    {
        BasketProduct::destroy($product_id);
    }

    public function clearAuthUserBasket(): void{
        $basket = $this->getAuthUserBasket();
        $products = $basket->products;
        foreach($products as $product){
            $this->deleteBasketProduct($product->id);
        }
    }
}
