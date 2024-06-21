<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Http\Requests\App\Basket\CreateBasketRequest;
use App\Interfaces\BasketRepositoryInterface;
use App\Interfaces\ImageServiceInterface;
use App\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;

class BasketController extends Controller
{
    protected BasketRepositoryInterface $basketService;
    protected ProductRepositoryInterface $productService;
    protected ImageServiceInterface $imageService;
    public function __construct(BasketRepositoryInterface $basketService, ProductRepositoryInterface $productService, ImageServiceInterface $imageService)
    {
        $this->basketService = $basketService;
        $this->productService = $productService;
        $this->imageService = $imageService;
    }

    public function view(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $products = $this->basketService->getAuthUserBasket()->products;
        $total_dealer_commision = 0;
        $total_firm_commision = 0;
        $total_price = 0;
        foreach($products as $basket_product){
            $total_dealer_commision += $basket_product->dealerCommission();
            $total_firm_commision += $basket_product->firmCommission();
            $total_price += $basket_product->getSubTotal();
        }
        return view('app.pages.basket.view', [
            'products' => $products,
            'total_dealer_commision' => $total_dealer_commision,
            'total_firm_commision' => $total_firm_commision,
            'total_price' => $total_price,
        ]);
    }

    public function add(Request $request, $product_id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $product = $this->productService->getProductById($product_id);
        return view('app.pages.basket.add', ['product' => $product]);
    }

    public function addToBasket(CreateBasketRequest $request): \Illuminate\Http\JsonResponse
    {
        $product_id = $request->input('product_id');
        $piece = $request->input('piece');
        $price = $request->input('price');
        $description = $request->input('description');
        $order_note = $request->input('order_note');

        $images = [];

        if($request->hasFile('images')){
            foreach ($request->file('images') as $imageFile) {
                $uploadResult = $this->imageService->uploadImage($imageFile, 'order-images', Str::slug($imageFile->getClientOriginalName()) . "-" . Str::random(6), "webp", [1920, 1080]);
                if ($uploadResult) {
                    $images[] = $uploadResult['path'];
                }
            }
        }

        $status = $this->basketService->addProductToCart($product_id, $price, $piece, $images, $description, $order_note);
        return Response::json(['code' => $status['code'], 'message' => $status['message']], $status['status'], [], JSON_UNESCAPED_UNICODE);
    }

    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        $this->basketService->deleteBasketProduct($id);
        return response()->json(['code' => 88, 'message' => __('Ürün silindi')], 200, [], JSON_UNESCAPED_UNICODE);
    }
}
