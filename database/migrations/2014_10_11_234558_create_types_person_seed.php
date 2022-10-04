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
                "type" => "Pessoa Fisíca",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [

                "type" => "Pessoa Juridica",
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
        DB::table("types_person")->insert($this->seedValue);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table("types_person")->where('name',array_map(
            function($row){
                return $row["name"];
            },
            $this->seedValue
        ))->delete();
    }
};
