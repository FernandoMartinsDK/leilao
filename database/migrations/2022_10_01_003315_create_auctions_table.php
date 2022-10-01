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
        Schema::create('auctions', function (Blueprint $table) {
            $table->id();
            $table->dateTime('auction_date');
            $table->string('place');
            $table->foreignId('financial_institution_id')->constrained('financial_institutions','id')->cascadeOnUpdate();
            $table->foreignId('place_id')->constrained('places','id')->cascadeOnUpdate();
            $table->char('open');
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
        Schema::dropIfExists('auctions');
    }
};
