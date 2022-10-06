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
                'name'=>'Patio Zonalopolis',
                'address'=>'Rua das flores',
                'district'=> 'Putim',
                'city'=>'Caçapava',
                'cep'=>'12278055',
                'complement'=>'',
                'country'=>'Brasil',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'name'=>'Patio Detram',
                'address'=>'Av. Lurdes Santos',
                'district'=> 'Centro',
                'city'=>'Jacareí',
                'cep'=>'25278055',
                'complement'=>'',
                'country'=>'Brasil',
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
        DB::table("places")->insert($this->seedValue);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('places_seed');
    }
};
