<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaceModel extends Model
{
    use HasFactory;
    protected $table = 'places';

    protected $fillable = [
        'address',
        'district',
        'city',
        'cep',
        'country',
        'complement',
        'name'
    ];

    //Relations
    public function auction(){
        return $this->hasMany(AuctionModel::class);
    }
}
