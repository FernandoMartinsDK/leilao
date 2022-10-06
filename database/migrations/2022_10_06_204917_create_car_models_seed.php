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
                "model_car"=>'modelo-1',
                "brand_id"=>'1',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "model_car"=>'modelo-2',
                "brand_id"=>'2',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "model_car"=>'modelo-3',
                "brand_id"=>'4',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "model_car"=>'modelo-4',
                "brand_id"=>'1',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "model_car"=>'modelo-5',
                "brand_id"=>'3',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "model_car"=>'modelo-6',
                "brand_id"=>'2',
                "created_at" => now(),
                "updated_at" => now()
            ],
            
        ];
    }
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table("car_models")->insert($this->seedValue);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_models_seed');
    }
};
