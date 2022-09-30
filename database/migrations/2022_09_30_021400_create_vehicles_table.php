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
            $table->foreignId('user_id')->constrained()->cascadeOnUpdate();
            $table->foreignId('vehicle_type')->constrained('vehicles_types','id')->cascadeOnUpdate();
            $table->foreignId('category_id')->constrained('categories','id')->cascadeOnUpdate();
            $table->string('license_plate');
            $table->string('mileage');
            $table->string('direction');
            $table->char('shielding');
            $table->string('color');
            $table->string('fuel');
            $table->string('chassi_status');
            $table->string('air_conditioning');
            $table->char('gas_kit');
            $table->text('observation');
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
