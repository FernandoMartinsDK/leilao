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
                "type" => "RESIDENCIAL",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "type" => "COMERCIAL",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "type" => "RURAL",
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
        DB::table("immobiles_types")->insert($this->seedValue);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table("immobiles_types")->where('type',array_map(
            function($row){
                return $row["type"];
            },
            $this->seedValue
        ))->delete();
    }
};
