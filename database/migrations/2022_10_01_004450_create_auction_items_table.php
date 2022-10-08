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
            $table->foreignId('item_id')->nullable()->constrained('items','id')->cascadeOnUpdate();//remover nullable depois de fazer o seed
            $table->foreignId('auction_id')->constrained('auctions','id')->cascadeOnUpdate();
            $table->integer('opening_bid'); //valor inicial
            $table->string('value_bid')->nullable(); //oferta atual
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
