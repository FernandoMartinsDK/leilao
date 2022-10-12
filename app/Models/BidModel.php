<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BidModel extends Model
{
    use HasFactory;
    protected $table = 'bids';

    protected $fillable = [
        'user_id',
        'auction_item_id',
        'value_bid'
    ];

    //Relations
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function auction_item(){
        return $this->belongsTo(AuctionItemModel::class);
    }
}