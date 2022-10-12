<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private array $seedValue1 = [];
    private array $seedValue2 = [];
    private array $seedValue3 = [];
    private array $seedValue4 = [];

    public function __construct()
    {
        // 1º item
        $this->seedValue1 = [
            [
                "user_id" => "2",
                "auction_item_id" => '19',
                "value_bid" => "35000",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "user_id" => "4",
                "auction_item_id" => '19',
                "value_bid" => "40000",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "user_id" => "2",
                "auction_item_id" => '19',
                "value_bid" => "45000",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "user_id" => "3",
                "auction_item_id" => '19',
                "value_bid" => "50000",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "user_id" => "4",
                "auction_item_id" => '19',
                "value_bid" => "60000",
                "created_at" => now(),
                "updated_at" => now()
            ]
        ];

        // 2º item
        $this->seedValue2 = [
            [
                "user_id" => "4",
                "auction_item_id" => '20',
                "value_bid" => "23000",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "user_id" => "2",
                "auction_item_id" => '20',
                "value_bid" => "28000",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "user_id" => "3",
                "auction_item_id" => '20',
                "value_bid" => "32000",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "user_id" => "4",
                "auction_item_id" => '20',
                "value_bid" => "33000",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "user_id" => "2",
                "auction_item_id" => '20',
                "value_bid" => "37000",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "user_id" => "4",
                "auction_item_id" => '20',
                "value_bid" => "38000",
                "created_at" => now(),
                "updated_at" => now()
            ]
        ];

        // 3º item
        $this->seedValue3 = [
            [
                "user_id" => "3",
                "auction_item_id" => '21',
                "value_bid" => "31000",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "user_id" => "2",
                "auction_item_id" => '21',
                "value_bid" => "32500",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "user_id" => "4",
                "auction_item_id" => '21',
                "value_bid" => "35500",
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "user_id" => "2",
                "auction_item_id" => '21',
                "value_bid" => "37000",
                "created_at" => now(),
                "updated_at" => now()
            ]
        ];

        // 4º item
        $this->seedValue4 = [
            [
                "user_id" => "4",
                "auction_item_id" => '22',
                "value_bid" => "48000",
                "created_at" => date('Y-m-10 H:i:s'),
                "updated_at" => date('Y-m-10 H:i:s')
            ],
            [
                "user_id" => "2",
                "auction_item_id" => '22',
                "value_bid" => "50000",
                "created_at" => date('Y-m-10 H:i:s'),
                "updated_at" => date('Y-m-10 H:i:s')
            ],
            [
                "user_id" => "4",
                "auction_item_id" => '22',
                "value_bid" => "52500",
                "created_at" => date('Y-m-10 H:i:s'),
                "updated_at" => date('Y-m-10 H:i:s')
            ],
            [
                "user_id" => "3",
                "auction_item_id" => '22',
                "value_bid" => "54000",
                "created_at" => date('Y-m-10 H:i:s'),
                "updated_at" => date('Y-m-10 H:i:s')
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
        DB::table("bids")->insert($this->seedValue1);
        DB::table("bids")->insert($this->seedValue2);
        DB::table("bids")->insert($this->seedValue3);
        DB::table("bids")->insert($this->seedValue4);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('bids_seed');
    }
};
