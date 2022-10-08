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
                "direction" => "Manual",
                "mileage" => "5896",
                "shielding" => "F",
                "color"=>"Preto",
                "fuel"=>"Gasolina",
                "chassi_status"=>"Intacto",
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
                "direction" => "Manual",
                "mileage" => "5000",
                "shielding" => "F",
                "color"=>"Branco",
                "fuel"=>"Gasolina",
                "chassi_status"=>"Intacto",
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
                "direction" => "Manual",
                "mileage" => "136",
                "shielding" => "F",
                "color"=>"Verde",
                "fuel"=>"Gasolina",
                "chassi_status"=>"Riscado",
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
                "direction" => "Automático",
                "mileage" => "95005",
                "shielding" => "V",
                "color"=>"Preto",
                "fuel"=>"Gás Natural",
                "chassi_status"=>"Amassado",
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
                "direction" => "Automático",
                "mileage" => "5544",
                "shielding" => "F",
                "color"=>"Amarelo",
                "fuel"=>"Álcool ",
                "chassi_status"=>"Batido",
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
                "direction" => "Automático",
                "mileage" => "800",
                "shielding" => "F",
                "color"=>"Verde",
                "fuel"=>"Álcool",
                "chassi_status"=>"Batido",
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
                "direction" => "Automático",
                "mileage" => "500",
                "shielding" => "V",
                "color"=>"Azul",
                "fuel"=>"Álcool",
                "chassi_status"=>"Outros",
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
                "direction" => "Automático",
                "mileage" => "21022",
                "shielding" => "V",
                "color"=>"Laranja",
                "fuel"=>"Gás Natural",
                "chassi_status"=>"Outros",
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
                "direction" => "Manual",
                "mileage" => "2877",
                "shielding" => "F",
                "color"=>"Verde",
                "fuel"=>"Álcool",
                "chassi_status"=>"Intacto",
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
                "direction" => "Manual",
                "mileage" => "60020",
                "shielding" => "F",
                "color"=>"Branco",
                "fuel"=>"Gasolina",
                "chassi_status"=>"Intacto",
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
                "direction" => "Manual",
                "mileage" => "5448",
                "shielding" => "F",
                "color"=>"Preto",
                "fuel"=>"Gasolina",
                "chassi_status"=>"Amassado",
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
                "direction" => "Manual",
                "mileage" => "7444",
                "shielding" => "F",
                "color"=>"Preto",
                "fuel"=>"Gasolina",
                "chassi_status"=>"Batido",
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
                "direction" => "Manual",
                "mileage" => "2000",
                "shielding" => "F",
                "color"=>"Branco",
                "fuel"=>"Eletrico",
                "chassi_status"=>"Batido",
                "air_conditioning"=>"V",
                "gas_kit"=>"F",
                "observation"=>"Pneus furados",
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
