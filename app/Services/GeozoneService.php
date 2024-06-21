<?php

namespace App\Services;

use App\Interfaces\GeozoneRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GeozoneService implements GeozoneRepositoryInterface
{
    /*
     * Şehirler
     */
    public function getCities(): array
    {
        DB::connection('tenant1_database');
        return DB::select('SELECT * FROM geozone_cities');
    }
    /*
     * İlçeler
     */
    public function getCounties($city_id): array
    {
        return DB::select('SELECT * FROM geozone_counties where city_id = '. $city_id);
    }
    /*
     * Belde / köy
     */
    public function getDistricts($county_id): array
    {
        return DB::select('SELECT * FROM geozone_districts where county_id = '. $county_id);
    }
    /*
     * Mahalle
     */
    public function getNeighbourhoods($district_id): array
    {
        return DB::select('SELECT * FROM geozone_neighbourhoods where district_id = '. $district_id);
    }

    public function getCityNameById($id): string
    {
        /*Log::alert(DB::select('SELECT * FROM geozone_cities where id='. $id));*/
        return DB::select('SELECT * FROM geozone_cities where id='. $id)[0]->name;
    }
    public function getCountyNameById($id): string
    {
        return DB::select('SELECT * FROM geozone_counties where id='. $id)[0]->name;
    }
    public function getDistrictNameById($id): string
    {
        return DB::select('SELECT * FROM geozone_districts where id='. $id)[0]->name;
    }
    public function getNeighbourhoodById($id): string
    {
        return DB::select('SELECT * FROM geozone_neighbourhoods where id='. $id)[0]->name;
    }
}
