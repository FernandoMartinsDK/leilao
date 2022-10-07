<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    use HasFactory;
    protected $table = 'categories';

    protected $fillable = [
        'category'
    ];

    //Relations
    public function immobile(){
        return $this->hasMany(ImmobileModel::class);
    }

    public function auction(){
        return $this->hasMany(AuctionModel::class);
    }
}
