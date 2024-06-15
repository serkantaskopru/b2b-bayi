<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Http\Requests\App\Product\UpdateProductCategoryRequest;
use App\Interfaces\ImageServiceInterface;
use App\Interfaces\ProductImageRepositoryInterface;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use App\Interfaces\ProductRepositoryInterface;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    protected ProductRepositoryInterface $productService;
    protected ImageServiceInterface $imageService;
    protected ProductImageRepositoryInterface $productImageService;
    public function __construct(ProductRepositoryInterface $productService, ImageServiceInterface $imageService, ProductImageRepositoryInterface $productImageService)
    {
        $this->productService = $productService;
        $this->imageService = $imageService;
        $this->productImageService = $productImageService;
    }

    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('app.pages.product.view');
    }

    public function fetch(): \Illuminate\Http\JsonResponse
    {
        $products = $this->productService->getAllProducts();

        $data = [
            "draw" => 1,
            "recordsTotal" => $products->count(),
            "recordsFiltered" => $products->count(),
            "data" => $products
        ];

        return response()->json($data, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function show($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $product = $this->productService->getProductById($id);
        $categories = ProductCategory::all();
        return view('app.pages.product.show',['product' => $product, 'categories' => $categories]);
    }

    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $product = $this->productService->createProduct($request->all());
        return response()->json($product, 201);
    }

    public function update(UpdateProductCategoryRequest $request, $id): \Illuminate\Http\JsonResponse
    {
        $image = $request->file('image');

        $product = $this->productService->updateProduct($id, $request->validated());

        if($product){

            if($request->hasFile('image')){
                $uploadResult = $this->imageService->uploadImage($image, 'images', Str::slug($image->getClientOriginalName()) . "-" . Str::random(6), "webp", [1920, 1080]);
                $this->productService->updateProduct($id, [
                    'image' => $uploadResult['path']
                ]);
            }

            if($request->hasFile('images')){
                foreach ($request->file('images') as $imageFile) {
                    $uploadResult = $this->imageService->uploadImage($imageFile, 'product-images', Str::slug($imageFile->getClientOriginalName()) . "-" . Str::random(6), "webp", [1920, 1080]);
                    if ($uploadResult) {
                        $this->productImageService->createProductImage([
                            'product_id' => $id,
                            'image_path' => $uploadResult['path'],
                        ]);
                    }
                }
            }

            if ($request->has('categories')) {
                $product->categories()->sync($request->input('categories'));
            }

            return response()->json(['code' => 88, 'message' => __('Ürün başarıyla güncellendi')], 200, [], JSON_UNESCAPED_UNICODE);
        }

        return response()->json(['code' => 4, 'message' => __('Ürün güncellenemedi, bir hata oluştu')], 500, [], JSON_UNESCAPED_UNICODE);
    }

    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        $this->productService->deleteProduct($id);
        return response()->json(['code' => 88, 'message' => __('Ürün silindi')], 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function destroyProductImage($id): \Illuminate\Http\JsonResponse
    {
        $this->productImageService->deleteProductImage($id);
        return response()->json(['code' => 88, 'message' => __('Ürün görseli silindi')], 200, [], JSON_UNESCAPED_UNICODE);
    }
}
