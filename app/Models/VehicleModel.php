<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleModel extends Model
{
    use HasFactory;
    protected $table = 'vehicles';

    protected $guarded = [];

    //Relations

    public function vehicle_models(){
        return $this->belongsTo(VehicleModelsModel::class);
    }

    public function vehicle_type(){
        return $this->belongsTo(VehicleTypeModel::class);
    }

    public function brand(){
        return $this->belongsTo(BrandModel::class);
    }

    public function item(){
        return $this->hasMany(ItemModel::class);
    }
}
