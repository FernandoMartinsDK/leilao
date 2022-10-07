<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuctionModel extends Model
{
    use HasFactory;
    protected $table = 'auctions';

    protected $fillable = [
        'auction_date',
        'financial_institution_id',
        'place_id',
        'categorie_id',
        'open',
        'note'
    ];

    //Relations
    public function auction_item(){
        return $this->hasMany(AuctionItemModel::class);
    }

    public function financial_institution(){
        return $this->belongsTo(FinancialInstitutionsModel::class);
    }

    public function place(){
        return $this->belongsTo(PlaceModel::class);
    }

    public function categorie(){
        return $this->belongsTo(CategoryModel::class);
    }
}
