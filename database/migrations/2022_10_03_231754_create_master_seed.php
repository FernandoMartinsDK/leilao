<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private array $usersSeedValue = [];

    public function __construct()
    {
        $this->usersSeedValue = [
            [
                "name" => "Fernando Diego",
                "email" => "fernando@email.com",
                "view_name" => "Fernando",
                "cpf" => "3337775855",
                "cnpj" => "",
                "active" => "T",
                "is_admin" => "V",
                "date_birth" => "1991-02-14",
                "telephone" => '12995589090',
                "state_registration" => "",
                "type_person_id" => "1",
                "password" => bcrypt("password"),
                "created_at" => now()
            ]
        ];
    }
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table("users")->insert($this->usersSeedValue);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table("users")->where('email',array_map(
            function($row){
                return $row["email"];
            },
            $this->usersSeedValue
        ))->delete();
    }
};
