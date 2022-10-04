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
                "category" => "Imóvel",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [

                "category" => "Veículos",
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
        DB::table("categories")->insert($this->seedValue);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table("categories")->where('category',array_map(
            function($row){
                return $row["category"];
            },
            $this->seedValue
        ))->delete();
    }
};
