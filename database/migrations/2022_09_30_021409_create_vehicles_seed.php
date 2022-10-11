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
                "car_model_id"=>"2",
                "brand_id" => "1",
                "vehicles_model_id" => "8",
                "vehicle_type_id" => '1',
                "license_plate" => "HSH-9161",
                "direction" => "MANUAL",
                "mileage" => "5896",
                "shielding" => "F",
                "color"=>"PRETO",
                "fuel"=>"PRETO",
                "chassi_status"=>"INTACTO",
                "air_conditioning"=>"F",
                "gas_kit"=>"F",
                "observation"=>"",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "car_model_id"=>"8",
                "brand_id" => "2",
                "vehicles_model_id" => "7",
                "vehicle_type_id" => '1',
                "license_plate" => "HST-8833",
                "direction" => "MANUAL",
                "mileage" => "5000",
                "shielding" => "F",
                "color"=>"BRANCO",
                "fuel"=>"PRETO",
                "chassi_status"=>"INTACTO",
                "air_conditioning"=>"V",
                "gas_kit"=>"F",
                "observation"=>"",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "car_model_id"=>"1",
                "brand_id" => "3",
                "vehicles_model_id" => "6",
                "vehicle_type_id" => '2',
                "license_plate" => "NEX-1920",
                "direction" => "MANUAL",
                "mileage" => "136",
                "shielding" => "F",
                "color"=>"VERDE",
                "fuel"=>"PRETO",
                "chassi_status"=>"RISCADO",
                "air_conditioning"=>"V",
                "gas_kit"=>"V",
                "observation"=>"",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "car_model_id"=>"3",
                "brand_id" => "4",
                "vehicles_model_id" => "5",
                "vehicle_type_id" => '2',
                "license_plate" => "HVA-4996",
                "direction" => "AUTOMÁTICO",
                "mileage" => "95005",
                "shielding" => "V",
                "color"=>"PRETO",
                "fuel"=>"GÁS NATURAL",
                "chassi_status"=>"AMASSADO",
                "air_conditioning"=>"V",
                "gas_kit"=>"V",
                "observation"=>"",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "car_model_id"=>"7",
                "brand_id" => "5",
                "vehicles_model_id" => "4",
                "vehicle_type_id" => '1',
                "license_plate" => "MXH-9621",
                "direction" => "AUTOMÁTICO",
                "mileage" => "5544",
                "shielding" => "F",
                "color"=>"AMARELO",
                "fuel"=>"ÁLCOOL ",
                "chassi_status"=>"BATIDO",
                "air_conditioning"=>"F",
                "gas_kit"=>"F",
                "observation"=>"",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "car_model_id"=>"5",
                "brand_id" => "6",
                "vehicles_model_id" => "3",
                "vehicle_type_id" => '1',
                "license_plate" => "HFF-6574",
                "direction" => "AUTOMÁTICO",
                "mileage" => "800",
                "shielding" => "F",
                "color"=>"VERDE",
                "fuel"=>"ÁLCOOL",
                "chassi_status"=>"BATIDO",
                "air_conditioning"=>"F",
                "gas_kit"=>"F",
                "observation"=>"",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "car_model_id"=>"4",
                "brand_id" => "7",
                "vehicles_model_id" => "2",
                "vehicle_type_id" => '1',
                "license_plate" => "NEG-3290",
                "direction" => "AUTOMÁTICO",
                "mileage" => "500",
                "shielding" => "V",
                "color"=>"AZUL",
                "fuel"=>"ÁLCOOL",
                "chassi_status"=>"OUTROS",
                "air_conditioning"=>"V",
                "gas_kit"=>"F",
                "observation"=>"",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "car_model_id"=>"3",
                "brand_id" => "8",
                "vehicles_model_id" => "1",
                "vehicle_type_id" => '2',
                "license_plate" => "IAW-6701",
                "direction" => "AUTOMÁTICO",
                "mileage" => "21022",
                "shielding" => "V",
                "color"=>"LARANJA",
                "fuel"=>"GÁS NATURAL",
                "chassi_status"=>"OUTROS",
                "air_conditioning"=>"F",
                "gas_kit"=>"V",
                "observation"=>"",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "car_model_id"=>"8",
                "brand_id" => "1",
                "vehicles_model_id" => "8",
                "vehicle_type_id" => '2',
                "license_plate" => "MXN-2450",
                "direction" => "MANUAL",
                "mileage" => "2877",
                "shielding" => "F",
                "color"=>"VERDE",
                "fuel"=>"ÁLCOOL",
                "chassi_status"=>"INTACTO",
                "air_conditioning"=>"V",
                "gas_kit"=>"F",
                "observation"=>"",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "car_model_id"=>"5",
                "brand_id" => "2",
                "vehicles_model_id" => "6",
                "vehicle_type_id" => '1',
                "license_plate" => "HZH-1040",
                "direction" => "MANUAL",
                "mileage" => "60020",
                "shielding" => "F",
                "color"=>"BRANCO",
                "fuel"=>"PRETO",
                "chassi_status"=>"INTACTO",
                "air_conditioning"=>"V",
                "gas_kit"=>"F",
                "observation"=>"",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "car_model_id"=>"1",
                "brand_id" => "3",
                "vehicles_model_id" => "4",
                "vehicle_type_id" => '1',
                "license_plate" => "KBP-1344",
                "direction" => "MANUAL",
                "mileage" => "5448",
                "shielding" => "F",
                "color"=>"PRETO",
                "fuel"=>"PRETO",
                "chassi_status"=>"AMASSADO",
                "air_conditioning"=>"V",
                "gas_kit"=>"F",
                "observation"=>"",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "car_model_id"=>"2",
                "brand_id" => "4",
                "vehicles_model_id" => "2",
                "vehicle_type_id" => '2',
                "license_plate" => "NAG-2582",
                "direction" => "MANUAL",
                "mileage" => "7444",
                "shielding" => "F",
                "color"=>"PRETO",
                "fuel"=>"PRETO",
                "chassi_status"=>"BATIDO",
                "air_conditioning"=>"V",
                "gas_kit"=>"F",
                "observation"=>"",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "car_model_id"=>"8",
                "brand_id" => "5",
                "vehicles_model_id" => "1",
                "vehicle_type_id" => '1',
                "license_plate" => "NDR-0622",
                "direction" => "MANUAL",
                "mileage" => "2000",
                "shielding" => "F",
                "color"=>"BRANCO",
                "fuel"=>"Eletrico",
                "chassi_status"=>"BATIDO",
                "air_conditioning"=>"V",
                "gas_kit"=>"F",
                "observation"=>"PNEUS FURADOS",
                "created_at" => now(),
                "updated_at" => now()
            ]
        ];

        $this->seedValue2 = [
            [
                "car_model_id"=>"2",
                "brand_id" => "1",
                "vehicles_model_id" => "8",
                "vehicle_type_id" => '1',
                "license_plate" => "ABV-7861",
                "direction" => "MANUAL",
                "mileage" => "10000",
                "shielding" => "F",
                "color"=>"PRETO",
                "fuel"=>"GASOLINA",
                "chassi_status"=>"INTACTO",
                "air_conditioning"=>"V",
                "gas_kit"=>"F",
                "observation"=>"",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "car_model_id"=>"2",
                "brand_id" => "2",
                "vehicles_model_id" => "5",
                "vehicle_type_id" => '1',
                "license_plate" => "HSH-9090",
                "direction" => "AUTOMATICO",
                "mileage" => "5896",
                "shielding" => "F",
                "color"=>"PRETO",
                "fuel"=>"GASOLINA",
                "chassi_status"=>"INTACTO",
                "air_conditioning"=>"V",
                "gas_kit"=>"F",
                "observation"=>"",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "car_model_id"=>"2",
                "brand_id" => "3",
                "vehicles_model_id" => "3",
                "vehicle_type_id" => '1',
                "license_plate" => "AAB-9161",
                "direction" => "MANUAL",
                "mileage" => "6000",
                "shielding" => "F",
                "color"=>"PRETO",
                "fuel"=>"GASOLINA",
                "chassi_status"=>"INTACTO",
                "air_conditioning"=>"V",
                "gas_kit"=>"F",
                "observation"=>"",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "car_model_id"=>"2",
                "brand_id" => "5",
                "vehicles_model_id" => "6",
                "vehicle_type_id" => '1',
                "license_plate" => "CDF-9161",
                "direction" => "MANUAL",
                "mileage" => "15896",
                "shielding" => "F",
                "color"=>"BRANCO",
                "fuel"=>"GASOLINA",
                "chassi_status"=>"BATIDO",
                "air_conditioning"=>"V",
                "gas_kit"=>"F",
                "observation"=>"",
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
        DB::table("vehicles")->insert($this->seedValue);
        DB::table("vehicles")->insert($this->seedValue2);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('vehicles_seed');
    }
};
