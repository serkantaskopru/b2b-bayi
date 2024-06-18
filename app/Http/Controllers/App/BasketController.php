<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Http\Requests\App\Basket\CreateBasketRequest;
use App\Interfaces\BasketRepositoryInterface;
use App\Interfaces\ImageServiceInterface;
use App\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\Request;
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
        return view('app.pages.basket.view', ['products' => $products]);
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

        $stat = $this->basketService->addProductToCart($product_id, $price, $piece, $images, $description, $order_note);

        if($stat){
            return response()->json(['code' => 88, 'message' => __('Ürün sepete eklendi')], 200, [], JSON_UNESCAPED_UNICODE);
        }

        return response()->json(['code' => 4, 'message' => __('Ürün sepete eklenemedi, bir hata oluştu')], 500, [], JSON_UNESCAPED_UNICODE);
    }

    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        $this->basketService->deleteBasketProduct($id);
        return response()->json(['code' => 88, 'message' => __('Ürün silindi')], 200, [], JSON_UNESCAPED_UNICODE);
    }
}
