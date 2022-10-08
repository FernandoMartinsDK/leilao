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
                'brand'=>'Chevrolet',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'brand'=>'Ford',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'brand'=>'Honda',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'brand'=>'Suzuki',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'brand'=>'Subaru',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'brand'=>'Nissan',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'brand'=>'Jeep',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'brand'=>'Kia',
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
        Schema::dropIfExists('brands_seed');
    }
};
