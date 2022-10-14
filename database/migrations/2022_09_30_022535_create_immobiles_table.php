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
        Schema::create('immobiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('immobile_type_id')->constrained('immobiles_types')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('city');
            $table->string('address');
            $table->string('district');
            $table->integer('cep');
            $table->text('judicial_information')->nullable();
            $table->text('description');
            $table->string('model');
            $table->integer('number');
            $table->string('complement')->nullable();
            $table->string('state');
            $table->string('land_area');
            $table->string('building_area');
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
        Schema::dropIfExists('immobiles');
    }
};
