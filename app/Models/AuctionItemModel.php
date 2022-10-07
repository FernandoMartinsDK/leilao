<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuctionItemModel extends Model
{
    use HasFactory;
    protected $table = 'auction_items';

    protected $fillable = [
        'item_id',
        'category_id',
        'auction_id',
        'opening_bid',
        'note'
    ];

    //Relations
    public function category(){
        return $this->belongsTo(CategoryModel::class);
    }

    public function bid(){
        return $this->hasMany(BidModel::class);
    }

    public function auction(){
        return $this->belongsTo(AuctionModel::class);
    }

    public function user(){
        return $this->belongsTo(ProfileModel::class);
    }

    public function auction_winner(){
        return $this->belongsTo(AuctionWinnerModel::class);
    }

}
