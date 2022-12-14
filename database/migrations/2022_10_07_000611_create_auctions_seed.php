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
                "note" => "Leilão extra",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "auction_date" => now(),
                "categorie_id" => "2",
                "financial_institution_id" => '1',
                "place_id" => "1",
                "open" => "T",
                "note" => "Fruto de ação judicial",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "auction_date" => date('Y-m-11 H:i'),
                "categorie_id" => "2",
                "financial_institution_id" => '3',
                "place_id" => "2",
                "open" => "F",
                "note" => "Veiculos recolhidos pela PRF do estado de SP",
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
        //Schema::dropIfExists('auctions_seed');
    }
};
