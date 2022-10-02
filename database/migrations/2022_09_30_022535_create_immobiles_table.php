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
            $table->foreignId('user_id')->constrained()->cascadeOnUpdate();
            $table->foreignId('immobile_type_id')->constrained('immobiles_types')->cascadeOnUpdate();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnUpdate();
            $table->string('city');
            $table->string('address');
            $table->string('district');
            $table->integer('cep');
            $table->foreignId('judicial_information_id')->constrained('judicial_informations')->cascadeOnUpdate();
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
