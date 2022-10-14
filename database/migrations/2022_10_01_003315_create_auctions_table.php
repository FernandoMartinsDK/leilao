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
            $table->foreignId('financial_institution_id')->constrained('financial_institutions','id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('place_id')->constrained('places','id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('categorie_id')->constrained('categories','id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->char('open');
            $table->text('note')->nullable();
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
