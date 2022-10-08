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
                'model'=>'CONVERSÍVEL',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'model'=>'SEDÃ',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'model'=>'SUV',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'model'=>'MINIVAN',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'model'=>'PICAPE',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'model'=>'ESPORTIVO',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'model'=>'SCOOTER',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'model'=>'STREET',
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
