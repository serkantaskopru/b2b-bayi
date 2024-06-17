<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Http\Requests\App\DealerGroup\CreateDealerGroupRequest;
use App\Http\Requests\App\DealerGroup\UpdateDealerGroupRequest;
use App\Interfaces\DealerGroupRepositoryInterface;

class CartController extends Controller
{
    protected DealerGroupRepositoryInterface $dealerGroupService;
    public function __construct(DealerGroupRepositoryInterface $dealerGroupService)
    {
        $this->dealerGroupService = $dealerGroupService;
    }

    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('app.pages.dealer_group.view');
    }

    public function add(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('app.pages.dealer_group.add');
    }

    public function fetch(): \Illuminate\Http\JsonResponse
    {
        $groups = $this->dealerGroupService->getAllDealerGroups();

        $data = [
            "draw" => 1,
            "recordsTotal" => $groups->count(),
            "recordsFiltered" => $groups->count(),
            "data" => $groups
        ];

        return response()->json($data, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function show($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $group = $this->dealerGroupService->getDealerGroupById($id);
        return view('app.pages.dealer_group.show',['group' => $group]);
    }

    public function store(CreateDealerGroupRequest $request): \Illuminate\Http\JsonResponse
    {
        $dealer = $this->dealerGroupService->createDealerGroup($request->validated());

        if($dealer){
            return response()->json(['code' => 88, 'message' => __('Bayi grubu başarıyla eklendi')], 200, [], JSON_UNESCAPED_UNICODE);
        }

        return response()->json(['code' => 4, 'message' => __('Bayi grubu eklenemedi, bir hata oluştu')], 500, [], JSON_UNESCAPED_UNICODE);
    }

    public function update(UpdateDealerGroupRequest $request, $id): \Illuminate\Http\JsonResponse
    {
        $dealer = $this->dealerGroupService->updateDealerGroup($id, $request->validated());

        if($dealer){

            return response()->json(['code' => 88, 'message' => __('Bayi grubu başarıyla güncellendi')], 200, [], JSON_UNESCAPED_UNICODE);
        }

        return response()->json(['code' => 4, 'message' => __('Bayi grubu güncellenemedi, bir hata oluştu')], 500, [], JSON_UNESCAPED_UNICODE);
    }

    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        $this->dealerGroupService->deleteDealerGroup($id);
        return response()->json(['code' => 88, 'message' => __('Bayi grubu silindi')], 200, [], JSON_UNESCAPED_UNICODE);
    }
}
