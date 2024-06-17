<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Http\Requests\App\Personnel\CreatePersonnelRequest;
use App\Http\Requests\App\Personnel\UpdatePersonnelRequest;
use App\Interfaces\PersonnelRepositoryInterface;

class PersonnelController extends Controller
{
    protected PersonnelRepositoryInterface $personnelService;
    public function __construct(PersonnelRepositoryInterface $personnelService)
    {
        $this->personnelService = $personnelService;
    }

    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('app.pages.personnel.view');
    }

    public function add(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('app.pages.personnel.add');
    }

    public function fetch(): \Illuminate\Http\JsonResponse
    {
        $personnels = $this->personnelService->getAllPersonnels();

        $data = [
            "draw" => 1,
            "recordsTotal" => $personnels->count(),
            "recordsFiltered" => $personnels->count(),
            "data" => $personnels
        ];

        return response()->json($data, 200, [], JSON_UNESCAPED_UNICODE);
    }

    public function show($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $personnel = $this->personnelService->getPersonnelById($id);
        return view('app.pages.personnel.show',['personnel' => $personnel]);
    }

    public function store(CreatePersonnelRequest $request): \Illuminate\Http\JsonResponse
    {
        $dealer = $this->personnelService->createPersonnel($request->validated());

        if($dealer){
            return response()->json(['code' => 88, 'message' => __('Personel başarıyla eklendi')], 200, [], JSON_UNESCAPED_UNICODE);
        }

        return response()->json(['code' => 4, 'message' => __('Personel eklenemedi, bir hata oluştu')], 500, [], JSON_UNESCAPED_UNICODE);
    }

    public function update(UpdatePersonnelRequest $request, $id): \Illuminate\Http\JsonResponse
    {
        $dealer = $this->personnelService->updatePersonnel($id, $request->validated());

        if($dealer){

            return response()->json(['code' => 88, 'message' => __('Personel başarıyla güncellendi')], 200, [], JSON_UNESCAPED_UNICODE);
        }

        return response()->json(['code' => 4, 'message' => __('Personel güncellenemedi, bir hata oluştu')], 500, [], JSON_UNESCAPED_UNICODE);
    }

    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        $this->personnelService->deletePersonnel($id);
        return response()->json(['code' => 88, 'message' => __('Personel silindi')], 200, [], JSON_UNESCAPED_UNICODE);
    }
}
