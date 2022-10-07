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
                'immobile_id'=>'1',
                #'vehicle_id'=>'',
                'categories_id'=>'1',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'immobile_id'=>'2',
                #'vehicle_id'=>'',
                'categories_id'=>'1',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'immobile_id'=>'3',
                #'vehicle_id'=>'',
                'categories_id'=>'1',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'immobile_id'=>'4',
                #'vehicle_id'=>'',
                'categories_id'=>'1',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'immobile_id'=>'5',
                #'vehicle_id'=>'',
                'categories_id'=>'1',
                "created_at" => now(),
                "updated_at" => now()
            ]
        ];

        $this->seedValue2 = [
            [
               # 'immobile_id'=>'1',
                'vehicle_id'=>'1',
                'categories_id'=>'1',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                #'immobile_id'=>'2',
                'vehicle_id'=>'2',
                'categories_id'=>'2',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                #'immobile_id'=>'3',
                'vehicle_id'=>'3',
                'categories_id'=>'2',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                #'immobile_id'=>'4',
                'vehicle_id'=>'4',
                'categories_id'=>'2',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                #'immobile_id'=>'5',
                'vehicle_id'=>'5',
                'categories_id'=>'2',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                #'immobile_id'=>'',
                'vehicle_id'=>'6',
                'categories_id'=>'2',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                #'immobile_id'=>null,
                'vehicle_id'=>'7',
                'categories_id'=>'2',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                #'immobile_id'=>null,
                'vehicle_id'=>'8',
                'categories_id'=>'2',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                #'immobile_id'=>null,
                'vehicle_id'=>'9',
                'categories_id'=>'2',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                #'immobile_id'=>null,
                'vehicle_id'=>'10',
                'categories_id'=>'2',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                #'immobile_id'=>null,
                'vehicle_id'=>'11',
                'categories_id'=>'2',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                #'immobile_id'=>null,
                'vehicle_id'=>'12',
                'categories_id'=>'2',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                #'immobile_id'=>null,
                'vehicle_id'=>'13',
                'categories_id'=>'2',
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
        DB::table("items")->insert($this->seedValue);
        DB::table("items")->insert($this->seedValue2);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('items_seed');
    }
};
