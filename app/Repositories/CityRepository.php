<?php 

namespace App\Repositories;

use App\Repositories\CityRepositoryInterface;
use App\Models\City;
class CityRepository implements CityRepositoryInterface
{ 
    public function getAllCities()
    {
    return City::all();
    }
}