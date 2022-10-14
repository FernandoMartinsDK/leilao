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
                'user_id'=>'1',
                'address'=>'RUA CORONEL MARCOS',
                'cep'=>'12270555',
                'number'=>'34',
                'complement'=>'APT 23',
                'district'=>'DISTRICT',
                'city'=>'SÃO JOSE DOS CAMPOS',
                'state'=>'SP',
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
        DB::table("address")->insert($this->seedValue);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('address_seed');
    }
};
