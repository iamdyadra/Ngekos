<?php 

namespace App\Repositories;

class CityRepository implements CityRepositoryInterface
{
    /**
     * Get all cities.
     *
     * @return array
     */
    public function getAllCities(): array
    {
        // This is a placeholder for the actual implementation.
        // In a real application, this would interact with a database or an external API.
        return [
            ['id' => 1, 'name' => 'New York'],
            ['id' => 2, 'name' => 'Los Angeles'],
            ['id' => 3, 'name' => 'Chicago'],
        ];
    }
}