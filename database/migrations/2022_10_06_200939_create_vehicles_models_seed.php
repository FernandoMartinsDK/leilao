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
                'vehicle_type_id'=>'1',
                'model'=>'Conversível',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'vehicle_type_id'=>'1',
                'model'=>'Sedã',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'vehicle_type_id'=>'1',
                'model'=>'SUV',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'vehicle_type_id'=>'1',
                'model'=>'Minivan',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'vehicle_type_id'=>'1',
                'model'=>'Picape',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'vehicle_type_id'=>'2',
                'model'=>'Esportiva',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'vehicle_type_id'=>'2',
                'model'=>'Scooter',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'vehicle_type_id'=>'2',
                'model'=>'Street',
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
        DB::table("vehicles_models")->insert($this->seedValue);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles_models_seed');
    }
};
