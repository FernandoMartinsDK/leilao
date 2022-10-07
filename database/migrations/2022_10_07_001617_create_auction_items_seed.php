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
                "category_id" => "1",
                "auction_id" => '2',
                "opening_bid" => "5000",
                "note" => "Primeiro leilão",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "item_id" => "2",
                "category_id" => "1",
                "auction_id" => '1',
                "opening_bid" => "7000",
                "note" => "Segundo Leilão",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "item_id" => "3",
                "category_id" => "1",
                "auction_id" => '1',
                "opening_bid" => "7000",
                "note" => "Segundo Leilão",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "item_id" => "1",
                "category_id" => "2",
                "auction_id" => '1',
                "opening_bid" => "7000",
                "note" => "Segundo Leilão",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "item_id" => "2",
                "category_id" => "2",
                "auction_id" => '1',
                "opening_bid" => "7000",
                "note" => "Segundo Leilão",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "item_id" => "3",
                "category_id" => "2",
                "auction_id" => '1',
                "opening_bid" => "7000",
                "note" => "Segundo Leilão",
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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auction_items_seed');
    }
};
