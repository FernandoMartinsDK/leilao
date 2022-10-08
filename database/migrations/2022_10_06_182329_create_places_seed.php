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
                'name'=>'PATIO NOSSA SENHORA',
                'address'=>'RUA DAS FLORES',
                'district'=> 'PUTIM',
                'city'=>'CAÇAPAVA',
                'cep'=>'12278055',
                'complement'=>'',
                'country'=>'BRASIL',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'name'=>'PATIO DETRAM',
                'address'=>'AV. DONA LURDES',
                'district'=> 'CENTRO',
                'city'=>'JACAREÍ',
                'cep'=>'25278055',
                'complement'=>'',
                'country'=>'BRASIL',
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
