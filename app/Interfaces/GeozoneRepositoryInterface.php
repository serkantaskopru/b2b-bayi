<?php

namespace App\Interfaces;

interface GeozoneRepositoryInterface
{
    public function getCities(): array;
    public function getCounties($city_id): array;
    public function getDistricts($county_id): array;
    public function getNeighbourhoods($district_id): array;

    public function getCityNameById($id): string;
    public function getCountyNameById($id): string;
    public function getDistrictNameById($id): string;
    public function getNeighbourhoodById($id): string;
}
