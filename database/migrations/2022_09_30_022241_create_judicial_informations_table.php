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
        Schema::create('judicial_informations', function (Blueprint $table) {
            $table->id();
            $table->string('process')->nullable();
            $table->string('judicial_circuit')->nullable();
            $table->string('judge')->nullable();
            $table->string('exequent')->nullable();
            $table->string('executed')->nullable();
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
        Schema::dropIfExists('judicial_informations');
    }
};
