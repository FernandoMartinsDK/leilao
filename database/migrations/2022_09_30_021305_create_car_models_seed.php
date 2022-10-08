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
                "model_car"=>'MODELO-1',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "model_car"=>'MODELO-2',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "model_car"=>'MODELO-3',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "model_car"=>'MODELO-4',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "model_car"=>'MODELO-5',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "model_car"=>'MODELO-6',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "model_car"=>'MODELO-7',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "model_car"=>'MODELO-8',
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
