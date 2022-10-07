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
        Schema::create('auction_items', function (Blueprint $table) {
            $table->id();
            $table->integer('item_id');
            $table->foreignId('category_id')->constrained('categories','id')->cascadeOnUpdate();
            $table->foreignId('auction_id')->constrained('auctions','id')->cascadeOnUpdate();
            $table->integer('opening_bid'); //valor inicial
            $table->integer('value_bid'); //oferta atual
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
        Schema::dropIfExists('auction_items');
    }
};
