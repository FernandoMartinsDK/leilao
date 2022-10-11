<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private array $seedValue = [];

    public function __construct()
    {
        $this->seedValue = [
            [
                'immobile_type_id'=>'3',
                'city'=>'Caçapava',
                'address'=>'Rua Luiz Jair',
                'district'=>'Santana',
                'cep'=>'12270990',
                'judicial_information'=>'congue massa consectetur dui, scelerisque ipsum curae pharetra quis ut vehicula. tellus consectetur leo fusce nunc tincidunt ante dui placerat sem accumsan lectus proin consequat praesent, velit quam pellentesque sem magna vehicula porttitor vestibulum netus curae vel consequat magna.',
                'model'=>'CHÁCARA',
                'number'=>'658',
                'complement'=>'',
                'description'=>'nceptos bla rhoncus aliquet massa mollis, dolor euismod litora volutpat amet eros tempus sollicitudin fusce andit sapien feugiat platea sem lacus consequat. proin curabitur fusce taciti quis etiam viverr sadasdsa.',
                'state'=>'SP',
                'land_area'=>'1065',
                'building_area'=>'142',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'immobile_type_id'=>'1',
                'city'=>'São Jose dos Campos',
                'address'=>'Rua Coronel Marcos',
                'district'=>'Centro',
                'cep'=>'12270555',
                'judicial_information'=>'congue massa consectetur dui, scelerisque ipsum curae pharetra quis ut vehicula. tellus consectetur leo fusce nunc tincidunt ante dui placerat sem accumsan lectus proin consequat praesent, velit quam pellentesque sem magna vehicula porttitor vestibulum netus curae vel consequat magna.',
                'model'=>'APARTAMENTO',
                'number'=>'34',
                'complement'=>'De esquina',
                'description'=>'nceptos blandit sapien feugiat platea sem lacus consequat. proin curabitur fusce taciti quis etiam viverra rhoncus aliquet massa mollis, dolor euismod litora volutpat amet eros tempus sollicitudin fusce urna tortor.',
                'state'=>'SP',
                'land_area'=>'106',
                'building_area'=>'35',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'immobile_type_id'=>'2',
                'city'=>'Jacareí',
                'address'=>'Av rock Samba',
                'district'=>'Putim',
                'cep'=>'88870555',
                'judicial_information'=>'congue massa consectetur dui, scelerisque ipsum curae pharetra quis ut vehicula.  ante dui placerat sem accumsan lectus proin tellus consectetur leo fusce nunc tincidunt consequat praesent, velit quam pellentesque sem magna vehicula porttitor vestibulum netus curae vel consequat magna.',
                'model'=>'CASA',
                'number'=>'665',
                'complement'=>'De frente ao bar do boca',
                'description'=>'turpis iaculis laoreet nisi elit urna ac bibendum, quisque sit mi morbi lacinia felis feugiat eu, luctus ali',
                'state'=>'SP',
                'land_area'=>'3565',
                'building_area'=>'2100',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'immobile_type_id'=>'1',
                'city'=>'São Jose dos Campos',
                'address'=>'Rua das flores',
                'district'=>'Centro',
                'cep'=>'12266885',
                'judicial_information'=>'congue massa consectetur dui, scelerisque ipsum curae pharetra quis ut vehicula. tellus consectetur leo fusce nunc tincidunt ante dui placerat sem accumsan lectus proin consequat praesent, velit quam pellentesque sem magna vehicula porttitor vestibulum netus curae vel consequat magna.',
                'model'=>'CASA',
                'number'=>'234',
                'complement'=>'',
                'description'=>'nceptos blandit sapien feugiat platea sem lacus consequat. proin curabitur fusce taciti quis etiam viverra rhoncus aliquet massa mollis, dolor euismod litora volutpat amet eros tempus sollicitudin fusce urna tortor.',
                'state'=>'SP',
                'land_area'=>'500',
                'building_area'=>'100',
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                'immobile_type_id'=>'2',
                'city'=>'São Jose dos Campos',
                'address'=>'Rua dos animais',
                'district'=>'São Dimas',
                'cep'=>'10280455',
                'judicial_information'=>'congue massa consectetur dui, scelerisque ipsum curae pharetra quis ut vehicula. tellus consectetur leo fusce nunc tincidunt ante dui placerat sem accumsan lectus proin consequat praesent, velit quam pellentesque sem magna vehicula porttitor vestibulum netus curae vel consequat magna.',
                'model'=>'CHÁCARA',
                'number'=>'33',
                'complement'=>'',
                'description'=>'ncept consequat. proin curabitur fusce taciti quis etiam viverra rhoncus aliquet massa os blandit sapien feugiat platea sem lacus mollis, dolor euismod litora volutpat amet eros tempus sollicitudin fusce urna tortor.',
                'state'=>'SP',
                'land_area'=>'1540',
                'building_area'=>'842',
                "created_at" => now(),
                "updated_at" => now()
            ],
        ];
    }
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table("immobiles")->insert($this->seedValue);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('immobiles_seed');
    }
};
