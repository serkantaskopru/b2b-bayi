<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Http\Requests\App\ProductCategory\CreateProductCategoryRequest;
use App\Http\Requests\App\ProductCategory\UpdateProductCategoryRequest;
use App\Interfaces\ProductCategoryRepositoryInterface;

class ProductCategoryController extends Controller
{
    protected ProductCategoryRepositoryInterface $productCategoryService;
    public function __construct(ProductCategoryRepositoryInterface $productCategoryService)
    {
        $this->productCategoryService = $productCategoryService;
    }

    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('app.pages.product_category.view');
    }

    public function add(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('app.pages.product_category.add');
    }

    public function fetch(): \Illuminate\Http\JsonResponse
    {
        $categories = $this->productCategoryService->getAllProductCategories();

        $data = [
            "draw" => 1,
            "recordsTotal" => $categories->count(),
            "recordsFiltered" => $categories->count(),
            "data" => $categories
        ];

        return response()->json($data, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function show($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $category = $this->productCategoryService->getProductCategoryById($id);
        return view('app.pages.product_category.show',['category' => $category]);
    }

    public function store(CreateProductCategoryRequest $request): \Illuminate\Http\JsonResponse
    {
        $category = $this->productCategoryService->createProductCategory($request->validated());
        if($category){
            return response()->json(['code' => 88, 'message' => __('Kategori başarıyla eklendi')], 200, [], JSON_UNESCAPED_UNICODE);
        }

        return response()->json(['code' => 4, 'message' => __('Kategori eklenemedi, bir hata oluştu')], 500, [], JSON_UNESCAPED_UNICODE);
    }

    public function update(UpdateProductCategoryRequest $request, $id): \Illuminate\Http\JsonResponse
    {
        $category = $this->productCategoryService->updateProductCategory($id, $request->validated());

        if($category){
            return response()->json(['code' => 88, 'message' => __('Kategori başarıyla güncellendi')], 200, [], JSON_UNESCAPED_UNICODE);
        }

        return response()->json(['code' => 4, 'message' => __('Kategori güncellenemedi, bir hata oluştu')], 500, [], JSON_UNESCAPED_UNICODE);
    }

    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        $this->productCategoryService->deleteProductCategory($id);
        return response()->json(['code' => 88, 'message' => __('Kategori silindi')], 200, [], JSON_UNESCAPED_UNICODE);
    }
}
