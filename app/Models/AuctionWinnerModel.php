<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuctionWinnerModel extends Model
{
    use HasFactory;
    protected $table = 'auction_winner';

    protected $fillable = [
        'winner_user_id',
        'auctio_lot_id',
        'auction_item_id',
        'purchase_date'
    ];

    //Relations
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function auction_item(){
        return $this->belongsTo(AuctionItemModel::class);
    }

    public function auction(){
        return $this->belongsTo(AuctionModel::class);
    }
}
