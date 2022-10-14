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
                'brand'=>'CHEVROLET',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'brand'=>'FORD',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'brand'=>'HONDA',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'brand'=>'SUZUKI',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'brand'=>'SUBARU',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'brand'=>'NISSAN',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'brand'=>'JEEP',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'brand'=>'KIA',
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
        DB::table("brands")->insert($this->seedValue);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('brands_seed');
    }
};
