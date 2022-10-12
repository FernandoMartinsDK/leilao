<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private array $seedValue1 = [];

    public function __construct()
    {
        $this->seedValue1 = [
            [
                "winner_user_id" => '4',
                "auctio_lot_id" => "3",
                "auction_item_id" => '19',
                "created_at" => date('Y-m-10 H:i:s'),
                "updated_at" => date('Y-m-10 H:i:s')
            ],
            [
                "winner_user_id" => '4',
                "auctio_lot_id" => "3",
                "auction_item_id" => '20',
                "created_at" => date('Y-m-10 H:i:s'),
                "updated_at" => date('Y-m-10 H:i:s')
            ],
            [
                "winner_user_id" => '2',
                "auctio_lot_id" => "3",
                "auction_item_id" => '21',
                "created_at" => date('Y-m-10 H:i:s'),
                "updated_at" => date('Y-m-10 H:i:s')
            ],
            [
                "winner_user_id" => '3',
                "auctio_lot_id" => "3",
                "auction_item_id" => '22',
                "created_at" => date('Y-m-10 H:i:s'),
                "updated_at" => date('Y-m-10 H:i:s')
            ]
        ];
    }
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table("auction_winner")->insert($this->seedValue1);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('auction_winner_seed');
    }
};
