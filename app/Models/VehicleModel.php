<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleModel extends Model
{
    use HasFactory;
    protected $table = 'vehicle';

    protected $fillable = [
        'users_id',
        'category_id',
        'license_plate',
        'mileage',
        'direction',
        'shielding',
        'color',
        'fuel',
        'chassi_status',
        'air_conditioning',
        'gas_kit',
        'observation'
    ];

    //Relations

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(CategoryModel::class);
    }

    public function vehicle_type(){
        return $this->belongsTo(VehicleTypeModel::class);
    }
}
