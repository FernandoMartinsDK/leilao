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
        Schema::create('auction_winner', function (Blueprint $table) {
            $table->id();
            $table->foreignId('winner_user_id')->constrained('users','id')->cascadeOnUpdate();
            $table->foreignId('auctio_lot_id')->constrained('auctions','id')->cascadeOnUpdate();
            $table->foreignId('auction_item_id')->constrained('auction_items','id')->cascadeOnUpdate();
            $table->dateTime('purchase_date');
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
        Schema::dropIfExists('auction_winner');
    }
};