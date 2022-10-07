<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandModel extends Model
{
    use HasFactory;
    protected $table = 'brands';

    protected $fillable = [
        'name'
    ];

    public function vehicle(){
        return $this->hasMany(VehicleModel::class);
    }

    public function car_model(){
        return $this->belongsTo(CarModelsModel::class);
    }

}
