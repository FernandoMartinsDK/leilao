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
                'cnpj'=>'07165994000588',
                'name'=>'LMTCred',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'cnpj'=>'02144994008526',
                'name'=>'Omni Banco & Financeira',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'cnpj'=>'08854985001122',
                'name'=>'C.f Cred',
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
        DB::table("financial_institutions")->insert($this->seedValue);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('financial_institutions_seed');
    }
};
