<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Http\Requests\App\Basket\CreateBasketRequest;
use App\Interfaces\BasketRepositoryInterface;
use App\Interfaces\GeozoneRepositoryInterface;
use App\Interfaces\ImageServiceInterface;
use App\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GeozoneController extends Controller
{
    protected GeozoneRepositoryInterface $geozoneService;
    public function __construct(GeozoneRepositoryInterface $geozoneService)
    {
        $this->geozoneService = $geozoneService;
    }
    public function getCities(): false|string
    {
        $cities = $this->geozoneService->getCities();
        return json_encode($cities);
    }
    public function getCounties(Request $request): false|string
    {
        $city_id = $request->input('city_id');
        return json_encode($this->geozoneService->getCounties($city_id));
    }
    public function getDistricts(Request $request): false|string
    {
        $county_id = $request->input('county_id');
        return json_encode($this->geozoneService->getDistricts($county_id));
    }
    public function getNeighbourhoods(Request $request): false|string
    {
        $district_id = $request->input('district_id');
        return json_encode($this->geozoneService->getNeighbourhoods($district_id));
    }
}
