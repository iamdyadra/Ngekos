<?php

namespace App\Models;

use illuminate\Database\Eloquent\factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class category extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'image',
        'name',
        'slug'
    ];

    public function boardingHouses()
    {
        return $this->hasMany(BoardingHouse::class);
    }
}
