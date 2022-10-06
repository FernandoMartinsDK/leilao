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
                'name'=>'Chevrolet',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'name'=>'Ford',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'name'=>'Honda',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'name'=>'Suzuki',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'name'=>'Subaru',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'name'=>'Nissan',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'name'=>'Jeep',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'name'=>'Kia',
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
