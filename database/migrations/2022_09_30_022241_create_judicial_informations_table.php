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
            $table->string('process');
            $table->string('judicial_circuit');
            $table->string('judge');
            $table->string('exequent');
            $table->string('executed');
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
