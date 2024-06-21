<?php

namespace App\Services;

use App\Interfaces\BasketRepositoryInterface;
use App\Interfaces\GeozoneRepositoryInterface;
use App\Interfaces\OrderRepositoryInterface;
use App\Interfaces\ProductRepositoryInterface;
use App\Models\Order;
use App\Models\OrderProduct;
use App\OrderStatus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

class OrderService implements OrderRepositoryInterface
{
    protected BasketRepositoryInterface $basketService;
    protected GeozoneRepositoryInterface $geozoneService;
    protected ProductRepositoryInterface $productService;
    public function __construct(BasketRepositoryInterface $basketService, GeozoneRepositoryInterface $geozoneService, ProductRepositoryInterface $productService)
    {
        $this->basketService = $basketService;
        $this->geozoneService = $geozoneService;
        $this->productService = $productService;
    }
    /**
     * @throws Throwable
     */
    public function createOrder($data): array
    {
        $data['order_no'] = random_int(10000000, 99999999);
        $data['status'] = OrderStatus::PENDING;
        $data['date'] = now();
        $data['user_id'] = auth()->user()->id;
        $data['dealer_id'] = auth()->user()->dealer->id;

        $basket = $this->basketService->getAuthUserBasket();
        $basket_products = $basket->products;

        if(is_null($basket_products) || count($basket_products) <= 0){
            return [
              'code' => 110001,
              'message' => __('Sepetinizde ürün bulunmuyor'),
              'status' => 500
            ];
        }

        $total_dealer_commission = 0;
        $total_firm_commission = 0;
        $total_price = 0;

        foreach($basket_products as $basket_product){
            $product = $basket_product->product;
            if(empty($product)){
                return [
                    'code' => 110002,
                    'message' => __('Sepetinize eklediğiniz ürünlerden biri artık satışta değil'),
                    'status' => 500
                ];
            }
            $total_dealer_commission += $basket_product->dealerCommission();
            $total_firm_commission += $basket_product->firmCommission();
            $total_price += $basket_product->getSubTotal();
        }

        $data['dealer_commission'] = $total_dealer_commission;
        $data['company_commission'] = $total_firm_commission;
        $data['total'] = $total_price;

        if(!array_key_exists('is_abroad', $data)){
            /*Log::alert($data);*/
            $city = $this->geozoneService->getCityNameById($data['city']);
            $county = $this->geozoneService->getCountyNameById($data['county']);
            $district = $this->geozoneService->getDistrictNameById($data['district']);
            $neighbourhood = $this->geozoneService->getNeighbourhoodById($data['neighbourhood']);
            $data['customer_address'] .= ' - ' . $city . '/'. $county . '/' . $district. '/'. $neighbourhood;
        }

         // Generate and Insert cargo barcode from cargo service
        // send sms if send_sms_to_customer has true or set
        // send mail if send_sms_to_customer has true or set

        DB::beginTransaction();
        try{
            $order = Order::create($data);

            if($order){
                foreach($basket_products as $basket_product){
                    $product = $basket_product->product;
                    if(empty($product)){
                        return [
                            'code' => 110002,
                            'message' => __('Sepetinize eklediğiniz ürünlerden biri artık satışta değil'),
                            'status' => 500
                        ];
                    }
                    $op = OrderProduct::create([
                        'order_id' => $order->id,
                        'product_id' => $product->id,
                        'piece' => $basket_product->piece,
                        'name' => $product->name ?? '#',
                        'image' => $product->image ?? '#',
                        'price' => $basket_product->price,
                        'dealer_sales_price' => $basket_product->price,
                        'total_sales_price' => $basket_product->getSubTotal(),
                        'dealer_commission' => $basket_product->dealerCommission(),
                        'company_commission' => $basket_product->firmCommission(),
                        'description' => $basket_product->description ?? '',
                        'product_note' => $basket_product->order_note ?? '',
                    ]);
                    if($op){
                        if(!$this->productService->decreaseProductStock($product->id, $basket_product->piece)){
                            return [
                                'code' => 110003,
                                'message' => __('Sepetinize eklediğiniz ['. $product->name . ' / '. $product->model . '] ürününün stoğu almak istediğiniz adet kadar mevcut değil.'),
                                'status' => 500
                            ];
                        }
                    }
                }
            }
            // Clear basket after order
            $this->basketService->clearAuthUserBasket();
            DB::commit();
        }catch (\Exception $exception){
            Log::error($exception);
            DB::rollBack();
            return [
                'code' => 110009,
                'message' => __('Sipariş esnasında bilinmeyen bir hata oluştu.'),
                'status' => 500
            ];
        }
        return [
            'code' => 88,
            'message' => __('Siparişiniz başarıyla oluşturuldu'),
            'status' => 200
        ];
    }
}
