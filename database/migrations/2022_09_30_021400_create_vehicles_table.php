<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')->constrained('brands','id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('car_model_id')->constrained('car_models','id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('vehicles_model_id')->constrained('vehicles_models','id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('vehicle_type_id')->constrained('vehicles_types','id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('license_plate')->unique();
            $table->string('mileage');
            $table->string('direction');
            $table->char('shielding');
            $table->string('color');
            $table->string('fuel');
            $table->string('chassi_status');
            $table->char('air_conditioning');
            $table->char('gas_kit');
            $table->text('observation')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
};
