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
                "auction_date" => now(),
                "categorie_id" => "1",
                "financial_institution_id" => '1',
                "place_id" => "2",
                "open" => "T",
                "note" => "Primeiro leilão",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "auction_date" => now(),
                "categorie_id" => "2",
                "financial_institution_id" => '1',
                "place_id" => "2",
                "open" => "T",
                "note" => "Primeiro leilão",
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
        DB::table("auctions")->insert($this->seedValue);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auctions_seed');
    }
};
