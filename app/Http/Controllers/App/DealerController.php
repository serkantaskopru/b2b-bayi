<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Http\Requests\App\Dealer\CreateDealerRequest;
use App\Http\Requests\App\Dealer\UpdateDealerRequest;
use App\Interfaces\DealerRepositoryInterface;
use App\Models\DealerGroup;

class DealerController extends Controller
{
    protected DealerRepositoryInterface $dealerService;
    public function __construct(DealerRepositoryInterface $dealerService)
    {
        $this->dealerService = $dealerService;
    }

    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('app.pages.dealer.view');
    }

    public function add(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $groups = DealerGroup::all();
        return view('app.pages.dealer.add',['groups' => $groups]);
    }

    public function fetch(): \Illuminate\Http\JsonResponse
    {
        $dealers = $this->dealerService->getAllDealers();

        $data = [
            "draw" => 1,
            "recordsTotal" => $dealers->count(),
            "recordsFiltered" => $dealers->count(),
            "data" => $dealers
        ];

        return response()->json($data, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function show($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $dealer = $this->dealerService->getDealerById($id);
        $groups = DealerGroup::all();
        return view('app.pages.dealer.show',['dealer' => $dealer, 'groups' => $groups]);
    }

    public function store(CreateDealerRequest $request): \Illuminate\Http\JsonResponse
    {
        $dealer = $this->dealerService->createDealer($request->validated());

        if($dealer){
            return response()->json(['code' => 88, 'message' => __('Bayi başarıyla eklendi')], 200, [], JSON_UNESCAPED_UNICODE);
        }

        return response()->json(['code' => 4, 'message' => __('Bayi eklenemedi, bir hata oluştu')], 500, [], JSON_UNESCAPED_UNICODE);
    }

    public function update(UpdateDealerRequest $request, $id): \Illuminate\Http\JsonResponse
    {
        $dealer = $this->dealerService->updateDealer($id, $request->validated());

        if($dealer){

            return response()->json(['code' => 88, 'message' => __('Bayi başarıyla güncellendi')], 200, [], JSON_UNESCAPED_UNICODE);
        }

        return response()->json(['code' => 4, 'message' => __('Bayi güncellenemedi, bir hata oluştu')], 500, [], JSON_UNESCAPED_UNICODE);
    }

    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        $this->dealerService->deleteDealer($id);
        return response()->json(['code' => 88, 'message' => __('Bayi silindi')], 200, [], JSON_UNESCAPED_UNICODE);
    }
}
