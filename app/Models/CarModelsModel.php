<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModelsModel extends Model
{
    use HasFactory;
    protected $table = 'car_models';

    protected $fillable = [
        'model_car',
        'brand_id'
    ];

    public function vehicle(){
        return $this->hasMany(VehicleModel::class);
    }

}
