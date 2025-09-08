<?php 

namespace App\Repositories;

use App\Interfaces\BoardingHouseRepositoryInterface;
use App\Models\BoardingHouse;
use Filament\Forms\Components\Builder;


class BoardingHouseRepository implements BoardingHouseRepositoryInterface
{ 
   public function getAllBoardingHouses($search = null, $city = null, $category = null)
   {
      $query = BoardingHouse::query();

      //ketika search ada isinya maka jalankan query ini
      if ($search) {
         $query->where('name', 'like', '%' . $search . '%');
      }

      //ketika city ada isinya maka dia akan mencari berdasarkan slug citynya
      if ($city) {
         $query->whereHas('City', function (Builder $query) use ($city) {
            $query->where('slug', $city);
         });
      }

      //ketika category ada isinya maka dia akan mencari berdasarkan slug categorynya
      if ($category) {
         $query->whereHas('Category', function (Builder $query) use ($category) {
            $query->where('slug', $category);
         });
      }

      return $query->get();
   }

   public function getPopularBoardingHouses($limit = 5)
   {
      return BoardingHouse::withCount('transactions')
         ->orderBy('transactions_count', 'desc')
         ->take($limit)
         ->get();
   }

   public function getBoardingHouseByCitySlug($slug)
   {
      return BoardingHouse::whereHas('City', function (Builder $query) use ($slug) {
         $query->where('slug', $slug);
      })->get();
   }

   public function getBoardingHouseByCategorySlug($slug)
   {
      return BoardingHouse::whereHas('Category', function (Builder $query) use ($slug) {
         $query->where('slug', $slug);
      })->get();
   }

   public function getBoardingHouseBySlug($slug)
   {
      return BoardingHouse::where('slug', $slug)->first();
   }
}