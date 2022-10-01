<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BidModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'value_id',
        'user_id_bid',
        'auction_items_id'
    ];

    //Relations
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function auction_item(){
        return $this->belongsTo(AuctionItemModel::class);
    }
}