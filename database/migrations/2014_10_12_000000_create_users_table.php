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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('view_name');
            $table->string('cpf')->nullable();
            $table->string('cnpj')->nullable();
            $table->string('state_registration')->nullable();//inscrição
            $table->string('email')->unique();
            $table->date('date_birth');
            $table->string('telephone');
            $table->char('active',1);
            $table->foreignId('profile_id')->constrained('profiles')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('type_person_id')->constrained('types_person')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
