<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Token;
use Illuminate\Database\Seeder;

class TokenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Token::create(['token' => '51774552545955402348552a48445944474446']);
    }
}
