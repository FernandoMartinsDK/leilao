<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleModelsModel extends Model
{
    use HasFactory;
    protected $table = 'vehicles_models';

    protected $guarded = [];

    //Relations
    public function vehicle_models(){
        return $this->hasMany(VehicleModel::class);
    }
}
