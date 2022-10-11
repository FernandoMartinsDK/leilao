<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private array $seedValue = [];

    public function __construct()
    {
        $this->seedValue = [
            [
                "item_id" => "1",
                "auction_id" => '2',
                "opening_bid" => "5000",
                "minimum_bid" => "400",
                "value_bid" => "5000",
                "note" => "Primeiro leilão",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "item_id" => "2",
                "auction_id" => '1',
                "opening_bid" => "50000",
                "minimum_bid" => "600",
                "value_bid" => "50000",
                "note" => "Segundo Leilão",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "item_id" => "3",
                "auction_id" => '1',
                "opening_bid" => "14000",
                "minimum_bid" => "500",
                "value_bid" => "14000",
                "note" => "Segundo Leilão",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "item_id" => "4",
                "auction_id" => '1',
                "opening_bid" => "17000",
                "minimum_bid" => "200",
                "value_bid" => "17000",
                "note" => "Segundo Leilão",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "item_id" => "5",
                "auction_id" => '1',
                "opening_bid" => "27000",
                "minimum_bid" => "500",
                "value_bid" => "27000",
                "note" => "Segundo Leilão",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "item_id" => "6",
                "auction_id" => '1',
                "opening_bid" => "54000",
                "minimum_bid" => "300",
                "value_bid" => "54000",
                "note" => "Segundo Leilão",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "item_id" => "7",
                "auction_id" => '1',
                "opening_bid" => "27000",
                "minimum_bid" => "400",
                "value_bid" => "27000",
                "note" => "Segundo Leilão",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "item_id" => "8",
                "auction_id" => '1',
                "opening_bid" => "70200",
                "minimum_bid" => "800",
                "value_bid" => "70200",
                "note" => "Segundo Leilão",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "item_id" => "9",
                "auction_id" => '1',
                "opening_bid" => "45000",
                "minimum_bid" => "1000",
                "value_bid" => "45000",
                "note" => "Segundo Leilão",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "item_id" => "10",
                "auction_id" => '1',
                "opening_bid" => "67000",
                "minimum_bid" => "1400",
                "value_bid" => "67000",
                "note" => "Segundo Leilão",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "item_id" => "11",
                "auction_id" => '1',
                "opening_bid" => "347000",
                "minimum_bid" => "400",
                "value_bid" => "347000",
                "note" => "Segundo Leilão",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "item_id" => "12",
                "auction_id" => '1',
                "opening_bid" => "87000",
                "minimum_bid" => "200",
                "value_bid" => "87000",
                "note" => "Segundo Leilão",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "item_id" => "13",
                "auction_id" => '1',
                "opening_bid" => "7000",
                "minimum_bid" => "100",
                "value_bid" => "7000",
                "note" => "Segundo Leilão",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "item_id" => "14",
                "auction_id" => '1',
                "opening_bid" => "69800",
                "minimum_bid" => "1400",
                "value_bid" => "69800",
                "note" => "Segundo Leilão",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "item_id" => "15",
                "auction_id" => '1',
                "opening_bid" => "58200",
                "minimum_bid" => "800",
                "value_bid" => "58200",
                "note" => "Segundo Leilão",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "item_id" => "16",
                "auction_id" => '1',
                "opening_bid" => "23400",
                "minimum_bid" => "400",
                "value_bid" => "23400",
                "note" => "Segundo Leilão",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "item_id" => "17",
                "auction_id" => '1',
                "opening_bid" => "33000",
                "minimum_bid" => "900",
                "value_bid" => "33000",
                "note" => "Segundo Leilão",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "item_id" => "18",
                "auction_id" => '1',
                "opening_bid" => "703200",
                "minimum_bid" => "500",
                "value_bid" => "703200",
                "note" => "Segundo Leilão",
                "created_at" => now(),
                "updated_at" => now()
            ]
        ];

        $this->seedValue2 = [
            [
                "item_id" => "19",
                "auction_id" => '3',
                "opening_bid" => "30000",
                "minimum_bid" => "5000",
                "value_bid" => "703200",
                "note" => "Apreendido em ação judicial",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "item_id" => "20",
                "auction_id" => '3',
                "opening_bid" => "20000",
                "minimum_bid" => "1000",
                "value_bid" => "703200",
                "note" => "Apreendido em ação judicial",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "item_id" => "21",
                "auction_id" => '3',
                "opening_bid" => "25000",
                "minimum_bid" => "1500",
                "value_bid" => "703200",
                "note" => "Apreendido em ação judicial",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "item_id" => "22",
                "auction_id" => '3',
                "opening_bid" => "45000",
                "minimum_bid" => "500",
                "value_bid" => "703200",
                "note" => "Apreendido em ação judicial",
                "created_at" => now(),
                "updated_at" => now()
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
        DB::table("auction_items")->insert($this->seedValue);
        DB::table("auction_items")->insert($this->seedValue2);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('auction_items_seed');
    }
};
