<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleTypeModel extends Model
{
    use HasFactory;
    protected $table = 'vehicles_types';
    
    protected $fillable = [
        'type'
    ];

    //Relations
    public function vehicle(){
        return $this->hasMany(VehicleModel::class);
    }
}
