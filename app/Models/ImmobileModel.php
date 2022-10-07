<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImmobileModel extends Model
{
    use HasFactory;
    protected $table = 'immobiles';

    protected $guarded = [];


    //Relations
    public function item(){
        return $this->hasMany(ItemModel::class);
    }

    public function immobile_type(){
        return $this->belongsTo(ImmobileTypeModel::class);
    }

}
