<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemModel extends Model
{
    use HasFactory;
    protected $table = 'items';

    protected $fillable = [
        'immobile_id',
        'vehicle_id',
        'categories_id'
    ];

    public function vehicle(){
        return $this->belongsTo(VehicleModel::class);
    }

    public function immobiles(){
        return $this->belongsTo(ImmobileModel::class);
    }

    public function category(){
        return $this->belongsTo(CategoryModel::class);
    }
}
